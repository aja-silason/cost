<?php
    include_once "conexao_bd.php";

    

    $smsend = $_POST['textomensagem'];

    $sqlvar = "INSERT INTO mensagem (sms) VALUES ('$smsend')";
    $salvarsms = mysqli_query($connect,$sqlvar);

    mysqli_close($connect);

    header('Location: yelp.php');

?>