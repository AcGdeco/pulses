function Carregando(){
	document.getElementById('div1').style.display = 'flex';
}

function PararCarregando(){
	document.getElementById('div1').style.display = 'none';
}

function salvarProduto(){
	Carregando();
	var nome;
	var sku;
	var qtd;

	nome =  document.getElementById("nome").value;
	sku =  document.getElementById("sku").value;
	qtd =  document.getElementById("qtd").value;
	enviar = "nome="+nome+"&sku="+sku+"&qtd="+qtd;

	var xhttp = new XMLHttpRequest();

	xhttp.onreadystatechange = function() {

	    if (xhttp.readyState == 4 && xhttp.status == 200) {

            resposta = xhttp.responseText;
            alert(resposta);
			PararCarregando();
	
        }
    };

	xhttp.open("POST", "salvarProduto.php", true);

	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    
	xhttp.send(enviar)
}