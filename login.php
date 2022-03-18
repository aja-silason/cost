<?php

require_once 'conexao_bd.php';

session_start();

/* Para manter o inicio de sessão organizado*/
if(isset($_SESSION['logado'])):
    header('Location: home.php');
endif;

if(isset($_POST['acessarconta'])):
    $erros = array();
    $fonelogin = mysqli_escape_string($connect, $_POST['fonelogin']);
    $pass = mysqli_escape_string($connect, $_POST['passlogin']);

    if(empty($fonelogin) or empty($pass)):
        $erros[] = "<p class='erro3'>Preencha todos os campos para poderes iniciar sessão.</p>";
    
    else:
        $sql = "SELECT telefone FROM usuarios WHERE telefone='$fonelogin'";
        $resultado = mysqli_query($connect, $sql);

        if(mysqli_num_rows($resultado) > 0 ):
            $sql = "SELECT * FROM usuarios WHERE telefone = '$fonelogin' AND pass = '$pass'";
            $resultado = mysqli_query($connect, $sql);
            
            if(mysqli_num_rows($resultado) == 1):
                $dados = mysqli_fetch_array($resultado);
                mysqli_close($connect);   

                $_SESSION['logado'] = true;
                $_SESSION['id_usuario'] = $dados['id'];

                header('Location: home.php');

                if($_SESSION['id_usuario'] == 1):
                    header('Location: admin/admin.php');
                endif;

            else:
                $erros[] = "<p class='erro'>Usuário não existe, crie uma conta se não tiveres uma.</p>";
            
            endif;

        else:
            $erros[] = "<p class='erro2'>Usuário não existe, crie uma conta se não tiveres uma.</p>";
        endif;

    endif;
endif;
?>

<!DOCTYPE html>
<html lang="pt-ao">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilologin.css"/>


    <title>Iniciar Sessão</title>
</head>
<body>

    <!--area do login-->   
        <div class="wrapper">
                    <div class="titulo-texto">
                        <div class="titulo login">Logar no QVP</div>
                        <div class="titulo criarconta">Criar Conta</div>
                    </div>
                    
                <div class="formcoonteiner">
                    <div class="slide-controlo">
                        <input type="radio" name="slider" id="login" checked>
                        <input type="radio" name="slider" id="criarconta">
                        <label for="login" class="slide login">Login</label>
                        <label for="criarconta" class="slide criar">Criar Conta</label>  
                        <div class="slide-tab"></div>  
                    </div>
                    <div class="interno">

                        <div class="loginform" id="loginform">

                            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="formlogin" id="formlogin">
                                <?php
                                    if(!empty($erros)):
                                        foreach($erros as $erro):
                                            echo $erro;
                                        endforeach;
                                    endif;
                                ?>
                                <div class="campoinput">
                                    <input type="number" name="fonelogin" class="fonelogin" id="fonelogin" placeholder="Telefone" maxlength="15" minlegth="9">
                                </div>
                                <div class="campoinput">
                                    <input type="password" name="passlogin" class="passlogin" id="passlogin" placeholder="Palavra-Passe" maxlegth="12" minlegth="6">
                                </div>
                                <div class="campoinput">
                                    <input type="submit" value="Acessar" name="acessarconta" class="btnacessarconta">
                                </div>
                                <div class="esqueciapass"><a href="#">Esqueci a minha palavra-passe.</a></div>
                                <div class="criarconta">Não tenho uma conta <a href="#">Criar uma agora.</a></div>
                            </form>

                        </div>
                                                    
                            <div class="corpologin">
                                <!--area do cadastro de user-->
                                <div class="cadastrouser" id="cadastrouser">
                                    <?php 
                                    if(isset($_POST['criarcontauser'])):
                                        $erros = array();
                                        $nomecreate = mysqli_escape_string($connect, $_POST['nome']);
                                        $telefonecreate = mysqli_escape_string($connect, $_POST['telefone']);
                                        $paiscreate = mysqli_escape_string($connect, $_POST['pais']);
                                        $passcreate = mysqli_escape_string($connect, $_POST['pass']);
                                        $emailcreate = mysqli_escape_string($connect, $_POST['email']);
                                    
                                        if(empty($nomecreate) or empty($telefonecreate)):
                                            $erros[] = "<li>Preencha todos os campos</li>";
                                        endif;
                                    endif;
                                    ?>
                                    
                                    <form method="post" action="processaruser.php" class="formcreate" id="formcreate">
                                        <div class="campoinput">
                                            <input type="text" name="nome" class="nomecreate" id="nomecreate" placeholder="O seu nome" maxlength="30" minlegth="6" required>
                                        </div>
                                        <div class="campoinput">
                                            <input type="number" name="telefone" class="telefonecreate" id="telefonecreate" placeholder="O seu telemóvel" maxlength="20" minlegth="9" required>
                                        </div>
                                        <div class="campoinput">                                  
                                            <select name="pais" id="paiscreate" class="paiscreate">
                                                <option>A tua província</option>
                                                <option>Bengo</option>
                                                <option>Benguela</option>
                                                <option>Bié</option>
                                                <option>Cabinda</option>
                                                <option>Cuando Cubango</option>
                                                <option>Cuanza Norte</option>
                                                <option>Cuanza Sul</option>
                                                <option>Cunene</option>
                                                <option>Huambo</option>
                                                <option>Huíla</option>
                                                <option>Luanda</option>
                                                <option>Lunda Norte</option>
                                                <option>Lunda Sul</option>
                                                <option>Malanje</option>
                                                <option>Moxico</option>
                                                <option>Namibe</option>
                                                <option>Uíge</option>
                                                <option>Zaíre</option>
                                             </select>    
                                        
                                        </div>
                                        <div class="campoinput">
                                            <input type="password" name="pass" class="passcreate" id="passcreate" placeholder="Digite a sua password" maxlength="12" minlegth="6" required>
                                        </div>
                                        <div class="campoinput">
                                        <input type="email" name="email" class="emailcreate" id="emailcreate" placeholder="O seu email" maxlength="60" minlegth="5" required>
                                        </div>
                                        <div class="campoinput">
                                            <input type="submit" value="Cadastrar" name="criarcontauser" class="btncriar">
                                        </div>              
                                    </form>
                                </div>
                            
                            </div>

                        </div>
                </div>

        </div> 

            <script>
                const loginForm = document.querySelector("form.formlogin");
                const criarcontaForm = document.querySelector("form.formcreate");

                const loginbtn = document.querySelector("label.login");
                const criarbtn = document.querySelector("label.criar");

                const criarlink = document.querySelector(".criarconta a");

                const loginText = document.querySelector(".titulo.login");
                const criarText = document.querySelector(".titulo.criarconta");

                criarbtn.onclick = (() => {
                    loginForm.style.marginLeft = "-115%";
                    criarcontaForm.style.marginLeft = "-115%";
                    loginText.style.marginLeft = "-50%";
                });
                loginbtn.onclick = (() => {
                    loginForm.style.marginLeft = "0%";
                    criarcontaForm.style.marginLeft = "0%";
                    loginText.style.marginLeft = "0%";
                });
                criarlink.onclick = (() => {
                    criarbtn.click();
                    return false;
                });
            </script>
</body>
</html>