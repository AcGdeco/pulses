<?php
function test_input($data) {

  $data = trim($data);

  $data = stripslashes($data);

  $data = htmlspecialchars($data);

  return $data;

}

//Banco de dados
require_once 'Partes iguais/dbmysql.php';

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
    $id = $_POST["id"];
 
  //Validar a QUANTIDADE

   if (empty($_POST["qtd"])) {

      echo  "Quantidade é requirida\n";
	  $Erro = 1;
  
  } else {

    $qtd = test_input($_POST["qtd"]);

    $qtdRetirada = $qtd;

    $sql = "SELECT id, quantidade FROM produtos WHERE id = '$id'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {
        
        $qtdBD = $row["quantidade"];
       
      }
    }

    if($qtdBD<$qtd){
        $Erro = 1;
        echo  "A quantidade para dar baixa é maior do que a contida no estoque\n";
    }else{
        $qtd = $qtdBD + $qtd;
    }

  }

if(empty($Erro)){

//Adicionar clientes no banco de dados

$sql = "UPDATE produtos SET quantidade='$qtd' WHERE id='$id'";



if (mysqli_query($conn, $sql)) {

  echo "Baixa Dada\n";

} else {
     echo "Error: " . $sql . "<br>" . $conn->error."\n";
	echo "Não foi possível editar o produto\n";
}

$sql = "INSERT INTO baixas (idProduto, quantidadeRetirada)

VALUES ('$id', '$qtdRetirada')";



if (mysqli_query($conn, $sql)) {

  //echo "Produto Cadastrado\n";

} else {
     echo "Error: " . $sql . "<br>" . $conn->error."\n";
	//echo "Não foi possível cadastrar o produto\n";
}

}

}

?>