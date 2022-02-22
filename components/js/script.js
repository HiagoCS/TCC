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
});