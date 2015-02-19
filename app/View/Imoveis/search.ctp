  <script>
  /* when document is ready */
  $(function(){

    /* initiate the plugin */
    $("div.holder").jPages({
      containerID  : "itemContainerClassificado",
      perPage      : 10,
      startPage    : 1,
      startRange   : 1,
      midRange     : 5,
      endRange     : 1,
        first       : false,
        previous    : " ",
        next        : " ",
        last        : false
    });

  });
  </script>
<div class="classificados imoveis">
	<div class="row mt20">
		<div class="eight columns">
			<div class="row mb20">
				<?php echo $this->Session->flash(); ?>
			</div>
			<div class="row mt20">
				<div id="tabs4" class="nav-tabs-classificados">
					<ul class="row mb20">
						<li><a href="#tabs-1">Quero Comprar</a></li>
						<li><a href="#tabs-2">Quero Vender</a></li>
						<li><a href="#tabs-3">Quero Alugar</a></li>
					</ul>
					<div id="tabs-1">
						<form class="form" action="/imoveis/search" method="GET">
							<input type="hidden" name="tipo" value="venda" />
							<?= $this->element('busca_imoveis') ?>
						</form>
						<div class="row">
							<a href=""><img src="/img/banner-nike.png" /></a>
						</div>
						<div class="row mt20">
							<h2 class="color">Classificados</h2>
						</div>
						<!--listagem anúncios-->
							<div id="itemContainerClassificado">
								<?php foreach($classificados as $classificado): ?>
								<div class="row mt20">
									<table class="tabela-classificados" cellpadding="0" cellspacing="0" id="tab_list"><!-- block table => table-infinite -->
									    <!--
									    <thead>
									        <tr>
									        	<th style="width:150px; text-align: center">Imagem</th>
									        	<th style="width:95px; text-align: center">Descrição</th>
									            <th style="width:85px; text-align: center">Portas</th>
									            <th style="width:85px; text-align: center">Ano</th>
									            <th style="width:90px; text-align: center">Proprietário</th>
									            <th style="width:110px; text-align: center">Valor(R$)</th>
									        </tr>
									    </thead>
									    -->
									    <tbody>
									    	<tr>
									    		<th style="width:150px; text-align: center">
									    			<a href="/imoveis/ver/<?= $classificado['Imovei']['id'] ?>"><img src="<?= $_URL_FILE; ?>imoveis/fotos/B-<?= $classificado['File'][0]['name']?>" width="150" height="90" /></a>
									    		</th>
									        	<th style="width:125px; text-align: center;border-right:1px solid #cccccc;">
									        		<?= $classificado['Imovei']['tipo'] ?><br /> <?= $classificado['Imovei']['quartos'] ?> quartos
									        	</th>
									            <th style="width:135px; text-align: center;border-right:1px solid #cccccc;">				            	
									            	Disponível para:
									            	<?= $classificado['Imovei']['situacao'] ?>
									            </th>
									            <th style="width:110px; text-align: center;border-right:1px solid #cccccc;">
									            	<center><i class="icon-classificados-valor"></i></center>
									            	R$ <?= $classificado['Imovei']['preco'] ?>
									            </th>
									            <th style="width:110px; text-align: center;">
									            	<span class="row texto-vendedor">Vendedor</span>
									            	<div class="row texto-vendedor color mt5"><?= $classificado['Imovei']['vendedor'] ?></div>
									            	<div class="row mt10">
									            		<a href="/imoveis/ver/<?= $classificado['Imovei']['id'] ?>"><button class="button button-radius button-black3-1" href="">Mais informações</button></a>
									            	</div>
									            </th>
											</tr>
												
									    </tbody>
									</table>
								</div>
							
								<?php endforeach; ?>
							</div>						
					</div>
					<div id="tabs-2">
						<?= $this->element('vender_imoveis')?>
					</div>
					<div id="tabs-3">
						<form class="form" action="/autos/search" method="GET">
							<input type="hidden" name="tipo" value="aluguel" />
							<?= $this->element('busca_auto') ?>
						</form>
						<div class="row">
							<a href=""><img src="/img/banner-nike.png" /></a>
						</div>
						<div class="row mt20">
							<h2 class="color">Classificados</h2>
						</div>
						<!--listagem anúncios-->
						<div id="itemContainerClassificado">
								<?php foreach($classificados2 as $classificado): ?>
								<div class="row mt20">
									<table class="tabela-classificados" cellpadding="0" cellspacing="0" id="tab_list"><!-- block table => table-infinite -->
									    <!--
									    <thead>
									        <tr>
									        	<th style="width:150px; text-align: center">Imagem</th>
									        	<th style="width:95px; text-align: center">Descrição</th>
									            <th style="width:85px; text-align: center">Portas</th>
									            <th style="width:85px; text-align: center">Ano</th>
									            <th style="width:90px; text-align: center">Proprietário</th>
									            <th style="width:110px; text-align: center">Valor(R$)</th>
									        </tr>
									    </thead>
									    -->
									    <tbody>
									    	<tr>
									    		<th style="width:150px; text-align: center">
									    			<a href="/imoveis/ver/<?= $classificado['Imovei']['id'] ?>"><img src="<?= $_URL_FILE; ?>imoveis/fotos/B-<?= $classificado['File'][0]['name']?>" width="150" height="90" /></a>
									    		</th>
									        	<th style="width:125px; text-align: center;border-right:1px solid #cccccc;">
									        		<?= $classificado['Imovei']['tipo'] ?><br /> <?= $classificado['Imovei']['quartos'] ?> quartos
									        	</th>
									            <th style="width:135px; text-align: center;border-right:1px solid #cccccc;">				            	
									            	Disponível para:
									            	<?= $classificado['Imovei']['situacao'] ?>
									            </th>
									            <th style="width:110px; text-align: center;border-right:1px solid #cccccc;">
									            	<center><i class="icon-classificados-valor"></i></center>
									            	R$ <?= $classificado['Imovei']['preco'] ?>
									            </th>
									            <th style="width:110px; text-align: center;">
									            	<span class="row texto-vendedor">Vendedor</span>
									            	<div class="row texto-vendedor color mt5"><?= $classificado['Imovei']['vendedor'] ?></div>
									            	<div class="row mt10">
									            		<a href="/imoveis/ver/<?= $classificado['Imovei']['id'] ?>"><button class="button button-radius button-black3-1" href="">Mais informações</button></a>
									            	</div>
									            	
									            </th>
											</tr>
												
									    </tbody>
									</table>
								</div>
							
								<?php endforeach; ?>
							</div>
					</div>
				</div>
			</div>
			<!--paginação-->
			<div class="row mt20">
				<!-- navigation holder gastronomia -->
				<div class="holder"></div>
			</div>
		</div>
		<div class="four columns">
			<?php if(count($banner_lateral) >=1 ):?>
			<div class="row mb20 mt20">
				<?php foreach($banner_lateral as $banner_lat): ?> 
					<?php if($banner_lat['Banner']['tipo'] == 'image'): ?>
						<a target="<?= $banner_lat['Banner']['target'] ?>" href="<?= $banner_lat['Banner']['link'] ?>" class='click' data-click="<?= $banner_lat['Banner']['id'] ?>">
							<img src="<?= $_URL_FILE; ?>banners/fotos/<?= $banner_lat['Banner']['image'] ?>"  width="100%" />
						</a>
					<?php else: ?>	
						<?= $banner_lateral['Banner']['cod'] ?>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>
			<div class="row mt20">
				<div class="row mb20">
					<div class="mais-vistos">
						<div class="row">
							<div class="box-categoria bdge">
								<div class="icon-categoria-default"></div>
								<span>Veja também</span>
							</div>
						</div>
						<ul class="listagem">
							<?php foreach($maislidas as $key => $maislida): ?>
								<li>
									<div class="row">
										<div class="twelve columns">
											<span class="row titulo"><a class="color" href="/estabelecimentos/ver/<?= $maislida['Business']['url'] ?>"><?= $maislida['Business']['name'] ?></a></span>
											
											<span class="row local"><a class="color" href="/estabelecimentos/ver/<?= $maislida['Business']['url'] ?>"><?= $maislida['Business']['address']?></a></span>
										</div>
									</div>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
			</div>
			<?php if(count($bloco_banners_lateral) >=1 ):?>
			<div class="row mb20">
				<?php foreach($bloco_banners_lateral as $bloco_banners): ?> 
					<?php if($bloco_banners['Banner']['tipo'] == 'image'): ?>
						<a target="<?= $bloco_banners['Banner']['target'] ?>" href="<?= $bloco_banners['Banner']['link'] ?>" class='click' data-click="<?= $bloco_banners['Banner']['id'] ?>">
							<img src="<?= $_URL_FILE; ?>banners/fotos/<?= $bloco_banners['Banner']['image'] ?>"  width="100%" />
						</a>
					<?php else: ?>	
						<?= $bloco_banners_lateral['Banner']['cod'] ?>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>
		</div>
	</div>	
</div>