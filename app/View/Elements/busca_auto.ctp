				
					<script>
						$(document).ready(function(){
							    	
							$('.marca').change(function(){
								var valor = $(this).val();
								
									$.ajax({
								        url: '/autos/modelos_ajax/'+valor,
								    	beforeSend:function(){
								    		$('.retorno').html('Agurade...');
								    	},
								        success: function(data) {
											$('.retorno').html(data);
								        },
								        error: function(){
								           
								           }
									})
								
								
							})
						});


					</script>	
					

	<div class="row">
		<div class="four columns">
			<label class="custom-select">
				<select name="ano_fabricacao">
			    	<option value="">Ano fabricação</option>
			    	<?php foreach($filtro_anos as $filtro_ano): ?>
			       		<option value="<?= $filtro_ano ?>"><?= $filtro_ano ?></option>
			        <?php endforeach; ?>
			    </select>
			</label>
		</div>
		<div class="four columns">
			<label class="custom-select">
			    <select name="marca" class="marca">
			    	<option value="">Marca</option>
			    	<?php foreach($filtro_marcas as $filtro_marca): ?>
			       		<option value="<?= $filtro_marca ?>"><?= $filtro_marca ?></option>
			        <?php endforeach; ?>
			    </select>
			</label>
		</div>
		<div class="four columns retorno">
			<label class="custom-select">
			    <select name="modelo">
			    	<option value="">Modelo</option>
			       		<option value="">Escolha</option>
			    </select>
			</label>
		</div>
	</div>
	<div class="row mt10">
		<div class="four columns">
			<div class="row">
				<div class="two columns">
					<span class="valor">Preço</span>
				</div>
				<div class="five columns">
					<input type="text" name="start_preco" placeholder="De">
				</div>
				<div class="five columns">
					<input type="text" name="end_preco" placeholder="Até">
				</div>
			</div>
		</div>
		<div class="four columns">
			<div class="row">
				<div class="six columns">
					<input class="input-radio" type="radio" name="zero" value="1" /><span class="valor">semi-novo</span>
				</div>
				<div class="six columns">
					<input class="input-radio" type="radio" name="zero" value="0" /><span class="valor">zero km</span>
				</div>
			</div>
		</div>
		<div class="four columns f-right">
			<button class="button button-black2 button-radius">BUSCAR</button>
		</div>
	</div>
