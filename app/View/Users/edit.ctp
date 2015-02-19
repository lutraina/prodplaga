<div class="users">
	<div class="row mt20">
		<div class="row">
			<span class="icon-categoria"></span><span class="titulo-categoria">Perfil de: <?= $logged_in['name'] ?> </span>
		</div>
		<div class="row texto mt10">
			<a href="/users">Painel do usuário</a> / Alterar minha senha
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
					    'class'=>'form-login',
					    'id'=>'form-cadastro',
					   	
						));
					?>				
					<div class="row mt20 mb20">
						<div class="two columns"></div>
						<div class="eight columns">
							<div class="row mb20">
								<?php echo $this->Session->flash(); ?>
							</div>
							<div class="row">
								<?= $this->Form->input('oldpassword',array('type'=>'password','placeholder'=>"Digite a senha atual"))?>
							</div>
							<div class="row mt10">
								<?= $this->Form->input('password',array('id'=>'cadastro_nome', 'placeholder'=>'Agora sua nova senha'))?>
							</div>
							<div class="row mt10">
								<?= $this->Form->input('password_confirmation',array('type'=>'password','placeholder'=>'Confirme sua  senha'))?>
							</div>							
							<div class="row mt10">

								<div class=" columns f-right">
									<button class="button button-black2 button-radius">Confirmar alteração</button>
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