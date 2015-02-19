<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
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
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

	/*
	 * 
	 * Rotas da AGENDA
	 * */
   	Router::connect(
		'/agenda/ver/*', 
		array('controller' => 'Schedules', 'action' => 'ver')
	);	
   	Router::connect(
		'/agenda/*', 
		array('controller' => 'Schedules', 'action' => 'index')
	);			


	/*
	 * 
	 * Rotas  do controller noticias
	 * 
	 * */
   	Router::connect(
		'/noticias/ver/*', 
		array('controller' => 'News', 'action' => 'ver')
	);	
   	Router::connect(
		'/noticias/*', 
		array('controller' => 'News', 'action' => 'index')
	);			

	/*
	 * 
	 * Rotas  do controller estabelecimentos
	 * 
	 */
	Router::connect(
		'/estabelecimentos/filtro/*', 
		array('controller' => 'Businesses', 'action' => 'estabelecimentoFiltro')
	);
   	Router::connect(
		'/estabelecimentos/gastronomia/*', 
		array('controller' => 'Businesses', 'action' => 'gastronomia')
	);
	
	//estabelecimentos/ver
	Router::connect(
		'/estabelecimentos/ver/*', 
		array('controller' => 'Businesses', 'action' => 'ver')
	);	
		
	//estabelecimentos/* 
   	Router::connect(
		'/estabelecimentos/*', 
		array('controller' => 'Businesses', 'action' => 'estabelecimentos')
	);	

	Router::connect(
		'/vantagens/cupom/*', 
		array('controller' => 'Advantages', 'action' => 'cupom')
	);	
	Router::connect(
		'/vantagens/painel', 
		array('controller' => 'Advantages', 'action' => 'painel')
	);		
	Router::connect(
		'/vantagens/*', 
		array('controller' => 'Advantages', 'action' => 'ver')
	);	
	
	Router::connect(
		'/galeria/favoritar/*', 
		array('controller' => 'Galleries', 'action' => 'favoritar')
	);	
	Router::connect(
		'/galeria/ver/*', 
		array('controller' => 'Galleries', 'action' => 'ver')
	);			
	Router::connect(
		'/galerias/*', 
		array('controller' => 'Galleries', 'action' => 'index')
	);	


   		

	Router::connect('/users/login_social/*', array('controller' => 'Users', 'action' => 'login_social'));



    /*
	 * users conta
	 * */
	Router::connect('/Users/*', array('controller' => 'Users', 'action' => 'index'));


	Router::connect(
		'/convites/*', 
		array('controller' => 'Users', 'action' => 'convites')
	);	


	Router::connect(
		'/contato/*', 
		array('controller' => 'Atendimento', 'action' => 'contato')
	);	

	Router::connect(
		'/anuncie/*', 
		array('controller' => 'Atendimento', 'action' => 'anuncie')
	);		
		
	Router::connect(
		'/institucional/*', 
		array('controller' => 'Atendimento', 'action' => 'institucional')
	);		
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	//ancien sans menu de regioes : Router::connect('/', array('controller' => 'index', 'action' => 'index'));
	Router::connect('/', array('controller' => 'index', 'action' => 'escolha_regioes'));
	
/**
 * ...and connect the rest of 'Pages' controller's urls.
 */
  	
	Router::connect('/index/*', array('controller' => 'index', 'action' => 'index'));


//index/regiao
	Router::connect(
		'/regiao/*', 
		array('controller' => 'index', 'action' => 'index')
	);
	
	
/**
 * Load all plugin routes.  See the CakePlugin documentation 
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
