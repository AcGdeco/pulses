<?php
function test_input($data) {

  $data = trim($data);

  $data = stripslashes($data);

  $data = htmlspecialchars($data);

  return $data;

}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	//Validar o NOME

   if (empty($_POST["nome"])) {

    echo  "Nome é requirido\n";

	  $Erro = 1;

  } else {

    $nome = test_input($_POST["nome"]);

  }
  
  //Validar o SKU

   if (empty($_POST["sku"])) {

    echo  "SKU é requirido\n";

	  $Erro = 1;

  } else {

    $sku = test_input($_POST["sku"]);

  }
  
  //Validar o QUANTIDADE

   if (empty($_POST["qtd"])) {
    echo  "Quantidade é requirida\n";

	  $Erro = 1;
  
  } else {

    $qtd = test_input($_POST["qtd"]);

  }
  

if(empty($Erro)){

//Banco de dados

require_once 'Partes iguais/dbmysql.php';

// Create connection

$conn = mysqli_connect($servername, $username, $password, $dbname);



//Adicionar clientes no banco de dados

$sql = "INSERT INTO produtos (nome, sku, quantidade)

VALUES ('$nome', '$sku', '$qtd')";



if (mysqli_query($conn, $sql)) {

  echo "Produto Cadastrado\n";

} else {
     echo "Error: " . $sql . "<br>" . $conn->error."\n";
	echo "Não foi possível cadastrar o produto\n";
}

mysqli_close($conn);
 
}

}

?>