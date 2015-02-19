<?php
	App::uses('CakeSession', 'Model/Datasource');
	App::uses('BaseAuthenticate', 'Controller/Component/Auth');
	
	class FacebookAuthenticate extends BaseAuthenticate {
		
		var $settings = array(
		   "app_id" => "712966252050416",
		   "app_secret" => "06732e6ff33a2038b8c032309c5f3232",
		   "url" => "http://preview.nocambui.com.br/users/login_social"
		); 
		
        public function authenticate(CakeRequest $request, CakeResponse $response) {
           $session = new CakeSession();
            if (isset($request->query) && isset($request->query['code']) && isset($request->query['state'])) {
                if($request->query['state'] == $session->read('state')) {					
                    $token_url = "https://graph.facebook.com/oauth/access_token?"
                        . "&client_id=" . $this->settings["app_id"]
                        . "&redirect_uri=" . urlencode($this->settings["url"])
						."&scope=user_birthday"
                           . "&client_secret=" . $this->settings["app_secret"]
                           . "&code=" . $request->query['code'];                    					
					   
                    $response = file_get_contents($token_url);
                    $params = null;
                    parse_str($response, $params);
                    if (isset($params['access_token'])) {
                        $graph_url = "https://graph.facebook.com/me?access_token=".$params['access_token'];
                        $fb_user = json_decode(file_get_contents($graph_url));
						
						//$_SESSION['Facebook'] = $fb_user;
						//$_SESSION['token'] = file_get_contents($new_token_url);
																		 						 						 
                        App::uses('User', 'Model');
                        $User = new User();
                        $user = $User->find("first",array("conditions" => array("username" => "facebook-".$fb_user->id)));
                        if (!$user) {
                        	
							if($fb_user->gender == "male"){
								$sexo = 'masculino';
							} else {
								$sexo = 'feminino';
							}
							
                            $user = array(
                                "User" => array(
                                    "username" 			=> 	"facebook-".$fb_user->id,
                                    "rede_id" 			=> 	"facebook-".$fb_user->id,
                                    "name"				=>	$fb_user->name,
                                    "email"				=>	$fb_user->email,                                  
                                    "facebook_id"		=>	$fb_user->id,
                                    "sexo"				=>	$sexo,
                                    "profile"			=>  "cliente",
                                    "image"				=> 'http://graph.facebook.com/'.$fb_user->id.'/picture?type=normal',
                                    "tipo"				=> 'facebook'                                		                                    
                                )
                            );
                            $User->create();
                            $User->save($user);
                            $user["User"]["id"] = $User->getLastInsertID();
                        }
						// Atualiza dados do usuario
						if(empty($user['User']['username'])){				
							$dados= array(
								"User" => array(				
									"id"				=>  $user['User']['id'],	
									"rede_id" 			=> 	"facebook-".$fb_user->id,	
                                    "username" 			=> 	"facebook-".$fb_user->id,
                                    "name"				=>	$fb_user->name,
                                    "email"				=>	$fb_user->email,                                  
                                    "facebook_id"		=>	$fb_user->id,
                                    "sexo"				=>	$sexo,
                                    "profile"			=>  "cliente",
                                    "image"				=> 'http://graph.facebook.com/'.$fb_user->id.'/picture?type=normal',
                                    "tipo"				=> 'facebook'  															
								)
							);				
							$User->save($dados);
							$user = $User->find("first",array("conditions" => array("username" => "facebook-".$fb_user->id)));				
						}
                        return $user["User"];
                    }
                }
            }    
            return false;        
        }    

	}
?>
