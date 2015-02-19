</div>



<div class="atendimento">
	<div class="box-menu-atendimento">
		<ul class="menu-atendimento">
			<li ><a href="/institucional">Institucional</a></li>
			<li class="current"><a href="/contato">entre em contato</a></li>
			<li><a href="/anuncie">anuncie em nosso site</a></li>
		</ul>
	</div>
	<div class="row mt20">
		<div class="eight columns">
			<div class="row">
				<span class="icon-categoria"></span><span class="titulo-categoria">Entre em Contato</span>
			</div>
			<div class="row texto mt10">
					<?= $atendimentos['Atendimento']['texto']?>
			</div>
			<div class="row mt20">
			<div class="row">
				<?php echo $this->Session->flash(); ?>
			</div>
				<div class="row">
					<span class="aba-form">enviar um e-mail</span>
				</div>
				<!--form-->
					<?php echo $this->Form->create('Mensagem', array(
					    'inputDefaults' => array(
					        'label' => false,
					        'div' => false
					    	),
					    'class'=>'form',
					    'id'=>'form-contato',
					   	
						));
					?>	
					<div class="row">
						<div class="eight columns">
							<?= $this->Form->input('nome',array('id'=>'contato_nome', 'placeholder'=>'SEU NOME'))?>
						</div>
						<div class="four columns">
							<?= $this->Form->input('email',array('id'=>'contato_email', 'placeholder'=>'E-MAIL'))?>
						</div>
					</div>
					<div class="row mt10">
						<div class="eight columns">
							<?= $this->Form->input('assunto',array('id'=>'contato_titulo', 'placeholder'=>'ASSUNTO DA MENSAGEM'))?>
						</div>
						<div class="four columns">
							<?= $this->Form->input('telefone',array('id'=>'contato_telefone', 'placeholder'=>'TELEFONE'))?>
						</div>
					</div>
					<div class="row mt10">
						<?= $this->Form->input('texto',array('type'=>'textarea', 'id'=>'contato_mensagem', 'placeholder'=>'SUA MENSAGEM'))?>
					</div>
					<div class="row mt10">
						<div class="four columns f-left">
							<button id="btSubmitContato" class="button button-black button-radius">ENVIAR MENSAGEM</button>
						</div>
					</div>
				<?= $this->Form->end(null); ?>
				<!--fim-->
			</div>
		</div>
		<div class="four columns">
			<div class="box-informacoes">
				<div class="row">
					<span class="icon-categoria"></span><span class="titulo-categoria">Informações</span>
				</div>
				<div class="row texto mt10">
					<?= $atendimentos['Atendimento']['texto']?>
				</div>
				<!--
				<div class="row texto mt10">
					<h3 class="row">Endereço</h3>
					<?= $atendimentos['Atendimento']['endereco']?>
				</div>
				<div class="row mt10">
					<img src="/img/maps-atendiemnto.png" width="100%" />
				</div>
				-->
				<div class="row texto mt10">
					<h3 class="row">Telefone</h3>
					<?= $atendimentos['Atendimento']['telefone']?>
				</div>
				<div class="row texto mt10">
					<h3 class="row">E-mail para Contato</h3>
					<?= $atendimentos['Atendimento']['email']?>
				</div>
			</div>
		</div>
	</div>
</div>
<script>	
	$('#btSubmitContato').click(function(){
		
		if ($('#contato_nome').val() == "") {
			alert("Por favor, Digite o nome!");
			return false;
		}else if($('#contato_email').val() == ""){
			alert("Por favor, Digite o e-mail!");
			return false;
		}else if( $('#contato_telefone').val() == ""){
			alert("Por favor, Digite o telefone!");
			return false;
		}
		
		else if($('#contato_mensagem').val() == ""){
			alert("Por favor, Digite a mensagem!");
			return false;
		}
		
		$("#form-contato1").ajaxForm({
	        url: '/atendimento/enviar_contato',
	    	beforeSend:function(){
	    		$('.form-fale-conosco').html('<h1 class="form-fale-conosco-texto"> Aguarde... </h1>');
	    		
	    	},
	        success: function(data) {
				$('.form-fale-conosco').html('<center><img src="/img/logo.png" /> <h1 class="form-fale-conosco-texto">Sua mensagem foi enviada com sucesso! <br /> <small>Em breve entraremos em contato. </small></h1> </center>');
	        },
	        error: function(){
	            mensagem.html('Erro com o arquivo');
	            }
	 
		}).submit()
       
	})
			
						
</script>