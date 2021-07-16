<link rel="stylesheet" type="text/css" href="css/estilos.css">
<script type="text/javascript" src="js/novoProduto.js"></script>

<?php
require_once 'Partes iguais/Cabecalho.php';
?>
<div id = 'div1'><span id = "carregando" >Carregando...</span></div>

<?php
require_once 'Partes iguais/menu.php';
?>

<br><br>
<!--
Informações
--> 

<div class = "flex" >
  <table class = "novo" >
    <tr>
      <td class = "titulo" colspan = "3" >
        &equiv; Cadastro de Produtos
      </td>
    </tr>
    <tr>
      <td style = "padding:10px;" colspan = "3" >
        <a href = "produtos.php" class = "avoltar"><span class = "voltar" >&lt; Voltar</span></a> 
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
        <input type = "text" id = "nome" />
      </td>
      <td class = "tipodois" >
        <input type = "text" id = "sku"/>
      </td>
      <td class = "tipodois" >
        <input type = "number" id = "qtd"/>
      </td>
    </tr>
    <tr>
      <td class = "paddingdez" colspan = "3" align="right" > 
        <span class = "botao" onclick = "salvarProduto()" >&#10004; Salvar</span>
      </td>
    </tr>
  </table>
</div>
<?php
require_once 'Partes iguais/Rodape.php';
?>