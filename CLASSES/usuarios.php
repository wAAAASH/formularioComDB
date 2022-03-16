<?php
    Class Usuario
    {
        private $pdo;
        public $msgErro = "";
        public function conectar($nome, $host, $usuario, $senha)
        {
            global $pdo;
            try
             {
                $pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario,$senha);
            } 

            catch (PDOException $e)
             {
                 $msgErro = $e->getMessage();
            }
            
        }

        public function cadastrar($nome, $email, $senha, $telefone, $sexo, $data_nasc, $cidade,
        $estado, $endereço)
        {
            global $pdo;
            // Verificação de cadastro
            $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e");
            $sql->bindValue(":e",$email);
            $sql->execute();
            if($sql->rowCount() > 0)
            {
                return false; // ja esta cadastrada 
            }
            else
            {
                  $sql = $pdo->prepare("INSERT INTO usuarios (nome, email, senha, telefone, sexo, data_nasc, cidade,
                  estado, endereço) VALUES (:n, :e, :s, :t, :sx, :dn, :c, :es, :ad)");
                  $sql->bindValue(":n",$nome);
                  $sql->bindValue(":e",$email);
                  $sql->bindValue(":s", md5($senha));
                  $sql->bindValue(":t",$telefone);
                  $sql->bindValue(":sx",$sexo);
                  $sql->bindValue(":dn",$data_nasc);
                  $sql->bindValue(":c",$cidade);
                  $sql->bindValue(":es",$estado);
                  $sql->bindValue(":ad",$endereço);
                  $sql->execute(); 
                  return true;
            }

            //caso não , vamos cadastrar


        }

        public function logar($email, $senha)
        {
            global $pdo;
            //verificar se o email e senha existem
            $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e AND senha = :s");
            $sql->bindValue(":e", $email);
            $sql->bindValue(":s", md5($senha));
            $sql->execute();
            if($sql->rowCount() > 0)
            {
                //entrar no sistema ( sessao )
                $dado = $sql->fetch();
                session_start();
                $_SESSION['id_usuario'] = $dado['id_usuario'];
                return true; //usuario logado
            }
            else{
                return false; //nao foi possivel logar
            }
            
        }





    }









?>