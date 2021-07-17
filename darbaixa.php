<link rel="stylesheet" type="text/css" href="css/estilos.css">
<script type="text/javascript" src="js/darbaixa.js"></script>
<div id = 'div1'><span id = "carregando" >Carregando...</span></div>

<?php
require_once 'Partes iguais/Cabecalho.php';
require_once 'Partes iguais/menu.php';
?>
<br><br><br><br>
<div class = "flex" >
  <table class = "novo" >
    <tr>
      <td class = "titulo" colspan = "3" >
        &equiv; Adicionar Qtd. / Dar Baixa
      </td>
    </tr>
    <tr>
      <td style = "padding:10px;" colspan = "3" >
        <a href = "produtos.php" class = "avoltar"><span class = "voltar" >&lt; Voltar</span></a> 
        </td>
      </tr> 
    <tr>
      <td class = "tipoum">
        NOME / SKU / QTD. ESTOQUE<span class = "corvermelha" >*</span>
      </td>
      <td class = "tipoum" >
        QUANTIDADE
        <span class = "corvermelha" >*</span><br>
        <span style = "font-size:12px" >Valores negativos irão retirar, positivos incrementar</span>
      </td>
    </tr>
    <tr>
      <td class = "tipodois" >
        <select id = "produtos">
            <?php
                require_once 'Partes iguais/dbmysql.php';

                // Create connection
                $conn = mysqli_connect($servername, $username, $password, $dbname);

                $sql = "SELECT id, nome, sku, quantidade FROM produtos ORDER BY id ASC";

                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {

                echo "
                    <option value = '".$row["id"]."'>".$row["nome"]." / ".$row["sku"]." / ".$row["quantidade"]."</option>
                ";
                    }
                }

            ?>
        </select>
      </td>
      <td class = "tipodois" >
        <input type = "number" id = "qtd"/>
      </td>
    </tr>
    <tr>
      <td class = "paddingdez" colspan = "3" align="right" > 
        <span class = "botao" onclick = "darBaixaProduto()" >&#10004; Salvar</span>
      </td>
    </tr>
  </table>
</div>















<?php
require_once 'Partes iguais/Rodape.php';
?>