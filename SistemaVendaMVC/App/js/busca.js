
function buscaCliente()
{
	var req = new XMLHttpRequest();
	var url = "../action/buscaCliente.php";

	var buscado = document.getElementById("buscado");
	
	req.open("GET", url+"?busca="+buscado.value, false);
	
	req.onreadystatechange = function(){
		if(req.readyState == 4) 
		{
			if(req.status == 200) 
			{
				var result = req.responseText;
				
				document.getElementById("tableBusca").innerHTML = result;	
			}
		}		
	}
	req.send(null);	
}