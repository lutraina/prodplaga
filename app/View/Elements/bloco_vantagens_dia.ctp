<?php if( isset($vantagens['Advantage'])): ?>
	<div class="vantagens">
		<div class="menu-vantagem">
			<div class="row">
				<a href="/vantagens/ver/<?= $vantagens['Advantage']['url'] ?>"><img class="img-border border" src="<?= $_URL_FILE ?>advantages/fotos/226x263-<?= $vantagens['Advantage']['image'] ?>" width="100%"/></a>
				
					<div class="row vantagem-home">
						<div class="post-destaque-categoria">
							<div class="icon-categoria-default"></div>
							<span><?= $vantagens['Advantage']['title'] ?></span>
						</div>
						<div class="icon-destaque-categoria"></div>
					</div>
					<!--<div class="row">
						<div class="post-destaque-titulo">
							<div class="row mt5">
								<div class="icon-relogio"></div>
								<div class="teaser">
					           		<div class="tp">
					                    <div id="no-reflection" class="no-reflection"></div>
					                </div>
					            </div>
					       </div>
						</div>
					</div>-->
				
			</div>
		</div>
	</div>
<?php endif; ?>	