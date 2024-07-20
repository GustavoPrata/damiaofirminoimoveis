<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "damiaofirmino";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_POST['id'];
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$data_hora = $_POST['data_hora'];
$status = $_POST['status'];

$sql = "UPDATE agendamento SET nome='$nome', telefone='$telefone', data_hora='$data_hora', status='$status' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
