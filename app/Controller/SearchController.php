<?php
	class SearchController extends AppController{
		public $name = 'Search';
		
		public function index(){
			$this->loadModel('Regions');
		//	debug($_GET['regiao']); //para poder trabalhar com as regioes
		//so precisa mandar uma variavel de regiao para o search com o nome_sistema da regiao
			if(isset($_GET['por'])){
				$termo = $_GET['por'];				
				$this->set('termo',$termo);
								
				$this->set('schedules',$this->_getSchedule($termo));
				//$this->set('advantages',$this->_getPosts($termo));
				$this->set('news',$this->_getNewsSearch($termo));
				
				$this->set('businesses',$this->_getBusinessHome($termo));	
				
				$palavra = explode(' ',$termo);
				$this->set('palavras', $palavra);
				
				$this->set('banner_lateral',$this->_getBanners('bl_sea',1));/*banner lateral vantagens ver*/
				$this->set('bloco_banners_lateral',$this->_getBanners('bbl_sea',10));/*bloco banners lateral vantagens ver*/
								
			}						
		}
		
		
		public function news_interno(){
			if(isset($_GET['por'])){
				$termo = $_GET['por'];		
				$cat = $_GET['cat'];				
				$this->set('termo',$termo);
				$this->set('cat',$cat);
								



				$this->loadModel('News');
				
				if(!empty($cat)){
					$this->set('news',$this->News->find('all', array('conditions'=>array('AND' => array(
				        array(
				            'OR' => array(
				                array('News.categories_id' => $cat)
				            )
				        )
				    ),'OR'=>array(array('News.title LIKE'=>'%'.$termo.'%'),array('News.palavra_chave LIKE'=>'%'.$termo.'%'))),'order'=>'News.id DESC' )));
				
				}else{
					$this->set('news',$this->News->find('all', array('conditions'=>array('OR'=>array(array('News.title LIKE'=>'%'.$termo.'%'),array('News.palavra_chave LIKE'=>'%'.$termo.'%'))),'order'=>'News.id DESC' )));
				}
				
				
				

				
				$palavra = explode(' ',$termo);
				$this->set('palavras', $palavra);
				
				$this->set('banner_lateral',$this->_getBanners('bl_sea',1));/*banner lateral vantagens ver*/
				$this->set('bloco_banners_lateral',$this->_getBanners('bbl_sea',10));/*bloco banners lateral vantagens ver*/
								
			}				
		}
		
		private function _getBusinessHome($termo = null){
			$this->loadModel('Business');
			return $this->Business->find('all', array('conditions'=>array('OR'=>array(array('Business.name LIKE'=>'%'.$termo.'%'),array('Business.palavra_chave LIKE'=>'%'.$termo.'%'))), 'order'=>array('Business.gratuito'=>'ASC','RAND()') ));
		}

		private function _getNewsSearch($termo = null){
			$this->loadModel('News');
			return $this->News->find('all', array('conditions'=>array('OR'=>array(array('News.title LIKE'=>'%'.$termo.'%'),array('News.palavra_chave LIKE'=>'%'.$termo.'%'))),'order'=>'News.id DESC' ));
		}
				
		private function _getSchedule($termo = null){
			$this->loadModel('Schedule');
			return $this->Schedule->find('all', array('conditions'=>array('OR'=>array(array('Schedule.title LIKE'=>'%'.$termo.'%'),array('Schedule.palavra_chave LIKE'=>'%'.$termo.'%'))), 'order'=>'Schedule.id DESC' ));
		}
		
}
	
