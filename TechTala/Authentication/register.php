<?php

include 'db.connect.php';

$username = $_POST['username'];
$pass = $_POST['pass']; 
$email = $_POST['email'];
$role = $_POST['role']; 

$hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO users (username, pass, email, role) VALUES (?, ?, ?, ?)");

$stmt->bind_param("ssss", $username, $hashed_pass, $email, $role);

if ($stmt->execute()) {
    echo "Registration successful! <a href='login.html'>Login Here</a>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();

?>