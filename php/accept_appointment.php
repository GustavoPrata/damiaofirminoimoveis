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

$sql = "UPDATE agendamento SET status='Confirmado' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Appointment confirmed!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
