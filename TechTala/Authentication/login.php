<?php

session_start();

include 'db.connect.php';

$username = $_POST['username'];
$pass = $_POST['pass'];

$stmt = $conn->prepare("SELECT id, pass, role FROM users WHERE username = ?");

$stmt->bind_param("s", $username);

$stmt->execute();

$stmt->store_result();

if($stmt->num_rows == 1){
    $stmt->bind_result($user_id, $hashed_pass, $role);
    $stmt->fetch();

    if(password_verify($pass, $hashed_pass)){
        $_SESSION['user_id'] = $user_id;
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $role;

        if($role == 'author') {
            header("Location: /Project/TechTala/Author/home.html");
        } elseif($role == 'reader') {
            header("Location: /Project/TechTala/Reader/homepage.html");
        } elseif($role == 'admin') {
            header("Location: /Project/TechTala/Admin/dashboard.html");
        }
        exit;
    }else{
        echo "Incorrect password. <a href='login.html'>Try again</a>";
    }
}else{
    echo "User not found. <a href=register.html'>Register here</a>";
}

$stmt->close();
$conn->close();

?>