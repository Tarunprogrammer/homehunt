<?php
session_start();
include "config/db.php";

if(isset($_POST['login'])){

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);

if($result->num_rows>0){
    $row = $result->fetch_assoc();

    if(password_verify($password,$row['password'])){
        $_SESSION['user']=$row['name'];
        header("Location: index.php");
    }else{
        echo "<script>alert('Wrong Password');</script>";
    }
}else{
    echo "<script>alert('User not found');</script>";
}
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
<h2>Login</h2>

<form method="POST">
<input type="email" name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Password" required>

<button name="login">Login</button>
</form>

<p>No account? <a href="register.php">Register</a></p>

</div>
</body>
</html>
