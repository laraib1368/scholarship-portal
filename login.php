<?php
session_start();
include 'db.php';

if(isset($_GET['msg'])) { echo "<p style='color:green;'>".$_GET['msg']."</p>"; }

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND password='$pass'");
    if($user = mysqli_fetch_assoc($result)){
        $_SESSION['user_id'] = $user['id'];
        
        header("Location: profile.php");
        exit();
    } else {
        echo "<p style='color:red;'>Invalid credentials!</p>";
    }
}
?>
<h1>Login</h1>
<form method="POST" autocomplete="off">
    Email: <br><input type="email" name="email" required><br>
    Password: <br><input type="password" name="password" required><br><br>
    <button type="submit" name="login">Login</button>
</form>
<p>Don't have an account? <a href="register.php">Register here</a></p>