<?php
	class CaracterComponent extends Component{
		
		public function semEspecial($string=null){
			$string = utf8_encode($string);
			$string = strip_tags($string);
			$string = strtolower($string);
			return ereg_replace("[^a-zA-Z0-9]", "-", strtr($string, "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ", "aaaaeeiooouucAAAAEEIOOOUUC"));
			 
		}
	}
