<?php
	class GalleriesController extends AppController{
		public $name = 'Galleries';
		
		public function beforeFilter(){
			parent::beforeFilter();
			$this->loadModel('Galeria');
			
			$this->Auth->deny('favoritar');			
			$this->set('maislidas', $this->Galeria->find('all',array('limit'=>5,'order'=>array('Galeria.view'=>'DESC'))));	
			
			$this->set('banner_lateral',$this->_getBanners('bl_gal',1));/*banner lateral galeria ver*/
			$this->set('bloco_banners_lateral',$this->_getBanners('bl_gal',10));/*bloco banners lateral galeria ver*/
		}
		
		public function index(){
			$this->set('galeriaDestaque1', $this->Galeria->find('first',array('conditions'=>array('Galeria.featured'=>1))));
			$this->set('galeriasDestaque2', $this->Galeria->find('all',array('order'=>array('Galeria.modified'=>'DESC'),'limit'=>2,'conditions'=>array('Galeria.featured'=>2))));
			$this->set('galerias', $this->Galeria->find('all',array('conditions'=>array('Galeria.featured'=>0),'order'=>array('Galeria.id'=>'DESC'))));
		
		}
		
		public function ver($id=null){
			$this->set('files', $this->Galeria->File->find('all',array('conditions'=>array('galerias_id'=>$id))));
			
			// INICIO CONTABILIZA VISUALIZAÇÕES
			$this->Galeria->updateAll(
				array('Galeria.view'=> 'Galeria.view + 1'),
				array('Galeria.id'=>$id)
			);	
		}
		
		public function favoritar($idGaleria=null){
			$this->loadModel('UserHasFavorito');
			$user = $this->Auth->user();
			
			$idUser = $user['id'];
			if(!($this->UserHasFavorito->find('first', array('conditions'=>array('users_id'=>$idUser,'galerias_id'=>$idGaleria))))){
				if($this->UserHasFavorito->save(array('UserHasFavorito'=>array('users_id'=>$idUser,'galerias_id'=>$idGaleria)))){
					$this->Session->setFlash($this->Message->success('Foi adicinado aos seus favoritos!'));
					$this->redirect('/galeria/ver/'.$idGaleria);
				}
			}else{
				$this->Session->setFlash($this->Message->error('Item já foi adicionado a seus favoritos!'));
				$this->redirect('/galeria/ver/'.$idGaleria);
			}
			
		}
	}
