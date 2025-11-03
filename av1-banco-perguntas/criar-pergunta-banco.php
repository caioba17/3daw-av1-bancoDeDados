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
        
        $pergunta = $_GET["pergunta"];
        $resposta = $_GET["resposta"];
        $codigo = $_GET["codigo"];
        
        $mensagemTela = "";

        $sql = "INSERT INTO `Perguntas`(`pergunta`, `resposta`, `codigo`) VALUES ('" . 
            $pergunta . "','" . $resposta . "','" . $codigo ."' )";
        
        $resultado = $conexao->query($sql);
   
       
       if ($resultado === true){
          $mensagemTela = "Pergunta incluida!";
          $retorno=json_encode($mensagemTela);
      } else {
          $retorno = json_encode("Erro!: " . $conexao->error);
      }

      echo $retorno;
  }
?>