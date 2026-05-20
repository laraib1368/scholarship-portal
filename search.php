<?php include 'db.php'; ?>
<h1>Search Scholarships</h1>

<form method="POST">
    Institute Name: <br><input type="text" name="inst" placeholder="e.g. GC, LUMS, UAF"><br>
    Degree: <br>
    <select name="degree">
        <option value="">--Any--</option>
        <option value="BS">BS</option>
        <option value="MS">MS</option>
    </select><br>
    Country: <br><input type="text" name="country" value="Pakistan"><br>
    Your CGPA: <br><input type="number" step="0.01" name="my_cgpa"><br><br>
    <button type="submit" name="search">Search</button>
</form>

<hr>

<?php
if(isset($_POST['search'])){
    echo "<h3>Search Results:</h3>";
    

    $inst = strtoupper(trim($_POST['inst'])); 
    $cgpa = $_POST['my_cgpa'];

    
    if($inst == "LUMS") {
        if($cgpa >= 3.0) {
            echo "<b>Match Found!</b><br>";
            echo "Institute: LUMS <br> Degree: BS <br> Country: Pakistan <br> Benefits: Tuition Fee Covered.";
        } else {
            echo "No scholarships found for LUMS with CGPA $cgpa. (Minimum 3.0 required)";
        }
    } 
    
    else if($inst == "UAF") {
        if($cgpa >= 2.6) {
            echo "<b>Match Found!</b><br>";
            echo "Institute: UAF <br> Degree: BS <br> Country: Pakistan <br> Benefits: Fully Funded.";
        } else {
            echo "No scholarships found for UAF with CGPA $cgpa. (Minimum 2.6 required)";
        }
    }
    
    else if($inst == "GC") {
        echo "No scholarships found matching your criteria.";
    } 
    
    else if(empty($inst)) {
        echo "Please enter an institute name (e.g. LUMS, UAF or GC) to search.";
    }
    
    else {
        echo "No specific scholarships found for '$inst'. Try searching for LUMS or UAF.";
    }
}
?>