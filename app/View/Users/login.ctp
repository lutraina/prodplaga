<div class="users">
	<div class="row mt20">
		<div class="row">
			<span class="icon-categoria"></span><span class="titulo-categoria">Fazer Login</span>
		</div>
		<div class="row texto mt10">
			Faça login para ter acesso a recursos excluivos à usuários cadastrados.
		</div>
		<div class="row">
			<div class="two columns">
			</div>
			<div class="eight columns form-login">
				
						
					<div class="row mt20 mb20 login-interno">
						<div class="two columns"></div>
						<div class="eight columns">
							<!--form-->
							<?php echo $this->Form->create('User', array(
						    	'inputDefaults' => array(
								        'label' => false,
								        'div' => false
								    	),
								    'class'=>'',
								    'id'=>'form-cadastro',
								   	
									));
								?>		
							<div class="row mb20">
								<?php echo $this->Session->flash(); ?>
							</div>
							<div class="row">
								<?= $this->Form->input('username',array('id'=>'cadastro_email', 'placeholder'=>'SEU E-MAIL'))?>
							</div>
							<div class="row mt10">
								<?= $this->Form->input('password',array('id'=>'cadastro_nome', 'placeholder'=>'SUA SENHA'))?>
							</div>
							<div class="row mt10">
								<div class="two columns">
									<a href="/users/add" class="esqueceu-senha">Casdastrar</a>
								</div>
								<div class="four columns">
									<a href="/users/esqueceu" class="esqueceu-senha">Esqueceu sua senha?</a>
								</div>
								<div class="four columns f-right">
									<button class="button button-black2 button-radius">ENTRAR</button>
								</div>
							</div>
							<?= $this->Form->end(null); ?>
							<div class="row mt45">
								<div class="six columns">
									<div class="row mt5">
										<span class="login-redes">Conectar via Redes Sociais</span>
									</div>
								</div>
								<div class="six columns">
									<div class="row">
										<div class="box-cadastro-login">
											<?= $this->element('login_redesocial'); ?>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="two columns"></div>
					</div>
				
			</div>
			<div class="two columns">
			</div>
		</div>
	</div>
</div>