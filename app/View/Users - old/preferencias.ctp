<div class="users">
	<div class="row mt20">
		<div class="row">
			<span class="icon-categoria"></span><span class="titulo-categoria">Perfil de: <?= $logged_in['name'] ?> </span>
		</div>
		<div class="row texto mt10">
			<a href="/users">Painel do usuário</a> / Editar minhas preferências
		</div>
		<div class="row">
			<div class="three columns">
			</div>
			<div class="six columns">
				
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
					<div class="row mt20 mb20">
						<div class="two columns"></div>
						<div class="eight columns">
							<?php foreach($interesses as $interesse): ?>
								<label class="checkbox checked" for="check1">
									<input name="data[User][interesse][]" id="check1" value="<?= $interesse['Interesse']['id']?>" type="checkbox">
									<span></span> <?= $interesse['Interesse']['nome']?>
								</label>
							<?php endforeach; ?>
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