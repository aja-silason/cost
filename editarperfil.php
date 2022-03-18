<?php

require_once 'conexao_bd.php';

session_start();

if(!isset($_SESSION['logado'])):
    header('Location: index.php');

endif;

$id = $_SESSION['id_usuario'];
$sql = "SELECT * FROM usuarios WHERE id = '$id'";
$resultado = mysqli_query($connect, $sql);
$dados = mysqli_fetch_array($resultado);
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
    <link rel="stylesheet" href="css/perfil.css"/>

    <title>Meu Perfil</title>
</head>
<body>
      
<div class="menuclass">
                
                <nav class="menu">
                    <ul>
                        <li><div class="logomenu">
                            <h3>QVP</h3>
                        </div></li>
                        
                            
                        <li><form method="get" class="formpesq" action="pesquisa.php">
                            <input type="search" placeholder="Quem você procura?" name="filtro" class="inputpesquisar" required><input type="submit" value="Pesquisar" class="btnpesquisar">
                        </form></li>
                        <li><a href="home.php" class="active">Home</a></li>
                        <li><a href="perfil.php">Meu Perfil</a></li>
                        <li><a href="post.php"><li>Criar post</a></li>
                        <li><a href="yelp.php"><li>Yelp</a></li>
                        
                        <li><a href="logout.php"><li>Sair</a></li>
                    </ul>
                </nav>
            </div>
        <br>
            <div class="corpoedtperfil">
                <br>
                <li><p><?php echo $dados['nome'];?></p></li>
                <li><img src=""></li>
        
            <h3 class="titutocorpo">Editar Perfil</h3>
            
            <?php
                if(isset($_POST['bnteditnome'])):

                    #$alternome = mysqli_escape_string($connect, $_POST['alternome']);
                        if(empty($alternome)):
                            $erros[] = "<p>Erro, preencha</p>";
                            #$alterar = "UPDATE usuarios SET alternome = nome WHERE id = '$id'";
                            #$alterado = mysqli_query($connect,$alterar);
                        endif;
                endif;
            ?>
            
            <div class="meuperfil" id="meuperfil">
                <?php
                    if(!empty($erros)):
                        foreach($erros as $erro):
                    echo $erro;
                    endforeach;
                    endif;
                ?>
                <!--<?php echo $_SERVER['PHP_SELF']; ?>-->
                <form method="post" action="processaredtperfil.php">
                    
                    <img src="imagens/publicidade4.jpg" class="imgperfil">
                    <br><input type="submit" value="Trocar a foto de user" class="bnteditimg">
                    <br><br>

                    <p><?php echo$dados['nome']?>
                    <br>
                    <input type="text" name="alternome">
                    <br>
                    <br>
                    </p><input type="submit" value="Editar Nome" class="bnteditnome" name="bnteditnome">
                </form>
                    <br>
                    <br>
                    
                    <p>Email : <?php echo$dados['email']?></p><input type="submit" value="Editar Email" class="bnteditemail">
                    
                    <br>
                    <br>
                    
                    <p>Contacto: <?php echo$dados['telefone']?></p><input type="submit" value="Editar Contacto" class="bnteditconta">
                    
                    <br>
                    <br>
                    
                    <p>Descrição:<p>
                    <p style="Width: 100%; text-align: center; "><?php echo$dados['descricao']?></p><input type="submit" value="Editar Descrição" class="bnteditdesc">
                
                      <br>
                      <br>
                      <br>
                      <br>
                      <br>
                      <br>
                      <p class="ireditperfil"><a href="perfil.php" class="" id="ireditperfil">&leftarrow; Voltar ao Meu Perfil</a></p>
                <br>
                <br>
            </div>


        </div>

    </body>
</html>