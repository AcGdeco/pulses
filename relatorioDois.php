<link rel="stylesheet" type="text/css" href="css/estilos.css">
<script type="text/javascript" src="js/relatorio.js"></script>

<?php
require_once 'Partes iguais/Cabecalho.php';
?>
<div id = 'div1'><span id = "carregando" >Carregando...</span></div>

<?php
require_once 'Partes iguais/menu.php';
?>

<br><br><br><br>

<div class = "flex">
<table class = "lista" id = 'tabela' >
<?php
    require_once 'Partes iguais/dbmysql.php';

    echo "<tr>
              <td style = 'border:solid 1px gray;padding:5px;width:50px;background-color:lightgray;' >ID</td>";
        echo "<td style = 'border:solid 1px gray;padding:5px;width:200px;background-color:lightgray;' >NOME</td>";
        echo "<td style = 'border:solid 1px gray;padding:5px;width:200px;background-color:lightgray;' >SKU</td>";
        echo "<td style = 'border:solid 1px gray;padding:5px;width:135px;background-color:lightgray;' >QUANTIDADE</td>";
        echo "<td style = 'border:solid 1px gray;padding:5px;width:135px;background-color:lightgray;' >DATA</td>";
    echo "</tr>";
    
    $menu[0] = "";
    $contador = 0;
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    $sql = "SELECT 

    *

    FROM produtos a
    
    INNER JOIN baixas b
    ON a.id = b.idProduto";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
    $dataJaExiste = "Não";
    echo "<tr>
              <td style = 'border:solid 1px gray;padding:5px;width:50px;' >".$row["id"]."</td>";
        echo "<td style = 'border:solid 1px gray;padding:5px;width:200px;' >".$row["nome"]."</td>";
        echo "<td style = 'border:solid 1px gray;padding:5px;width:200px;' >".$row["sku"]."</td>";
        if($row["quantidade"] < 100){
            echo "<td style = 'border:solid 1px gray;padding:5px;width:135px;color:red;' >".$row["quantidadeRetirada"]."</td>";
        }else{
            echo "<td style = 'border:solid 1px gray;padding:5px;width:135px;' >".$row["quantidadeRetirada"]."</td>";
        }
        $data = date('d/m/Y', strtotime($row["data"]));
        echo "<td style = 'border:solid 1px gray;padding:5px;width:135px;' >".$data."</td>";
    echo "</tr>";

        for($i=0;$i<=$contador;$i++){
            if($menu[$i] == $data){
                $dataJaExiste = "Sim";
            }
        }
        
        if($dataJaExiste == "Não"){
            $menu[$contador] = $data;
            $contador += 1;
            $menu[$contador] = "";
        }
    }
    }
?>
</table>
</div>

<?php
echo "<div style = 'display:flex;justify-content:center;' >";
echo "<select style = 'position:absolute;top:50px;' id = 'data' onchange = 'filtrarTabela()' >";
for($i=0;$i<$contador;$i++){
    echo "
    <option value = '$menu[$i]'>$menu[$i]</option>
    ";
}
echo "</select>";
echo "</div>";
?>

<?php
require_once 'Partes iguais/Rodape.php';
?>
<script>

var table = document.getElementById('tabela');

var linhasFicaramInvisiveisPeloFiltro = [];

for (var r = 1; r < table.rows.length; r++){  	
	linhasFicaramInvisiveisPeloFiltro[r] = '';
}

filtrarTabela();

</script>