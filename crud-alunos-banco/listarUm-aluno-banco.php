<?php
$localhost = "localhost";
$usuario = "root";
$senha = "";
$banco = "3dawav1"; 

$conn = new mysqli($localhost, $usuario, $senha, $banco);

if ($conn->connect_error) {
    die(json_encode(['erro' => 'Falha ao conectar: ' . $conn->connect_error]));
}

$matricula = $_GET['matricula'];

$sql = "SELECT matricula, nome, email FROM alunos WHERE matricula = '" . $matricula . "'";

$resultado = $conn->query($sql);

if ($resultado && $resultado->num_rows > 0) {
    $linha = $resultado->fetch_row();
    echo json_encode($linha);
} else {
    echo json_encode(['erro' => 'Aluno com a matrícula ' . $matricula . ' não foi encontrado.']);
}

$conn->close();

?>