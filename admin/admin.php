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
    <link rel="stylesheet" href="../css/estilomenuadmin.css"/>
    <link rel="stylesheet" href="css/home.css"/>
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
        <h3 class="titutocorpo">Usuarios</h3>
        <hr style="color: rgb(218, 218, 218);"/>

        <div class="innerconteudohome">
            <div class="innerpostagem">
                <form>
                    <input type="text" placeholder="Comente..." name="comentario" class="coment">
                    <input type="submit" value="&RightArrow;" name="btncomente" class="btncoment"> 
                </form>
                    <br>
                    <img src="imagens/publicidade4.jpg" style="width: 95%; height: 50%;">

                    <p>Família Alexandre</p>
                    <p>Idade: 9, 35 e 46</p>
                    <p>Casa S/N: 31, Jacinto Tchipa</p>
                    <p>Contacto: 944996909</p>
                    <p>Família desaparecida desde o dia 31 de dezembro.</p>
                    <p>Pede-se a quem o encontra o favor de ligar pra o número acima.</p>
                    
            </div>
            
            <div class="innercomentario">
                <p><i>Username</i></p>
                <span>O vídeo fornece uma maneira poderosa de ajudá-lo a provar seu argumento. 
                    Ao clicar em Vídeo Online, você pode colar o código de inserção do vídeo que deseja adicionar. 
                    Você também pode digitar uma palavra-chave para pesquisar 
                    online o vídeo mais adequado ao seu documento.</span>
            </div>

        </div>

        
    </div>
    
</body>
</html>