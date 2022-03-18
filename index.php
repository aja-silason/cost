<?php

require_once 'conexao_bd.php';

$pst = "SELECT * FROM postagem order by idposts desc";
$resultadopst = mysqli_query($connect, $pst);  


/*$filtro = isset($_GET['filtro'])?$_GET['filtro']:"";

$sql = "SELECT * FROM postagem where nomepost like '%$filtro%' ";

$resultado = mysqli_query($connect, $sql);
$registros = mysqli_num_rows($resultado);*/

?>
<!DOCTYPE html>
<html lang="pt-ao">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilohome.css"/>
    <link rel="stylesheet" href="css/estilomenu.css"/>
    
    <title>Home</title>
</head>
<body>
      
    <div class="menuclass">
                
        <nav class="menuini">
            <ul>
                <li><div class="logomenu">
                    <h3>QVP</h3>
                </div></li>
                
                    
                <li><form method="get" class="formpesq" action="pesquisarsemlogin.php">
                    <input type="search" placeholder="Quem você procura?" class="inputpesquisar" name="filtro" required><input type="submit" value="Pesquisar" class="btnpesquisar">
                </form></li>
                <!--<li><a href="home.php" class="active">Home</a></li>
                <li><a href="perfil.php">Meu Perfil</a></li>
                <li><a href="post.php"><li>Criar post</a></li>-->
                <li><a href="login.php"><li>Login/Criar Conta</a></li>
                
            </ul>
        </nav>
    </div>
<br>
    <div class="corpohomeini">
        <h3 class="titutocorpo">Sugestões de Posts</h3>
        <hr style="color: rgb(218, 218, 218);"/>

        <!--<a href="post.php"><li class="btncriarpost">Criar Post<li></a>-->
        <br>  
        

        <div class="innerconteudoini">

            <?php              
                                            
                    while($exibirpst = mysqli_fetch_array($resultadopst)){
                        
                        $idposts = $exibirpst[0];
                        $imagemposts = $exibirpst[1];
                        $nomepost = $exibirpst[2];
                        $idadepost = $exibirpst[3];
                        $localizacao = $exibirpst[4];
                        $contatopost = $exibirpst[5];
                        $descricaopost= $exibirpst[6];
                        $datapost = $exibirpst[7];
                        
                        print "<div class='innerpstg'>";
                            print "<div class='innerpostagem' id='$idposts'>";                     

                                echo "<p>Publicação feita em ", $datapost, "</p>";

                                echo "<p>Diz que pretende encontrar ","<a href='veritens.php?.$idposts' style='font-weight: bold; margin-bottom: 5px;'><form method='get' action='veritenssemlogin.php?.$idposts'><input type='search' name='idposts' value='$idposts' style='display: none;'/><input type='submit' value='$nomepost' class='link home'/></a></p></form>
                                
                                
                                <img src='imagens/publicidade4.jpg' style='width: 500px; height: 500px; margin-right: 25px;' value='$idposts'> ";

                                //Espaço reservado para o sistema de likes                      

                                echo "
                                <form method='post' action='https://free.facebook.com/' target='_blank'>
                                    <a href='home.php?interagir'>
                                    <input type='submit' value='Partilhar | esta publicação no Facebook.' class='btninteragir btn'>
                                </a>
                                </form>";
                                
                                //echo "<a href='home.php?interagir'><p class='btninteragir'>Partilhar | x pessoas interagiram com esta publicação.</p></a>";

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