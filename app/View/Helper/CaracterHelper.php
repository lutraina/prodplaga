<?php
	class CaracterHelper extends AppHelper{
		
		public function semEspecial($string=null){
			return ereg_replace("[^a-zA-Z0-9]", "", strtr($string, "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ", "aaaaeeiooouucAAAAEEIOOOUUC"));
			 
		}
		
		public function _getLimit($string=null,$size=null){
			
			if(strlen($string)<=$size){
				return $string;
			}else{
				$string = substr($string, 0, strrpos(substr($string, 0, $size), ' '));
			}
			return $string;
		}
		
		public function alfabeto($tipo='M'){
			if($tipo=='M'){
				return '<li class="letra" data-letra=""><a  href="#?">#</a></li>
							<li class="letra" data-letra="a"><a href="#?">A</a></li>
							<li class="letra" data-letra="b"><a href="#?">B</a></li>
							<li class="letra" data-letra="c"><a href="#?">C</a></li>
							<li class="letra" data-letra="d"><a href="#?">D</a></li>
							<li class="letra" data-letra="e"><a href="#?">E</a></li>
							<li class="letra" data-letra="f"><a href="#?">F</a></li>
							<li class="letra" data-letra="g"><a href="#?">G</a></li>
							<li class="letra" data-letra="h"><a href="#?">H</a></li>
							<li class="letra" data-letra="i"><a href="#?">I</a></li>
							<li class="letra" data-letra="k"><a href="#?">K</a></li>
							<li class="letra" data-letra="l"><a href="#?">L</a></li>
							<li class="letra" data-letra="m"><a href="#?">M</a></li>
							<li class="letra" data-letra="n"><a href="#?">N</a></li>
							<li class="letra" data-letra="o"><a href="#?">O</a></li>
							<li class="letra" data-letra="p"><a href="#?">P</a></li>
							<li class="letra" data-letra="q"><a href="#?">Q</a></li>
							<li class="letra" data-letra="r"><a href="#?">R</a></li>
							<li class="letra" data-letra="s"><a href="#?">S</a></li>
							<li class="letra" data-letra="t"><a href="#?">T</a></li>
							<li class="letra" data-letra="u"><a href="#?">U</a></li>
							<li class="letra" data-letra="v"><a href="#?">V</a></li>
							<li class="letra" data-letra="x"><a href="#?">X</a></li>
							<li class="letra" data-letra="w"><a href="#?">W</a></li>
							<li class="letra" data-letra="y"><a href="#?">Y</a></li>
							<li class="letra" data-letra="z"><a href="#?">Z</a></li>';
			}
			
		}
		
	}
