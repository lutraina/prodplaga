	<div class="row">
		<div class="six columns">
			<label class="custom-select">
				<select name="tipo">
			    	<option value="">Tipo do imóvel</option>
			    	<?php foreach($tipo as $tipo): ?>
			       		<option value="<?= $tipo ?>"><?= $tipo ?></option>
			        <?php endforeach; ?>
			    </select>
			</label>
		</div>
		<div class="six columns">
			<label class="custom-select">
			    <select name="quartos" class="marca">
			    	<option value="">Quantos quartos?</option>
			    	<?php foreach($quartos as $quartos): ?>
			       		<option value="<?= $quartos ?>"><?= $quartos ?></option>
			        <?php endforeach; ?>
			    </select>
			</label>
		</div>
	</div>
	<div class="row mt10">
		<div class="eight columns">
			<div class="row">
				<div class="two columns">
					<span class="valor">Preço</span>
				</div>
				<div class="five columns">
					<input type="text" name="start_preco" placeholder="De">
				</div>
				<div class="five columns">
					<input type="text" name="end_preco" placeholder="Até">
				</div>
			</div>
		</div>
		<div class="four columns f-right">
			<button class="button button-black2 button-radius">BUSCAR</button>
		</div>
	</div>
