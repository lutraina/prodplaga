<div class="users">
	<div class="row mt20">
		<div class="eight columns">
			<div class="row">
				<span class="icon-categoria"></span><span class="titulo-categoria">Faça seu Cadastro</span>
			</div>
			<div class="row texto mt10">
				Se ainda não é cadastrado, preencha o formulário abaixo e disfrute de recursos exclusivos para usuários cadastrados.
			</div>
			<div class="row mt20">
				<div id="tabs" class="row nav-tabs-estabelecimentos">
					<ul class="row">
						<li><a href="#tabs-1">SUAS INFORMAÇÕES</a></li>
						
						<li><a href="#tabs-2">SEUS INTERESSES</a></li>
					</ul>
					
					<div class="conteudo-tabs-estabelecimentos">
						<!--form-->
						<?php echo $this->Form->create('User', array(
					    	'inputDefaults' => array(
							        'label' => false,
							        'div' => false
							    	),
							    'class'=>'form',
							    'id'=>'form-cadastro',
							    'enctype'=>'multipart/form-data',
			
								));
							?>
							<div class="row">
								<div id="tabs-1">
									<div class="row">
										<div class="row">
											<div class="six columns">
												<?= $this->Form->input('name',array('id'=>'cadastro_nome', 'placeholder'=>'SEU NOME'))?>
											</div>
											<div class="six columns">
												<?= $this->Form->input('username',array('id'=>'cadastro_email', 'placeholder'=>'SEU E-MAIL'))?>
											</div>
										</div>
										<div class="row mt10">
											<div class="six columns">
												<?= $this->Form->input('password',array('id'=>'cadastro_nome', 'placeholder'=>'SUA SENHA'))?>
											</div>
											<div class="six columns">
												<?= $this->Form->input('password_confirmation',array('id'=>'cadastro_email', 'type'=>'password', 'placeholder'=>'CONFIRME SUA SENHA'))?>
											</div>
										</div>										
										<div class="row mt10">
											<div class="four columns">
												<?= $this->Form->input('telefone',array('id'=>'cadastro_telefone', 'placeholder'=>'TELEFONE'))?>
											</div>
											<div class="eight columns">
												<?= $this->Form->input('facebook',array('id'=>'cadastro_facebook', 'placeholder'=>'FACEBOOK'))?>
											</div>
										</div>
										<div class="row mt10">
											<div class="eight columns">
												<?= $this->Form->input('endereco',array('id'=>'cadastro_endereco', 'placeholder'=>'ENDEREÇO'))?>
											</div>
											<div class="four columns">
												<?= $this->Form->input('cep',array('id'=>'cadastro_cep', 'placeholder'=>'CEP'))?>
											</div>
										</div>
									
										<div class="row mt10">
											<div class="five columns">
												<label class="custom-select-cadastro1 custom-select-cadastro">
												   <?= $this->Form->input('sexo',array('options'=>array('Masculino','Feminino')))?>
												</label>
											</div>
											<div class="seven columns">
												<label class="custom-select-cadastro">
												      <?= $this->Form->input('onde_conheceu',array('options'=>array('Onde nos conheceu?','Google','Facebook','Rádio','Outros')))?>
												</label>
											</div>																					
										</div>	
										<div class="mt10">
											<label>
												  <?= $this->Form->input('image',array('id'=>'imagem', 'class'=>'imagem-editar-perfil','type'=>'file','value'=>'null'))?>
											</label>
										</div><br /><br />										
										<div class="row mt10">
											<div class="twelve columns">
												<?= $this->Form->input('text',array('type'=>'textarea', 'placeholder'=>'SOBRE VOCÊ'))?>
											</div>
										</div>																				
									</div>
								</div>
								<div id="tabs-2">
									<div class="row">
										 <ul class="list-preferencias3">
										 	<?php foreach($interesses as $interesse): ?>
												<li class="field">
													<label class="checkbox checked" for="check1">
														<input name="data[User][interesse][]" id="check1" value="<?= $interesse['Interesse']['id']?>" type="checkbox" >
														<span></span> <?= $interesse['Interesse']['nome']?>
													</label>
												</li>
											<?php endforeach; ?>
										</ul>											
									</div>
								</div>
							</div>
							
							<div class="row mt10">
								<div class="four columns f-right">
									<button id="passo1" class="button button-black button-radius">Salvar</button>
								</div>
							</div>							
						<?= $this->Form->end(null); ?>
						<!--fim-->
					</div>
				</div>
			</div>
		</div>
		<div class="four columns">
			<div class="row">
				<span class="icon-categoria"></span><span class="titulo-categoria">Fazer Login</span>
			</div>
			<div class="row texto mt10">
				Se você já possuí um cadastro, por favor faça login no formulário abaixo.
			</div>
			<div class="row form-login">
						
					<div class="row">
						<?php echo $this->Form->create('User', array(
					    	'inputDefaults' => array(
							        'label' => false,
							        'div' => false
							    	),
							    'class'=>'',
							    'id'=>'form-login',
							    'action'=>'login',							   	
								));
							?>
						<div class="row">
							<?= $this->Form->input('username',array('placeholder'=>'SEU E-MAIL'))?>
						</div>
						<div class="row mt10">
							<?= $this->Form->input('password',array('placeholder'=>'SUA SENHA'))?>
						</div>
						<?= $this->Form->end(null); ?>
						<div class="row mt10">
							<div class="six columns">
								<a href="/users/esqueceu" class="esqueceu-senha">Esqueceu sua senha?</a>
							</div>
							<div class="four columns f-right">
								<button class="button button-black2 button-radius">ENTRAR</button>
							</div>
						</div>
						<div class="row mt45">
							<div class="six columns">
								<a href="" class="login-redes">Conectar via Redes Sociais</a>
							</div>
							<div class="six columns f-right login-redes-add">
								
									<?= $this->element('login_redesocial')?>
								
							</div>
						</div>
					</div>
				
			</div>
		</div>
	</div>
</div>