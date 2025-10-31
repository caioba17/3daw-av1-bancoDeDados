<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "3dawav1"; 

$perguntasTexto = [];
$perguntasMultipla = [];

$conn = new mysqli($servidor, $usuario, $senha, $banco);
if ($conn->connect_error) {
    die("Falha na conexão");
}

$sqlTexto = "SELECT codigo, pergunta, resposta FROM Perguntas";
$resultadoTexto = $conn->query($sqlTexto);

if ($resultadoTexto->num_rows > 0) {
    while($linha = $resultadoTexto->fetch_row()) {
        $perguntasTexto[] = $linha;
    }
}

$sqlMultipla = "SELECT codigo, pergunta, opc1, opc2, opc3, opc4, opc5, resposta FROM PerguntasMC";
$resultadoMultipla = $conn->query($sqlMultipla);

if ($resultadoMultipla->num_rows > 0) {
    while($linha = $resultadoMultipla->fetch_row()) {
        $perguntasMultipla[] = $linha;
    }
}

$conn->close();

$perguntasLidas = [ $perguntasTexto, $perguntasMultipla ];
echo json_encode($perguntasLidas);

?>