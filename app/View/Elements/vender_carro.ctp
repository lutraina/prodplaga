	<div class="tabs-classificados conteudo-tabs-estabelecimentos">
		<?php echo $this->Form->create('Auto', array(
		    'inputDefaults' => array(
		        'label' => false,
		        'div' => false,
		         'div' => false
		    	),
		    'class'=>'form',
		   	'enctype'=>'multipart/form-data',
		   	'action'=>'vender'
			));
		?>			
		<div class="row">
			<div class="row">Proprietário >> <small>Dados do proprietário</small></div>
            <label>Nome do proprietário</label>
            <span class="field field-tipo">
        		<?= $this->Form->input('nome',array('class'=>'span8'))?>                
            </span>
        </div>	
		<div class="row mt20">
			<div class="row">Vendedor >> <small>Dados do vendedor</small></div>
								
		
            <label>Nome do vendedor</label>
            <div class="row">
	            <span class="field field-tipo">
	        		<?= $this->Form->input('vendedor',array('class'=>'span8'))?>                
	            </span>
            </div>
        		 
			<div class="row mt10">
				<div class="six columns">
	                <label>Telefone(s)</label>
	                <span class="field field-tipo">
	            		<?= $this->Form->input('telefone',array('class'=>'span8'))?>                
	                </span>
            	</div>	
				<div class="six columns">
	                <label>Email</label>
	                <span class="field field-tipo">
	            		<?= $this->Form->input('email',array('class'=>'span8'))?>                
	                </span>
                </div>
            </div>
        </div>
		<div class="row mt20">
			<div class="row">Automóvel >> <small>Dados do automóvel</small></div>
		    <div class="row mt20 ">
		        <label>Tipo de anuncio</label>
		        <label class="custom-select">
		    		<?= $this->Form->input('tipo',
		    			array('class'=>'tipo ','options'=>array(
		    				'venda'=>'Venda',
		    				'aluguel'=>'Aluguel',
							)))?>                
		        </label>
		    </div>	
			
			<div class="row mt10">
				<div class="six columns">
	                <label>Ano de fabricação</label>
	                <label class="custom-select">
	            		<?= $this->Form->input('ano_fabricacao',array('options'=>$anos))?>                
	                </label>
            	</div>            			
		    	<div class="six columns">
	                <label>Ano do modelo</label>
	                <label class="custom-select">
	            		<?= $this->Form->input('ano_modelo',array('options'=>$anos))?>                
	                </label>
                </div>  
        	</div>
			<div class="row mt20">
				<div class="six columns">
					<label>Marca</label>
					<span class="field">
						<?= $this->Form->input('marca',array('class'=>'span4','type'=>'text','placeholder'=>'Ex: Chevrolet'))?>	
					</span>
				</div>
				<div class="six columns">									
	
					<label>Modelo </label>
					 <span class="field">
						<?= $this->Form->input('modelo',array('class'=>'span4','placeholder'=>'Ex: S10'))?>
					</span>
				</div>										
			</div>
		<div class="row mt20">
			<label>Versão </label>
			 <span class="field">
				<?= $this->Form->input('versao',array('class'=>'span6','type'=>'text','placeholder'=>'Ex: 4x4 Turbinada DLuxe'))?>	
			</span>
		</div>
		<div class="row mt20">
			<label>Cor </label>
			 <span class="field">
				<?= $this->Form->input('cor',array('class'=>'span6','type'=>'text','placeholder'=>'Ex: Branco'))?>	
			</span>
							
		</div>
		<div class="row mt20">
			<label>Placa (Exibiremos apenas os dois últimos números)</label>
			 <span class="field">
				<?= $this->Form->input('placa',array('class'=>'span3','type'=>'text','placeholder'=>'Ex: HJM-2387'))?>	
			</span>
							
		</div>
		<div class="row mt20">
			<label>Preço </label>
			 <span class="field">
				<?= $this->Form->input('preco',array('class'=>'span2','type'=>'text','placeholder'=>'Ex: 45.000,00 '))?>	
			</span>
		</div>	
		<div class="row mt20">
			<label>Quilometragem </label>
			 <span class="field">
				<?= $this->Form->input('quilometragem',array('class'=>'span2','type'=>'text','placeholder'=>'Ex: 135000 '))?>	
			</span>
							
		</div>	
		<div class="row mt20">
			<label>Cambio </label>
			 <span class="field">
				<?= $this->Form->input('cambio',array('class'=>'span1','type'=>'text','placeholder'=>'Ex:5'))?>	
			</span>
		</div>			
		<div class="row mt20">
			<label>Portas </label>
			 <span class="field">
				<?= $this->Form->input('portas',array('class'=>'span1','type'=>'text','placeholder'=>'Ex: 4 '))?>	
			</span>
		</div>	
		<div class="row mt20">
			<label>Combustivel </label>
			 <span class="field">
				<?= $this->Form->input('combustivel', array('class'=>'span6','type'=>'text','placeholder'=>'Ex: Acima de R$80 '))?>	
			</span>
		</div>	
		<div class="row mt20">
			<label>Renavam </label>
			 <span class="field">
				<?= $this->Form->input('renavam',array('class'=>'span6','type'=>'text','placeholder'=>'Ex: Acima de R$80 '))?>	
			</span>
		</div>	
		<div class="row mt20">
			<label>Fotos <small> no máximo 4 fotos</small></label>
			<div class="row mt10">
				<input type="file" name="upl[]" id="upl"  maxlength="4" multiple/>	
			</div>
		</div>		     																		
		<!-- 
			<label>Imagem para capa <b>[tamanho recomendado 635x250]</b> </label>
			 <span class="field">
				<?= $this->Form->input('image',array('class'=>'span4','type'=>'file','value'=>'null'))?>	
			</span>
		 -->
		<div class="row mt20">
			<label>Mais detalhes(opcional)</label>
			 <span class="field">
				<?= $this->Form->input('opcional',array('class'=>'text-area-border','type'=>'textarea','placeholder'=>'Ex: 4 Air Bag, úinco dono, pintura original etc.. '))?>	
			</span>
		</div>		   		
	</div>
	<?= $this->Form->input('status',array('class'=>'span1','type'=>'hidden','value'=>'nao'))?>	
														
    <p class="stdformbutton">
    <button id="passo1" class="button button-black button-radius">Salvar</button>
	<?= $this->Form->end(null)?>   
</div>