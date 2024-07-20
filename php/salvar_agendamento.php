<?php
// Dados do banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "damiaofirmino";

// Cria conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Pega os dados do formulário
$nome = $_POST['name'];
$telefone = $_POST['phone'];
$data = $_POST['date'];
$hora = $_POST['time'];

// Concatena data e hora
$data_hora = $data . ' ' . $hora;

// Define o status
$status = 'Pendente';

// Prepara e executa a consulta SQL
$sql = "INSERT INTO agendamento (nome, telefone, data_hora, status) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $nome, $telefone, $data_hora, $status);

$response = [];
if ($stmt->execute()) {
    $response['status'] = 'success';
    $response['message'] = 'Agendamento feito com sucesso!';
} else {
    $response['status'] = 'error';
    $response['message'] = 'Erro ao salvar o agendamento: ' . $conn->error;
}

// Fecha a conexão
$stmt->close();
$conn->close();

header('Content-Type: application/json');
echo json_encode($response);
?>
