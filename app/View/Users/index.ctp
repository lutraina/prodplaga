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
						<li><a href="#tabs-1">CONVIDE SEUS AMIGOS</a></li>
						<a class="link-tab" href="/users/cupons">MINHAS VANTAGENS</a>
						<!--<a class="link-tab" href="/users/favoritos">FAVORITOS</a>-->
					</ul>
					<div class="conteudo-tabs-estabelecimentos">
						<?php echo $this->Form->create('Convite', array(
					    	'inputDefaults' => array(
							        'label' => false,
							        'div' => false
							    	),
							    'class'=>'form',
							    'id'=>'form-cadastro',	
							    'action'=>''	   	
								));
							?>
							<div class="row">
								<div id="tabs-1">
									<div class="row">
										
										<div class="row">
											<div class="eight columns">
												<?= $this->Form->input('nome',array('placeholder'=>'Nome completo'))?>
												
											</div>
											<div class="four columns">
												<?= $this->Form->input('email',array('placeholder'=>'E-mail do seu amigo'))?>
		
											</div>
										</div>
										<div class="row mt10">
											<div class="four columns f-right">
												<button class="button button-black5 button-radius">CONVIDAR AMIGO</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?= $this->Form->end(null); ?>
					</div>
				</div>
			</div>
			<div class="row mt30">
				<span class="icon-categoria"></span><span class="titulo-categoria">Amigos convidados</span>
			</div>
			<div class="row mt10">
				<ul class="box-list-convidados">
					<li class="row first">
						<div class="one column"><center><b>Num.</b></center></div>
						<div class="five columns"><center><b>Nome</b></center></div>
						<div class="four columns"><center><b>E-mail</b></center></div>
						<div class="two columns"><center><b>Status</b></center></div>
					</li>
					<?php foreach($user['Convite'] as $convidado):?>
					<li class="row">
						<div class="one column"><center>1</center></div>
						<div class="five columns"><center><?= $convidado['nome'] ?></center></div>
						<div class="four columns"><center><?= $convidado['email'] ?></center></div>
						<div class="two columns"><center><?= $convidado['aceito'] ?></center></div>
					</li>
					<?php endforeach;; ?>
				</ul>
			</div>
		</div>
		<div class="four columns">
			<?php echo $this->element('bloco_lateral_user'); ?>
		</div>
	</div>
</div>
