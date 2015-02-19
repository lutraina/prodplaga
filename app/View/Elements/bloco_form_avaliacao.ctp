<!--popup-->
	<div id="boxes" class="avaliacao">
		<div id="dialog" class="window">
			<div class="boxes-header">
				<h2>Avaliações</h2>
				<a href="#" class="close">Fechar [X]</a><br />
			</div>
			<div class="row mt20">
						<?php echo $this->Form->create('Review', array(
					    	'inputDefaults' => array(
							        'label' => false,
							        'div' => false
							    	),
							    'class'=>'form',
							    'id'=>'form-cadastro',
							   	
								));
							?>
					<div class="row">
						<div class="row">
							<div class="four columns">
								 <?= $this->Form->input('nome',array('id'=>'nome', 'placeholder'=>'Seu nome'))?>
							</div>
							<div class="four columns">
								<?= $this->Form->input('email',array('id'=>'email', 'placeholder'=>'Seu email'))?>
							</div>
							<div class="four columns">
								<label class="custom-select">
									<?= $this->Form->input('melhor',array('options'=>array(' '=>'Melhor para','Negócios'=>'Negócios','Casal'=>'Casal','Família'=>'Família','Amigos'>'Amigos')))?>
								</label>
							</div>
						</div>
						<!--bloco de avaliação do estabelecimento-->
						<div class="bloco-avaliacao">
							<div class="row">
								<div class="four columns">
									<label class="custom-select">
										<?= $this->Form->input('servico',array('id'=>'servico', 'options'=>array(' '=>'Serviço','5'=>'5','4'=>'4','3'=>'3','2'=>'2','1'=>'1')))?>
									</label>
								</div>
								<div class="four columns">
									<label class="custom-select">
										<?= $this->Form->input('atendimento',array('id'=>'atendimento', 'options'=>array(' '=>'Atendimento','5'=>'5','4'=>'4','3'=>'3','2'=>'2','1'=>'1')))?>
									</label>
								</div>
								<div class="four columns">
									<label class="custom-select">
										<?= $this->Form->input('ambiente',array('id'=>'ambiente', 'options'=>array(' '=>'Ambiente','5'=>'5','4'=>'4','3'=>'3','2'=>'2','1'=>'1')))?>
									</label>
								</div>
							</div>
						</div>
						<div class="row mt10">
							<?= $this->Form->input('comentario',array('type'=>'textarea','placeholder'=>'Deseja fazer um comentário?'))?>
						</div>
						
						
						<div class="row mt10">
							<div class="four columns f-right">
								<?= $this->Form->input('businesses_id',array('type'=>'hidden','value'=>$business['Business']['id']))?>
								<button id="btSubmitReview" class="button button-black button-radius">Enviar</button>
							</div>
						</div>
					</div>
					<?= $this->Form->end(null); ?>
			</div>
			
		</div>
		<!-- Máscara para cobrir a tela -->
		<div id="mask"></div>
	</div>
<script>	
	$('#btSubmitReview').click(function(){
		if ($('#nome').val() == "") {
			alert("Por favor, Digite o nome!");
			return false;
		}else if($('#email').val() == ""){
			alert("Por favor, Digite o e-mail!");
			return false;
		}else if( $('#servico').val() == ""){
			alert("Por favor, Avalie o serviço!");
			return false;
		}else if( $('#atendimento').val() == ""){
			alert("Por favor, Avalie o atendimento!");
			return false;
		}else if( $('#ambiente').val() == ""){
			alert("Por favor, Avalie o ambiente!");
			return false;
		}
       
	})
			
						
</script>