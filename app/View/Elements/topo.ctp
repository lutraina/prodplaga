<!-- BANNER TOPO  => banner como o da clinica Shalon que tem 728 x 90 -->


<div class="row sub-header2" style="height:90px;">
	<div class=" columns">
		<a href="/"><img  style="width:125px; height:48px;" class="logo" src="/img/logo_plaga.png" /></a>
	</div>
	
	<div style="color:#fff; font-size:26px; font-weight: bold; width:180; margin-left:194px; margin-top:10px;">
		<?php echo $regiao[0]['Regions']['nome_regiao']; ?>
	</div>
<form action="/search" method="GET">
	<div style="color:#444; font-size:14px; font-weight: bold; margin-left:380px; margin-top:-48px;">
		<input style="width:250px;" class="input input-radius input-pesquisa" type="text" name="por" value="<?= isset($_GET['por']) ? $_GET['por']: ''?>" placeholder="O que você procura?" />
	</div>
	<div class="" style="margin-top:-20px;">
		<button class="button button-radius button-pesquisa">..</button>
	</div>
</form>	

	
	<div class="row box-login-top">
			<?php if(isset($user)): ?>
				<?php if($user == 0): ?>
					<div class=" ">
						<a href="<?= $facebook_auth_url ?>" class="button-connecte"></a>
					</div>
					<div class="row">
						<span class="texto-login-top">ou clique aqui para cadastrar-se</span>
						<div class="box-painel-do-usuario-top">
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
										<?= $this->Form->input('username',array('class'=>'input-login-top', 'placeholder'=>'SEU E-MAIL'))?>
										<?= $this->Form->input('password',array('class'=>'input-login-top mt10', 'placeholder'=>'SUA SENHA'))?>
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
											<button type="submit" class="button button-radius button-black2">Entrar</button>
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
							<div class="row mt10 mb5">
								<span class="texto-login-top2">fechar</span>
							</div>
						</div>
					</div>			
					<div class="row">		
					<?php else: ?>
						<div class="four columns">
							<div class="imagem-logado">
								<?php if(!empty($logged_in['image'])): ?>
									<?php if($logged_in['tipo'] != 'site'):  ?>
										<img class="foto" src="<?= $logged_in['image'] ?>" style="width:100%;"/>
									<?php else:  ?>
										<img class="foto" src="<?= $_URL_FILE ?>users/fotos/228x228-<?= $logged_in['image'] ?>" style="width:100%;"/>
									<?php endif; ?>
								<?php else: ?>
									<img class="foto" src="/img/avatar.png" style="width:100%;"/>
								<?php endif; ?>
							</div>
						</div>
						<div class="eight columns">
							<span class="texto-boas-vindas mt10 mb5">Olá, <?= $logged_in['name'] ?> !</span>
							<span class="link"><a href="/users">Meu perfil </a></span>
							<span class="link-sair"><a href="/users/logout">Sair</a></span>
						</div>
					<?php endif; ?>	
				<?php endif; ?>				
			</div>
		</div>
		
		
		
		
		 
</div>
 
<div class="row sub-header4">
	<?php echo $this->element('menu_principal'); ?>
	<div style="width:729px; margin-top:35px;">
		<!--<img style="width:100%" class="banner1" src="/img/banner1.jpg" />-->
		<!--<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
			<ins class="adsbygoogle"
			     style="display:inline-block;width:729px;height:89px"
			     data-ad-client="ca-pub-4475543678910973"
			     data-ad-slot="9710819406"></ins>
			<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
		</script>-->
	</div>
</div>

<script>/*
$(".input-newsletter").keypress(function(event) {
		if (event.which == 13 ) {
			return false;
		  }
		})    
	$('.button-newsletter').click(function(){
			
			$("#form-newsletter").ajaxForm({
				
		        url: '/newsletter/cadastro/',
		    	beforeSend:function(){
		    	
		    		$('.resultado-newsletter').html('Aguarde...');
		    		
		
		    	},
		        success: function(data) {
					$('.resultado-newsletter').html(data);
		        	
		        },
		        error: function(){
		            mensagem.html('Erro com o arquivo');
		            }
		 
			}).submit()
	       
		})*/
</script>