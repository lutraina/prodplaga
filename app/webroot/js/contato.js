	$(document).ready( function() {
			// validate signup form on keyup and submit
		$("#FormContato").validate({
			rules: {
				"data[Mensagem][nome]": {
					required: true,
				},
				"data[Mensagem][email]": {
					required: true,
					email: true,
				},
				"data[Mensagem][assunto]": {
					required: true,
				},
				"data[Mensagem][texto]": {
					required: true,
				},													
			},
			messages: {			
				"data[Mensagem][nome]": {
					required: "Este campo é obrigatorio!",
				},
				"data[Mensagem][email]": {
					required: "Este campo é obrigatorio!",
					email: "Digite um e-mail válido!"
				},
				"data[Mensagem][assunto]": {
					required: "Este campo é obrigatorio!",
				},
				"data[Mensagem][texto]": {
					required: "Este campo é obrigatorio!",
				},			
			}
		});	
		
	    $('#FormContato').ajaxForm({
			beforeSerialize:function($form, options){
				jQuery('#respostaContato').html('<img src="/img/loader.gif" align="absmiddle">');			
			}, 
	   		success:function(content){  			
	  			jQuery('#respostaContato').html(content);	  			
	  		},
	  		error:function(content){
	  			
	  		}
	    });		
					
	});