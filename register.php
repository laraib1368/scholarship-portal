<?php
include 'db.php';
if(isset($_POST['register'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $cnic = $_POST['cnic'];
    $pass = $_POST['password'];

    $sql = "INSERT INTO users (name, email, cnic, password) VALUES ('$name', '$email', '$cnic', '$pass')";
    if(mysqli_query($conn, $sql)){
        
        header("Location: login.php?msg=Registered successfully! Please login.");
        exit();
    }
}
?>
<h1>Register</h1>
<form method="POST" autocomplete="off">
    Name: <br><input type="text" name="name" required><br>
    Email: <br><input type="email" name="email" required><br>
    CNIC: <br><input type="text" name="cnic" required><br>
    Password: <br><input type="password" name="password" required><br><br>
    <button type="submit" name="register">Register</button>
</form>