<?php
session_start();
include 'db.php';

if(!isset($_SESSION['user_id'])){ 
    header("Location: login.php"); 
    exit(); 
}

$user_id = $_SESSION['user_id'];

// Database se user ki sab se latest profile uthana
$res = mysqli_query($conn, "SELECT * FROM profiles WHERE user_id='$user_id' ORDER BY id DESC LIMIT 1");
$p = mysqli_fetch_assoc($res);

echo "<h1>Search Scholarships</h1>";
echo "<p><a href='search.php'>Click here to search scholarships manually</a></p>";
echo "<h3>Available Scholarships Based on Your Profile</h3>";

if($p) {
    
    if($p['current_cgpa'] >= 2.6) {
        echo "<b>Merit Based</b><br>";
        echo "Institute: UAF <br> Degree Required: BS <br> Minimum CGPA: 2.6 <br> Country: Pakistan <br> Benefits: Fully Funded <hr>";
    }

    
    if($p['current_cgpa'] >= 3.0) {
        echo "<b>Merit Based</b><br>";
        echo "Institute: LUMS <br> Degree Required: BS <br> Minimum CGPA: 3.0 <br> Country: Pakistan <br> Benefits: Tuition Fee <hr>";
    }
    
    if($p['current_cgpa'] < 2.6) {
        echo "<p>No scholarships found matching your current CGPA ($p[current_cgpa]).</p>";
    }
} else {
    echo "<p>Please build your profile first to see available scholarships.</p>";
}
?>