<?php
require_once "connection.php";

$sql = "DELETE FROM student WHERE id=" . $_GET['id'];

if($conn->query($sql)) {
    echo "<p style='color: green;'>Successfully deleted record!</p>";
} else {
    echo "<p style='color: red;'>Failed to delete the record</p>";
}

echo "<a href='./'>Go back</a>";