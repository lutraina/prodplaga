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
	<div class="row mt20" style="text-align: center;">
		<?php if(!empty($logged_in['image'])): ?>
			<?php if($logged_in['tipo'] != 'site'):  ?>
				<img class="foto" src="<?= $logged_in['image'] ?>" style="max-width:228px;"/>
			<?php else:  ?>
				<img class="foto" src="<?= $_URL_FILE ?>users/fotos/228x228-<?= $logged_in['image'] ?>" style="max-width:228px;"/>
			<?php endif; ?>
		<?php else: ?>
			<img class="foto" src="/img/avatar.png" style="max-width:228px;"/>
		<?php endif; ?>
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
			
		
		<ul class="list-preferencias2">								
			<?php foreach($interesses_user as $interesse): ?>
				<li>
					<span><?= $interesse['Interesse']['nome']?></span>
				</li>
			<?php endforeach; ?>
		</ul>
		<?= $this->Form->end(null); ?>
	</div>
</div>