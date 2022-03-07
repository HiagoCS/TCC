$(document).ready(function(){
	//This function shows tb_chat every time it is updated
	function ajax(){
		var req = new XMLHttpRequest();
		req.onreadystatechange = function(){
			if (req.readyState == 4 && req.status == 200) {
				//Here insert the id where the chat is happening
				document.getElementById('chat').innerHTML = req.responseText;
			}
		}
		//Here pass the directory that calls the chat function
		req.open('GET', '../tcc_project/components/php/chat.php', true);
		req.send();
	}
	setInterval(function(){ajax();}, 1000);

	//This function serves to register user using Ajax
	$(document).on('click', '#btnRegister', function() {
 		$.ajax({
  			type:"POST",
  			url:"./components/php/register.php",
  			datatype:"text",
  			beforeSend: function(){
  				$("form").html(`<form><img id="loading" src="lib/img/loading-buffering.gif"></form>`);
  			},
  			data:{
  				name: $("#name").val(),
  				email: $("#email").val(),
  				tel: $("#tel").val(),
  				cpf: $("#cpf").val(),
  				cep: $("#cep").val(),
  				password: $("#password").val(),
  				level: $("#levels").val()
  			},
  			success: function(response){
  				$("form").html(`<form>${response}</form>`);
  			}
  		});
 	});
 	//This function serves to login user using Ajax
	$(document).on('click', '#btnLogin', function() {
 		$.ajax({
 			type:"POST",
 			url:"./components/php/login.php",
 			datatype:"text",
 			data:{
 				email:$("#email").val(),
 				password: $("#password").val()
 			},
  			success: function(response){
  				$("form").html(`<form>${response}</form>`);
  			}
 		});
 	});
	$("#send").click(function(){
		event.preventDefault();
    	$.ajax({
      		url: '../tcc_project/components/php/send.php',
      		type: 'POST',
      		data: {
        		content: $('input[name="content"]').val()
      		}    	
      	});
	});
});