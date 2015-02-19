<?php //if($_GET['abas'] == 'sim'){ ?>

<!-- Accordion das abas-->
<div id="accordion">
	
	<?php if(isset($business['AbasBusiness']) && !empty($business['AbasBusiness'])){ //debug($business['AbasBusiness']); 
		foreach($business['AbasBusiness'] as $Aba){ ?>
			 <h3><?php echo $Aba['titulo']; ?></h3>
			<div>
				<p>
					<?php echo $Aba['conteudo']; 
					if(isset($Aba['imagem_principal_conteudo']) && !empty($Aba['imagem_principal_conteudo'])){?>
						<img src="<?php echo $Aba['imagem_principal_conteudo']; ?>"/>
					<?php } ?>	
				</p>
			</div>
		<?php } 
	  } ?>
</div>



<?php //} ?>
<div class="line-drop-1"></div>
<div class="line-drop-1"></div>

<div id="tabs10" class="row nav-tabs-estabelecimentos">
	<ul class="row">
		<li><a href="#tabs-1">informações sobre</a></li>
		<li><a href="#tabs-2">mapa</a></li>
		<li><a href="#tabs-3">fotos</a></li>
		
		<li><a href="#tabs-4">nesta área</a></li>
	</ul>
	<div class="conteudo-tabs-estabelecimentos">
		<div class="row">
			<div id="tabs-1">
				<div class="row">
					<ul class="sub-conteudo">
						<li class="bloco-left">
							
							<span class="row"><a href="mailto:<?= $business['Business']['email'] ?>"><img src="/img/icon-email.jpg" /> </a></span>
						</li>
						<li class="bloco-right">
							
							<span class="row"><a href="<?= $business['Business']['site'] ?>" target="_blank"><img src="/img/icon-site.jpg" /></a></span>
						</li>
					</ul>					
					<ul class="sub-conteudo">
						<li class="bloco-left">
							<h3 class="row">Endereço</h3>
							<span class="row"><?= $business['Business']['address'] ?></span>
						</li>
						<li class="bloco-right">
							<h3 class="row">Telefone(s)</h3>
							<span class="row"><?= $business['Business']['phone'] ?></span>
						</li>
					</ul>
					<?php if (!empty($business['Business']['specialty'])): ?>
					<ul class="sub-conteudo">
						<?php if (!empty($business['Business']['specialty'])): ?>
						<li class="bloco-left">
							<h3 class="row">Especialidade</h3>
							<span class="row"><?= $business['Business']['specialty'] ?></span>
						</li>
						<?php endif; ?>
						<?php if (!empty($business['Business']['average_price'])): ?>
						<li class="bloco-right">
							<h3 class="row">Média de Preço por Pessoa</h3>
							<span class="row"><?= $business['Business']['average_price'] ?></span>
						</li>
						<?php endif; ?>
					</ul>
					<?php endif; ?>
					<ul class="sub-conteudo">
						<li class="bloco-left">
							<h3 class="row">Região</h3>
							<span class="row"><?= $business['Business']['region'] ?></span>
						</li>
						<li class="bloco-right">
							<h3 class="row">Funcionamento</h3>
							<span class="row">
								<?= $business['Business']['business_hours'] ?>
							</span>
						</li>
					</ul>
					<ul class="sub-conteudo" style="border-bottom:none;">
						<li class="bloco-left">
							<h3 class="row">Estacionamento</h3>
							<span class="row"><?= $business['Business']['parking'] ?></span>
						</li>
						<li class="bloco-right">
							<h3 class="row">Manobrista</h3>
							<span class="row"><?= $business['Business']['valet'] ?></span>
						</li>
					</ul>
				</div>
			</div>
			
			<div id="tabs-2">
				<div class="row">
					<div id="map_canvas"></div>
				</div>
			</div>
			<div id="tabs-3">
				<div class="box-galeria-estabelecimento">
					
					<ul>
						<?php foreach($business['File'] as $file): ?>
							<li><a href="#"><img  href="<?= $_URL_FILE; ?>businesses/fotos/640x480-<?= $file['name']?>" title="<?= $file['titulo']?>" class="janela-modal img-border border"  src="<?= $_URL_FILE; ?>businesses/fotos/640x480-<?= $file['name']?>" width="130" /></a></li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
			<div id="tabs-4">
				<div class="row">
					<div class="seven columns">
						<div id="map_canvas"></div>
					</div>
					<div class="five columns nesta-area">
						<h3 class="row mb10">Confira os estabelecimentos mais próximos!</h3>
					
						
						<!--Categoria
						<div class="mt5 mb5">
							<a href=""><?= $business['Category']['name'] ?></a>
						</div>-->
						<ul>
							<?php if(count($mesmasareas)>1): ?>
							<?php foreach($mesmasareas as $nestaarea): ?>
								<?php if($nestaarea['Business']['id'] != $business['Business']['id']): ?>
									<!--Estabelecimentos-->
									<li>
										<a href="/estabelecimentos/ver/<?= $nestaarea['Business']['url'] ?>"><?= $nestaarea['Business']['name'] ?></a>
									</li>
								<?php endif; ?>
							<?php endforeach; ?>
							<?php else: ?>
								Não há nenhum outro estabelecimento próximo.
							<?php endif; ?>
						</ul>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



<!-- Scripts e Styles que fazem o Gmaps aparecer -->
<script>
  $(document).ready(function() {          
     gerarMapa(".<?= $business['Business']['address']?>.");

  });
</script>
<!-- Fim Scripts e Styles que fazem o Gmaps aparecer -->