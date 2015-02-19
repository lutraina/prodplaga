<div class="users">
	<div class="row mt20">

		<div class="twelve columns">
			<div class="row mb20">
				<?php echo $this->Session->flash(); ?>
			</div>
			<div class="row">
				<span class="icon-categoria"></span><span class="titulo-categoria"><?= $logged_in['name'] ?></span>
			</div>
			
			<div class="row texto mt10">
				<a href="/users">Painel do usuário</a> /  Editar meu perfil
			</div>
			<div class="row mt20">
				<div id="tabs" class="row nav-tabs-estabelecimentos">
					<ul class="row">
						<li><a href="#tabs-1">SUAS INFORMAÇÕES</a></li>
						<a href="/users/edit">Alterar minha senha</a>
						<a href="/users/preferencias">Editar minhas referências</a>
						
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
										<div class="row mt10">
											<div class="twelve columns">
												<?= $this->Form->input('text',array('type'=>'textarea', 'placeholder'=>'SOBRE VOCÊ'))?>
											</div>
										</div>																				
									</div>
								</div>
							</div>
							
							<div class="row mt10">
								<div class="four columns f-right">
									<?= $this->Form->input('id',array('type'=>'hidden'))?>
									<button id="passo1" class="button button-black button-radius">Salvar</button>
								</div>
							</div>							
						<?= $this->Form->end(null); ?>
						<!--fim-->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>