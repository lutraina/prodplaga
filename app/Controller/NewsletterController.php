<?php
	class NewsletterController extends AppController{
		public $name = 'Newsletter';
		

		public function index(){

		}
		
		public function cadastro($tipo=null){
			$this->autoRender = false;
			
			if(!empty($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){

			
				if($this->Newsletter->save(array('Newsletter'=>array('email'=>$_POST['email'])))){
					echo 'Obrigado por se cadastrar em nosso site. Agora você receberá todas as nossas atualizações.';
				}else{
					echo 'Desculpe-nos! Mas por algum motivo não foi possível cadastrar seu email.';
				}
			}else{
									
				$this->layout = 'ajax';	
				echo '<script>alert("Você não adicionou um email válido") </script>';
				if($tipo == 'assine'){
					$this->render('form2');
				}else{
					$this->render('form');
				}
			}
		}
	}
