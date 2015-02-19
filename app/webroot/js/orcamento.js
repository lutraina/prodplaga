	$(document).ready( function() {
		// validate signup form on keyup and submit
		$("#FormOrcamento").validate({
			errorElement: "em",
			rules: {
				"data[Orcamento][nome]": {
					required: true,
				},				
				"data[Orcamento][email]": {
					required: true,
					email: true,
				},
				"data[Orcamento][texto]": {
					required: true,
				},											
			},
			messages: {
				"data[Orcamento][nome]": {
					required: "Este campo é obrigatório!",
				},							
				"data[Orcamento][email]": {
					required: "Este campo é obrigatório!",
					email: "Digite um e-mail válido!"
				},
				"data[Orcamento][texto]": {
					required: "Este campo é obrigatório!",
				},				
			}
		});
		
		
	    $('#FormOrcamento').ajaxForm({
			beforeSerialize:function($form, options){
				jQuery('#respostaOrcamento').html('<img src="/img/loader.gif" align="absmiddle">');			
			}, 
	   		success:function(content){  			
	  			jQuery('#respostaOrcamento').html(content);	  			
	  		},
	  		error:function(content){
	  			
	  		}
	    });
							
	});