
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


function buscaProduto()
{
	var req = new XMLHttpRequest();
	var url = "../action/buscaProduto.php";

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

function buscaVencidos()
{
	var req = new XMLHttpRequest();
	var url = "../action/buscaVencidos.php";

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

function filtraRelatorioVenda()
{
	var req = new XMLHttpRequest();
	var url = "../action/filtraRelatorioVenda.php";

	var data_inicio = document.getElementById("data_inicio");
	var data_final = document.getElementById("data_final");
	
	req.open("GET", url+"?data_inicio="+data_inicio.value + "&data_final="+data_final.value , false);
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

function filtraRelatorioLucro()
{
	var req = new XMLHttpRequest();
	var url = "../action/filtroRelatorioLucro.php";

	var data_inicio = document.getElementById("data_inicio");
	var data_final = document.getElementById("data_final");
	
	req.open("GET", url+"?data_inicio="+data_inicio.value + "&data_final="+data_final.value , false);
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