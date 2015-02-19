<div class="four columns">
<span class="texto-newsletter">Receba nossas atualizações:</span>
</div>
<div class="five columns">
<form id="form-newsletter2" method="post"><input type="text" placeholder="e-mail" name="email" class="input-shadow input-newsletter" /></form>
<span class="ico-input-newsletter"></span>
</div>
<div class="two columns">
<button class="button button-radius button-black-top upper mt3 button-newsletter2">assinar</button>
</div>
<div class="one column"></div>

<script>
$(".input-newsletter").keypress(function(event) {
	
		if (event.which == 13 ) {

			return false;
		  }
		})    
	$('.button-newsletter2').click(function(){
			$("#form-newsletter2").ajaxForm({
				
		        url: '/newsletter/cadastro/assine',
		    	beforeSend:function(){
		    	
		    		$('.resultado-newsletter2').html('Agurade...');
		    		
		
		    	},
		        success: function(data) {
					$('.resultado-newsletter2').html(data);
		        	
		        },
		        error: function(){
		            mensagem.html('Erro com o arquivo');
		            }
		 
			}).submit()
	       
		})
</script>