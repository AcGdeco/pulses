function Carregando(){
	document.getElementById('div1').style.display = 'flex';
}

function PararCarregando(){
	document.getElementById('div1').style.display = 'none';
}
function darBaixaProduto(){
    Carregando();
	var id;
	var qtd;

	id =  document.getElementById("produtos").value;
	qtd =  document.getElementById("qtd").value;
	enviar = "id="+id+"&qtd="+qtd;

    var xhttp = new XMLHttpRequest();

	xhttp.onreadystatechange = function() {

	    if (xhttp.readyState == 4 && xhttp.status == 200) {

            resposta = xhttp.responseText;
            alert(resposta);
            window.open('darbaixa.php','_self');
			PararCarregando();
	
        }
    };

	xhttp.open("POST", "darBaixaProduto.php", true);

	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    
	xhttp.send(enviar)
    
}