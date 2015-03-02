<div class="bloco-form" style="margin-top:110px; margin-left:-5px; width:288px;">
	<div class="row">
		<form class="form" action="#?" type="GET" id="form-filtro"> <!-- form-filtro -->
			<!--Filtros que serao enviados à funçao de persquisa no Business controller :: estabelecimentosFiltro -->
			<!--os nomesdos filtros sao : especialidade, tipo e periodo-->
			
			<div class="row" style="padding-top:28px;">		
				<label class="custom-select">
				    <select name="especialidade">
				    	<option value="">Selecione</option>
				    	<?php foreach($busca_categorias as $specialty): ?>
				       		<option value="<?= $specialty ?>"><?= $specialty ?></option>
				        <?php endforeach; ?>
				    </select>
				</label>
			</div>
			<div class="row" style="padding-top:15px;">		
				<label class="custom-select">
				    <select name="tipo">
				    	<option value="">Selecione</option>
				    	<?php foreach($open_untils as $open_until): ?>
				       		<option value="<?= $open_until ?>"><?= $open_until ?></option>
				        <?php endforeach; ?>
				    </select>
				</label>
			</div>
			<div class="row" style="padding-top:15px;">		
				<label class="custom-select">
				    <select name="periodo">
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
				
		        url: '/estabelecimentos/filtro/<?php echo $regiao_geral; ?><?= @$categoriaGeral['Category']['id'] ?>',
//		        url: '/estabelecimentos/filtro/null/gastronomia/<?= @$categoriaGeral['Category']['id'] ?>',
		     
		    	beforeSend:function(){
		    	
		    		$('.filtroGeral2').html('Agurade...');
		    		$('#resultado_busca').removeClass('estabelecimentos_liste');
				$('#resultado_busca').addClass('estabelecimentos_liste_resultado');
	    		$('.filtroGeral2').html('Agurade...');
		    	$('.titles_busca').html('');
		    	$('.estabelecimentos_busca').css('height', '0px');
				$('.filtroGeral').html('');
				$('.filtroGeral2').css('display', 'block');
		
		    	},
		        success: function(data) {
					$('.filtroGeral2').html(data);
					 
					
					
					//$('.estabelecimentos_liste').prop('background-image','img/resultado-busca.jpg !important');
		        	
		        },
		        error: function(){
		            mensagem.html('Erro com o arquivo');
		            }
		 
			}).submit()
	       
		})
	})
	
</script>  