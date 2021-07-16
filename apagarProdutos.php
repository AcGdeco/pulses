<?php

require_once 'Partes iguais/dbmysql.php';

$id = $_POST["id"];
	
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

// sql to delete a record
$sql = "DELETE FROM produtos WHERE id=$id";

if ($conn->query($sql) === TRUE) {
	echo "O produto foi apagado";
} else {
	echo "Error deleting record: " . $conn->error;
}

$conn->close();

?>