<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "damiaofirmino";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM agendamento";
$result = $conn->query($sql);

$appointments = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $appointments[] = $row;
    }
}
$conn->close();

echo json_encode($appointments);
?>
