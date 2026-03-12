<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "auth_store";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

?>