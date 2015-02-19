<?php
	class AutosController extends AppController{
		public $name = 'Autos';
		
		
		public $components = array('Upload','Message');
		
		
		public function beforeFilter(){
			parent::beforeFilter();
			
			$this->set('banner_lateral',$this->_getBanners('bl_aut',1));/*banner lateral vantagens ver*/
			$this->set('bloco_banners_lateral',$this->_getBanners('bbl_aut',10));/*bloco banners lateral vantagens ver*/
			$this->set('filtro_marcas', $this->_getFiltroClass('marca'));
			
			/*
			 * Gera o ano de hoje a 40 anos atrás
			 * */
			$anoHoje = date('Y');
			for($i = ($anoHoje+1); $i > ($anoHoje-40); $i--){
				$anos[$i] =$i;
			}
			$this->set('filtro_anos',$anos);
			$this->set('anos',$anos);

			$this->set('maislidas', $this->Business->find('all',array('limit'=>5,'conditions'=>array('Business.type'=>'autos'),'order'=>array('Business.view'=>'DESC'))));
			
		}
		
		
		public function index(){
			$this->set('classificados', $this->Auto->find('all', array('conditions'=>array('Auto.status'=>'sim','Auto.tipo'=>'venda'))));
			$this->set('classificados2', $this->Auto->find('all', array('conditions'=>array('Auto.status'=>'sim','Auto.tipo'=>'aluguel'))));
		}
		
		
		public function modelos_ajax($marca=null){
			$modelos = $this->Auto->find('list',array('order'=>array('Auto.modelo'=>'ASC'),'fields'=>array('modelo','modelo'),'conditions'=>array('Auto.marca'=>$marca),'group'=>array('Auto.modelo')));
			$this->set('filtro_modelos',$modelos);
		}
		
		public function ver($id){
			$this->set('auto', $this->Auto->find('first', array('conditions'=>array('Auto.id'=>$id, 'Auto.status'=>'sim'))));
			$this->set('outros', $this->Auto->find('all', array('conditions'=>array('Auto.status'=>'sim'))));
		}	
		
		
		public function search(){
			
			$tipo 			= !empty($_GET['tipo']) ? array('Auto.tipo '=>$_GET['tipo']) : array();
			$ano_fabricacao = !empty($_GET['ano_fabricacao']) ? array('Auto.ano_fabricacao'=>$_GET['ano_fabricacao']) : array();
			$marca 			= !empty($_GET['marca']) ? array('Auto.marca '=>$_GET['marca']) : array();
			$modelo 		= !empty($_GET['modelo']) ? array('Auto.modelo '=>$_GET['modelo']) : array();
			
			

			
			if(isset($_GET['zero']) ){
				$quilometragem = $_GET['zero'] > 0 ? array('Auto.quilometragem >'=>1) : array('Auto.quilometragem < '=>1) ;
			}else{
				$quilometragem =  array();
			}
			
			if(!empty($_GET['start_preco']) && !empty($_GET['end_preco'])){
				$preco = array('Auto.preco BETWEEN ? AND ?' => array($_GET['start_preco'],$_GET['end_preco']));
			}else if(!empty($_GET['start_preco'])){
				$preco = array('Auto.preco >= '=>$_GET['start_preco']) ;
			}else if(!empty($_GET['end_preco'])){
				$preco = array('Auto.preco <= '=>$_GET['end_preco']) ;
			}else{
				$preco =  array();
			}
						
			
			$autos =  $this->Auto->find('all', array('conditions'=>array(
        			array('AND'=>array(
							$tipo,
							$ano_fabricacao,
							$marca,
							$modelo,
							$quilometragem,
							$preco,
							array('Auto.status'=>'sim')
							
							)
						)
				),'order'=>'Auto.id DESC' ));
			
			$this->set('classificados', $autos);
			$this->set('outros', $this->Auto->find('all', array('conditions'=>array('Auto.status'=>'sim'))));
			$this->Set('palavras', array("tipo: {$_GET['tipo']}","marca: {$_GET['marca']}","modelo: {$_GET['modelo']}","preços de: {$_GET['start_preco']} até {$_GET['end_preco']}"));
		}
		
		public function _getFiltroClass($name=null){
			return $this->Auto->find('list',array('order'=>array('Auto.'.$name=>'ASC'),'fields'=>array($name,$name),'group'=>array('Auto.'.$name)));
		}
		
		
		public function vender(){
			if($this->data){
				if($this->Auto->save($this->data)){
					$this->loadModel('File');
					foreach($_FILES['upl']['name'] as $key => $fileUp){
						$file = $this->Upload->getFile(array(
							'type'=>'fotos',
							'path'=>'autos/fotos/',
							'file'=> array('name'=>$_FILES['upl']['name'][$key],'type'=>$_FILES['upl']['type'][$key],'tmp_name'=>$_FILES['upl']['tmp_name'][$key],'error'=>$_FILES['upl']['error'][$key],'size'=>$_FILES['upl']['size'][$key]),					
							'size'=>array('A'=>array(635,250),'B'=>array(150,115)))
						);					
						if($file){
							$this->File->saveMany(array('File'=>array('name'=>$file,'autos_id'=>$this->Auto->id)));
						}
					}
					$this->Session->setFlash($this->Message->success('Cadastro efetuado com sucsso!'));
					$this->redirect('/autos');
				}
			}
		}
}
	
