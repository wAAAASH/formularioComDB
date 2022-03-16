<?php
    require_once 'CLASSES/usuarios.php';
    $u = new Usuario;
?>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Projeto de Login</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
        <style>
           body{
                font-family: Arial, Helvetica, sans-serif;
                background-image: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
            }
            .box{
                position: absolute;
                top: 50%;
                left: 50%;
                right: 50%;
                transform: translate(-50%, -50%);
                background-color: rgba(0, 0, 0, 0.5);
                padding: 15px;
                border-radius: 15px;
                width: 20%;
                color: white;
            }
            fieldset{
                border: 3px solid dodgerblue;
            }
            legend{
                border: 1px solid dodgerblue;
                padding: 10px;
                text-align: center;
                background-color: dodgerblue;
                border-radius: 8px;
            }
            .inputBox{
                position: relative;

            }

            .inputUser{
                text-decoration: none;
                font-family: LatoArial, Helvetica, sans-serif;
                background: none;
                border: none;
                border-bottom: 1px solid white;
                outline: none;
                color: white;
                font-size: 15px;
                width: 100%;
                letter-spacing: 2px;
            }
            .inputLabel{
                position: absolute;
                top: 0px;
                left: 0px;
                pointer-events: none;
                transition: .5s;
                
            }
            .inputUser:focus ~ .inputLabel,
            .inputUser:valid ~ .inputLabel{
                top: -20px;
                font-size: 13px;
                color: white;;
            }

            #anoNasc{
                border: none;
                padding: 8px;
                border-radius: 10px;
                outline: none;
                font-size: 15px;
            }
            #enviar {
                width: 100%;
                border: none;
                padding: 5%;
                color: white;
                font-size: 15px;
                border-radius: 10px;
                cursor: pointer;
                background-image: linear-gradient(to right, rgb(20, 147, 220), rgb(159, 4, 248));
                
            }
            #enviar:hover{
                background-image: linear-gradient(to right, rgb(40, 132, 185), rgb(137, 26, 202));
            }

            #msg-sucesso{
                
                width: 420px;
                margin: 10px auto;
                font-size: 20px;
                background-color: greenyellow;
                border: 1px solid rgba(34, 139, 34, 0.5);
               
                
            }

            .msg-erro {
                font-family: LatoArial, Helvetica, sans-serif;
                background-image: linear-gradient(to right, rgb(40, 132, 185), rgb(137, 26, 202)); 
                width: 430px;
                border-radius: 10px;
                font-size: 20px;
                margin: 170px auto;
                padding: 13px;
                background-color: rgbargb(40, 132, 185,.3);
                border: 1px solid rgba(0, 0, 0, 0.5);
                cursor: default;
                
                

            }

            
        </style>
    </head>
    <body>
    <header>
    <main>
    <div class="box">
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
    <fieldset>
                                        <legend>
                                        <b>Entrar></b>
                                        </legend>
                                        <br>
            <div class="inputBox">
            <a href="http://localhost/cursophp/cadastrar.php" class="inputUser" id="cadastrar" name="cadastrar">Ainda não é cadastrado? ||   <strong>  Cadastre-se</strong>
            <label for="cadastrar" class="inputLabel">
            </div>

            <br>
            <br>
    
     
            
            <div class="inputBox">
            <input type="text" name="email" id="email" class="inputUser" maxlength="30">
            <label for="email" class="inputLabel">Email</label>
            </div>

            <br>
            <br>

            <div class="inputBox">
            <input type="password" name="senha" id="senha" class="inputUser" maxlength="32">
            <label for="senha" class="inputLabel">Senha</label>
            </div>

            <br>
            <br>

            <div class="inputBox">
            <input type="submit" name="enviar" id="enviar" class="inputUser">
            <label for="enviar" class="inputLabel"></label>
            </div>
</fieldset>
</main>
</header>     
</form>
<?php

        

    if(isset($_POST['cadastrar']))
        {

            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);
            //verificar se esta preenchido
            if(!empty($email) && !empty($senha))
                {

                $u->conectar("dbform","localhost","root","");
                if($u->msgErro == "")
                {
                if($u->logar($email, $senha))
                {
                    header("Location: http://localhost/cursophp/areaPrivada.php");
                }
                else
                {
                    ?>
                    <div class="msg-erro">
                    Email ou Senha estao incorretos
                    </div>
                    <?php
                }
                }
                else
                {
                    
                    echo "erro ".$u->msgErro;
                }
            }
            else
            {
                ?>
                <div class="msg-erro">
                <pre>Por favor preencha todos os campos</pre>
                </div>
                <?php
            }
        }
        ?>
        <script src="" async defer></script>
    </body>
</html>