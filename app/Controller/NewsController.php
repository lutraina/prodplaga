<?php
	class NewsController extends AppController{
		public $name = 'News';
		
		public function beforeFilter(){
			parent::beforeFilter();
			$this->set('banner_lateral',$this->_getBanners('blv_index_1',1,'noticias','all'));/*banner lateral vertical ver*/
			$this->set('bloco_banners_lateral',$this->_getBanners('blv_index_2',4,'noticias','all'));/*banner lateral vertical ver*/
		}
		
		/*
		 * Lista dos eventos do dia
		 * Os eventos estão sendo todos selecionados e isso é um problema, se tiver um milhão de registros a query trará os 1 milhão, é necessário otimizar esse código o mais rápido possível
		 * */
		public function index($url=null){			
			
			
			
			//query com os eventos, caso tenha algum filtro de categoria mostra só os da categoria caso não mostra todos
			if($url != null){				
				$categoryId =  $this->News->Category->find('first',array('conditions'=>array('Category.url'=>$url)));
				$conditions = array('News.categories_id'=>$categoryId['Category']['id']);
				
				$this->set("categoriaNome", $categoryId['Category']['name']);
				$this->set("categoriaID", $categoryId['Category']['id']);
				
			}else{
				$this->set("categoriaNome", "Notícias");
				$this->set("categoriaID", null);
				$conditions = array();
			}
			
			$this->set('newsDestaque1', $this->News->find('first',array('order'=>array('News.id'=>'DESC'),'conditions'=>array($conditions))));
			$this->set('newsDestaque2', $this->News->find('all',array('limit'=>2,'offset'=>1,'order'=>array('News.id'=>'DESC'),'conditions'=>array($conditions))));
			$this->set('news', $this->News->find('all',array('limit'=>200,'offset'=>3,'order'=>array('News.id'=>'DESC'),'conditions'=>array($conditions))));
			//$this->set('news', $this->News->find('all',array('conditions'=>array('News.featured'=>0,$conditions))));
			
			$this->set('maislidas', $this->News->find('all', array('limit' => 5, 'order' => array('News.id' => 'DESC'))));
			$maislidas = $this->News->find('all', array('limit' => 5, 'order' => array('News.id' => 'DESC')));
			
			foreach($maislidas as $key => $lidas){
				$arrayLidas[$key] = $this->myTruncate($lidas['News']['title'], 30);
				//debug($lidas);
			}
			$this->set('arrayLidas', $arrayLidas);	
			
			 
			//banner topo du header 
	    	$this->set('bannerTopo', $this->_getBanners('btopohome', 1 , 'home', 'first')); /*banner topo header 728x90*/
			$bannertopo = $this->_getBanners('btopohome', 1 , 'home', 'first');
			//debug($bannertopo);
			

		}

		 
		 public function myTruncate($string, $limit, $break=".", $pad="...") {
		 	 // return with no change if string is shorter than $limit 
		 	 if(strlen($string) <= $limit){ 
		 	 	//debug ('linha normal');
		 	 	return $string; 
			 } else {
			 	 $sustracao = '';
				 $tamanho_frase = strlen($string);
			 	 $sustracao = $tamanho_frase - $limit;
				 //debug($sustracao);
				 $string = substr($string, 0, $sustracao); 
				 //debug($string);
				 $string = $string.'...';
				 return $string; 
			 } 
			 
			 
			
			
			
		 }
		 
		public function ver($url=null){
			
			
			$news = $this->News->find('first',array('conditions'=>array('News.url'=>$url)));
			$this->set('news',$news );
			
			$this->set('relacionados', $this->News->Category->find('first',array('conditions'=>array('Category.id'=>$news['Category']['id']))));			
			
			$this->set('b_h_interno',$this->_getBanners('b_h_interno',1,'noticias','first'));/*banner lateral diversao ver*/
	
	
	

	
		}			
		
}
	
