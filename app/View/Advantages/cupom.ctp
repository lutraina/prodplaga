<div class="vantagens">
	<div class="row mt20">
		<div class="two columns"></div>
		<div class="eight columns">
			<div class="row">
				<div class="seven columns">
					<div class="row">
						<img class="f-left" src="/img/logo.png" width="160"/>
						
					</div>
					
					<h1 class="row mt20"><?= $vantagens['Advantage']['title'] ?></h1>
					<div class="row mt10">
						<h2><small>Código:</small> <?= $cod ?></h2>
					</div>
					<div class="row mt10">
						Com esse cupom você paga somente:
						<h2>R$ <?= $vantagens['Advantage']['price_to'] ?></h2>
					</div>
				</div>
				<div class="five columns">
					<div class="row texto-cupom"><img class="f-left" src="<?= $_URL_FILE ?>advantages/fotos/410x480-<?= $vantagens['Advantage']['image'] ?>" style="width: 100%; height:160px;"/></div>
					
					<!--<div class="row mt10"><span class="f-right">Impresso em:<?= $data ?></span></div>-->
				</div>
			</div>
			<div class="row mt20">
				<div class="four columns"></div>
				<div class="four columns">
					<?php if($vantagens['Advantage']['date_end'] >= date('Y-m-d H:i:s')): ?>
					
					<button class="button button-black button-radius" onClick="window.print()">Imprimir cupom</button>
					
					<?php endif; ?>
				</div>
				<div class="four columns"></div>
			</div>
		</div>
		<div class="two columns"></div>
	</div>
</div>