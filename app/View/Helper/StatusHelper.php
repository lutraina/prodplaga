<?php 
	class StatusHelper extends AppHelper{	
		public function _getConvert($status){
			if($status == 1){
				return '<span class="label label-info">Ativo</span>';
			}else if($status == 0){
				return '<span class="label label-warning">Inativo</span>';
			}
		}
		public function _getLida($status){
			if($status == 1){
				return '<span class="label label-info">Lida</span>';
			}else if($status == 0){
				return '<span class="label label-warning">Não lida</span>';
			}
		}		
	}
