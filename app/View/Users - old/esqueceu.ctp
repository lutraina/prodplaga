<div class="users">
	<div class="row mt20">
		<div class="row">
			<span class="icon-categoria"></span><span class="titulo-categoria">Esqueci a senha</span>
		</div>
		<div class="row texto mt10">
			Informe o seu nome de usuário(seu email), para iniciarmos o processo de redefinição de senha.
		</div>
		<div class="row">
			<div class="row mt20">
				<?php echo $this->Session->flash(); ?>
			</div>			
			<div class="three columns">
			</div>
			<div class="six columns">

						<?php echo $this->Form->create('User', array(
					    	'inputDefaults' => array(
							        'label' => false,
							        'div' => false
							    	),
							    'class'=>'form-login',
							    'id'=>'form-cadastro',
							   	
								));
							?>
					<div class="row mt20 mb20">
						<div class="two columns"></div>
						<div class="eight columns">
							<div class="row">
								<?= $this->Form->input('username',array('id'=>'cadastro_email', 'placeholder'=>'SEU E-MAIL'))?>
							</div>
							<div class="row mt10">
								<div class="four columns f-right">
									<button class="button button-black2 button-radius">ENVIAR</button>
								</div>
							</div>
						</div>
						<div class="two columns"></div>
					</div>
				<?= $this->Form->end(null); ?>
			</div>
			<div class="three columns">
			</div>
		</div>
	</div>
</div>


<script>	
	$('#passo1').click(function(){
		
		if ($('#cadastro_nome').val() == "") {
			alert("Por favor, Digite o nome!");
			return false;
		}else if($('#cadastro_email').val() == ""){
			alert("Por favor, Digite o e-mail!");
			return false;
		}else if( $('#cadastro_telefone').val() == ""){
			alert("Por favor, Digite o telefone!");
			return false;
		}
		$("#form-contato1").ajaxForm({
	        url: '/atendimento/enviar_contato',
	    	beforeSend:function(){
	    		$('.form-cadastro').html('<h1 class="form-fale-conosco-texto"> Aguarde... </h1>');
	    		
	    	},
	        success: function(data) {
				$('.nav-tabs-estabelecimentos ul li').html('<center><img src="/img/logo.png" /> <h1 class="form-fale-conosco-texto">Sua mensagem foi enviada com sucesso! <br /> <small>Em breve entraremos em contato. </small></h1> </center>');
	        },
	        error: function(){
	            mensagem.html('Erro com o arquivo');
	            }
	 
		}).submit()
       
	});
	
	$('#passo2').click(function(){
		
		if ($('#cadastro_senha').val() == "") {
			alert("Por favor, Digite a senha!");
			return false;
		}else if($('#cadastro_senha_novamente').val() == ""){
			alert("Por favor, Digite a senha novamente!");
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
       
	});
	
	$('#passo3').click(function(){
		
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
       
	});				
</script>