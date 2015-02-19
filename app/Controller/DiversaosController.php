<?php
	class DiversaosController extends AppController{
		public $name = 'Diversaos';
		
		public function index(){
			
			//banner topo du header 
	    	$this->set('bannerTopo', $this->_getBanners('btopohome', 1 , 'home', 'first')); /*banner topo header 728x90*/
			$bannertopo = $this->_getBanners('btopohome', 1 , 'home', 'first');
			//debug($bannertopo);
			
			
		}
		public function ver(){
		}				
		
}
	
