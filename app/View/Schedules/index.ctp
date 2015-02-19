
<div class="agenda">
	<div class="row mt20">
		<div class="eight columns">
			<div class="row">
				<div class="agenda">
						<div class="bloco-9">
							<div class="row">
								<div class="row">
									<div class="f-left">
										<span class="icon-categoria"></span>
										<span class="titulo-categoria">Agenda</span>
									</div>
								</div>
								
								<div class="row  mt20 mb10"></div>
								<div class="row">
									<div class="carousel">
										<ul class="paginacao-programacao">
											
											<?php 
												$montaCalendario = $this->Data->calendar($dataHoje,$filtro); 
												foreach($montaCalendario['dias'] as $dias){
													echo $dias;
												}
											?>
										</ul>
										<button class="prev"></button>
										<button class="next"></button>
									</div>										
								</div>
								<div class="row">
									<div class="row box-divisao mt10 "></div>
										<div class="row  mt10 mb10"></div>
										
										<ul class="filtro-categorias ">
											<li><a href="/agenda/all/0/<?= $dataHoje ?>" class="<?php echo $categoryID==0|| $categoryID==null ? 'current' : ' ';?> ">Todas</a></li>
											<?php foreach($categories as $category): ?>
												<li><a href="/agenda/<?= $category['Category']['url']?>/<?= $category['Category']['id']?>/<?= $dataHoje ?>" class="<?php echo $categoryID==$category['Category']['id'] ? 'current' : ' ';?> "><?= $category['Category']['name']?></a></li>
											<?php endforeach; ?>
						
										</ul>
										
								
								</div>	
								<div class="row box-divisao mt10 mb10"></div>							
							</div>
						</div>
					</div>
			</div>
			
			<!--filtro por categoria-->
			<div class="row mt20">
				
			</div>

			<!--listagem agenda-->
			<?php foreach($categoryLists as $categoryList): ?>
				<div class="row">
					<div class="post-destaque-titulo"><?= $categoryList['Category']['name']?></div>
				</div>
				<div class="row">
					<ul class="row listagem-agenda mt20">
						<?php foreach($categoryList['Schedule'] as $schedule): ?>
							
							
							<?php 
								$dataArray = explode(';', $schedule['date_of_event']);
								
								if(in_array($dataHoje, $dataArray)): 
								
							
							?>
								<li>
									<div class="row">
										<div class="four columns">
											<?php if(!empty($schedule['image'])): ?>
												<a href="/agenda/ver/<?= $schedule['url'] ?>"><img class="img-border border" src="<?= $_URL_FILE ?>schedules/fotos/318x177-<?= $schedule['image'] ?>" style="height: 117px" width="100%"/></a>
											<?php endif; ?>
										</div>
										<div class="eight columns">
											<div class="row titulo"><a href="/agenda/ver/<?= $schedule['url'] ?>"><?= $schedule['title'] ?></a></div>
											<div class="row tipo">às <?= date("H:i",strtotime($schedule['schedule'])); ?></div>
											<div class="row endereco mt10"><?= $schedule['local'] ?> - <?= $schedule['address'] ?></div>
											<div class="row texto mt5"><a href="/agenda/ver/<?= $schedule['url'] ?>"><?= $this->Caracter->_getLimit(strip_tags($schedule['text']), 250)?>...</a></div>
										</div>
									</div>
								</li>
							<?php endif; ?>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endforeach; ?>
			<!--paginação
			<div class="row box-paginator mt20">
				<center>
				<span><a href="">1</a></span>
				<span class="current"><a href="">2</a></span>
				<span><a href="">3</a></span>
				<span><a href="">4</a></span>
				<span><a href="">5</a></span>
				</center>
			</div>-->
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

<!--slide agenda home-->
<script type="text/javascript">
	$(".carousel").jCarouselLite({
	    btnNext: ".next",
	    btnPrev: ".prev",
	    start: <?= $montaCalendario['currentView']?>,
	});
</script>