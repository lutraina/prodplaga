<div class="bloco-form" style="margin-top:110px; margin-left:-5px; width:288px;">
	<div class="row">
		<form class="form" action="#?" type="GET" id="form-filtro">
			<div class="row" style="padding-top:28px;">		
				<label class="custom-select">
				    <select name="especialidade">
				    	<option value="">Selecione</option>
				    	<?php foreach($specialtys as $specialty): ?>
				       		<option value="<?= $specialty ?>"><?= $specialty ?></option>
				        <?php endforeach; ?>
				    </select>
				</label>
			</div>
			<div class="row" style="padding-top:15px;">		
				<label class="custom-select">
				    <select name="aberto_ate">
				    	<option value="">Selecione</option>
				    	<?php foreach($open_untils as $open_until): ?>
				       		<option value="<?= $open_until ?>"><?= $open_until ?></option>
				        <?php endforeach; ?>
				    </select>
				</label>
			</div>
			<div class="row" style="padding-top:15px;">		
				<label class="custom-select">
				    <select name="regiao">
				    	<option value="">Selecione</option>
				    	<?php foreach($periodos as $periodo): ?>
				       		<option value="<?= $periodo['Periodo']['periodo'] ?>"><?= $periodo['Periodo']['periodo'] ?></option>
				        <?php endforeach; ?>
				    </select>
				</label>
			</div>
			<label>
				<button class="button button-radius f-right mt10" style="" id="btSubmit"></button>
			</label>
		</form>
	</div>
</div>
<script>
	$(document).ready(function(){
		$('#btSubmit').click(function(){
			
			$("#form-filtro").ajaxForm({
				
		        url: '/estabelecimentos/filtro/null/gastronomia/<?= @$categoriaGeral['Category']['id'] ?>',
		    	beforeSend:function(){
		    	
		    		$('.filtroGeral').html('Agurade...');
		    		
		
		    	},
		        success: function(data) {
					$('.filtroGeral').html(data);
		        	
		        },
		        error: function(){
		            mensagem.html('Erro com o arquivo');
		            }
		 
			}).submit()
	       
		})
	})
	
</script>  