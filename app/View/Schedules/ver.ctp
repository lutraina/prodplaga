<!--script maps-->
<script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="http://google-maps-utility-library-v3.googlecode.com/svn/trunk/markermanager/src/markermanager.js"></script>
<script src="/js/mapa.js"></script>
<div class="agenda">
	<div class="row mt20">
		<div class="eight columns">
			<div class="post-aberto">
				<div class="row">
					<?php if(!empty($schedule['Schedule']['image'])) :?>
					<img src="<?= $_URL_FILE ?>schedules/fotos/635x250-<?= $schedule['Schedule']['image'] ?>" width="100%"/><!--160x70-->
					<div class="box-post-destaque">
						<div class="row">
							<div class="post-destaque-categoria upper">
								<div class="icon-categoria-default"></div>
								<span>
									<a href="/agenda/<?= $schedule['Category']['url'] ?>/<?= $schedule['Category']['id'] ?>"><?= $schedule['Category']['name']?></a>
								</span>
							</div>
							<div class="post-destaque-categoria upper">
								<div class="icon-data-evento"></div>
								<div class="box-data-evento">
									<span class="row upper">data</span>
									<span class="row"><?= date("d/m/Y", strtotime($schedule['Schedule']['date_of_event']));?></span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="post-destaque-titulo"><?= $schedule['Schedule']['title']?></div>
						</div>
					</div>
					<?php endif; ?>
				</div>
				<div class="row titulo upper mt10">
					<?= $schedule['Schedule']['title']?>
				</div>
				<div class="row texto mt10">
					 <?= $schedule['Schedule']['text']?> 
				</div>
				<!--galeria de fotos do post-->
				<div class="row mt20">
					<div id="tabs10" class="row nav-tabs-estabelecimentos">
						<ul class="row">
							<li><a href="#tabs-1">informações sobre</a></li>
							<li><a href="#tabs-2">mapa</a></li>
							
						</ul>
						<div class="conteudo-tabs-estabelecimentos">
							<div class="row">
								<div id="tabs-1">
									<div class="row">
										<ul class="sub-conteudo">
											<li class="bloco-left">
												<h3 class="row">Onde</h3>
												<span class="row"><?= $schedule['Schedule']['local']?></span>
											</li>
											<li class="bloco-right">
												<h3 class="row">Endereço</h3>
												<span class="row"><?= $schedule['Schedule']['address']?></span>
											</li>
										</ul>
										<ul class="sub-conteudo">
											<li class="bloco-left">
												<h3 class="row">Quando</h3>
												
												<?php 
													$data = explode(";", $schedule['Schedule']['date_of_event']);
													foreach($data as $date):
												?>
													
												<span class=""><?= date("d/m", strtotime($date)) ?></span> | 
												<?php endforeach; ?>
												
											</li>
											<li class="bloco-right">
												<h3 class="row">Horário</h3>
												<?= date("H:i", strtotime($schedule['Schedule']['schedule'])) ?>
												
											</li>
										</ul>
									</div>
								</div>
								<div id="tabs-2">
									<!-- Scripts e Styles que fazem o Gmaps aparecer -->
								    <script>
								      $(document).ready(function() {          
								         gerarMapa(".<?= $schedule['Schedule']['address']?>.");
								
								      });
								    </script>
									<!-- Fim Scripts e Styles que fazem o Gmaps aparecer -->
									<div id="map_canvas"></div>
						            <!--
									<iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.br/maps?f=q&amp;source=s_q&amp;hl=pt-BR&amp;geocode=&amp;q=Paris+6+Bistr%C3%B4&amp;aq=&amp;sll=-18.577962,-45.451757&amp;sspn=14.400206,26.784668&amp;ie=UTF8&amp;hq=Paris+6+Bistr%C3%B4&amp;hnear=&amp;t=m&amp;z=6&amp;iwloc=A&amp;cid=13842970946314884185&amp;ll=-23.561996,-46.666038&amp;output=embed"></iframe>
									-->
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--bloco de comentários-->
				<div class="row mt20">
					<div class="row mb20">
						<span class="icon-comments"></span>
						<h2>Comentários</h2>
					</div>
					<div class="fb-comments" data-href="<?= $current_url ?>" data-width="630"></div>
				</div>
			</div>
		</div>
		<div class="four columns">
			<?php if(count($banner_lateral) >=1 ):?>
			<div class="row mb20">
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
			<div class="row mb20">
				<?php echo $this->element('bloco_agenda_lateral'); ?>
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
	
	<?php echo $this->element('bloco_redes_sociais'); ?>
</div>