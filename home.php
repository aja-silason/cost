<?php

require_once 'conexao_bd.php';

session_start();

if(!isset($_SESSION['logado'])):
    header('Location: index.php');

endif;

$id = $_SESSION['id_usuario'];
$sql = "SELECT * FROM usuarios WHERE id = '$id'";
$pst = "SELECT * FROM postagem order by idposts desc";


$resultado = mysqli_query($connect, $sql);
$dados = mysqli_fetch_array($resultado);
$resultadopst = mysqli_query($connect, $pst);       

?>

<!DOCTYPE html>
<html lang="pt-ao">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilohome.css"/>
    <link rel="stylesheet" href="css/estilomenu.css"/>
    <link rel="stylesheet" href="css/home.css"/>
    <title>Home</title>
</head>
<body>
      
    <div class="menuclass">
        <!-- Menu flutuante -->            
        <div class="menu flutuante">
            <ul>
                <h3 class="logomenu">QVP</h3>
                <li><a href="home.php"><img src="reacoes/iconhome.png"></a></li>
                <li><a href="perfil.php"><img src="reacoes/iconesuser.png"></a></li>
                <li><a href="post.php"><img src="reacoes/iconespost.png"></a></li>
                <li><a href="yelp.php"><img src="reacoes/iconsms.png"></a></li>

                <li class="ultimoimg"><a href="logout.php" ><img src="reacoes/iconesair.png"></a></li>
                <br>
                <li><form method="get" class="formpesq" action="pesquisa.php">
                    <input type="search" placeholder="Quem você procura?" name="filtro" class="inputpesquisar" required><input type="submit" value="Pesquisar" class="btnpesquisarflutuante">
                </form></li>
            </ul>
        </div>
        <!-- Fim do Menu flutuante -->
        
        <nav class="menu">
            <ul>
                <li><div class="logomenu">
                    <h3>QVP</h3>
                </div></li>
                
                <li><form method="get" class="formpesq" action="pesquisa.php">
                    <input type="search" placeholder="Quem você procura?" name="filtro" class="inputpesquisar" required><input type="submit" value="Pesquisar" class="btnpesquisar">
                </form></li>
                <!-- Menu normal-->
                <li><a href="home.php" class="active">Home</a></li>
                <li><a href="perfil.php">Meu Perfil</a></li>
                <li><a href="post.php"><li>Criar post</a></li>
                <li><a href="yelp.php"><li>Yelp</a></li>
                
                <li><a href="logout.php"><li>Sair</a></li>
                <!-- Menu normal-->
            </ul>
        </nav>

    </div>
<br>
    <div class="corpohome">
        <br>
        <li><p><?php echo $dados['nome'];?></p></li>
        <li><img src=""></li>
        <h3 class="titutocorpo">Posts</h3>
        <hr style="color: rgb(218, 218, 218);"/>
        
        <div>
            <a href="post.php"><li class="btncriarpost">Criar Post<li></a>
        </div>
        
        <br>  

        <div class="innerconteudohome">
            <br>

            <?php              
                                            
                    while($exibirpst = mysqli_fetch_array($resultadopst)){
                        
                        $idposts = $exibirpst[0];
                        $imagemposts = $exibirpst[1];
                        $nomepost = $exibirpst[2];
                        $idadepost = $exibirpst[3];
                        $localizacao = $exibirpst[4];
                        $contatopost = $exibirpst[5];
                        $descricaopost = $exibirpst[6];
                        $datapost = $exibirpst[7];
                        
                        print "<div class='innerpstg'>";
                            print "<div class='innerpostagem' id='$idposts'>";                     

                                echo "<p>O usuário ","<a href='#' style='font-weight: bold; margin-bottom: 5px;'> $nomepost </a>"," fez está publicação em ", $datapost, "</p>";

                                echo "<p>E diz que pretende encontrar ","<a href='veritens.php?.$idposts' style='font-weight: bold; margin-bottom: 5px;'><form method='get' action='veritens.php?.$idposts'><input type='search' name='idposts' value='$idposts' style='display: none;'/><input type='submit' value='$nomepost' class='link home h'/></a></p></form>
                                
                                
                                <img src='imagens/publicidade4.jpg' style='width: 500px; height: 500px; margin-right: 25px;' value='$idposts'> ";

                                //Espaço reservado para o sistema de likes                      

                                echo "<a href='home.php?interagir'><p class='btninteragir'>Interagir | x pessoas interagiram com esta publicação.</p></a>";

                                print "<div class='socialshare'>";

                                    echo "<form method='post' action='https://free.facebook.com/' target='_blank'>
                                            <a href='home.php?interagir'>
                                            <input type='submit' value='Partilhar | Facebook' class='btninteragir btn home fb'> 
                                            </a>
                                        </form>
                                        
                                        <form method='post' action='https://www.instagram.com/' target='_blank'>
                                            <a href='home.php?interagir'>
                                            <input type='submit' value='Partilhar | Instagram' class='btninteragir btn home insta'> 
                                            </a>
                                        </form>
                                        
                                        <form method='post' action='https://www.twitter.com/' target='_blank'>
                                            <a href='home.php?interagir'>
                                            <input type='submit' value='Partilhar | Twitter' class='btninteragir btn home twitter'> 
                                            </a>
                                        </form>";
                                print "</div>";
                                //echo "<a><p class='btninteragir'>Interagir | tu e mais x pessoas interagiram com esta publicação.</p></a>";

                                //sistema de likes
                                                                
                            print "</div>";
                        
                            print "<div class='innercomentario'>";

                                echo "<p style='margin-top: 5px; margin-bottom: 5px; text-transform: uppercase; font-weight: bold;'>","Dados do desaparecido","</p>";
                                
                                echo "<p> Nome: ","$nomepost"," </p>";
                                echo "<p>Idade: ","$idadepost"," </p>";
                                echo "<p>Localização: ","$localizacao"," </p>";
                                echo "<p>Tel: ","$contatopost","</p>";
                                echo "<p>Descrição: ","$descricaopost"," </p>";

                            print "</div>";
                        print "</div>";
                        print "<br>";
                        print "<br>";
                        
                }
                            
                mysqli_close($connect);
                                    
            ?>

        </div>
        
    </div>
        
</body>
</html>