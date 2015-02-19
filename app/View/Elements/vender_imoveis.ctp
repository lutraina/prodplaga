<div class="tabs-classificados conteudo-tabs-estabelecimentos">
			<?php echo $this->Form->create('Imovei', array(
    'inputDefaults' => array(
        'label' => false,
        'div' => false,
         'legend' => false
    	),
    'class'=>'form',
   	'enctype'=>'multipart/form-data',
   	'action'=>'vender'
	));
	?>			
	<div class="row">
		<legend>Proprietário >> <small>Dados do proprietário</small></legend>
	</div>						
	<div class="row">
        <label>Nome do proprietário</label>
        <span class="field field-tipo">
    		<?= $this->Form->input('nome',array('class'=>'span8'))?>                
        </span>
    </div>
	<div class="row mt20">
			<legend>Vendedor >> <small>Dados do vendedor</small></legend>
	</div>						
	<div class="row mt10">
        <label>Nome do vendedor</label>
        <span class="field field-tipo">
    		<?= $this->Form->input('vendedor',array('class'=>'span8'))?>                
        </span>
    </div>		 
	<div class="row mt10">
        <label>Telefone(s)</label>
        <span class="field field-tipo">
    		<?= $this->Form->input('telefone',array('class'=>'span2'))?>                
        </span>
    </div>		
	<div class="row mt10">
        <label>Email</label>
        <span class="field field-tipo">
    		<?= $this->Form->input('email',array('class'=>'span4'))?>                
        </span>
    </div>	
	<div class="row mt20">
			<legend>Automóvel >> <small>Dados do automóvel</small></legend>
	</div>
    <div class="row mt20">
        <label>Situacão</label>
        <label class="custom-select">
    		<?= $this->Form->input('situacao',
    			array('class'=>'tipo','options'=>array(
    				'venda'=>'Venda',
    				'aluguel'=>'Aluguel',
					)))?>                
        </label>
    </div>	
	<div class="row mt10">
        <label>Tipo</label>
        <span class="field field-tipo">
    		<?= $this->Form->input('tipo',array('class'=>'span4','type'=>'text','placeholder'=>'Ex: Chácara, Casa, Apartamento etc...'))?>                
        </span>
    </div>		            			


	<div class="row mt10">
		<label>Endereço</label>
		 <span class="field">
			<?= $this->Form->input('endereco',array('class'=>'span4','type'=>'text','placeholder'=>'Indique a localização do imóvel'))?>	
		</span>
	</div>

	<div class="row mt10">
		<label>Região</label>
		 <span class="field">
			<?= $this->Form->input('regiao',array('class'=>'span4','type'=>'text','placeholder'=>'Ex: Sul'))?>	
		</span>
	</div>				
	<div class="row mt10">
		<label>Preço </label>
		 <span class="field">
			<?= $this->Form->input('preco',array('class'=>'span2','type'=>'text','placeholder'=>'Ex: 45.000,00 '))?>	
		</span>
	</div>	
	<div class="row mt10">
		<label>Quartos </label>
		 <span class="field">
			<?= $this->Form->input('quartos',array('class'=>'span2','type'=>'text','placeholder'=>'Ex: 4 '))?>	
		</span>
	</div>					
		<div class="row mt20">
			<label>Fotos <small> no máximo 4 fotos</small></label>
			<div class="row mt10">
				<input type="file" name="upl[]" id="upl"  maxlength="4" multiple/>	
			</div>
		</div>
	<div class="row mt20">
		<label>Mais detalhes(opcional)</label>
		 <span class="field">
			<?= $this->Form->input('opcional',array('class'=>'text-area-border','type'=>'textarea','placeholder'=>'Ex: 4 Air Bag, úinco dono, pintura original etc.. '))?>	
		</span>
	</div>		

			<?= $this->Form->input('status',array('class'=>'span1','type'=>'hidden','value'=>'nao'))?>	
															
		        <p class="stdformbutton">
		           <button id="passo1" class="button button-black button-radius">Salvar</button>
		        
			
			
			<?= $this->Form->end(null)?>   
</div>
