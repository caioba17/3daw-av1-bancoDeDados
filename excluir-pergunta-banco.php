<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "3dawav1";

$conn = new mysqli($servidor, $usuario, $senha, $banco);

if ($conn->connect_error) {
    die("Falha na conexão");
}

$codigo = $_GET['codigo'];
$tipo = $_GET['tipo'];
$sql = "";

if ($tipo == 'texto') {
    $sql = "DELETE FROM perguntas WHERE codigo = '" . $codigo . "'";
    
} elseif ($tipo == 'multipla') {
    $sql = "DELETE FROM perguntasmc WHERE codigo = '" . $codigo . "'";

} else {
    die("Erro: Tipo de pergunta inválido.");
}

if ($conn->query($sql) === TRUE) {
    echo "Pergunta " . $codigo . " excluída com sucesso!";
} else {
    echo "Erro ao excluir: " . $conn->error;
}   
$conn->close();

?>