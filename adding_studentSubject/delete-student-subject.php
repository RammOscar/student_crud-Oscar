<?php
require('../connection.php');

$student_id = $_POST['student_id'];
foreach( $_POST['subject_id'] as $id) { 
    $query = "DELETE FROM student_subject WHERE student_id=$student_id AND subject_id='$id'";
    $sql = mysqli_query($conn, $query);
}
if ($sql === TRUE) {
    echo "<h1 style='color: green;'>Success deleting the subject</h1>";

}else{ 
    echo "<h1 style='color: red;'>failed to delete the subject</h1>";

}

?>