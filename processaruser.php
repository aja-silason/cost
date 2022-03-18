<?php
require_once 'conexao_bd.php';

$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$pais = $_POST['pais'];
$pass = $_POST['pass'];
$email = $_POST['email'];

$sql = "INSERT INTO usuarios (nome, telefone, pais, pass, email) VALUES ('$nome', '$telefone', '$pais','$pass','$email')";
$criar = mysqli_query($connect,$sql);

mysqli_close($connect);
?>
<!DOCTYPE html>
<html lang="pt-ao">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilohome.css"/>
    <link rel="stylesheet" href="css/estilomenu.css"/>
    
    <title>Criar Conta</title>
</head>
<body>
      
    <div class="menuclass">
                
        <nav class="menuini">
            <ul>
                <li><div class="logomenu">
                    <h3>QVP</h3>
                </div></li>
                
                    
                <li><form method="get" class="formpesq" action="pesquisa.php">
                    <input type="search" placeholder="Quem você procura?" name="filtro" class="inputpesquisar" required><input type="submit" value="Pesquisar" class="btnpesquisar">
                </form></li>
                <li><a href="login.php"><li>Login/Criar Conta</a></li>
                
            </ul>
        </nav>
    </div>
<br>
    <div class="corpohomeini">
        <h3 class="titutocorpo">Conta criada com sucesso.</h3>
        <hr style="color: rgb(218, 218, 218);"/>

        <br>  
        

        <div class="innerconteudoini">
            
        <a href="login.php"><li class="btncriarpost">Acessar a minha conta<li></a>

        </div>
        
    </div>

    
</body>
</html>