<?php
$localhost = "localhost";
$usuario = "root";
$senha = "";
$banco = "3dawav1";

$conn = new mysqli($localhost, $usuario, $senha, $banco);

if ($conn->connect_error) {
    die("Falha na conexão");
}

$matricula = $_GET['matricula'];
$sql = "DELETE FROM alunos WHERE matricula = '" . $matricula . "'";

if ($conn->query($sql) === true) {
    if ($conn->affected_rows > 0) {
        echo "Aluno " . $matricula . " excluído com sucesso!";
    } else {
        echo "Erro: Aluno com a matrícula " . $matricula . " não encontrado.";
    }
} else {
    echo "Erro ao excluir: " . $conn->error;
}   
$conn->close();
?>