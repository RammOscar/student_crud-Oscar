<?php
require_once "connection.php";

$sql = "UPDATE student SET first_name='". $_POST['first_name'] ."', last_name='". $_POST['last_name'] ."', gender='". $_POST['gender'] ."', year_level='". $_POST['year_level'] ."', course='". $_POST['course'] ."', semester='". $_POST['semester'] ."' WHERE id=" . $_POST['id'];

if($conn->query($sql)) {
    echo "<p style='color: green;'>Successfully updated record!</p>";
} else {
    echo "<p style='color: red;'>Failed to update the record</p>";
}

echo "<a href='./'>Go back</a>";