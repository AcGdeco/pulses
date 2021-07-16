<link rel="stylesheet" type="text/css" href="css/estilos.css">
<script type="text/javascript" src="js/editarexcluirproduto.js"></script>

<?php
require_once 'Partes iguais/Cabecalho.php';
?>
<div id = 'div1' style = "z-index:6;display:none;position:fixed;width:100%;background-color:lightgray;height:100%;opacity:0.8;align-items: center;justify-content:center;" ><span style = "opacity:1;font-weight:bolder;color:black;" >Carregando...</span></div>

<?php
require_once 'Partes iguais/menu.php';
?>
<?php

$id = $_SESSION["id"];

$nome = $_SESSION["nome"];

$sku = $_SESSION["sku"];

$qtd = $_SESSION["qtd"];

?>
<br><br>
<form action = "editarImoveis.php" method="post" enctype="multipart/form-data" >
<div style = "display:flex;justify-content:center;" >
<table style = "border-collapse:collapse;border:solid 1px gray;" >
<tr><td style = "background-color:LightGoldenRodYellow;padding:10px;border:solid 1px gray;font-weight:bolder;" colspan = "3" >
&equiv; Cadastro de Imóveis
</td></tr>
<tr><td style = "padding:10px;" colspan = "3"  >
<a onclick="window.open(document.referrer,'_self');" style = "text-decoration:none;" ><span style = "background-color:#E8E8E8;border:solid 1px gray;font-weight:bolder;color:black;padding:5px;cursor:pointer;padding-left:10px;padding-right:10px;">&lt; Voltar</span></a> 

<span onclick = "Editar()" style = "background-color:orange;font-weight:bolder;color:white;padding:5px;cursor:pointer;border:solid 1px chocolate;padding-left:10px;padding-right:10px;margin:1px;"> <img width = "15px;" src = "imagens/editar.jpg" /> Editar </span>

<span onclick = "Excluir(<?php echo $id; ?>)" style = "background-color:red;font-weight:bolder;color:white;padding:5px;cursor:pointer;border:solid 1px darkred;padding-left:10px;padding-right:10px;margin:1px;"> <img width = "15px;" src = "imagens/Lixeira.jpg" /> Excluir </span>
</td>
</tr> 
<tr>
	<td class = "tipoum">
		NOME<span class = "corvermelha" >*</span>
	</td>
	<td class = "tipoum" >
		SKU<span class = "corvermelha" >*</span>
	</td>
	<td class = "tipoum" >
		QUANTIDADE
		<span class = "corvermelha" >*</span>
	</td>
	</tr>
	<tr>
	<td class = "tipodois" >
		<input type = "text" id = "nome" value = "<?php echo $nome; ?>" disabled />
	</td>
	<td class = "tipodois" >
		<input type = "text" id = "sku" value = "<?php echo $sku; ?>" disabled />
	</td>
	<td class = "tipodois" >
		<input type = "number" id = "qtd" value = "<?php echo $qtd; ?>" disabled />
	</td>
	</tr>
	<tr>
	<td class = "paddingdez" colspan = "3" align="right" > 
		<span style = "display:none;" class = "botao" onclick = "editarProduto(<?php echo $id; ?>)" id = "salvar" >&#10004; Salvar</span>
	</td>
</tr>
<br><br>

<?php
require_once 'Partes iguais/Rodape.php';
?>