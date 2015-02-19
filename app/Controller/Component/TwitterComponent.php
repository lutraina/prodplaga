<?php

	App::uses('Component', 'Controller');
	App::import('Vendor', 'twitteroauth/twitteroauth'); 
	
	class TwitterComponent extends Component {				
		
		public function getUltimoTweet(){
			$perfil 				= $this->_getPerfis();
					
			$twitter_username 		= $perfil['RedesSociai']['usuario'];
			$twitter_post_count 	= 1;
						
			$consumer_key 	 		= '1If3puTo6eUrYuraGvHwIQ';
			$consumer_secret 		= '3OSpCYLM2OAgsTloRlA6PkeeaoOHiZPbD4Nta8ImqRI';			
			$access_token 	 	 	= '85618702-r1v60ulwKL0LyVOdeSIUj457KJ6tLjNctehevzGo';
			$access_token_secret 	= '2h2s02tuscHifcQLZhMsaY3UrcDMpoZR9ijGtBVI';
			
			
			 // require the twitter auth class	 
			 $twitterConnection 	= new TwitterOAuth($consumer_key,$consumer_secret,$access_token,$access_token_secret);
			 
			 $config = array('screen_name' => $twitter_username,'count'=> $twitter_post_count,'exclude_replies'=>false);
			 			
		 	 $twitterData = $twitterConnection->get('statuses/user_timeline',$config);
			 			 
			 foreach ($twitterData as $key => $value) {
				 $item = $value;
			 }
			 return substr($item->text,0,50);			
		}		
		
		private function _getPerfis(){
			$redes_sociais = ClassRegistry::init('RedesSociai');			
						
			$perfil = $redes_sociais->find('first',array(
				'conditions'=>array('RedesSociai.titulo'=>'Twiter'),
				'order'=>array('RedesSociai.id'=>'ASC')
			));
			
			return $perfil;
		}
		
	}
