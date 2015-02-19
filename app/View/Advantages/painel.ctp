<link rel="stylesheet" href="/js/jquery-ui/css/jquery-ui.css"> 
<div class="vantagens">
	<div class="row mt20">
		<div class="row">
			<span class="icon-categoria"></span><span class="titulo-categoria color-link"><a href="/vantagem">Cupons Retirados</a></span>
		</div>
	</div>
	<div class="row mt20">
		<div class="three columns">
			<form>
				<input class="search-cupom border" type="text" name="cupom" value="<?= isset($_GET['cupom']) ? $_GET['cupom'] : '' ?>" placeholder="Cód. Cupom" />
				<input type="submit" class="btn-cupom bdge" value="Pesquisar Cupom">
			</form>
		</div>
		<div class="nine columns" style="border:2px solid #ccc; padding:10px;">
			<div class="row">
					<?php if(count($vantagens)> 0): ?>
						<div  class="row"><span class="titulo-categoria color-link">TICKET EXISTENTE	</span></div>
						<div class="mt20">
							<div class="two columns">
								<?php if(!empty($vantagens['User']['image'])): ?>
									<?php if($vantagens['User']['tipo'] != 'site'):  ?>
										<img class="foto" src="<?= $vantagens['User']['image'] ?>" style="max-width:80px;"/>
									<?php else:  ?>
										<img class="foto" src="<?= $_URL_FILE ?>users/fotos/228x228-<?= $vantagens['User']['image'] ?>" style="max-width:80px;"/>
									<?php endif; ?>
								<?php else: ?>
									<img class="foto" src="/img/avatar.png" style="max-width:80px;"/>
								<?php endif; ?>
							</div>
							<div class="nine columns">
								<h1> <?=  $vantagens['User']['name'] ?></h1>
								<p class="mt10"> Data de início: <b><?= date('d/m/Y', strtotime($vantagens['Advantage']['date_start'])) ?></b> -- válido até <b><?= date('d/m/Y', strtotime($vantagens['Advantage']['date_end'])) ?></b></p>
							</div>
						</div>						
						<hr />
						<div class="mt5">
							
							
							
							<h3 class=""><?=  $vantagens['Advantage']['title'] ?></h3>
							<p class="mt10"><?=  $vantagens['Advantage']['regulation'] ?></p>
							
							
						</div>
						
					<?php elseif( isset($_GET['cupom'])): ?>	
						<h1 style="color:red;">TICKET INVÁLIDO</h1>
					<?php endif; ?>			
			</div>
		</div>
	</div>
</div>