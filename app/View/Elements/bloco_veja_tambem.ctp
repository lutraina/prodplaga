<div class="assuntos-relacionados">
	<div class="row">
		<h2>
			Veja Também
		</h2>
	</div>
	<ul>
		<?php foreach($maislidas as $maislida ): ?>		
			<li>
				<a href="/galeria/ver/<?= $maislida['Galeria']['id'] ?>">
					<div class="row">
						<div class="four columns">
							<img src="<?= $_URL_FILE; ?>galleries/fotos/640x480-<?= $maislida['File'][0]['name']?>" width="100%" />
						</div>
							<div class="row">
									<span class="row titulo"><?= $maislida['Galeria']['titulo'] ?></span>
									<span class="row data"><?= $maislida['Galeria']['data'] ?></span>
								<div class="five columns"><a href=""><button class="button button-radius button-black4">LER MAIS</button></a></div>
							</div>
							<div class="row texto">
								<?= $this->Caracter->_getLimit($maislida['Galeria']['texto'],50) ?>
							</div>
					</div>
				</a>
			</li>
		<?php endforeach; ?>
	</ul>
</div>