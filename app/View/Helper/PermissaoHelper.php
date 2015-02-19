<?php
	class PermissaoHelper extends AppHelper{
		
		public function is_authorized($user,$controller){
	    	$permissao = explode(';',$user['permissao']);
	        if ($user['perfil'] === 'admin' || $user['perfil'] === 'super'){
	            return true;
	        } elseif($user['perfil'] == 'usuario' && in_array($controller, $permissao)){
	            return true;
	        }
		}
	}
