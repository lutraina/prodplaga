<?php
	class AdvantagesController extends AppController{
		public $name = 'Advantages';
		
		public function beforeFilter(){
			parent::beforeFilter();
			$this->loadModel('Galeria');
			
			$this->set('banner_lateral',$this->_getBanners('blv_index_1',1,'vantagens','all'));/*banner lateral vertical ver*/
			$this->set('bloco_banners_lateral',$this->_getBanners('blv_index_2',4,'vantagens','all'));/*banner lateral vertical ver*/

			$this->Auth->deny('cupom');

		}
		
		
		public function index(){
			$this->set('galeriaDestaque1', $this->Galeria->find('first',array('conditions'=>array('Galeria.featured'=>1))));
			
			//banner topo du header 
	    	$this->set('bannerTopo', $this->_getBanners('btopohome', 1 , 'home', 'first')); /*banner topo header 728x90*/
			$bannertopo = $this->_getBanners('btopohome', 1 , 'home', 'first');
			//debug($bannertopo);
			
		}
		public function ver($url=null){
			/*
			 * Como só vai existir uma vantagem por dia, a mesma está sendo chamada no app controler
			 * e para evitar de fazer muitas querys apriveitei a query de lá
			 * */
			 
			 //banner topo du header 
	    	$this->set('bannerTopo', $this->_getBanners('btopohome', 1 , 'home', 'first')); /*banner topo header 728x90*/
			$bannertopo = $this->_getBanners('btopohome', 1 , 'home', 'first');
			//debug($bannertopo);
			
		}		
		public function cupom($url=null){
			$this->layout = 'interno';

			$this->loadModel('UserHasAdvantage');
			$user = $this->Auth->user();
			
			$idUser = $user['id'];
			
			$Advantage =  $this->Advantage->find('first',array('conditions'=>array('url'=>$url)));
			$idAdvantage = $Advantage['Advantage']['id'];

			$data = date('d-m-y H:i:s');
			$uses_has_advantage = $this->UserHasAdvantage->find('first', array('conditions'=>array('users_id'=>$idUser,'advantages_id'=>$idAdvantage)));
			
			if(!($this->UserHasAdvantage->find('first', array('conditions'=>array('users_id'=>$idUser,'advantages_id'=>$idAdvantage))))){
				$cod = $user['id'].$Advantage['Advantage']['id'].rand(0, 20);
				$this->UserHasAdvantage->save(array('UserHasAdvantage'=>array('cod'=>$cod, 'users_id'=>$idUser,'advantages_id'=>$idAdvantage)));	
				
				$this->set('cod', $cod);
				$this->set('data', $data);
				
			}else{
				$vantagens = $this->UserHasAdvantage->find('first', array('conditions'=>array('users_id'=>$idUser,'advantages_id'=>$idAdvantage)));
				$this->set('cod', $vantagens['UserHasAdvantage']['cod']);
				$this->set('data', $data);
			}
			$this->set('vantagens', $Advantage);

		}	
		public function painel(){
			
			$this->layout = 'vantagens';
			
			
			$this->loadModel('User_has_advantage');
			
			$cupom = isset($_GET['cupom']) ? $_GET['cupom'] : '';
			
			$this->set('vantagens', $this->User_has_advantage->find('first',array('conditions'=>array('User_has_advantage.cod'=>$cupom))));
			
			
			
		}
		
}
	
