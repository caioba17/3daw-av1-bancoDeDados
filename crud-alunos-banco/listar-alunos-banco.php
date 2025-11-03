<?php
$localhost = "localhost";
$usuario = "root";
$senha = "";
$banco = "3dawav1"; 

$alunos = [];

$conn = new mysqli($localhost, $usuario, $senha, $banco);
if ($conn->connect_error) {
    die("Falha na conexão");
}

$sqlTexto = "SELECT nome, matricula, email FROM alunos";
$resultadoTexto = $conn->query($sqlTexto);

if ($resultadoTexto->num_rows > 0) {
    while($linha = $resultadoTexto->fetch_row()) {
        $alunos[] = $linha;
    }
}

$conn->close();
echo json_encode($alunos);

?>