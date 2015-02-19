<?php
	App::uses('CakeSession', 'Model/Datasource');
	App::uses('BaseAuthenticate', 'Controller/Component/Auth');	
	App::uses('SessionComponent', 'Controller/Component/Session');
	
	App::import('Vendor', 'gplus/Google_Client');
	App::import('Vendor', 'gplus/contrib/Google_Oauth2Service'); 
	

	class GplusAuthenticate extends BaseAuthenticate {
			
			

 		// As configurações da aplicação são feitas em: app/Vendor/gplusoauth/config.php
 		
        public function authenticate(CakeRequest $request, CakeResponse $response) {
           $session = new CakeSession();
    
			$google_client_id 		= '721726045870.apps.googleusercontent.com';
			$google_client_secret 	= 'oVRFdFN6hl___Zt8jXtEV5io';
			$google_redirect_url 	= 'http://preview.nocambui.com.br/users/login_social';
			$google_developer_key 	= 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx';		
			
			$gClient = new Google_Client();
			$gClient->setApplicationName('Sodiê Doces');
			$gClient->setClientId($google_client_id);
			$gClient->setClientSecret($google_client_secret);
			$gClient->setRedirectUri($google_redirect_url);
			$gClient->setDeveloperKey($google_developer_key);
			
			$google_oauthV2 = new Google_Oauth2Service($gClient);
	
			if (isset($request->query['code'])) {
			  $gClient->authenticate($request->query['code']);			  
			  $gClient->setAccessToken($gClient->getAccessToken());			  
			  
			  $plus_user = $google_oauthV2->userinfo->get();
			  
				return $this->checkUser($plus_user);  
			  
			}else{
				return false;	
			}        
        }
		
		
		
		/**
 		 * Verifica se o usuário do gplus já tem uma entrada de banco de dados e
		 * Cria um se não. Retorna o objeto de usuário do banco de dados
		 * @param object $plus_user o objeto de usuário recuperado do Gplus
 		 */
		private function checkUser($plus_user) {
			App::uses('User', 'Model');
			$User = new User();
			$user = $User->find("first",array("conditions" => array("username" => "gplus-".$plus_user['id'])));
			if (!$user) {
				$user = array(
					"User" => array(
						"username" 		=> 	"gplus-".$plus_user['id'],
						"name"			=>	$plus_user['name'],		
						"email"			=>	$plus_user['email'],
						"rede_id"		=> 	"gplus-".$plus_user['id'],		
						"image"			=>	$plus_user['picture'],
						"nascimento"	=>	date("Y-m-d",strtotime($plus_user['birthday'])),
						"profile"			=>  "cliente",
						"tipo"			=>  'gplus'
					)
				);
				$User->create();
				$User->save($user);
				$user["User"]["id"] = $User->getLastInsertID();
			}			
			// Atualiza dados do usuario
			if(empty($user['User']['img']) || empty($user['User']['nascimento'])){				
				$dados= array(
					"User" => array(				
						"id"			=>  $user['User']['id'],		
						"username" 		=> 	"gplus-".$plus_user['id'],
						"nome"			=>	$plus_user['name'],		
						"email"			=>	$plus_user['email'],				
						"rede_id"		=> 	"gplus-".$plus_user['id'],
						"image"			=>	$plus_user['picture'],
						"nascimento"	=>	date("Y-m-d",strtotime($plus_user['birthday'])),
						"profile"			=>  "cliente",
						"tipo"			=>  'gplus'														
					)
				);				
				$User->save($dados);
				$user = $User->find("first",array("conditions" => array("username" => "gplus-".$plus_user['id'])));				
			}
			$user["User"]["img"] = $plus_user['picture'];
			return $user["User"];
		}


		    
    	
	}
?>
