<?php
	class MessageComponent extends component{
		
		public function success($message = 'Salvo com sucesso!'){
			return '
						<div class="alert success">
				
							
				
							'.$message.'
							
						</div>
					';
		}
		public function error($message = 'Houve um erro!'){
			return '
						<div class="danger alert">				
							'.$message.'
						</div>
					';
		}		
	}
