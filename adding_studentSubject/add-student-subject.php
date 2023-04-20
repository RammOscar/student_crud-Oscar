<?php
require('../connection.php');

$student_id = $_POST['student_id'];



foreach( $_POST['subject'] as $subjects) { 
    
        $query = "INSERT INTO student_subject(student_id, subject_id) VALUES('$student_id', '$subjects')";
        $sql = mysqli_query($conn, $query);
    
  }

if ($sql === TRUE) {
    echo "<h1 style='color: green;'>Success adding the subject</h1>";

}else{
       echo "<h1 style='color: red;'>Failed to add the subject</h1>";
;
}



?>