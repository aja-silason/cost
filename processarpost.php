<?php

include_once 'conexao_bd.php';

    $nomepost = $_POST['nomepost'];
    $idadepost = $_POST['idadepost'];
    $localizacao = $_POST['localizacao'];
    $contatopost =  $_POST['contatopost'];
    $descricaopost =  $_POST['descricaopost'];

    $sql = "INSERT INTO postagem (nomepost, idadepost, localizacao, contatopost, descricaopost) VALUES ('$nomepost','$idadepost','$localizacao','$contatopost','$descricaopost')";

    $post = mysqli_query($connect,$sql);

/*
    $smsend = $_POST['textomensagem'];

    $sqlvar = "INSERT INTO mensagem (sms) VALUES ('$smsend')";
    $salvarsms = mysqli_query($connect,$sqlvar);

*/

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
    <link rel="stylesheet" href="css/post.css"/>
    <title>Post</title>
</head>
<body>
      
        <div class="menu">
                    
            <nav class="menu">
                <ul>
                    <li><div class="logomenu">
                        <h3 style="color: #061327;
                        font-size: 3em;
                        width: 15%;
                        margin-top: 0%;
                        margin-bottom: -2%;">QVP</h3>
                    </div></li>
                    
                        
                    <li><form method="get" class="formpesq" action="pesquisa.php">
                        <input type="search" placeholder="Quem você procura?" name="filtro" class="inputpesquisar" required><input type="submit" value="Pesquisar" class="btnpesquisar">
                    </form></li>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="perfil.php">Meu Perfil</a></li>
                    <li><a href="post.php" class="active"><li>Criar post</a></li>
                    <li><a href="yelp.php"><li>Yelp</a></li>
                    <li><p><?php echo $dados['nome'];?></p></li>
                    <li><img src=""></li>
                    <li><a href="logout.php"><li>Terminar Sessão</a></li>
                </ul>
            </nav>
        </div>
    <br>
        <div class="corpopost">
            <h3 class="titutocorpo" style="color: green;">Postagem efectuada com sucesso.</h3>
            <a href="home.php">Ir para página inicial</a>
            <?php

                header('Location: home.php');
            ?>
        </div>

    </body>
</html>