<?php
	class AtendimentoController extends AppController{
		public $name = 'Atendimento';
		
		
		public function beforeFilter(){
			parent::beforeFilter();
			$this->loadModel('Atendimento');
			$this->set('atendimentos', $this->Atendimento->find('first'));
			
		}
		public function contato(){
			
			$configs = $this->Atendimento->find('first');	
			
						
		    if($this->data) {		    	
				$this->loadModel('Mensagem');		        		        				        	
	        	if($this->Mensagem->save($this->data)){
	        		$mensagem = '<html><body>';						
                   $mensagem = 'Nome: '.$this->data['Mensagem']['nome'].'<br />'.'<br />';
				   $mensagem .= 'Assunto: '.$this->data['Mensagem']['assunto'].'<br />'.'<br />';
				    $mensagem .= 'Responder o email: '.$this->data['Mensagem']['email'].'<br />'.'<br />';
                   $mensagem .= 'Mensagem: '.$this->data['Mensagem']['texto'];
                   $mensagem .= "</body></html>";
                   
                   
                   /*$email = new CakeEmail('fast');
				   
				   $email->from(array($this->data['Mensagem']['email'] => $this->data['Mensagem']['nome']));
				   $email->subject('MG em Foco - Mensagem de contato - '.$this->data['Mensagem']['assunto']);
                   $email->to($configs['Atendimento']['email']);*/
                   
                   $to = $configs['Atendimento']['email'];

					$subject = 'Contato no site!';
					
					$headers = "From: " . strip_tags($this->data['Mensagem']['email']) . "\r\n";
					$headers .= "Reply-To: ". strip_tags($this->data['Mensagem']['email']) . "\r\n";
					//$headers .= "CC: susan@example.com\r\n";
					$headers .= "MIME-Version: 1.0\r\n";
					$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                   
				                   
                   
                   if(mail($to, $subject, $mensagem, $headers)){
                   		$this->Session->setFlash($this->Message->success('Sua mensagem foi enviada com sucesso! Obrigado por fazer contato.'));
						$this->redirect('/atendimento/contato');
				   } else {
				   		$this->Session->setFlash($this->Message->error('E servidor se comportou de maneira inesperada, por favor tente novamente.'));
						$this->redirect('/atendimento/contato');
				   }	            				              
				}

								 					
	    	}				
		}
		
		public function trabalhe(){
			
		}
		
		public function institucional(){
			
			$this->loadModel('Sobre');
			
			$this->set('institucional', $this->Sobre->find('first'));
		}	
		public function anuncie(){
			$this->loadModel('Anuncio');
			$this->set('anuncio',$this->Anuncio->find('first'));
			
		}		
		
		
		public function enviar_contato(){
			$this->autoRender = false;
			

			
			
		
}
	
	}