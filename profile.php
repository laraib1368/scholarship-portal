<?php
session_start();
include 'db.php';

if(!isset($_SESSION['user_id'])){ 
    header("Location: login.php"); 
    exit();
}
$user_id = $_SESSION['user_id'];

if(isset($_POST['save_profile'])){
    $metric = $_POST['metric_marks'];
    $fsc = $_POST['fsc_marks'];
    $sem = $_POST['semester'];
    $cgpa = $_POST['cgpa'];
    $bs_done = $_POST['bs_done'];
    $ms_done = $_POST['ms_done'];

    $sql = "INSERT INTO profiles (user_id, metric_marks, fsc_marks, current_semester, current_cgpa, done_bs, done_ms) 
            VALUES ('$user_id', '$metric', '$fsc', '$sem', '$cgpa', '$bs_done', '$ms_done')";
    
    if(mysqli_query($conn, $sql)){
        header("Location: view_scholarships.php");
        exit();
    }
}
?>

<h1>Student Education Profile Form</h1>
<form method="POST">
    Metric Marks: <br>
    <input type="number" name="metric_marks" required><br>

    Inter Marks: <br>
    <input type="number" name="fsc_marks" required><br>

    Current Semester: <br>
    <input type="number" name="semester" required><br>

    Current CGPA: <br>
    <input type="number" step="0.01" name="cgpa" required><br>

    Have you done BS? <br>
    <select name="bs_done">
        <option value="No">No</option>
        <option value="Yes">Yes</option>
    </select><br>

    Have you done MS? <br>
    <select name="ms_done">
        <option value="No">No</option>
        <option value="Yes">Yes</option>
    </select><br><br>

    <button type="submit" name="save_profile">Save</button>
</form>