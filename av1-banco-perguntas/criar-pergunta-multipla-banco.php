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
        $opc1 = $_GET["opc1"];
        $opc2 = $_GET["opc2"];
        $opc3 = $_GET["opc3"];
        $opc4 = $_GET["opc4"];
        $opc5 = $_GET["opc5"];
        $resposta = $_GET["resposta"];
        $codigo = $_GET["codigo"];
        
        $mensagemTela = "";

        $sql = "INSERT INTO `PerguntasMC`(`pergunta`, `resposta`, `codigo`, `opc1`, `opc2`, `opc3`, `opc4`, `opc5`) VALUES ('" . 
            $pergunta . "','" . $resposta . "','" . $codigo . "','" . $opc1 . "','" . $opc2 . "','" . $opc3 . "','" . $opc4 . "','" . $opc5 . "' )";
        
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