<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::import('Vendor', 'gplus/Google_Client');
App::import('Vendor', 'gplus/contrib/Google_Oauth2Service'); 

class AppController extends Controller {
	
	
	
	public $helpers = array('Js' => array('Jquery'),'Html','Video','Session','Form','Data','Caracter','Percent');    
	public $uses = array('Banner', 'LocalBanner');    
	
    public $components = array(
    	'RequestHandler',
        'Session',
        'Message',
        'Twitter',
        'Auth'=>array(
            'loginRedirect'=>array('controller'=>'users', 'action'=>'index'),
            'logoutRedirect'=>array('controller'=>'index', 'action'=>'index'),
            'authError'=>"Você não pode acessar esta página.",
            'authorize'=>array('Controller')
        )
		                        
    );
	
	/*******************************************************************************
   	Metodos usados na autenticação dos usuarios
	******************************************************************************/
    
    public function isAuthorized($user) {
        return true;		
    }	
	public function beforeFilter(){

        date_default_timezone_set("America/Sao_Paulo");
		
		
		
		$this->Auth->allow();	
		
		
		// Cria a url de atutenticação do Gplus
		$this->set('gplus_authurl',$this->_getGoogleAuthUrl());
		// Cria a url de atutenticação do Gplus


		$this->set('getUrl',$this->params->url);		
				
        if (!($csrf_token = $this->Session->read("state"))) {
            $csrf_token = md5(uniqid(rand(), TRUE));
            $this->Session->write("state",$csrf_token); //CSRF protection
        }
		
        $this->set("csrfToken",$csrf_token);
		
		$this->set('facebook_auth_url',$this->_getFacebookAuthUrl('http://'.$_SERVER['HTTP_HOST'].'/', $csrf_token));
		
        
	
		
		$this->loadModel('User');
		$user_logado = $this->Auth->user();
		$user = $this->User->find('first',array('conditions'=>array('User.id'=>$user_logado['id'])));
		if($user)
			$this->set('logged_in', $user['User']);
			
		$this->set('user',  $this->Auth->loggedIn());

		
		/*		 
		 * Configuração de PATH urls
		 * */
		$this->set('base_url', 'http://'.$_SERVER['HTTP_HOST'].'/'); //geral
		$this->set('current_url', 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']); //geral
		//$this->set('_URL', 'http://admin.nocambui.com.br'); //admin
		$this->set('_URL_FILE','http://files.nocambui.com.br/'); //files
		
		/*
		 * Bloco Agenda Geral (Inclui menu e algum bloco como o da home e lateis)
		 * */
		$this->set("schedulesNavs", $this->_getAgenda());
		$this->set("schedulesBoxRight", $this->_getAgendaLateral());
		$this->set("agendaHome", $this->_getAgendaHome());
		$this->set("newsNavs", $this->_getNews());
		//debug($this->_getAgendaHome());
		
		
		//$regiao_geral = $this->request['pass'][0];
		//$this->set('regiao_geral', $regiao_geral);
		/*
		 * Bloco vantagens no menu e na home
		 * */
		
		$this->set("vantagens", $this->_getVantagens());

		
		
		$this->loadModel('Network');
		$this->set("redes", $this->Network->find('all'));
				
		
		/*
		 * Navigation busines
		 * Gastronomia
		 * */
		 
		$this->loadModel('Periodo');
		$this->set("businessNavs", $this->_getEstabeleciomento());
	 	$this->set("specialtys", $this->_getFiltro('specialty','gastronomia'));
		
		//busca_categorias
		$this->set("busca_categorias", $this->_getFiltroBusca('specialty','gastronomia'));
		
		$this->set("open_untils", $this->_getFiltro('open_until','gastronomia'));
		//$this->set("regions", $this->_getFiltro('region','gastronomia'));
		$periodos = $this->Periodo->find('all', array('order'=>array('Periodo.periodo'=>'ASC')));
		//debug($periodos);
		$this->set("periodos", $periodos);
		
		
		$this->set("specialtysD", $this->_getFiltro('specialty','diversao'));
		$this->set("diferenciaisD", $this->_getFiltro('differential','diversao'));
		$this->set("regionsD", $this->_getFiltro('region','diversao'));
		
		
		
		
		
		/*banners do menu principal*/
		
		$this->set('banner_menu_agenda',$this->_getBanners('b_menu',1,'agenda','all'));/*banner lateral vertical ver*/
		$this->set('banner_menu_vantagens',$this->_getBanners('b_menu',1,'vantagens','all'));/*banner lateral vertical ver*/
		$this->set('banner_menu_noticias',$this->_getBanners('b_menu',1,'noticias','all'));/*banner lateral vertical ver*/
		$this->set('banner_menu_servicos',$this->_getBanners('b_menu',1,'servicos','all'));/*banner lateral vertical ver*/
		$this->set('banner_menu_diversao',$this->_getBanners('b_menu',1,'diversao','all'));/*banner lateral vertical ver*/
		$this->set('banner_menu_moda',$this->_getBanners('b_menu',1,'moda-e-estilo','all'));/*banner lateral vertical ver*/
		$this->set('banner_menu_bem',$this->_getBanners('b_menu',1,'bem-estar','all'));/*banner lateral vertical ver*/
		$this->set('banner_menu_educacao',$this->_getBanners('b_menu',1,'educacao','all'));/*banner lateral vertical ver*/
		$this->set('banner_menu_pet',$this->_getBanners('b_menu',1,'pet-e-agro','all'));/*banner lateral vertical ver*/
		$this->set('banner_menu_autos',$this->_getBanners('b_menu',1,'autos','all'));/*banner lateral vertical ver*/
		$this->set('banner_menu_imoveis',$this->_getBanners('b_menu',1,'imoveis','all'));/*banner lateral vertical ver*/
		$this->set('banner_menu_casas',$this->_getBanners('b_menu',1,'casa','all'));/*banner lateral vertical ver*/
		$this->set('banner_menu_gastronomia', $this->_getBanners('b_menu',1,'gastronomia','all'));/*banner lateral vertical ver*/
		
		//debug('nocambui');
		//debug($this->_getBanners('b_menu',1,'agenda','all'));
		
		
		/*
		 * Banner do popup..
		 * 
		 * Referencia b_popup
		 * */
		 
		 $this->set('banner_popup',$this->_getBanners('b_popup',1,'geral','all'));/*banner lateral vertical ver*/
		 $this->set('banner_dhtml',$this->_getBanners('b_dhtml',1,'home','all'));/*banner lateral vertical ver*/
		 
		
		 
	}
	
	
	/*
	 * Menu estabelecimentos
	 * */
	public function _getEstabeleciomento(){
		$this->loadModel('Business');
	
		//menu gastronomia		
		$business['gastronomia'] =  $this->Business->Category->find('all',array('conditions'=>array('Category.menu'=>'gastronomia'),'order'=>array('Category.name'=>'ASC')));
		$business['gastronomia_premium'] =  $this->Business->find('all',array('limit'=>3,'conditions'=>array('Business.gratuito'=>'nao','Business.menu'=>'sim','Business.type'=>'gastronomia'),'order'=>array('Business.modified'=>'DESC')));
		
		//menu diversao		
		$business['diversao'] =  $this->Business->Category->find('all',array('conditions'=>array('Category.menu'=>'diversao'),'order'=>array('Category.name'=>'ASC')));
		$business['diversao_premium'] =  $this->Business->find('all',array('limit'=>4,'conditions'=>array('Business.gratuito'=>'nao','Business.menu'=>'sim','Business.type'=>'diversao'),'order'=>array('Business.modified'=>'DESC')));
		$business['diversao_mais'] = $this->Business->find('all',array('limit'=>5,'conditions'=>array('Business.gratuito'=>'nao','Business.type'=>'diversao','Business.featured'=>0),'order'=>array('Business.id'=>'DESC')));
		
		//menu diversao		
		$business['servicos'] =  $this->Business->Category->find('all',array('conditions'=>array('Category.menu'=>'servicos'),'order'=>array('Category.name'=>'ASC')));
		$business['servicos_premium'] =  $this->Business->find('all',array('limit'=>4,'conditions'=>array('Business.gratuito'=>'nao','Business.menu'=>'sim','Business.type'=>'servicos'),'order'=>array('Business.modified'=>'DESC')));
		$business['servicos_mais'] = $this->Business->find('all',array('limit'=>5,'conditions'=>array('Business.gratuito'=>'nao','Business.type'=>'servicos','Business.featured'=>0),'order'=>array('Business.id'=>'DESC')));
		
		//moda e estilo		
		$business['moda'] =  $this->Business->Category->find('all',array('conditions'=>array('Category.menu'=>'moda-e-estilo'),'order'=>array('Category.name'=>'ASC')));
		$business['moda_premium'] =  $this->Business->find('all',array('Business.gratuito'=>'nao','limit'=>4,'conditions'=>array('Business.menu'=>'sim','Business.type'=>'moda-e-estilo'),'order'=>array('Business.modified'=>'DESC')));
		$business['moda_mais'] = $this->Business->find('all',array('Business.gratuito'=>'nao','limit'=>5,'conditions'=>array('Business.type'=>'moda-e-estilo','Business.featured'=>0),'order'=>array('Business.id'=>'DESC')));

		//Bem estar
		$business['bem'] =  $this->Business->Category->find('all',array('conditions'=>array('Category.menu'=>'bem-estar'),'order'=>array('Category.name'=>'ASC')));
		$business['bem_premium'] =  $this->Business->find('all',array('limit'=>4,'conditions'=>array('Business.gratuito'=>'nao','Business.menu'=>'sim','Business.type'=>'bem-estar'),'order'=>array('Business.modified'=>'DESC')));
		$business['bem_mais'] = $this->Business->find('all',array('limit'=>5,'conditions'=>array('Business.gratuito'=>'nao','Business.type'=>'bem-estar','Business.featured'=>0),'order'=>array('Business.id'=>'DESC')));

		//Educação
		$business['educacao'] =  $this->Business->Category->find('all',array('conditions'=>array('Category.menu'=>'educacao'),'order'=>array('Category.name'=>'ASC')));
		$business['edu_premium'] =  $this->Business->find('all',array('limit'=>4,'conditions'=>array('Business.gratuito'=>'nao','Business.menu'=>'sim','Business.type'=>'educacao'),'order'=>array('Business.modified'=>'DESC')));
		$business['edu_mais'] = $this->Business->find('all',array('limit'=>5,'conditions'=>array('Business.gratuito'=>'nao','Business.type'=>'educacao','Business.featured'=>0),'order'=>array('Business.id'=>'DESC')));

		//Pet e agro
		$business['pet'] =  $this->Business->Category->find('all',array('conditions'=>array('Category.menu'=>'pet-e-agro'),'order'=>array('Category.name'=>'ASC')));
		$business['pet_premium'] =  $this->Business->find('all',array('limit'=>4,'conditions'=>array('Business.gratuito'=>'nao','Business.menu'=>'sim','Business.type'=>'pet-e-agro'),'order'=>array('Business.modified'=>'DESC')));
		$business['pet_mais'] = $this->Business->find('all',array('limit'=>5,'conditions'=>array('Business.gratuito'=>'nao','Business.type'=>'pet-e-agro','Business.featured'=>0),'order'=>array('Business.id'=>'DESC')));

		//Casa e decoração
		$business['casa'] =  $this->Business->Category->find('all',array('conditions'=>array('Category.menu'=>'casa'),'order'=>array('Category.name'=>'ASC')));
		$business['casa_premium'] =  $this->Business->find('all',array('limit'=>4,'conditions'=>array('Business.gratuito'=>'nao','Business.menu'=>'sim','Business.type'=>'casa'),'order'=>array('Business.modified'=>'DESC')));
		$business['casa_mais'] = $this->Business->find('all',array('limit'=>5,'conditions'=>array('Business.gratuito'=>'nao','Business.type'=>'casa','Business.featured'=>0),'order'=>array('Business.id'=>'DESC')));


		//Autos
		$business['autos'] =  $this->Business->Category->find('all',array('conditions'=>array('Category.menu'=>'autos'),'order'=>array('Category.name'=>'ASC')));
		$business['autos_premium'] =  $this->Business->find('all',array('limit'=>4,'conditions'=>array('Business.gratuito'=>'nao','Business.menu'=>'sim','Business.type'=>'autos'),'order'=>array('Business.modified'=>'DESC')));
		$business['autos_mais'] = $this->Business->find('all',array('limit'=>5,'conditions'=>array('Business.gratuito'=>'nao','Business.type'=>'autos','Business.featured'=>0),'order'=>array('Business.id'=>'DESC')));

		//Imóveis
		$business['imoveis'] =  $this->Business->Category->find('all',array('conditions'=>array('Category.menu'=>'imoveis'),'order'=>array('Category.name'=>'ASC')));
		$business['imoveis_premium'] =  $this->Business->find('all',array('limit'=>4,'conditions'=>array('Business.gratuito'=>'nao','Business.menu'=>'sim','Business.type'=>'imoveis'),'order'=>array('Business.modified'=>'DESC')));
		$business['imoveis_mais'] = $this->Business->find('all',array('limit'=>5,'conditions'=>array('Business.gratuito'=>'nao','Business.type'=>'imoveis','Business.featured'=>0),'order'=>array('Business.id'=>'DESC')));



		return $business;
	}	
	
	/*
	 * Menu agenda
	 * */
	public function _getAgenda(){
		$this->loadModel('Schedule');
		$dataHoje = date("Y-m-d");
				
		return $this->Schedule->find('all',array('conditions'=>array('Schedule.date_of_event LIKE'=>'%'.$dataHoje.'%'),'order'=>array('Schedule.date_of_event'=>'ASC')));
	}
	public function _getAgendaHome(){
		
		$this->loadModel('Schedule');
		$dataHoje = date("Y-m-d");
			
	    return $this->Schedule->find('all', array(
	    	'order'=>array(
	    		'Schedule.date_of_event'=>'DESC',
	    	),
			'limit'=> 8 
			));
	
	}

	public function _getAgendaLateral(){
		
		$this->loadModel('Schedule');
		$dataHoje = date("Y-m-d");
			
		
		return $this->Schedule->find('all',array('order'=>array('Schedule.date_of_event'=>'DESC')));
		
		
	}

	/*
	 * Menu vantagens e home quadro vantagens
	 */
	public function _getVantagens(){
		$this->loadModel('Advantage');
		$dataHoje = date("Y-m-d H:i:s");
		$vantagem = $this->Advantage->find('first', array(
			'conditions'=>array(
				'Advantage.status'=>'sim',
				'Advantage.date_start <=' => $dataHoje,
				'Advantage.date_end >=' => $dataHoje),
				'order'=>array('Advantage.modified'=>'DESC')
			)
		);
		return $vantagem;
	}	
	/*
	 * Menu noticias
	 * */
	public function _getNews(){
		$this->loadModel('News');
		
				
		$news['menu'] = $this->News->Category->find('list',array('conditions'=>array('Category.type'=>'news'),'fields'=>array('url','name')));
		$news['destaque'] = $this->News->find('all',array('limit'=>3,'order'=>array('News.id'=>'DESC')));
		$news['secundaria'] = $this->News->find('all',array('limit'=>3,'offset'=>3,'order'=>array('News.id'=>'DESC')));
		
		
		return $news;
		
	}
	/*
	 * 
	 * 
	 * business
	 * gastronomia
	 * */
	public function _getFiltro($name = null, $type=null){
			$filtro = $this->Business->find('list',array('order'=>array('Business.'.$name=>'ASC'),'fields'=>array($name,$name),'conditions'=>array('Business.type'=>$type),'group'=>array('Business.'.$name)));
			return $filtro;
			
		}
	
	/*
	 * business
	 * 
	 * */
	public function _getFiltroBusca($name = null, $cat=null){
			$filtro = $this->Business->Category->find('list',array('order'=>array('Category.name'=>'ASC')));
			//debug($filtro);
			return $filtro;
			
		}
	
	/*
	 * business
	 * gastronomia
	 * */
	public function _getPeriodo(){
			$periodo = $this->Periodo->find('all',array('order'=>array('Periodo.'.$name=>'ASC')));
			return $periodo;
			
		}


	
	/*
	 * Banners
	 * Select banners
	 * @params $ref, $limit, $typeCat, $query = type de query (all, list, count, first...)  
	 */
	public function _getBanners($ref = 'null', $limit = 1, $typeCat = 'geral', $query = 'all'){
	 
		$bannerResult =  $this->Banner->find($query, array(
			'conditions' => array(
				//'local_banner_id' => $typeCat,
				'Banner.categories' => $typeCat,
				'Banner.status' => 'sim',
				'Banner.local' => $ref, 
			),
			'limit' => $limit,
			'order' => 'Banner.ordem ASC'
		));	
		
		//debug($bannerResult);
		return $bannerResult;
			
		/*	
		//$this->loadModel('Banner');
		//$this->loadModel('DimensionBanner');
		return $this->Banner->find($query, array(
			//'contain' => array('LocalBanner'),
			//'fields' => array('Banner.id', 'LocalBanner.id'),
			'conditions' => array(
				//'categories' => $typeCat,
				'local_banner_id' => $typeCat,
				//'Banner.local' => $ref, 
				'Banner.status' => 'sim'
			),
			'limit' => $limit
		));
		 */
		
		
	}


	private function _getGoogleAuthUrl(){
		$google_client_id 		= '721726045870.apps.googleusercontent.com';
		$google_client_secret 	= 'oVRFdFN6hl___Zt8jXtEV5io';
		$google_redirect_url 	= 'http://'.$_SERVER['HTTP_HOST'].'/users/login_social';
		$google_developer_key 	= 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx';		
		
		$gClient = new Google_Client();
		$gClient->setApplicationName('Sodiê Doces');
		$gClient->setClientId($google_client_id);
		$gClient->setClientSecret($google_client_secret);
		$gClient->setRedirectUri($google_redirect_url);
		$gClient->setDeveloperKey($google_developer_key);
		
		$google_oauthV2 = new Google_Oauth2Service($gClient);
		
		return $gClient->createAuthUrl();
	}


	private function _getFacebookAuthUrl($base_url,$csrf_token){
		$settings = array(
		   "app_id" => "712966252050416",
		   "app_secret" => "06732e6ff33a2038b8c032309c5f3232",
		   "url" => 'http://'.$_SERVER['HTTP_HOST'].'/users/login_social'
		);
		
		$facebook_auth_url = "http://www.facebook.com/dialog/oauth?"
		."client_id=712966252050416"
		."&redirect_uri=http://".$_SERVER['HTTP_HOST']."/users/login_social"
		."&state=".$csrf_token
		."&scope=email,user_birthday";
		
		return $facebook_auth_url;
	}
	
}
