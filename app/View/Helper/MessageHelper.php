<?php
	class MessageHelper extends component{
		
		public function success($message = 'Salvo com sucesso!'){
			return '
						<div class="alert alert-block alert-success">
							<button type="button" class="close" data-dismiss="alert">
								<i class="icon-remove"></i>
							</button>
				
							<i class="icon-ok green"></i>
				
							'.$message.'
							
						</div>
					';
		}
		
	}
