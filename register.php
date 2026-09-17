<?php
include "config/db.php";

if(isset($_POST['register'])){

$name = $_POST['name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$sql = "INSERT INTO users(name,email,password) VALUES('$name','$email','$password')";

if($conn->query($sql)){
    echo "<script>alert('Registered Successfully');window.location='login.php';</script>";
}else{
    echo "Error: ".$conn->error;
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
<h2>Create Account</h2>

<form method="POST">
<input type="text" name="name" placeholder="Full Name" required>
<input type="email" name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Password" required>

<button name="register">Register</button>
</form>

<p>Already have account? <a href="login.php">Login</a></p>

</div>
</body>
</html>
