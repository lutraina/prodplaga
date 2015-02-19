<?php
	class SchedulesController extends AppController{
		public $name = 'Schedules';
		
		public function beforeFilter(){
			parent::beforeFilter();
			$this->set('banner_lateral',$this->_getBanners('blv_index_1',1,'agenda','all'));/*banner lateral vertical ver*/
			$this->set('bloco_banners_lateral',$this->_getBanners('blv_index_2',4,'agenda','all'));/*banner lateral vertical ver*/
			
		}
		
		/*
		 * Lista dos eventos do dia
		 * Os eventos estão sendo todos selecionados e isso é um problema, se tiver um milhão de registro a query trará os 1 milhão, é necessário otimizar esse código o mais rápido possível
		 * */
		public function index($url=null,$id=null,$data=null){
				
			//data de hoje	caso não tenha filtro de data
			if($data == null)
				$data =	date("Y-m-d");
				
			$this->set("dataHoje",$data);//passa a data pra view
			
			//lista as categorais para filtro
			$this->set('categories',$this->Schedule->Category->find('all',array('conditions'=>array('type'=>'schedule'))));
			
			//query com os eventos, caso tenha algum filtro de categoria mostra só os da categoria caso não mostra todos
			if($id != null && $id != 0){				
				$this->set('categoryLists', $this->Schedule->Category->find('all',array('conditions'=>array('Category.id'=>$id))));
				
				$this->set("filtro", $url.'/'.$id);//filtro pra passar pro helper data Calendar		
			}else{
				$this->set('categoryLists', $this->Schedule->Category->find('all',array('conditions'=>array('Category.type'=>'schedule'))));
				
				$this->set("filtro", 'all/0');//filtro pra passar pro helper data Calendar
			}
			
			$this->set('categoryID', $id);
			
			
			//banner topo du header 
	    	$this->set('bannerTopo', $this->_getBanners('btopohome', 1 , 'home', 'first')); /*banner topo header 728x90*/
			$bannertopo = $this->_getBanners('btopohome', 1 , 'home', 'first');
			//debug($bannertopo);
			
		}

		public function ver($url=null){
			
			$this->set('schedule', $this->Schedule->find('first',array('conditions'=>array('Schedule.url'=>$url))));			
		}				
		
}
	
