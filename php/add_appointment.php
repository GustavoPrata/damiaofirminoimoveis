<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "damiaofirmino";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$data_hora = $_POST['data_hora'];
$status = $_POST['status'];

$sql = "INSERT INTO agendamento (nome, telefone, data_hora, status) VALUES ('$nome', '$telefone', '$data_hora', '$status')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
