<?php
require_once '../conexao_bd.php';

session_start();

if(!isset($_SESSION['logado'])):
    header('Location: ../');
endif;

$id = $_SESSION['id_usuario'];
$sql = "SELECT * FROM usuarios WHERE id = '$id'";
$resultado = mysqli_query($connect, $sql);
$dados = mysqli_fetch_array($resultado);

?>
<!DOCTYPE html>
<html lang="pt-ao">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilohome.css"/>
    <link rel="stylesheet" href="../css/estilomenu.css"/>
    <link rel="stylesheet" href="../css/home.css"/>
    <link rel="stylesheet" href="../css/perfil.css"/>
    <title>Admin</title>
</head>
<body>
      
<div class="menuclass">
                
                <nav class="menu">
                    <ul>
                        <li><div class="logomenu">
                            <h3>QVP</h3>
                        </div></li>
                        
                            
                        <li><form method="post" class="formpesq" action="pesquisa.php">
                            <input type="search" placeholder="Quem você procura?" class="inputpesquisar"><input type="submit" value="Pesquisar" class="btnpesquisar">
                        </form></li>
                        
                            <li><a href="admin.php" class="active">Home</a></li>
                            <li><a href="perfiladmin.php">Perfil Admin</a></li>
                            <li><a href="estatistica.php"><li>Estatisticas</a></li>
                        
                        <li><a href="logoutadmin.php"><li>Sair</a></li>
                    </ul>
                </nav>
            </div>
        <br>
        <div class="corpohome">
            <br>
            <li><p><?php echo $dados['nome'];?></p></li>
            <li><img src=""></li>
<br>
        <h3 class="titutocorpo">Perfil admin</h3>
        <div class="meuperfil" id="meuperfil">
               
                <img src="imagens/publicidade.jpg" class="imgperfil">
                
                <br><br>
                <p><?php echo$dados['nome']?></p>

                <p>Email : <?php echo$dados['email']?></p>
                
                <p>Contacto: <?php echo$dados['telefone']?></p>
                <p>Descrição:<p>
                <p style="Width: 100%; text-align: center; ">jhwefrwegh w gjh g r gkjwkw r r h rjktnknktn3nkhrwebuew
                     ewewhjbubewubueuiewbl,jew
                      wjhwbbw w thbw</p>
                      <br>
                      <br>
                      <p class="ireditperfil"><a href="editarperfil.php" class="" id="ireditperfil">Editar Perfil</a></p>
                
            </div>

        
    </div>
    
</body>
</html>