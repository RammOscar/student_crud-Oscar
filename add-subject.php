<?php
include "connection.php";

$sql = "INSERT INTO subject(subject_code, subject_desc, year_level, course, semester) 
    VALUES ('". $_POST['subject_code'] ."', '" . $_POST['subject_desc'] . "' , '" . $_POST['year_level'] . "' , '" . $_POST['course'] . "' , '" . $_POST['semester'] . "')";

if($conn->query($sql)) {
    echo "<p style='color: green;'>Successfully inserted record!</p>";
} else {
    echo "<p style='color: red;'>Failed to insert the record</p>";
}

echo "<a href='./'>Go back</a>";

?>
