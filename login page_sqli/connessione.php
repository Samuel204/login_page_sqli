<?php
$servername = "localhost";
$username = "root";
$password = "";

$db_name = "database_1";

$conn = mysqli_connect($servername, $username, $password, $db_name);

if(!$conn){
    echo "Connessione fallita";
}

?>