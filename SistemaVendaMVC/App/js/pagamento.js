var countLines = 0;
document.getElementById("valor_total").value="0,00";
document.getElementById("valor_pago").value="0,00";
document.getElementById("troco").value="0,00";


function calculaValorTotal()
{
    var valor_total = document.getElementById("valor_total");
    var tablePagamento = document.getElementById("tablePagamento");
    var linhas = tablePagamento.getElementsByTagName("tr");
    var soma = 0;
  
    if(linhas.length >= 1){
        for(var k=1; k<linhas.length; k++)
        {
//            var celulas = linhas[k].childNodes[3].innerText;
                var celulas = linhas[k].getElementsByTagName("td");
            soma+= parseFloat(celulas[1].innerText); 
             
           
        }
       
        valor_total.value = soma;
          
    }
}


function submeteFormulario()
{   
    var req = new XMLHttpRequest();
    var url = "../action/addPagamento.php";

    var valor_pago = document.getElementById("valor_pago");
    var tipo_operacao = document.getElementById("tipo_operacao");
    var venda = document.getElementById("venda");
    var data_pagamento = document.getElementById("data_pagamento");

    var pagamento = new Object();
    pagamento.valor_pago = valor_pago.value;
    pagamento.tipo_operacao = tipo_operacao.value;
    pagamento.venda = parseInt(venda.value);
    pagamento.data_pagamento = data_pagamento.value;
    
    var stringJSON = JSON.stringify(pagamento);
    console.log(pagamento.venda);
    
    req.open("POST", url, false);
    req.setRequestHeader("Content-Type", "application/json");
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
                msg.innerHTML = "Não foi possível concluir  o pagamento";
            }
        }
        else{
            msg.innerHTML = "Conexão falhou";
        }
    }
    req.send(stringJSON);

}