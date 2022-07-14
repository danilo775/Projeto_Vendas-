var countLines = 0;
document.getElementById("total_venda").value="0,00";
document.getElementById("sub_total").value="0,00";
document.getElementById("desconto").value="0,00";

function addProduto()
{

    
    
	var produto = document.getElementById("produto");
	var quantidade = document.getElementById("quantidade");

    if(produto.value != "" && quantidade.value != "")
    {

        var request = new XMLHttpRequest();
        var url = "pegaProduto.php";
        var params = "?codigo=" + produto.value;

        request.open("GET", url + params, false);     
        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200)
            {
                var coluna = request.responseText;

                var arrayColuna = coluna.split("|");

                var valorUnitario = arrayColuna[0];
                var descricao = arrayColuna[1];


                var table_produto = document.getElementById("table_produto");

                var novaLinha = document.createElement("tr");
                novaLinha.id = "line" + countLines;
                
              
                var novaCelula1 = document.createElement("td");
                var novaCelula2 = document.createElement("td");
                var novaCelula3 = document.createElement("td");
                var novaCelula4 = document.createElement("td");
                var novaCelula5 = document.createElement("td");


                novaCelula1.innerHTML =  "<input type='hidden' value='"+produto.value+"' >" + descricao;
               
                novaCelula2.innerHTML = quantidade.value;
                novaCelula3.innerHTML = valorUnitario;
                novaCelula4.innerHTML =  parseFloat(valorUnitario) *  parseFloat(quantidade.value) ;
                novaCelula5.innerHTML = "<button type='button' class='btn btn-dark btn-sm active'  onclick='removeProduto("+countLines+");'>Remove</button>";



                novaLinha.appendChild(novaCelula1);
                novaLinha.appendChild(novaCelula2);
                novaLinha.appendChild(novaCelula3);
                novaLinha.appendChild(novaCelula4);
                novaLinha.appendChild(novaCelula5);

                table_produto.appendChild(novaLinha);

                calculaSubTotal();

                produto.value = "";
                quantidade.value = "";
                produto.focus();

                countLines++;

            }
            else
            {
                alert("Informe todos os dados do Produto!");
                produto.focus();
            }

        }
    }

    request.send(null);
}

function removeProduto(value)
{
    var linha = document.getElementById("line" + value);
    linha.remove();
}

function calculaSubTotal()
{
    var total_venda = document.getElementById("total_venda");
    var sub_total = document.getElementById("sub_total");
    var table_produto = document.getElementById("table_produto");
    var desconto = document.getElementById("desconto");
    var linhas = table_produto.childNodes;
    var soma = 0;
   
    if(linhas.length >= 2){
        for(var k=2; k<linhas.length; k++)
        {
            var celulas = linhas[k].childNodes;
            soma+= parseFloat(celulas[3].innerText);     
          
        }

        sub_total.value = soma;
        var descontoSTR =  desconto.value;
        descontoSTR = descontoSTR.replace(".","");
        descontoSTR = descontoSTR.replace(",",".");
        total_venda.value = soma -  parseFloat(descontoSTR);   
    }
}


function submeteFormulario()
{
     
    var data_vencimento = document.getElementById("data_vencimento");
    var tipo = document.getElementById("tipo");
    var desconto = document.getElementById("desconto");
    var valor = document.getElementById("total_venda");
    var cliente = document.getElementById("cliente");
    
    
    document.getElementById("bt").disabled = true;

    // Criando objeto contem
    /*var contem = new Object();
    contem.produto = produto.value;
    contem.quantidade = quantidade.value;
    contem.cliente = cliente.value;*/

    // Criando objeto venda
    var venda = new Object();
    venda.data_vencimento = data_vencimento.value;
    venda.valor = valor.value;
    venda.desconto = desconto.value;
    venda.tipo = tipo.value;
    venda.cliente = cliente.value;
    

    // Criando array para armazenar os contem
    venda.contem = [];
    
    var table_produto = document.getElementById("table_produto");
    var linhas = table_produto.childNodes;

    if(linhas.length >= 2){
        for(var k=2; k<linhas.length; k++)
        {
            var celulas = linhas[k].childNodes;        
            contem = new Object(); 
            var inputCodigo = celulas[0].childNodes;
            contem.codigo = inputCodigo[0].value;
            contem.quantidade = celulas[1].innerText;
            venda.contem.push(contem);
        }
        console.log(venda);
    }

    // Ajax
    var req = new XMLHttpRequest();
    var url = "../action/addVenda.php";
    var stringJSON = JSON.stringify(venda);


    req.open("POST", url, false);
    req.setRequestHeader("Content-Type", "application/json");
    req.onreadystatechange = function(){
        if(req.readyState == 4) 
        {
            if(req.status == 200) 
            {
                var result = req.responseText;
                console.log(result);
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