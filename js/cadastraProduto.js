function formatarMoeda(i) {
	var v = i.value.replace(/\D/g,'');
	v = (v/100).toFixed(2) + '';
	v = v.replace(".", ",");
	v = v.replace(/(\d)(\d{3})(\d{3}),/g, "$1.$2.$3,");
	v = v.replace(/(\d)(\d{3}),/g, "$1.$2,");
	i.value = v;
}




function validaProduto()
{	
	var descricao = document.getElementById("descricao");
	var preco_custo = document.getElementById("preco_custo");
	var preco_vista = document.getElementById("preco_vista");
	var preco_prazo = document.getElementById("preco_prazo");
	var quantidade = document.getElementById("quantidade");
	
	var msg = document.getElementById("msg");
	
	if(descricao.value == ""){
		msg.innerHTML = "Descrição não preenchida";
		return false;
	}
	else
	if(preco_custo.value == ""){
		msg.innerHTML = "Preço de custo não preenchido";
		return false;
	}

	else
	if(preco_vista.value == ""){
		msg.innerHTML = "Preço a Vista nao preenchido";
		return false;
	}
	else
	if(preco_prazo.value == ""){
		msg.innerHTML = "preco a prazo nao preenchido";
		return false;
	}
	else
	if(quantidade.value == ""){
		msg.innerHTML = "quantidade nao preenchido";
		return false;
	}

	return true;
}


function addProduto()
{
	if(validaProduto())
	{

	var descricao = document.getElementById("descricao");
	var preco_custo = document.getElementById("preco_custo");
	var preco_vista = document.getElementById("preco_vista");
	var preco_prazo = document.getElementById("preco_prazo");
	var quantidade = document.getElementById("quantidade");
	
	var msg = document.getElementById("msg");
		
		createRequest();
		
		var url = "../action/addProduto.php";
		
		var params = "";
		params += "?descricao=" + descricao.value;
		params += "&preco_custo=" + preco_custo.value;
		params += "&preco_vista=" + preco_vista.value;
		params += "&preco_prazo=" + preco_prazo.value;
		params += "&quantidade=" + quantidade.value;

		
		request.open("GET", url+params, false);
		request.onreadystatechange = function(){
			if(request.readyState == 4) 
			{
				if(request.status == 200) 
				{
					var result = request.responseText;
					
					if(result == "ok")
					{
						window.location.href = "../pags/listaClientes.php";
						
					}
					else{
						msg.innerHTML = request.responseText;
					}
										
				}
				else{
					msg.innerHTML = "Não foi possível adicionar os dados";
				}
			}
			else{
				msg.innerHTML = "Conexão falhou";
			}
		}
		request.send(null);
		
	}
}