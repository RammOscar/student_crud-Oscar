<?php
include "connection.php";

$sql = "INSERT INTO student(first_name, last_name, gender, year_level, course, semester) 
    VALUES ('". $_POST['first_name'] ."', '" . $_POST['last_name'] . "', '" . $_POST['gender'] . "' , '" . $_POST['year_level'] . "' , '" . $_POST['course'] . "' , '" . $_POST['semester'] . "')";

if($conn->query($sql)) {
    echo "<p style='color: green;'>Successfully inserted record!</p>";
} else {
    echo "<p style='color: red;'>Failed to insert the record</p>";
}

echo "<a href='./'>Go back</a>";

?>
