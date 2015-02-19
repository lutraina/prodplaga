<script>
	$(document).ready(function(){
		$('#btSubmit-menu').click(function(){
			
			$("#form-filtro-menu").ajaxForm({
				
		        url: '/estabelecimentos/filtro/null/gastronomia/<?= @$categoriaGeral['Category']['id'] ?>',
		    	beforeSend:function(){
		    	
		    		$('.filtro-menu-gastronomia').html('Agurade...');
		    		
		
		    	},
		        success: function(data) {
					$('.filtro-menu-gastronomia').html(data);
		        	
		        },
		        error: function(){
		            mensagem.html('Erro com o arquivo');
		            }
		 
			}).submit()
	       
		})
	})
</script>
<div class="bloco-form">
	<div class="row">
		<form class="form" action="#?" type="GET" id="form-filtro-menu">
			<div class="row">		
				<span class="row item mb5">Especialidade:</span>				
				<label class="custom-select">
				    <select name="especialidade">
				    	<option value="">Filtrar</option>
				    	<?php foreach($specialtys as $specialty): ?>
				       		<option value="<?= $specialty ?>"><?= $specialty ?></option>
				        <?php endforeach; ?>
				    </select>
				</label>
			</div>
			<div class="row">		
				<span class="row item mb5">Aberto até:</span>				
				<label class="custom-select">
				    <select name="aberto_ate">
				    	<option value="">Filtrar</option>
				    	<?php foreach($open_untils as $open_until): ?>
				       		<option value="<?= $open_until ?>"><?= $open_until ?></option>
				        <?php endforeach; ?>
				    </select>
				</label>
			</div>
			<div class="row">		
				<span class="row item mb5">Região:</span>				
				<label class="custom-select">
				   <!-- <select name="regiao">
				    	<option value="">Filtrar</option>
				    	<?php foreach($regions as $region): ?>
				       		<option value="<?= $region ?>"><?= $region ?></option>
				        <?php endforeach; ?>
				   </select>-->
				</label>
			</div>
			<div class="row">	
				<div class="button button-radius f-right" id="btSubmit-menu">Filtrar</div>
			</div>
		</form>
	</div>
</div>
