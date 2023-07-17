<?php
// Database configuration
$host = "localhost";
$username = "root";
$password = "your_password";
$database = "contact";

// Create a connection
$conn = new mysqli('localhost', 'root', '', 'contact');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $phone_number = $_POST["phone_number"];
    $gender = $_POST["gender"];
    $select = $_POST["select"];
    $duration = $_POST["duration"];
    $age = $_POST["age"];
    $bank_details = $_POST["bank_details"];

    // Prepare and execute the SQL statement
    $sql = "INSERT INTO subf (first_name, last_name, email, phone_number, gender, selection, duration, age, bank_details) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssiss", $first_name, $last_name, $email, $phone_number, $gender, $select, $duration, $age, $bank_details);
    
    if ($stmt->execute()) {
        // Data inserted successfully
        echo "Registration Successfully!";
        
        // Redirect to home page after 3 seconds
        header("refresh:3;url=index.html");
        exit();
    } else {
        // Failed to insert data
        echo "Error: " . $stmt->error;
    }

    // Close the prepared statement and database connection
    $stmt->close();
    $conn->close();
}
?>
