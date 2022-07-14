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
		var req = new XMLHttpRequest();
		var url = "../action/addProduto.php";
	
		produto = new Object();

	var descricao = document.getElementById("descricao");
	var preco_custo = document.getElementById("preco_custo");
	var preco_vista = document.getElementById("preco_vista");
	var preco_prazo = document.getElementById("preco_prazo");
	var quantidade = document.getElementById("quantidade");
	
	var msg = document.getElementById("msg");
		
		createRequest();
			
		produto.descricao = descricao.value;
		produto.preco_custo = preco_custo.value;
		produto.preco_vista = preco_vista.value;
		produto.preco_prazo = preco_prazo.value;
		produto.quantidade = quantidade.value;
	
		stringJSON = JSON.stringify(produto);

		req.open("POST", url, false);
		req.setRequestHeader("Content-Type","application/json");

		req.onreadystatechange = function(){
			if(req.readyState == 4) 
			{
				if(req.status == 200) 
				{
					var result = req.responseText;
					
					if(result == "ok")
					{
						window.location.href = "../pags/listaProdutos.php";
						
					}
					else{
						msg.innerHTML = req.responseText;
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
		req.send(stringJSON);
		
	}
}


function atualizaProduto()
{
	if(validaProduto())
	{
		var req = new XMLHttpRequest();
		var url = "../action/editaProduto.php";
	
		produto = new Object();
	
	var codigo = document.getElementById("codigo");
	var descricao = document.getElementById("descricao");
	var preco_custo = document.getElementById("preco_custo");
	var preco_vista = document.getElementById("preco_vista");
	var preco_prazo = document.getElementById("preco_prazo");
	var quantidade = document.getElementById("quantidade");
		
		produto.codigo = codigo.value;
		produto.descricao = descricao.value;
		produto.preco_custo = preco_custo.value;
		produto.preco_vista = preco_vista.value;
		produto.preco_prazo = preco_prazo.value;
		produto.quantidade = quantidade.value;
	
		stringJSON = JSON.stringify(produto);

		req.open("POST", url, false);
		req.setRequestHeader("Content-Type","application/json");

		req.onreadystatechange = function(){
			if(req.readyState == 4) 
			{
				if(req.status == 200) 
				{
					var result = req.responseText;
					
					if(result == "ok")
					{
						window.location.href = "../pags/listaProdutos.php";
						
					}
					else{
						msg.innerHTML = req.responseText;
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
		req.send(stringJSON);
		
	}
}