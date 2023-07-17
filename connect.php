<?php
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$message = $_POST['message'];

$conn = new mysqli('localhost', 'root', '', 'contact');
if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
} else {
    $type = $_POST['type'];
    $stmt = $conn->prepare("INSERT INTO form (fname, lname, email, message, type) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $fname, $lname, $email, $message, $type);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    
    echo "Thank You For Contacting Us";
    header("refresh:3;url=index.html");
    exit();
}
?>
