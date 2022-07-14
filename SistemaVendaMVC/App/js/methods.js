function formatarMoeda(i) {
	var v = i.value.replace(/\D/g,'');
	v = (v/100).toFixed(2) + '';
	v = v.replace(".", ",");
	v = v.replace(/(\d)(\d{3})(\d{3}),/g, "$1.$2.$3,");
	v = v.replace(/(\d)(\d{3}),/g, "$1.$2,");
	i.value = v;
}

function addProduto(produto,quantidade,valor)
{
	var table = document.getElementById("tableProduto");				
	var qtdLinhas = table.rows.length;	
	var linha = table.insertRow(qtdLinhas);
	
	var codigo = linha.insertCell(0)
	var cellProduto = linha.insertCell(1)
	var cellQuantidade = linha.insertCell(2)
	var cellValor = linha.insertCell(3)

	codigo.innerHTML = qtdLinhas -1;
	cellProduto.innerHTML = produto;
	cellQuantidade.innerHTML = quantidade;
	cellValor.innerHTML = valor;
	document.getElementById('quantidade').value=" "
	document.getElementById('valor').value=" "
}

function validaLogin()
{	
	var user = document.getElementById("user");
	var senha = document.getElementById("senha");
	
	var msg = document.getElementById("msg");
	
	if(user.value == ""){
		msg.innerHTML = "Usuario não preenchido";
		return false;
	}
	else
	if(senha.value == ""){
		msg.innerHTML = "Senha não preenchida";
		return false;
	}
	else
	if(senha.value == "" && user.value == ""){
		msg.innerHTML = "Campos nao preenchido";
		return false;
	}	
	
	return true;
}


function addLogin()
{
	if(validaLogin())
	{
		var req = new XMLHttpRequest();
		var url = "index.php";
	
		login = new Object();

		var user = document.getElementById("user");
		var senha = document.getElementById("senha");
		var msg = document.getElementById("msg");

		login.user=user.value;
		login.senha=senha.value;
		
		stringJSON = JSON.stringify(login);

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
						window.location.href = "../pags/listaClientes.php";
						
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


function validaCliente()
{	
	var nome = document.getElementById("nome");
	var endereco = document.getElementById("endereco");
	var celular = document.getElementById("celular");
	var bairro = document.getElementById("bairro");
	var cpf = document.getElementById("cpf");
	var cidade = document.getElementById("cidade");

	
	var msg = document.getElementById("msg");
	
	if(nome.value == ""){
		msg.innerHTML = "nome não preenchido";
		return false;
	}
	else
	if(endereco.value == ""){
		msg.innerHTML = "endereço não preenchido";
		return false;
	}

	else
	if(celular.value == ""){
		msg.innerHTML = "celular não preenchido";
		return false;
	}
	else
	if(bairro.value == ""){
		msg.innerHTML = "bairro não preenchido";
		return false;
	}
	else
	if(cpf.value == ""){
		msg.innerHTML = "cpf não preenchido";
		return false;
	}
	else
	if(cidade.value == ""){
		msg.innerHTML = "cidade não preenchido";
		return false;
	}
		
	
	return true;
}


function addCliente()
{
	if(validaCliente())
	{
		var req = new XMLHttpRequest();
		var url = "Controller/ClienteController.php";
	
		cliente = new Object();

		var nome = document.getElementById("nome");
		var endereco = document.getElementById("endereco");
		var numero = document.getElementById("numero");
		var celular = document.getElementById("celular");
		var bairro = document.getElementById("bairro");
		var cpf = document.getElementById("cpf");
		var cidade = document.getElementById("cidade");
		var mais_informacoes = document.getElementById("mais_informacoes");
		
		var msg = document.getElementById("msg");
		console.log(mais_informacoes);
		cliente.nome = nome.value;
		cliente.endereco = endereco.value;
		cliente.numero = numero.value;
		cliente.celular = celular.value;
		cliente.bairro = bairro.value;
		cliente.cpf = cpf.value;
		cliente.cidade = cidade.value;
		cliente.mais_informacoes = mais_informacoes.value;
		
		stringJSON = JSON.stringify(cliente);
		
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
						window.location.href = "View/listaClientes.php";
						
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

function atualizaCliente()
{
	if(validaCliente())
	{
		var req = new XMLHttpRequest();
		var url = "Controller/ClienteController.php";
	
		cliente = new Object();

		var codigo = document.getElementById("codigo");
		var nome = document.getElementById("nome");
		var endereco = document.getElementById("endereco");
		var numero = document.getElementById("numero");
		var celular = document.getElementById("celular");
		var bairro = document.getElementById("bairro");
		var cpf = document.getElementById("cpf");
		var cidade = document.getElementById("cidade");
		var mais_informacoes = document.getElementById("mais_informacoes");
		
		var msg = document.getElementById("msg");

		cliente.codigo = codigo.value;
		cliente.nome = nome.value;
		cliente.endereco = endereco.value;
		cliente.numero = numero.value;
		cliente.celular = celular.value;
		cliente.bairro = bairro.value;
		cliente.cpf = cpf.value;
		cliente.cidade = cidade.value;
		cliente.mais_informacoes = mais_informacoes.value;
		
		stringJSON = JSON.stringify(cliente);

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
						window.location.href = "View/listaClientes.php";
						
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


/*function atualizaCliente()
{
	createRequest();
	
	var url = "consulta.php";
	
	request.open("GET", url, false);	
	
	request.onreadystatechange = function()
	{
		if(request.readyState == 4)
		{
			if(request.status == 200)
			{
				var xmlResult = request.responseXML;
				
				if(xmlResult != null)
				{
					var valores = xmlResult.getElementsByTagName("valores")[0];
					var linhas = valores.getElementsByTagName("caixa");
					
					if(linhas.length > 0)
					{
						var cabecalho  = "<tr><th>#</th><th>Nome</th><th>Endereço</th><th>Celular</th><th>Bairro</th><th>CPF</th><th>Cidade</th><th>Mais_Inforomações</th><th></th></tr>";
					
						var corpo = "";
						for(var k=0; k<linhas.length; k++)
						{
							corpo += "<tr>";
							corpo += 	"<td>" + linhas[k].childNodes[0].textContent + "</td>";
							corpo += 	"<td>" + linhas[k].childNodes[1].textContent + "</td>";
							corpo += 	"<td>" + linhas[k].childNodes[2].textContent + "</td>";
							corpo += 	"<td>" + linhas[k].childNodes[3].textContent + "</td>";
							corpo += 	"<td>" + linhas[k].childNodes[4].textContent + "</td>";
							corpo += 	"<td>" + linhas[k].childNodes[5].textContent + "</td>";
							corpo += 	"<td>" + linhas[k].childNodes[6].textContent + "</td>";
							corpo += 	"<td>" + linhas[k].childNodes[7].textContent + "</td>";
							corpo += 	"<td>" + linhas[k].childNodes[8].textContent + "</td>";
							corpo +=	"<td></td>";
							corpo += "</tr>";					
						}
						
						var tabela = document.getElementById("tabela");
						tabela.innerHTML = cabecalho + corpo;															
					}					
				}
			}
		}
	}
	
	request.send(null);
}
*/