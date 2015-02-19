	$(document).ready( function() {
		/*
		$("#FormCartao").validate({
			rules: {
				"data[Cartao][nome]": {
					required: true,
				},
				"data[Cartao][nascimento]": {
					required: true,
				},				
				"data[Cartao][rg]": {
					required: true,
				},				
				"data[Cartao][cpf]": {
					required: true,
				},				
				"data[Cartao][email]": {
					required: true,
					email: true,
				},
				"data[Cartao][endereco]": {
					required: true,
				},
				"data[Cartao][numero]": {
					required: true,
				},					
				"data[Cartao][bairro]": {
					required: true,
				},					
				"data[Cartao][cidade]": {
					required: true,
				},					
				"data[Cartao][cep]": {
					required: true,
				},				
				"data[Cartao][telefone]": {
					required: true,
				},										
			},
			messages: {			
				"data[Cartao][nome]": {
					required: "Este campo é obrigatorio!",
				},
				"data[Cartao][nascimento]": {
					required: "Este campo é obrigatorio!",
				},				
				"data[Cartao][rg]": {
					required: "Este campo é obrigatorio!",
				},				
				"data[Cartao][cpf]": {
					required: "Este campo é obrigatorio!",
				},				
				"data[Cartao][email]": {
					required: "Este campo é obrigatorio!",
					email: "Digite um e-mail válido!"
				},
				"data[Cartao][endereco]": {
					required: "Este campo é obrigatorio!",
				},
				"data[Cartao][numero]": {
					required: "Este campo é obrigatorio!",
				},					
				"data[Cartao][bairro]": {
					required: "Este campo é obrigatorio!",
				},					
				"data[Cartao][cidade]": {
					required: "Este campo é obrigatorio!",
				},					
				"data[Cartao][cep]": {
					required: "Este campo é obrigatorio!",
				},				
				"data[Cartao][telefone]": {
					required: "Este campo é obrigatorio!",
				},										
			}
		});	
		*/
	    $('#FormCartao').ajaxForm({
			beforeSerialize:function($form, options){
				jQuery('#RespostaCartao').html('<img src="/img/loader.gif" align="absmiddle">');			
			}, 
	   		success:function(content){  			
	  			jQuery('#RespostaCartao').html(content);	  			
	  		},
	  		error:function(content){
	  			
	  		}
	    });		
					
	});