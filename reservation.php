
<html>
<head>

<body background="2.jpg"></body></head>
    
</html>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "online_reservation";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "INSERT INTO reservation ( name, phone, person_no, date, time, msg) VALUES ( ?, ?, ?, ?, ?, ?)";


$stmt = $conn->prepare($sql);



$name = $_POST['name'];
$phone = $_POST['phone'];
$person_no = $_POST['person_no'];
$date = $_POST['date'];
$time = $_POST['time'];
$msg = $_POST['msg'];


$stmt->bind_param("ssssss", $name, $phone, $person_no, $date, $time, $msg);


if ($stmt->execute()) {
    echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><center><h1><p><u> <font color=black>Welcome To Our Restaurant</u><br>
        Reservation added successfully.</p></h1></center>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$stmt->close();
$conn->close();
?>
