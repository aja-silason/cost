<?php
$servername = "localhost";
$username = "root";
$password = "";
$basededados = "quemvoceprocurabd";

$connect = mysqli_connect($servername, $username, $password, $basededados);

if(mysqli_connect_error()):
    echo "Falha na conexão com o servidor".mysqli_connect_error();
endif;


?>