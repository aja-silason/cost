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
    <link rel="stylesheet" href="../css/estiloadmin.css"/>
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
        <div class="corpoestatisticauser">
            
        
        <div class="innerestatisticasuser">
        
        <li><p><?php echo $dados['nome'];?></p></li>
            <li><img src=""></li>

            <h3 class="titutocorpo">Estatisticas de usuarios</h3>
        
        <?php
            $sqlmostrar = "SELECT * FROM usuarios";
            $consulta = mysqli_query($connect,$sqlmostrar);
            $registros = mysqli_num_rows($consulta);

            print "<br>";
            print "$registros Usuários registrados no sistema";
            print "<br>";
            print "<br>";
            print "<br>";
            
            while($exibirUser = mysqli_fetch_array($consulta)){

                $id = $exibirUser[0];
                $nome = $exibirUser[1];
                $telefone = $exibirUser[2];
                $pais = $exibirUser[4];
                $email = $exibirUser[5];
                

                print "<div class='exibiruser'>";

                    print "$id";
                    print "$nome";
                    print "$pais";
                    print "$email";
                    
                    print "<form method='post' action='processareliminaruser.php'>";
                        print "<input type='submit' value='Excluir User' class='btneliminaruser' id='btneliminaruser' name='btneliminaruser'>";
                    print "</form>";
                print "</div>";
                print "<hr>";
                print "<br>";
            }
            ?>
            
        </div>    
    </div>
    
</body>
</html>