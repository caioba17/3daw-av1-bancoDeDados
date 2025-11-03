<?php
$localhost = "localhost";
$usuario = "root";
$senha = "";
$banco = "3dawav1"; 

$conn = new mysqli($localhost, $usuario, $senha, $banco);

if ($conn->connect_error) {
    die("Falha ao conectar");
}

$metodo = $_SERVER['REQUEST_METHOD'];

if ($metodo == 'GET') { 
    
    $matricula = $_GET['matricula'];
    $sql = "SELECT matricula, nome, email FROM alunos WHERE matricula = '" . $matricula . "'";
    
    $resultado = $conn->query($sql);
    
    if ($resultado->num_rows > 0) {
        $linha = $resultado->fetch_row();
        echo json_encode($linha);
    } else {
        echo json_encode(['erro' => 'Aluno com a matrícula ' . $matricula . ' não foi encontrado.']);
    }

} elseif ($metodo == 'POST') {
    $matricula_original = $_POST['matricula_original'];
    $matricula_nova = $_POST['matricula_nova'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $sql = "UPDATE alunos 
            SET matricula = '" . $matricula_nova . "', nome = '" . $nome . "', email = '" . $email . "' 
            WHERE matricula = '" . $matricula_original . "'";
            
    if ($conn->query($sql) === TRUE) {
        if ($conn->affected_rows > 0) {
            echo "Aluno atualizado com sucesso!";
        } else {
            echo "Nenhum aluno encontrado com a matrícula original (" . $matricula_original . "). Nenhuma alteração foi feita.";
        }
    } else {
        echo "Erro ao atualizar o aluno: " . $conn->error;
    }
}
$conn->close();

?>