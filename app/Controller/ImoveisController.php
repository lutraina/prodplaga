<?php
	class ImoveisController extends AppController{
		public $name = 'Imoveis';
				
		public $components = array('Upload','Message');
		
		public function beforeFilter(){
			parent::beforeFilter();
			
			$this->set('banner_lateral',$this->_getBanners('bl_aut',1));/*banner lateral vantagens ver*/
			$this->set('bloco_banners_lateral',$this->_getBanners('bbl_aut',10));/*bloco banners lateral vantagens ver*/
			
			
			$this->set('tipo', $this->_getFiltroClass('tipo'));
			$this->set('quartos', $this->_getFiltroClass('quartos'));
			

			$this->set('maislidas', $this->Business->find('all',array('limit'=>5,'conditions'=>array('Business.type'=>'imoveis'),'order'=>array('Business.view'=>'DESC'))));
			
		}
		
		
		public function index(){
			$this->set('classificados', $this->Imovei->find('all', array('conditions'=>array('Imovei.status'=>'sim','Imovei.situacao'=>'venda'))));
			$this->set('classificados2', $this->Imovei->find('all', array('conditions'=>array('Imovei.status'=>'sim','Imovei.situacao'=>'aluguel'))));
			
		
		}
		
		
		public function modelos_ajax($marca=null){
			$modelos = $this->Imovei->find('list',array('order'=>array('Imovei.modelo'=>'ASC'),'fields'=>array('modelo','modelo'),'conditions'=>array('Imovei.marca'=>$marca),'group'=>array('Imovei.modelo')));
			$this->set('filtro_modelos',$modelos);
		}
		
		public function ver($id){
			$this->set('imovel', $this->Imovei->find('first', array('conditions'=>array('Imovei.id'=>$id, 'Imovei.status'=>'sim'))));
			$this->set('outros', $this->Imovei->find('all', array('conditions'=>array('Imovei.status'=>'sim'))));
		}	
		
		
		public function search(){
			
			$tipo 			= !empty($_GET['tipo']) ? array('Imovei.tipo '=>$_GET['tipo']) : array();
			$situacao 		= !empty($_GET['situacao']) ? array('Imovei.situacao '=>$_GET['situacao']) : array();
			$quartos 		= !empty($_GET['quartos']) ? array('Imovei.quartos'=>$_GET['quartos']) : array();
			
			if(!empty($_GET['start_preco']) && !empty($_GET['end_preco'])){
				$preco = array('Imovei.preco BETWEEN ? AND ?' => array($_GET['start_preco'],$_GET['end_preco']));
			}else if(!empty($_GET['start_preco'])){
				$preco = array('Imovei.preco >= '=>$_GET['start_preco']) ;
			}else if(!empty($_GET['end_preco'])){
				$preco = array('Imovei.preco <= '=>$_GET['end_preco']) ;
			}else{
				$preco =  array();
			}
						
			
			$imoveis =  $this->Imovei->find('all', array('conditions'=>array(
        			array('AND'=>array(
							$tipo,
							$quartos,
							$preco,
							array('Imovei.status'=>'sim')
							
							)
						)
				),'order'=>'Imovei.id DESC' ));
			
			$this->set('classificados', $imoveis);
			$this->set('outros', $this->Imovei->find('all', array('conditions'=>array('Imovei.status'=>'sim'))));
			$this->Set('palavras', array("tipo: {$_GET['tipo']}","preços de: {$_GET['start_preco']} até {$_GET['end_preco']}"));
		}
		
		public function _getFiltroClass($name=null){
			return $this->Imovei->find('list',array('order'=>array('Imovei.'.$name=>'ASC'),'fields'=>array($name,$name),'group'=>array('Imovei.'.$name)));
		}
		
		
		public function vender(){
			if($this->data){
				if($this->Imovei->save($this->data)){
					$this->loadModel('File');
					foreach($_FILES['upl']['name'] as $key => $fileUp){
						$file = $this->Upload->getFile(array(
							'type'=>'fotos',
							'path'=>'imoveis/fotos/',
							'file'=> array('name'=>$_FILES['upl']['name'][$key],'type'=>$_FILES['upl']['type'][$key],'tmp_name'=>$_FILES['upl']['tmp_name'][$key],'error'=>$_FILES['upl']['error'][$key],'size'=>$_FILES['upl']['size'][$key]),					
							'size'=>array('A'=>array(635,250),'B'=>array(150,115)))
						);					
						if($file){
							$this->File->saveMany(array('File'=>array('name'=>$file,'imoveis_id'=>$this->Imovei->id)));
						}
					}		
					
					
					$this->Session->setFlash($this->Message->success('Cadastro efetuado com sucsso!'));
					$this->redirect('/imoveis');
				}
			}
		}
}
	
