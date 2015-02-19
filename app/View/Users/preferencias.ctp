<div class="users">
	<div class="row mt20">
		<div class="row">
			<span class="icon-categoria"></span><span class="titulo-categoria">Perfil de: <?= $logged_in['name'] ?> </span>
		</div>
		<div class="row texto mt10">
			<a class="link-top-user" href="/users">Painel do usuário</a> / Editar minhas preferências
		</div>
		<div class="row mt10">
			<?php echo $this->Session->flash(); ?>
		</div>
		<div class="row">
			<div class="eight columns">
				
				<div id="tabs" class="row nav-tabs-estabelecimentos">
					<ul class="row mt10">
						<li><a href="#tabs-1">EDITAR PREFERÊNCIAS</a></li>
						<a class="link-tab" href="/users">CONVIDE SEUS CONHECIDOS</a>
					</ul>
					<div class="conteudo-tabs-estabelecimentos">
						
						<div class="row">
							<div id="tabs-1">
																	<!--form-->
									<?php echo $this->Form->create('User', array(
								    	'inputDefaults' => array(
										        'label' => false,
										        'div' => false
										    	),
										    'class'=>'form-info-user',
										    'id'=>'form-cadastro',
										   	
											));
										?>	
								<div class="row">	
									<ul class="list-preferencias">								
										<?php foreach($interesses as $interesse): ?>
											
											<li>
												<label>
													<input name="data[User][interesse][]" value="<?= $interesse['Interesse']['id']?>" type="checkbox" <?= in_array($interesse['Interesse']['id'], $meus_interesses)? 'checked' : ' ' ?> >
													<span><?= $interesse['Interesse']['nome']?></span>
												</label>
											</li>
										<?php endforeach; ?>
									</ul>
									
								</div>
								<div class="row mt10">
									<div class="four columns f-right">
										<button class="button button-black5 button-radius">SALVAR</button>
									</div>
								</div>
								<?= $this->Form->end(null); ?>
							</div>
						</div>
					</div>
				</div>				
			</div>
			<div class="four columns">
			<?php echo $this->element('bloco_lateral_user'); ?>
		</div>
		</div>
	</div>
</div>																			