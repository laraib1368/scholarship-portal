<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inst = $_POST['inst'];
    $cgpa = $_POST['cgpa'];
    $country = $_POST['country'];
    
    
    $sql = "INSERT INTO scholarships (institute, min_cgpa, country) VALUES ('$inst', '$cgpa', '$country')";
    
    if(mysqli_query($conn, $sql)){
        echo "<b>Scholarship added successfully in Database!</b><br><br>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Portal</title>
</head>
<body>

    <h1>Admin Portal</h1>
    <p>Welcome Admin! Manage your scholarships here.</p>
    <hr>
    
    <h3>Add New Scholarship</h3>
    <form method="POST">
        Institute Name: <br>
        <input type="text" name="inst" required><br><br>
        
        Min CGPA: <br>
        <input type="number" step="0.01" name="cgpa" required><br><br>
        
        Country: <br>
        <input type="text" name="country" required><br><br>
        
        <button type="submit">Add Scholarship</button>
    </form>

    <br>
    <a href="index.php">Back to Main Home</a>

</body>
</html>