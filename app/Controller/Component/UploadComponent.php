<?php
App::uses('Component','Controller');
App::import('Vendor','WideImage/WideImage');

	class UploadComponent extends Component{
		
		protected $_allowed = array('png', 'jpg', 'JPG','gif', 'mp4');
		protected $_PATH_INTERNO = '/files/';

		
		
		
		/*
		 * Recebe um array com as seguintes posições
		 * @ getUpload['File'] = $_FILES['upload']
		 * 
		 * // Medidas em px Largura x altura
		 * @ getUpload['size'] =  array(array(300,200))
		 * 
		 *  array('type','file','size','path')
		 * */
		 
	
		
		
		public function getFile($getUpload = null){
                  
			// Carrega o model timeline
			//$File = ClassRegistry::init('File');
			

				$PATH = Configure::read('PATH_FILES').$this->_PATH_INTERNO.$getUpload['path'];
				

				
				if(!is_dir($PATH)){
					mkdir($PATH,0777,true);					
				}

				
				$nome = md5(md5(uniqid(rand(), true))). '.'.$this->allowed($getUpload['file']['name']);
				
				//verifica se formato é permitido $this->allowed()
				
				//redimensiona a imagem e faz o upload $this->resizeIMG()
				
				if($getUpload['type']=='videos'){
						if(move_uploaded_file($getUpload['file']['tmp_name'], $PATH.$nome)){
							return $nome;
						}
				}
			
			
				$img = WideImage::load($getUpload['file']['tmp_name']);
				
				
				
				if(count(@$getUpload['size'])>=1){
					foreach($getUpload['size'] as $key => $size){
						$new_nome = $key.'-'.$nome;
						
						$tam_img = getimagesize($getUpload['file']['tmp_name']);
						
						if($tam_img[0] > $size[0] ){						
							$img = $img->resize($size[0], $size[1], 'fill');
						}
						$img->saveToFile($PATH.$new_nome);
					}
				}else{
					$img->saveToFile($PATH.$nome);
				}

				return $nome;
		
		}
		
		private function allowed($file=null){
			
			$extension = pathinfo($file, PATHINFO_EXTENSION);
			if(!in_array(strtolower($extension), $this->_allowed)){
				return FALSE;
			}
			
			return $extension;
		}
		



	}
