<?php
	class BusinessesController extends AppController{
		public $name = 'Businesses';
		
		public function beforeFilter(){
			parent::beforeFilter();
			$this->Auth->allow('*');
			
		}
		
		public function index(){
			
			//banner topo du header 
	    	$this->set('bannerTopo', $this->_getBanners('btopohome', 1 , 'home', 'first')); /*banner topo header 728x90*/
			$bannertopo = $this->_getBanners('btopohome', 1 , 'home', 'first');
			//debug($bannertopo);
			
			
			
		}
		
		
		public function mapa(){
			$this->layout = 'ajax';
		}
		
		
/*
 * ver
 */
	public function ver($url = null){
		
		//banner topo du header 
		$this->set('bannerTopo', $this->_getBanners('btopohome', 1 , 'home', 'first')); /*banner topo header 728x90*/
		$bannertopo = $this->_getBanners('btopohome', 1 , 'home', 'first');
		//debug($bannertopo);
		
		
		
		$businesses = $this->Business->find('first', array('conditions' => array('Business.url' => $url)));
		//debug($businesses);
		
		// INICIO CONTABILIZA VISUALIZAÇÕES
		$this->loadModel("View_businesse");
		
		$ip = $_SERVER['REMOTE_ADDR'];
		
		$getIp = $this->View_businesse->find("first",array("conditions"=>array("ip"=>$ip,"View_businesse.businesses_id"=>$businesses['Business']['id']),"order"=>array("View_businesse.id"=>"desc")));
		
		
		if(isset($getIp['View_businesse']['id'])){
			$dataAgora = strtotime(date("Y-m-d H:i:s"));
			$dataView = strtotime($getIp['View_businesse']['created']);
			
			
			if((($dataAgora - $dataView) / 3600) >= 1 ){
				
				//conta a visualização
				$this->Business->updateAll(
					array('Business.view'=> 'Business.view + 1'),
					array('Business.id'=>$businesses['Business']['id'])
				);
				
				//salva na tabela view_bisnesses
				$this->View_businesse->save(array("View_businesse"=>array("ip"=>$ip, "businesses_id"=>$businesses['Business']['id'])));
			}
		}else{
			
			//conta a visualização
			$this->Business->updateAll(
				array('Business.view'=> 'Business.view + 1'),
				array('Business.id'=>$businesses['Business']['id'])
				
			);
			$this->View_businesse->save(array("View_businesse"=>array("ip"=>$ip, "businesses_id"=>$businesses['Business']['id'])));
		}
		
		
		$this->set('business', $businesses);
		$this->set('relacionados', $this->Business->Category->find('first',array('conditions'=>array('Category.id'=>$businesses['Category']['id']))));
		
		
		$this->set('maislidas', $this->Business->find('all',array('limit'=>5,'conditions'=>array('Business.type'=>$businesses['Business']['type']),'order'=>array('Business.view'=>'DESC'))));
		
	
					
	
		
		
		$nestaarea = $this->Business->find('all',array('conditions'=>array('Business.region'=>$businesses['Business']['region'],'Business.type'=>$businesses['Business']['type'])));
	
		
		$this->set('mesmasareas',$nestaarea);
		
		
		if($this->data){
			$this->loadModel('Review');
			
			if($this->Review->save($this->data)){
				$this->Session->setFlash($this->Message->success('Obrigado por avaliar! Sua contribuição é muito importante.'));
				$this->redirect('/estabelecimentos/ver/'.$url.'#avaliacoes');
			}else{
				$this->Session->setFlash($this->Message->error('Hove um erro inesperado, por favor tente novamente.'));
				$this->redirect('/estabelecimentos/ver/'.$url.'#avaliacoes');					
			}
		}
		
		$this->avaliacoes($businesses['Business']['id']);
		
		
	
		
		/*
		 * Banner internos comercio
		 */
		//debug($businesses['Business']['type']); //gastronomia
		$this->set('b_h_interno', $this->_getBanners('b_h_interno', 1, $businesses['Business']['type'], 'first'));/*banner lateral diversao ver*/					
		//debug($this->_getBanners('b_h_interno', 1, $businesses['Business']['type'], 'first'));
		
		$this->set('banner_lateral', $this->_getBanners('blv_index_1',1,$businesses['Business']['type'],'all'));/*banner lateral vertical ver*/
		//debug($this->_getBanners('blv_index_1',1,$businesses['Business']['type'],'all'));
		
		$this->set('bloco_banners_lateral', $this->_getBanners('blv_index_2',4,$businesses['Business']['type'],'all'));/*banner lateral vertical ver*/
		//debug($this->_getBanners('blv_index_2',4,$businesses['Business']['type'],'all'));
		
		
	}	

		
		
		
		
		public function avaliacoes($id=null){
			$this->loadModel('Review');
	
			$avaliacoes = $this->Review->find('all',array('conditions'=>array('businesses_id'=>$id,'status'=>'desbloqueado')));
			
				$atendimento 	=  0;
				$servico 		=  0;
				$ambiente	 	=  0;
				$chave		 	=  0;
			foreach($avaliacoes as $key => $avaliacao){
				
				$atendimento 	+=  $avaliacao['Review']['atendimento'];
				$servico 		+=  $avaliacao['Review']['servico'];
				$ambiente	 	+=  $avaliacao['Review']['ambiente'];
				
				$chave = $key;
			}
			$atendimento =  round($atendimento/($chave+1));
			$servico =  round($servico/($chave+1));
			$ambiente =  round($ambiente/($chave+1));
			
			
			
			$this->set('atendimento',$atendimento);
			$this->set('servico',$servico);
			$this->set('ambiente',$ambiente);
			
			$this->set('avaliacoes',$avaliacoes);
			
		}
		
		/*
		 * Gastronomia
		 * */
		public function gastronomia($url=null){
			
			debug('entrou na gastronomia funcion');
			
						//query com os eventos, caso tenha algum filtro de categoria mostra só os da categoria caso não mostra todos
			if($url != null){				
				$categoryId =  $this->Business->Category->find('first',array('conditions'=>array('Category.url'=>$url)));
				$conditions = array('Business.categories_id'=>$categoryId['Category']['id']);
				$this->set("categoriaGeral", $categoryId);
			}else{
				$conditions =array('Business.type'=>'gastronomia');
				$this->set("categoriaGeral", array('Category'=>array('name'=>'Diversão','id'=>null)));
			}
			
			$this->set('gastronomiaDestaque1', $this->Business->find('first',array('conditions'=>array('Business.gratuito'=>'nao','Business.featured'=>1,$conditions))));
			$this->set('gastronomiaDestaque2', $this->Business->find('all',array('order'=>array('Business.modified'=>'DESC'),'limit'=>2,'conditions'=>array('Business.gratuito'=>'nao','Business.featured'=>2,$conditions))));
			
			//listagem dos cadastros não gratuitos
			$this->set('gastronomias', $this->Business->find('all',array('conditions'=>array($conditions),'order'=>array('Business.gratuito'=>'ASC','RAND()'))));
			
			//listagem dos cadastros não gratuitos
			//$this->set('gastronomiasG', $this->Business->find('all',array('conditions'=>array('Business.gratuito'=>'sim',$conditions),'order'=>array('Business.name'=>'ASC'))));
			
			$this->set('maislidas', $this->Business->find('all',array('limit'=>5,'conditions'=>array('Business.type'=>'gastronomia'),'order'=>array('Business.view'=>'DESC'))));
			

			$this->set('banner_lateral',$this->_getBanners('blv_index_1',1,'gastronomia','all'));/*banner lateral vertical ver*/
			$this->set('bloco_banners_lateral',$this->_getBanners('blv_index_2',4,'gastronomia','all'));/*banner lateral vertical ver*/
			
			
			//banner topo du header 
	    	$this->set('bannerTopo', $this->_getBanners('btopohome', 1 , 'home', 'first')); /*banner topo header 728x90*/
			$bannertopo = $this->_getBanners('btopohome', 1 , 'home', 'first');
			//debug($bannertopo);
			$url = 'gastronomia';
			$businesses = $this->Business->find('first', array('conditions' => array('Business.url' => $url)));
			//debug($businesses);
			//banner b_h_interno é o primeiro banner da lista das gastronomias
			$this->set('b_h_interno', $this->_getBanners('b_h_interno', 1, 'gastronomia', 'first'));
			
			//banner b_h_interno é o primeiro banner da lista das gastronomias
			$this->set('b_h_interno', $this->_getBanners('b_h_interno', 1, 'gastronomia', 'first'));
		}	

		/**
		 * Funcao que permite fazer a pesquisa dos resultados da categoria escolhida nos selects de
		 * pesquisa de estabelecimentos à esqueda da pag. da home
		 * 
		 */
		 
		public function estabelecimentoFiltro($regiao = null, $letra = null, $type = null, $idCategoria=null){
			$this->layout = 'ajax';
			/*debug('<br/>');
			debug('<br/>');
			debug('<br/>');
			debug('<br/>');
			debug('<br/>');
			debug('id_categoria :' .$idCategoria);
			debug('tipo : '. $type);
			debug('letra : '. $letra);
			debug('regiao : '. $regiao);
			*/
			if($idCategoria != 0){
				$conditions = array('Business.categories_id'=>$idCategoria);
			}else{
				$conditions = array();
			}
				
				
				
				 
				//debug('especialidade : '.@$_GET['especialidade']);	
				
				$this->loadModel('Regions');
				$this->loadModel('Category');
				
				$categoria_id = $this->Category->find('first', array(
					//'fields'=>array('Regions.id'),
					'conditions'=> array('Category.name'=>$_GET['especialidade'])
				));
				//debug($categoria_id['Category']['id']);
				
				$regiao_infos = $this->Regions->find('first', array(
					//'fields'=>array('Regions.id'),
					'conditions'=> array('Regions.nome_sistema'=>$regiao)
				));
					//debug($regiao_infos['Regions']['id']);
				$estabelecimentos = $this->Business->find('all', array('conditions'=>
					array(
					//	'Business.specialty LIKE'=>'%'.@$_GET['especialidade'].'%',
						'Business.regions_id'=>$regiao_infos['Regions']['id'],
						'Business.categories_id'=>$categoria_id['Category']['id']
						//'Business.specialty LIKE'=>'%'.@$_GET['especialidade'].'%',
						//'Business.open_until LIKE'=>'%'.@$_GET['tipo'].'%',
						//'Business.region LIKE'=>'%'.@$_GET['periodo'].'%',
						//$conditions,
						//'Business.type'=>$type,
						
						),
						'order'=>array('Business.name'=>'ASC')));
						//'order'=>array('Business.gratuito'=>'ASC','RAND()')));
					$this->set('estabelecimentos', $estabelecimentos);
					$this->set("filtrandoPor", @$_GET['especialidade']." | ".@$_GET['tipo']." | ".@$_GET['periodo']);
					
			/*if($letra=='null' && $type=='gastronomia'){
									
				$estabelecimentos = $this->Business->find('all',array('conditions'=>
					array(
						'Business.specialty LIKE'=>'%'.@$_GET['especialidade'].'%',
						//'Business.specialty LIKE'=>'%'.@$_GET['especialidade'].'%',
						//'Business.open_until LIKE'=>'%'.@$_GET['aberto_ate'].'%',
						//'Business.region LIKE'=>'%'.@$_GET['regiao'].'%',
						$conditions,
						'Business.type'=>$type,
						
						),'order'=>array('Business.gratuito'=>'ASC','RAND()')));
					$this->set('estabelecimentos', $estabelecimentos);
					$this->set("filtrandoPor", @$_GET['especialidade']." | ".@$_GET['aberto_ate']." | ".@$_GET['regiao']);
					
					
					
					
					
			}elseif($letra=='null' && $type=='diversao'){
							
				$estabelecimentos = $this->Business->find('all',array('conditions'=>
					array(
						'Business.specialty LIKE'=>'%'.@$_GET['especialidade'].'%',
						'Business.differential LIKE'=>'%'.@$_GET['diferencial'].'%',
						'Business.region LIKE'=>'%'.@$_GET['regiao'].'%',
						$conditions,
						'Business.type'=>$type,
						
						),'order'=>array('Business.gratuito'=>'ASC','RAND()')));
					$this->set('estabelecimentos', $estabelecimentos);
					$this->set("filtrandoPor", @$_GET['especialidade']." | ".@$_GET['aberto_ate']." | ".@$_GET['regiao']);
					
					
					
					
					
			}else{
				
				$estabelecimentos = $this->Business->find('all',array('conditions'=>array('Business.type'=>$type,$conditions, 'Business.name LIKE'=>$letra.'%'),'order'=>array('Business.gratuito'=>'ASC','RAND()')));
				$this->set('estabelecimentos', $estabelecimentos);	
			}
			*/
			
			
			if(count($estabelecimentos) == 0){
				
				echo '<div class="resultado_busca_negativo" style="font-size:1.5em;"><br />
				<br />Não encontramos nenhum estabelecimento com esse filtro na região de : <br />'
				.$regiao_infos['Regions']['nome_regiao'].
				'</div>';
				
				$this->autoRender = false;
			}
			
			
			
		}	

				
					
		

/*
 * Quando uma categoria ligada à um estabelecimento é escolhida, como diversao
 * .../estabelecimentos/*
 * @params type, url
 * 
 */
	 
	public function estabelecimentos($type=null, $url=null){
		
		//query com os eventos, caso tenha algum filtro de categoria mostra só os da categoria caso não mostra todos
		debug($url);
		if($url != null){
			debug('$url != null');				
			$categoryId =  $this->Business->Category->find('first',array('conditions'=>array('Category.url'=>$url)));
			$conditions = array('Business.categories_id'=>$categoryId['Category']['id']);
			$this->set("categoriaGeral", $categoryId);
		}else{
			debug('$url == null');
			$conditions =array('Business.type'=>$type);
			$this->set("categoriaGeral", array('Category'=>array('name'=>'Bem Estar','id'=>null)));
		}
		
		$this->set('estabelecimentoDestaque1', $this->Business->find('first',array('conditions'=>array('Business.gratuito'=>'nao','Business.featured'=>1,$conditions))));
		$this->set('estabelecimentoDestaque2', $this->Business->find('all',array('order'=>array('Business.modified'=>'DESC'),'limit'=>2,'conditions'=>array('Business.gratuito'=>'nao','Business.featured'=>2,$conditions))));
		$this->set('estabelecimentos', $this->Business->find('all',array('conditions'=>array($conditions),'order'=>array('Business.gratuito'=>'ASC','RAND()'))));
		
		$this->set('maislidas', $this->Business->find('all',array('limit'=>5,'conditions'=>array('Business.type'=>$type),'order'=>array('Business.view'=>'DESC'))));
		
		$this->set('classMae',$type);
		
		//banner topo du header 
		$this->set('bannerTopo', $this->_getBanners('btopohome', 1 , 'home', 'first')); /*banner topo header 728x90*/
		$bannertopo = $this->_getBanners('btopohome', 1 , 'home', 'first');
		//debug($bannertopo);
		
		if($type == 'diversao'){
			
			$this->set('banner_lateral',$this->_getBanners('bl_div',1)); /*banner lateral diversao ver*/
			$this->set('bloco_banners_lateral',$this->_getBanners('bbl_div',10)); /*bloco banners lateral diversao ver*/
			$this->render('diversao');
		}
		
		
		/*banners do menu principal*/
		$this->set('banner_lateral',$this->_getBanners('blv_index_1',1,$type,'all'));/*banner lateral vertical ver*/
		$this->set('bloco_banners_lateral',$this->_getBanners('blv_index_2',4,$type,'all'));/*banner lateral vertical ver*/
	
		
		
		
	}			
}
	
