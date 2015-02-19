<div class="users">
	<div class="row mt20">
		<div class="eight columns">
			<div class="row">
				<?php echo $this->Session->flash(); ?>
			</div>
			<div class="row">
				<span class="icon-categoria"></span><span class="titulo-categoria">Painel do usuário</span>
			</div>
			<div class="row texto mt10">
				Bem vindo ao seu painel de usuário
			</div>
			<div class="row mt20">
				<div id="tabs" class="row nav-tabs-estabelecimentos">
					<ul class="row">
						<li><a href="#tabs-1">CONVIDE SEUS CONHECIDOS</a></li>
						<a class="link-tab" href="/atendimento/contato">FALECONOSCO</a>
					</ul>
					<div class="conteudo-tabs-estabelecimentos">
						<form class="form">
							<div class="row">
								<div id="tabs-1">
									<div class="row">
										
										<div class="row">
											<div class="eight columns">
												<input type="text" name="" placeholder="NOME COMPLETO">
											</div>
											<div class="four columns">
												<input type="text" name="" placeholder="E-MAIL">
											</div>
										</div>
										<div class="row mt10">
											<div class="four columns f-right">
												<button class="button button-black button-radius">CONVIDAR AMIGO</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="four columns">
			<div class="box-info-user">
				<div class="row texto mt10">
					<div class="eight columns">
						<a class="link-editar-perfil" href="/users/conta">Editar Perfil</a>
					</div>
					<div class="four columns">
						<a class="button-users-sair" href="/users/logout">SAIR / LOGOUT</a>
					</div>
				</div>
				<div class="row texto mt10">
					<?= $logged_in['text'] ?>
				</div>
				<div class="row mt20">
					<img class="foto" src="/img/avatar.png" style="width:265px;height:220px;"/>
				</div>
				<div class="row mt20">
					<h2 class="row">Informações Pessoais</h2>
					<h4 class="row mt10">Nome</h4>
					<span class="row"><?= $logged_in['name'] ?></span>
					<h4 class="row mt10">Facebook</h4>
					<span class="row"><?= $logged_in['facebook'] ?></span>					
					<h4 class="row mt10">Telefone</h4>
					<span class="row"><?= $logged_in['telefone'] ?></span>
					<h4 class="row mt10">E-mail</h4>
					<span class="row"><?= $logged_in['username'] ?></span>
					<h4 class="row mt10">Endereço</h4>
					<span class="row"><?= $logged_in['endereco'] ?>, CEP - <?= $logged_in['cep'] ?></span>
				</div>
				<div class="row mt20">
					<div class="sub-bloco-title">
						<span>Preferências <a href="/users/preferencias">Editar</a></span>
					</div>
				</div>
				<div class="row mt10">
					<form class="form-info-user">
						<ul>
							<li class="field">
								<div class="row">
									<div class="six columns">
										<label class="checkbox checked" for="check1">
											<input name="checkbox[]" id="check1" value="1" type="checkbox" checked="checked">
											<span></span> Checkbox 1
										</label>
										<label class="checkbox" for="check2">
											<input name="checkbox[]" id="check2" value="2" type="checkbox">
											<span></span> Checkbox 2
										</label>
									</div>
									<div class="six columns">
										<label class="checkbox checked" for="check1">
											<input name="checkbox[]" id="check1" value="1" type="checkbox" checked="checked">
											<span></span> Checkbox 3
										</label>
										<label class="checkbox" for="check2">
											<input name="checkbox[]" id="check2" value="2" type="checkbox">
											<span></span> Checkbox 4
										</label>
									</div>
								</div>
							</li>
						</ul>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
