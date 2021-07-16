function Carregando(){
	document.getElementById('div1').style.display = 'flex';
}

function PararCarregando(){
	document.getElementById('div1').style.display = 'none';
}

function Editar(){
	document.getElementById('nome').disabled = false;
	document.getElementById('sku').disabled = false;
	document.getElementById('qtd').disabled = false;
	document.getElementById('salvar').style.display = 'inline';
}

function Excluir(id){
	
	if (confirm("Você realmente deseja apagar esse produto?")) {
	  g = id;
  
	var xhttp = new XMLHttpRequest();

	  xhttp.onreadystatechange = function() {
      Carregando();
	  if (xhttp.readyState == 4 && xhttp.status == 200) {

		c = xhttp.responseText;

		PararCarregando();

        alert(c);
        window.open('produtos.php','_self');

	  }

	};

	xhttp.open("POST", "apagarProdutos.php", true);

	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	xhttp.send("id=" + g);
	
	}
	
}
function editarProduto(id){
    Carregando();
	var nome;
	var sku;
	var qtd;

	nome =  document.getElementById("nome").value;
	sku =  document.getElementById("sku").value;
	qtd =  document.getElementById("qtd").value;
	enviar = "nome="+nome+"&sku="+sku+"&qtd="+qtd+"&id="+id;

	var xhttp = new XMLHttpRequest();

	xhttp.onreadystatechange = function() {

	    if (xhttp.readyState == 4 && xhttp.status == 200) {

            resposta = xhttp.responseText;
            alert(resposta);
            window.open('produtos.php','_self');
			PararCarregando();
	
        }
    };

	xhttp.open("POST", "editarProduto.php", true);

	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    
	xhttp.send(enviar)
}