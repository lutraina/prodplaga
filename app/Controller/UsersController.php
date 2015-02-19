<?php
	/**
	 * Controller responsavel pelos usuarios do sistema
	 *
	 * @package       app.Controller.UsersController
	 * @version       2.0
	 * @author		 Alisson Barbosa Ferreira <alissonbf@hotmail.com>
	 */
	class UsersController extends  AppController{
		public $name = "Users";
		public $components = array('Upload','Caracter');
		
		/**
		 * Metodo onde são colocadas configurações para os components
		 */
		 
		public function beforeFilter(){
			parent::beforeFilter();
			
			$this->Auth->authenticate = array(
		        AuthComponent::ALL => array('userModel' => 'User'),
		        'Facebook',
		        'Twitter',
                'Gplus',
		        'Form',    			
		    );
			$this->Auth->allow('login','login_social','add');			
			$this->set('activeCliente', 'current');							
			$this->set('editar',false);
			$this->Auth->deny('index');
			$this->Auth->deny('conta');
			$this->Auth->deny('convites');
			$this->Auth->deny('preferencias');
			$this->Auth->deny('painel');
			$this->Auth->deny('cupons');
			
			
			/*
			 * Interesses (na newsletter)
			 * */
			$this->loadModel('Interesse');
			
			$this->loadModel('User_has_interesse');
	
			$user = $this->Auth->user();		
			$this->set('interesses_user', $this->User_has_interesse->find('all',array('conditions'=>array('User_has_interesse.users_id'=>$user['id']))));
		}
		
		
		public function convites(){

			$this->autoRender = false;
			
			/*
			 * email de recuperação de senha
			 * cod
			 * id usuario
			 * status
			 * */
			 $user = $this->Auth->user();
			 if($this->request->data){
			 	$this->loadModel('Convite'); 
				$cod = md5(date('d-m-Y H:i:s').rand(0, 20));
				
					/*
					 * mensagem do email
					 * */
					$mensagem = '<html><body style="background:#F1F1F1; color:#393838;padding:20px;">';		
					$mensagem .= '<center><img src="http://files.nocambui.com.br/logo.png" /></center><br />';				
				   	$mensagem .= '<h1 style="font-size:18px">O seu amigo '.$user['name'].' convida você para se cadastrar em nosso site!</h1>';
				    $mensagem .= 'Acesse agora <a href="http://nocambui.com.br/" style="color:#B36900">www.nocambui.com.br</a> e complete seu cadastro. <br /><br /><br />';
	               	$mensagem .= 'Os usuários cadastrados em nosso site disfrutam de recursos exclusivos apenas pra usuários cadastrados.';
					$mensagem .= '<h1 style="font-size:14px;"><a style="color:#B36900" href="http://nocambui.com.br/users/add_invite/'.$cod.'/'.$user['id'].'">CLIQUE AQUI PARA COMPLETAR SEU CADASATRO  </a></h1>';
	               	$mensagem .= "</body></html>";
				
				
				/*
				 * salva a mensagem e o id do usuario
				 * */
				$this->request->data['Convite']['texto']=$mensagem;	
				$this->request->data['Convite']['users_id']=$user['id'];
				$this->request->data['Convite']['aceito']='Aguardando...';
				$this->request->data['Convite']['cod']=$cod;
				
				
					 				
				if($this->Convite->save($this->data)){

	               	$to = $this->request->data['Convite']['email'];
	
					$subject = 'Convite - NOCAMBUÍ';
					
					$headers = "From: contato@nocambui.com.br \r\n";
					$headers .= "Reply-To: contato@nocambui.com.br \r\n";
					
					//$headers .= "CC: susan@example.com\r\n";
					$headers .= "MIME-Version: 1.0\r\n";
					$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	               
				                   
	               
	               if(mail($to, $subject, $mensagem, $headers)){
	            	   		$this->Session->setFlash($this->Message->success('O convite foi enviado com sucesso!'));
							$this->redirect('/users'); 
				   } else {
				   		$this->Session->setFlash($this->Message->error('Não foi possível enviar seu convite.'));
						$this->redirect('/users');
				   }								
				}		
			}	
		}
		

		public function esqueceu(){
			
			if($this->request->data){
				$username = $this->User->find('first',array(
						'conditions' => array('User.username' =>$this->request->data['User']['username']),
					));
					
			
					if(count($username) >=1){
						
						$this->loadModel('Rec_password'); 
						
						/*
						 * email de recuperação de senha
						 * cod
						 * id usuario
						 * status
						 * */
						 $cod = md5(date('d-m-Y H:i:s').$username['User']['id']);
						 $id = $username['User']['id'];

						$data = array('Rec_password'=>array('cod'=>$cod,'status'=>'valido','users_id'=>$username['User']['id']));
						if($this->Rec_password->save($data)){
								
							$mensagem = '<html><body style="background:#F1F1F1; color:#393838;padding:20px;">';						
							$mensagem .= '<center><img src="http://files.nocambui.com.br/logo.png" /></center><br />';	
						   	$mensagem .= '<h1 style="font-size:18px">Você solicitou uma redefinição de senha no site NO-CAMBUÍ</h1>';
						    $mensagem .= 'Caso não tenha solicitado, favor desconsiderar essa mensagem. <br /><br /><br />';
		                   	$mensagem .= 'Para manter a solicitação basta clicar no link abaixo e seguir corretamente as instruções';
							$mensagem .= '<h1 style="font-size:14px"><a style="color:#B36900" href="http://nocambui.com.br/users/rec_password/'.$cod.'/'.$id.'">CLIQUE AQUI PARA REDEFINIR SUA SENHA  </a></h1>';
		                   	$mensagem .= "</body></html>";
		                   
		                   	$to = $username['User']['username'];
		
							$subject = 'Redefinição de senha - NOCAMBUÍ';
							
							$headers = "From: contato@nocambui.com.br \r\n";
							$headers .= "Reply-To: contato@nocambui.com.br \r\n";
							//$headers .= "CC: susan@example.com\r\n";
							$headers .= "MIME-Version: 1.0\r\n";
							$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		                   
						                   
		                   
		                   if(mail($to, $subject, $mensagem, $headers)){
		                	   		$this->Session->setFlash($this->Message->success('Enviamos instruções de como redefinir sua senha para o seu email.'));
									$this->redirect('/users/esqueceu'); 
						   } else {
						   		$this->Session->setFlash($this->Message->error('E servidor se comportou de maneira inesperada, por favor tente novamente.'));
								$this->redirect('/users/esqueceu');
						   }								
						}

					}else{
						$this->Session->setFlash($this->Message->error('Este usuáio(email) não está registrado em nosso site'));
						$this->redirect('/users/esqueceu');
					}				
			}

		}
		
			
		
		public function rec_password($cod=null, $id=null){
				$this->loadModel('Rec_password'); 
				$user = $this->Rec_password->find('first',array(
						'conditions' => array('Rec_password.users_id' =>$id,'Rec_password.cod'=>$cod,'Rec_password.status'=>'valido')
					));			
			
			if(count($user) >= 1){
				if($this->request->data){
					$this->User->set($this->request->data);
					if($this->User->validates()){						
						$this->request->data['User']['id'] =$id;
						if($this->User->save($this->request->data)){						
							$data = array('Rec_password'=>array('status'=>'usado','id'=>$user['Rec_password']['id']));
							if($this->Rec_password->save($data)){
								$this->Session->setFlash($this->Message->success('Senha alterada com sucesso!'));
								$this->redirect('/users');
							}else{
								$this->Session->setFlash($this->Message->error('Não foi possivel aterar sua senha'));
								$this->redirect('/users/rec_password/'.$cod.'/'.$id);
							}
						}
					}else{
						$this->Session->setFlash($this->Message->error('As senhas digitadas não conferem!'));
						$this->redirect('/users/rec_password/'.$cod.'/'.$id);
					}
				}					
			}else{
				$this->Session->setFlash($this->Message->error('Seu pedido de redefinição de senha não é válido.'));
				$this->redirect('/users/esqueceu');
			}
			
					
		}

		public function index(){			
			$user = $this->Auth->user();
			$current_user = $this->User->read(null,$user['id']);			
			$this->set('user',$current_user);		
			
			$this->loadModel('User_has_interesse');
				
			
			
			
				
		}

		
		/**
		 * Este metodo faz o usuario "logar" no painel de controle
		 */
		public function login(){						
			if ($this->request->is('post')) {
				if($this->Auth->login()){
					$user = $this->Auth->user();					
					$this->redirect($this->Auth->redirect());					
				}else{
					$this->Session->setFlash($this->Message->error('Usuário e senha inválidos'));
				}
			}
			 
		}		

		
		/**
		 * Este metodo faz o login via redes sociais
		 */
		public function login_social() {
			$this->autoRender = FALSE;
		    if ($this->request->is('post') || $this->request->is('get')) {
		
		        // facebook requests a csrf protection token
		        if (!($csrf_token = $this->Session->read("state"))) {
		            $csrf_token = md5(uniqid(rand(), TRUE));
		            $this->Session->write("state",$csrf_token); //CSRF protection
		        }
		        $this->set("csrfToken",$csrf_token);
		
		        // login        
		        if ($this->Auth->login()) {
		        	//$user = $this->Auth->user();
					//$this->_criarPedido($user['id']);
		            return $this->redirect($this->Auth->redirect());
		        } else {
		            $this->Session->setFlash(__('Your login failed'), 'default', array(), 'auth');
		        }
		    }
		}

		/**
		 * Este metodo faz o usuario sair do painel de controle
		 */
		public function logout(){
			/*
			if($_SESSION['Pedido']['status'] == 0){		
				$this->Pedido->delete($_SESSION['Pedido']['id'],true);	
				$this->PedidosHasProdutos->deleteAll(array('PedidosHasProdutos.pedidos_id' => $_SESSION['Pedido']['id']), false);
			}
			unset($_SESSION['Pedido']);
			 */ 
			$this->redirect($this->Auth->logout());
		}
		
		
		public function add_invite($cod=null){
			$this->set('interesses', $this->Interesse->find('all'));
			
			$this->loadModel('Convite');
			$user_invite = $this->Convite->find('first',array('conditions'=>array('cod'=>$cod)));
			
			$this->set('username',$user_invite['Convite']['email']) ;
			
			$this->User->set($this->request->data);
			if($this->User->validates()){
				if($this->request->is('post')){
				/*
				 *  Verifica se existe imagem
				 * Se existir faz o upload
				 * */
				if(!empty($this->request->data['User']['image']['name'])){
					$file = $this->Upload->getFile(array(
						'type'=>'fotos',
						'path'=>'users/fotos/',
						'file'=> $this->request->data['User']['image'],					
						'size'=>array('228x228'=>array(228,228)))
					);
					$this->request->data['User']['image'] = $file;
				}else{
					$this->request->data['User']['image'] = NULL;
				}	
					
					if(isset($this->request->data['User']['img'])){					
						$corte = array(
								0=>array('referencia'=>'A','width'=>100,'height'=>100), // imagem aberta								
						);											
						$array = $this->Upload->getFile($this->request->data['User']['img'],null,$corte);						
						$this->request->data['User']['img'] = $array['name'];										
					} else {
						$this->request->data['User']['img'] = '';
					}
					
					$username = $this->User->find('count',array(
						'conditions' => array('User.username' =>$this->request->data['User']['username']),
					));
					if($username>=1){
						$this->Session->setFlash($this->Message->error('Usuário já existe'));
						$this->redirect('/users/add');
					} else {														
						//if($this->User->save($this->request->data)){
						if($this->User->saveAll($this->request->data)){
							$this->Convite->save(array('Convite'=>array('aceito'=>'Aceitou!','id'=>$user_invite['Convite']['id'])));			
						}	

						$idUser = $this->User->id; 
						$this->loadModel('UserHasInteresse');
						foreach($this->request->data['User']['interesse'] as $key => $interesse){
							$this->UserHasInteresse->saveMany(array('UserHasInteresse'=>array('users_id'=>$idUser,'interesses_id'=>$interesse)));
						}	
						
						
						
						$this->redirect('/users/login');
					}
				}
			}
			//$this->redirect('/users/login');			
		}		
		
		/**
		 * Este metodo adiciona um novo usuario 
		 */
		public function add(){	
			$this->set('interesses', $this->Interesse->find('all'));
			
			
			$this->User->set($this->request->data);
			if($this->User->validates()){
				if($this->request->is('post')){
				/*
				 *  Verifica se existe imagem
				 * Se existir faz o upload
				 * */
				if(!empty($this->request->data['User']['image']['name'])){
					$file = $this->Upload->getFile(array(
						'type'=>'fotos',
						'path'=>'users/fotos/',
						'file'=> $this->request->data['User']['image'],					
						'size'=>array('228x228'=>array(228,228)))
					);
					$this->request->data['User']['image'] = $file;
				}else{
					$this->request->data['User']['image'] = NULL;
				}	
					
					if(isset($this->request->data['User']['img'])){					
						$corte = array(
							0=>array('referencia'=>'A','width'=>100,'height'=>100), // imagem aberta								
						);											
						$array = $this->Upload->getFile($this->request->data['User']['img'],null,$corte);						
						$this->request->data['User']['img'] = $array['name'];										
					} else {
						$this->request->data['User']['img'] = '';
					}
					
					$username = $this->User->find('count',array(
						'conditions' => array('User.username' =>$this->request->data['User']['username']),
					));
					if($username>=1){
						$this->Session->setFlash($this->Message->error('Usuário já existe'));
						$this->redirect('/users/add');
					} else {														
						//if($this->User->save($this->request->data)){
						if($this->User->saveAll($this->request->data)){
										
						}	

						$idUser = $this->User->id; 
						$this->loadModel('UserHasInteresse');
						foreach($this->request->data['User']['interesse'] as $key => $banners){
							$this->UserHasInteresse->saveMany(array('UserHasInteresse'=>array('users_id'=>$idUser,'banners_id'=>$banners)));
						}	
						$this->redirect('/users/login');
					}
				}
			}
			//$this->redirect('/users/login');
		}
		
		
		public function preferencias(){
			$user = $this->Auth->user();	
			if($this->request->data){
				if($this->User_has_interesse->deleteAll(array('User_has_interesse.users_id' => $user['id']), false)){
					foreach($this->request->data['User']['interesse'] as $key => $interesse){
						$this->User_has_interesse->saveMany(array('User_has_interesse'=>array('users_id'=>$user['id'],'interesses_id'=>$interesse)));
					}	
					$this->Session->setFlash($this->Message->success('Suas preferencias foram editadas com sucesso!'));
					$this->redirect('/users/preferencias');
				}
			}
			
			$this->set('interesses', $this->Interesse->find('all'));
			
			$this->set('meus_interesses', $this->User_has_interesse->find('list',array('fields'=>array('interesses_id'),'conditions'=>array('users_id'=>$user['id']))));
			
		}
		
		/**
		 * Este metodo edita as informações do usuário
		 */
		public function conta(){
			
			$current_user = $this->Auth->user();
			if($this->data){
				$this->User->set($this->data);
				if($this->User->validates()){
/*
				 *  Verifica se existe imagem
				 * Se existir faz o upload
				 * */
				if(!empty($this->data['User']['image']['name'])){
					$file = $this->Upload->getFile(array(
						'type'=>'fotos',
						'path'=>'users/fotos/',
						'file'=> $this->data['User']['image'],					
						'size'=>array('228x228'=>array(228,228)))
					);
					$this->request->data['User']['image'] = $file;
					$this->request->data['User']['tipo'] = 'site';
				}else{
					$this->request->data['User']['image'] = $this->data['User']['image_hidden'];
				}					
					
										
					$username = $this->User->find('first',array(
						'conditions' => array('User.username' =>$this->data['User']['username']),
					));
					
			
					if(count($username) >=1 && $current_user['id'] != $username['User']['id']){
						$this->Session->setFlash($this->Message->error('Usuário já existe'));
						$this->redirect('/users/conta');
					} else {														
						//if($this->User->save($this->data)){
						if($this->User->save($this->data)){
							$this->Session->setFlash($this->Message->success('Perfil alterado com sucesso'));
						}	
						$this->redirect('/users');
					}
				}else{
					$this->Session->setFlash($this->Message->error('Houve algum erro!'));
					 $this->render('edit');
				}
			}else{
					$this->data = $this->User->read(null,$current_user['id']);
			}						
		}
		
		

		
		/**
		 * Este metodo muda a altera a senha do usuario logado.
		 */		
		public function edit(){
			
			$current_user = $this->Auth->user();
			if($this->request->data){
				$this->User->set($this->request->data);
				if($this->User->validates()){
					$old = $this->User->read(null,$current_user['id']);
					if($old['User']['password'] == AuthComponent::password($this->request->data['User']['oldpassword'])){
						$this->request->data['User']['id'] = $current_user['id'];
						if($this->User->save($this->request->data)){
							$this->Session->setFlash($this->Message->success('Senha alterada com sucesso!'));
						}
						$this->redirect('/users');
					}else{
						$this->Session->setFlash($this->Message->error('A senha atual não está correta'));													
						$this->redirect('/users/edit');
					}
				}else{
					$this->Session->setFlash($this->Message->error('As senhas digitadas não conferem!'));
					 $this->redirect('/users/edit');
				}
			}			
		}

		public function convidar(){
			$this->loadModel('User_has_interesse');
			$this->set('interesses', $this->User_has_interesse->find('all',array('conditions'=>array('User_has_interesse.users_id'=>$user['id']))));
		}
		public function cupons(){
			$user = $this->Auth->user();
			$current_user = $this->User->read(null,$user['id']);			
			$this->set('user',$current_user);		
			
			$this->loadModel('User_has_advantage');
			$this->set('cupons', $this->User_has_advantage->find('all',array('conditions'=>array('User_has_advantage.users_id'=>$user['id']))));
			
			$this->loadModel('User_has_interesse');
			$this->set('interesses', $this->User_has_interesse->find('all',array('conditions'=>array('User_has_interesse.users_id'=>$user['id']))));
		}
		public function favoritos(){
			$this->loadModel('User_has_favorito');
			$this->loadModel('Galeria');
			$user = $this->Auth->user();
			$current_user = $this->User->read(null,$user['id']);			
			$this->set('user',$current_user);		
			
			$this->set('favoritos', $this->User_has_favorito->find('all',array('conditions'=>array('User_has_favorito.users_id'=>$user['id']))));
			$this->loadModel('User_has_interesse');
			$this->set('interesses', $this->User_has_interesse->find('all',array('conditions'=>array('User_has_interesse.users_id'=>$user['id']))));
		}

	}
