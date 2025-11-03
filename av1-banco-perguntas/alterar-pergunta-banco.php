<?php

$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "3dawav1"; 

$conn = new mysqli($servidor, $usuario, $senha, $banco);

if ($conn->connect_error) {
    die("Falha ao conectar");
}

$metodo = $_SERVER['REQUEST_METHOD'];

if ($metodo == 'GET') { 
    $codigo = $_GET['codigo'];
    $sql = "SELECT codigo, pergunta, resposta FROM Perguntas WHERE codigo = '" . $codigo . "'";
    
    $resultado = $conn->query($sql);
    
    if ($resultado->num_rows > 0) {
        $linha = $resultado->fetch_row();
        echo json_encode($linha);
    } else {
        echo json_encode(['erro' => 'Pergunta com o código ' . $codigo . ' não foi encontrada.']);
    }

} elseif ($metodo == 'POST') {
    $codigo = $_POST['codigo'];
    $pergunta = $_POST['pergunta'];
    $resposta = $_POST['resposta'];
    
    $sql = "UPDATE Perguntas 
            SET pergunta = '" . $pergunta . "', resposta = '" . $resposta . "' 
            WHERE codigo = '" . $codigo . "'";
            
    if ($conn->query($sql) === TRUE) {
        echo "Pergunta atualizada com sucesso!";
    } else {
        echo "Erro ao atualizar a pergunta: " . $conn->error;
    }
}
$conn->close();

?>