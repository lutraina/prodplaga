<div class="row">
	<div class="three columns">
		<span class="dia-num1"><?= date('d')?></span>
		<div class="dia-ext1">
			<span><?= $this->Data->convertWeek(date('D')); ?></span>
		</div>
	</div>
	<div class="nine columns">
		<span class="listagem-programacao-texto1">hoje</span>
		<ul class="listagem-programacao mt10">
			<?php foreach($schedulesBoxRight as $schedulesNav): ?>
			<li>
				<div class="row">
					<a href="/agenda/ver/<?= $schedulesNav['Schedule']['url'] ?>"> 
						<b><?= date("H:i", strtotime($schedulesNav['Schedule']['schedule'])) ?></b>
						- <?= $schedulesNav['Schedule']['title'] ?>
					</a>
				</div>
			</li>
			<?php endforeach ?>
		</ul>
	</div>
</div>