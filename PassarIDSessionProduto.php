<?php

session_start();

$_SESSION["id"] = $_POST["id"];

$_SESSION["nome"] = $_POST["nome"];

$_SESSION["sku"] = $_POST["sku"];

$_SESSION["qtd"] = $_POST["qtd"];


?>