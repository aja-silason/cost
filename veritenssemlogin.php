<?php

require_once 'conexao_bd.php';


$veritens = isset($_GET['idposts'])?$_GET['idposts']:"";

$pst = "SELECT * FROM postagem order by idposts";
$sqln = "SELECT * FROM postagem where idposts like '$veritens' ";

$resultadopst = mysqli_query($connect, $sqln);       

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
                <li><form method="get" class="formpesq" action="pesquisarsemlogin.php">
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
                
                <li><form method="get" class="formpesq" action="pesquisarsemlogin.php">
                    <input type="search" placeholder="Quem você procura?" name="filtro" class="inputpesquisar" required><input type="submit" value="Pesquisar" class="btnpesquisar">
                </form></li>
                <!-- Menu normal-->

                <li><a href="index.php?"><li>Home</a></li>
                <li><a href="login.php?"><li>Login/Criar Conta</a></li>
                <!-- Menu normal-->
            </ul>
        </nav>

    </div>
<br>
    <div class="corpohome">
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
                                
                                    
                                    echo "<p>Publicação feita por ","<a href='login.php?' style='font-weight: bold; margin-bottom: 5px;'> Usuário do sistema </a>"," em ", $datapost, "</p>";


                                    print "<img src='imagens/publicidade4.jpg' style='width: 500px; height: 500px; margin-right: 25px;'>";

                                    //Espaço reservado para o sistema de likes                      

                                    echo "
                                    <form method='post' action='https://free.facebook.com/' target='_blank'>
                                    <a href='home.php?interagir'>
                                    <input type='submit' value='Partilhar | esta publicação no Facebook.' class='btninteragir btn'>
                                    </a>";
                                    //echo "<a><p class='btninteragir'>Interagir | tu e mais x pessoas interagiram com esta publicação.</p></a>";

                                    //sistema de likes
                                    
                                    echo "<p style='margin-top: 5px; margin-bottom: 5px; text-transform: uppercase; font-weight: bold;'>","Dados do desaparecido","</p>";
                                    
                                    echo "<p> Nome: ","$nomepost"," </p>";
                                    echo "<p>Idade: ","$idadepost"," </p>";
                                    echo "<p>Localização: ","$localizacao"," </p>";
                                    echo "<p>Tel: ","$contatopost","</p>";
                                    echo "<p>Descrição: ","$descricaopost"," </p>";
                                                                    
                                print "</div>";
                            
                                print "<div class='innercomentario ver'>";

                                    echo "<br>";
                                    echo "<p style='font-weight: bold;'><a href='login.php?'>Usuário do sistema</a></p>";
                                    echo "<p style='color: gray;'>Comentário dos usuarios...</p>";

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