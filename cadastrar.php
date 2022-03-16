<?php
    require_once 'CLASSES/usuarios.php';
    $u = new Usuario;

?>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Formluario | GN</title>
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
                color: dodgerblue;
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
                background-image: linear-gradient(to right, rgb(40, 132, 185), rgb(137, 26, 202)); 
                width: 100px;
                border-radius: 10px;
                font-size: 20px;
                margin: 10px auto;
                padding: 10px;
                background-color: rgbargb(40, 132, 185,.3);
                border: 1px solid rgba(0, 0, 0, 0.5);
                

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
                  <b>Fórmulario de Clientes</b>
              </legend>
                  <br>
                  <div class="inputBox">
                      <input type="text" name="nome" id="nome" class="inputUser" required maxlength="30">
                      <label for="nome" class="inputLabel">Nome Completo</label>
                  </div>

                  <br>
                  <br>

                  <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser" required maxlength="30">
                    <label for="email" class="inputLabel">Email</label>
                </div>

                <br>
                <br>

                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputUser" required maxlength="32">
                    <label for="senha" class="inputLabel">Senha</label>
                </div>
                <br>
                <br>

                <div class="inputBox">
                    <input type="password" name="confSenha" id="confSenha" class="inputUser" required maxlenght="32">
                    <label for="confSenha" class="inputLabel">Confirmar Senha</label>
                </div>
                <br>
                <br>

                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" required maxlenght="25">
                    <label for="telefone" class="inputLabel">Telefone</label>
                </div>

                <br>
                <br>

                <p>
                    Sexo:
                </p>
                <input type="radio" name="genero" id="feminino" value="feminino" required>
                <label for="feminino">Feminino</label>
                <br>

                <input type="radio" name="genero" id="masculino" value="masculino" required>
                <label for="masculino">Masculino</label>
                <br>
                <input type="radio" name="genero" id="outro" value="outro" required>
                <label for="outro">Outro</label>
                <br>
                <br>
                
                    <label for="data_nasc"><b>Data de Nascimento :</b></label>
                    <input type="date" name="data_nasc" id="data_nasc" required maxlenght="10">
                
                <br>
                <br>
                <br>
                <div class="inputBox">
                    
                    <input type="text" name="cidade" id="cidade" class="inputUser" required maxlenght="20">
                    <label for="cidade" class="inputLabel"><b>Cidade</b></label>

                </div>
                <br>
                <br>
                <div class="inputBox">
                    
                    <input type="text" name="estado" id="estado" class="inputUser" required maxlenght="20">
                    <label for="estado" class="inputLabel"><b>Estado</b></label>

                </div>
                <br>
                <br>
                <div class="inputBox">
                    
                    <input type="text" name="address" id="address" class="inputUser" required maxlenght="40">
                    <label for="address" class="inputLabel"><b>Endereço</b></label>

                </div>
                <br>
                <br>
               <button name="enviar" id="enviar"><b>Cadastrar</b></button>

            


             </fieldset>
          </form>
      </div>

    </main>
</header>
<?php
    if(isset($_POST['enviar']))
    {
        $nome = addslashes($_POST['nome']);
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);
        $confirmarSenha = addslashes($_POST['confSenha']);
        $telefone = addslashes($_POST['telefone']);
        $sexo = addslashes($_POST['genero']);
        $data_nasc = addslashes($_POST['data_nasc']);
        $cidade = addslashes($_POST['cidade']);
        $estado = addslashes($_POST['estado']);
        $endereço = addslashes($_POST['address']);
        //verificar se esta preenchido
        if(!empty($nome) && !empty($email) && !empty($confirmarSenha) && !empty($telefone) && !empty($sexo) && !empty($data_nasc) && !empty($cidade) && !empty($estado) && !empty($endereço))
        {
            $u->conectar("dbform","localhost","root","");
            if($u->msgErro == "")
            {
                //verificação de senhas iguais
                if($senha == $confirmarSenha)
                {
                    if($u->cadastrar($nome,$email,$senha,$telefone,$sexo,$data_nasc,$cidade,$estado,$endereço))
                    {   
                        ?>
                    <div id="msg-sucesso">
                        <b>cadastro com sucesso
                    </div>  
                        <?php 
                    }
                    else
                    {
                        ?>
                        <div class="msg-erro">
                         email ja cadastrado
                    </div>
                        <?php
                    }
                }
                else
                {
                    ?>
                    <div class="msg-erro">
                     <b> senhas não conincidem
                    </div>
                    <?php
                }
                
            }
            else
            {
                ?>
                <div class="msg-erro">
               <?php echo "erro: ".$u->$msgErro;    ?>
                 </div>
                <?php
            }
        }
        else
        {
            ?>
            <div class="msg-erro">
            preencha os campos!
            </div>
            <?php
        }
    }



?>
        <script src="js/script.js" async defer></script>
    </body>
</html>