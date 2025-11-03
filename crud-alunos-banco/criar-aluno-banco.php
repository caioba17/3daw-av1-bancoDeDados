<?php
    $localhost = "localhost";
    $username = "root";
    $senha = "";
    $database = "3dawav1";
    $conexao = new mysqli($localhost,$username,$senha,$database);
    if ($conexao->connect_error) {
       die("Falha na conexão");
    }

   if ($_SERVER['REQUEST_METHOD'] == 'GET')  {

        $nome = $_GET["nome"];
        $matricula = $_GET["matricula"];
        $email = $_GET["email"];
        
        $mensagemTela = "";

        $sql = "INSERT INTO `alunos`(`nome`, `matricula`, `email`) VALUES ('" . $nome . "','" . $matricula . "','" . $email ."' )";
        $resultado = $conexao->query($sql);
       
       if ($resultado === true){
          $mensagemTela = "Aluno incluido!";
          $retorno=json_encode($mensagemTela);
      } else {
          $retorno = json_encode("Erro!: " . $conexao->error);
      }

      echo $retorno;
  }
?>