<?php echo $this->element('bloco_redes_sociais'); ?>
<div class="row">
	<div class="six columns">
		<div class="row texto-footer1">
			<div class="f-left default">
				<span class="icon-categoria"></span>
				<span class="titulo-categoria">Mapa do Site</span>
			</div>
		</div>
		<div class="row mt10">
			<div class="eight columns">
				<ul class="nav-mapa-site">
					<li class="agenda nav-mapa-site">
						<a href="/agenda">
							Agenda
						</a>
					</li>
					<li class="moda-e-estilo nav-mapa-site">
						<a href="/estabelecimentos/moda-e-estilo">
							Moda
						</a>
					</li>
					<li class="vantagens nav-mapa-site">
						<a href="/vantagens">
							Vantagens
						</a>
					</li>
					<li class="bem-estar nav-mapa-site">
						<a href="/estabelecimentos/bem-estar">
							Bem Estar
						</a>
					</li>
					<li class="noticias nav-mapa-site">
						<a href="/noticias">
							Notícias
						</a>
					</li>
					<li class="educacao nav-mapa-site">
						<a href="/estabelecimentos/educacao">
							Educação
						</a>
					</li>
					<li class="diversao nav-mapa-site">
						<a href="/estabelecimentos/diversao">
							Diversão
						</a>
					</li>
					<li class="pet-e-agro nav-mapa-site">
						<a href="/estabelecimentos/pet-e-agro">
							Pet
						</a>
					</li>
					<li class="gastronomia nav-mapa-site">
						<a href="/estabelecimentosgastronomia">
							Gastronomia
						</a>
					</li>
					<li class="casa nav-mapa-site">
						<a href="/estabelecimentos/pet-e-agro">
							Casa
						</a>
					</li>					
					
					<li class="servicos nav-mapa-site">
						<a href="/estabelecimentos/servicos">
							Serviços
						</a>
					</li>
					<li class="autos nav-mapa-site">
						<a href="/estabelecimentos/autos">
							Autos
						</a>
					</li>					
					<li class="imoveis nav-mapa-site">
						<a href="/estabelecimentos/imoveis">
							Imóveis
						</a>
					</li>
				</ul>
			</div>
			<div class="four columns">
				<ul class="nav-mapa-site">
					<li class="institucional nav-mapa-site">
						<a href="/">
							Home
						</a>
					</li>
					<li class="institucional nav-mapa-site">
						<a href="/institucional">
							Quem Somos
						</a>
					</li>
					<li class="institucional nav-mapa-site">
						<a href="/atendimento/trabalhe">
							Trabalhe Conosco
						</a>
					</li>
					<li class="institucional nav-mapa-site">
						<a href="/atendimento/anuncie">
							Mídia Kit
						</a>
					</li>
					<li class="institucional nav-mapa-site">
						<a href="/atendimento/contato">
							Fale Conosco
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="six columns">
		<div class="row">
			<div class="eight columns">
				<?php if($user == 0): ?>
				<div class="row texto-footer1">
					<div class="f-left default">
						<span class="icon-categoria"></span>
						<span class="titulo-categoria"><a href="/users/login">Painel do Usuário</a></span>
					</div>
				</div>
				<div class="row mt30">
					<div class="box-painel-do-usuario">
						<div class="row">
							<?php echo $this->Form->create('User', array(
						    	'inputDefaults' => array(
								        'label' => false,
								        'div' => false,
								        
								    	),
								    'action'=>'login',
								    'id'=>'form-cadastro',
								   	
									));
								?>	
								<div class="row">
									<?= $this->Form->input('username',array('class'=>'input-painel-usuario1', 'placeholder'=>'SEU E-MAIL'))?>
									<?= $this->Form->input('password',array('class'=>'input-painel-usuario2 ', 'placeholder'=>'SUA SENHA'))?>									

								</div>
								<div class="row mt5">
									<div class="eight columns">
										<div class="row mt5">
											<div class="five columns">
												<a class="link-painel f-right" href="/users/add">Cadastrar</a>
											</div>
											<div class="seven columns">
												<a class="link-painel" href="/users/esqueceu">Esqueceu a senha?</a>
											</div>
										</div>
									</div>
									<div class="four columns">
										<button type="submit" class="button-painel-usuario">Entrar</button>
									</div>
								</div>
							<?= $this->Form->end(null); ?>
						</div>
						<div class="row texto-painel2">
							ou acesse usando as redes sociais
						</div>
						<div class="row mt5">
							<?= $this->element('login_redesocial'); ?>
						</div>
					</div>
				</div>
				<?php endif; ?>
			</div>
			<div class="four columns box-footer-media">
				<div class="row mt40">
					<a href="/"><center><img src="/img/logo-miniatura.png" /></center></a>
				</div>
				<div class="row mt5">
<!--					<span class="texto-mediappeal upper">realizado por:</span>-->
				</div>
			</div>
		</div>
	</div>
</div>
