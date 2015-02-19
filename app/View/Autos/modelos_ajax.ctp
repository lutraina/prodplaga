<label class="custom-select">
    <select name="modelo">
    	<option value="">Modelo</option>
    	<?php foreach($filtro_modelos as $filtro_modelo): ?>
       		<option value="<?= $filtro_modelo ?>"><?= $filtro_modelo ?></option>
        <?php endforeach; ?>
    </select>
</label>