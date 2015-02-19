<script>
	$(document).ready(function(){
		$('#btSubmit-menu-diversao').click(function(){
			
			$("#form-filtro-menu-diversao").ajaxForm({
				
		        url: '/estabelecimentos/filtro/null/diversao/<?= @$categoriaGeral['Category']['id'] ?>',
		    	beforeSend:function(){
		    	
		    		$('.filtro-menu-diversao').html('Agurade...');
		    		
		
		    	},
		        success: function(data) {
					$('.filtro-menu-diversao').html(data);
		        	
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
		<form class="form" action="#?" type="GET" id="form-filtro-menu-diversao">
			<div class="row">		
				<span class="row item mb5">Estilo:</span>				
				<label class="custom-select">
				    <select name="especialidade">
				    	<option value="">Filtrar</option>
				    	<?php foreach($specialtysD as $specialtyd): ?>
				       		<option value="<?= $specialtyd ?>"><?= $specialtyd ?></option>
				        <?php endforeach; ?>
				    </select>
				</label>
			</div>
			<div class="row">		
				<span class="row item mb5">Diferencial:</span>				
				<label class="custom-select">
				    <select name="aberto_ate">
				    	<option value="">Filtrar</option>
				    	<?php foreach($diferenciaisD as $diferencialD): ?>
				       		<option value="<?= $diferencialD ?>"><?= $diferencialD ?></option>
				        <?php endforeach; ?>
				    </select>
				</label>
			</div>
			<div class="row">		
				<span class="row item mb5">Região:</span>				
				<label class="custom-select">
				    <select name="regiao">
				    	<option value="">Filtrar</option>
				    	<?php foreach($regionsD as $regionD): ?>
				       		<option value="<?= $regionD ?>"><?= $regionD ?></option>
				        <?php endforeach; ?>
				    </select>
				</label>
			</div>
			<div class="row">	
				<div class="button button-radius f-right" id="btSubmit-menu-diversao">Filtrar</div>
			</div>
		</form>
	</div>
</div>
