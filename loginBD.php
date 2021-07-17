<?php
session_start();

$user = $_POST["login"];
$senha = $_POST["senha"];

if (empty($_POST["login"])) {

    echo  "Login é requirido\n";

	$Erro = 1;

}
if (empty($_POST["senha"])) {

echo  "Senha é requirido\n";

$Erro = 1;

}

if(empty($Erro)){
    //Banco de dados
    require_once 'Partes iguais/dbmysql.php';

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    //Checar se o email já existe cadastrado
    $sql = "SELECT id, user, senha FROM usuarios";
    $result = $conn->query($sql);

    $loginExiste = "Não";
    $senhaExiste = "Não";

    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if($row["user"] == "$user"){
            $loginExiste = "Sim";
        }
        if($row["senha"] == "$senha"){
            $senhaExiste = "Sim";
        }
        if($row["user"] == "$user" && $row["senha"] == "$senha"){
            $idusuario = $row["id"];
            $user = $row["user"];
            $senha = $row["senha"];
        }
    }
    } else {
        //echo "0 results";
    }
     
    if($loginExiste == "Não"){
        echo "Este login não existe cadastrado em nosso site.\n";
    }
    if($senhaExiste == "Não" && $loginExiste == "Sim"){
        echo "O login está cadastrado em nosso site porém a senha não bate.\n";
    }
    if($loginExiste == "Sim" && $senhaExiste == "Sim"){
        echo "Login efetuado!";
        $_SESSION["idUsuario"] = $idusuario;
        $_SESSION["user"] = $user;
        $_SESSION["senha"] = $senha;
    }
}

























?>