<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STUDENTS</title>
</head>

<body>
    <?php 
    require('connection.php');
    include_once "menu.php"; 

    $id = $_GET['id'];
    $sql="SELECT * FROM student WHERE id = '$id'";
    $result = $conn->query($sql);
    $student = $result->fetch_assoc();
    ?>
    <div>
        STUDENT: <?php echo $student['last_name']." ". $student['first_name']?> <br>
        GENDER: <?php echo $student['gender']?><br>
        YEAR LEVEL: <?php echo $student['year_level']?> <br>
        COURSE: <?php echo $student['course']?> <br>
        SEMESTER: <?php echo $student['semester']?> <br><br>
        CURRENT SUBJECTS:
        <form action="adding_studentSubject/delete-student-subject.php" method="post">
            <input type="hidden" name="student_id" value="<?php echo $student['id'] ?>">
            <table border="1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>SUBJECT CODE</th>
                        <th>SUBJECT DESCRIPTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $sql="SELECT student_subject.subject_id,subject.subject_code,subject.subject_desc FROM student_subject LEFT JOIN subject on student_subject.subject_id = subject.id WHERE student_id = '$id'";
                    $result = $conn->query($sql);
                    $result_check = mysqli_num_rows($result);
                    if ($result_check>0) {
                        while ($row = mysqli_fetch_assoc($result)) {?>
                    <tr>
                        <td><input type="checkbox" name="subject_id[]" value="<?php echo $row['subject_id'] ?>"></td>
                        <td><?php echo $row['subject_code'] ?></td>
                        <td><?php echo $row['subject_desc'] ?></td>
                    </tr>
                    <?php
                        }
                    } else {
                        echo "NO data";
                    }
                    ?>
                </tbody>
            </table>
            <button>DELETE CHECKED SUBJECTS</button>
        </form>

        <hr>

        AVAILABLE SUBJECTS:
        <form action="adding_studentSubject/add-student-subject.php" method="post">

            <input type="hidden" name="student_id" value="<?php echo $student['id'] ?>">
            <table border="1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>SUBJECT CODE</th>
                        <th>SUBJECT DESCRIPTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $year_level = $student['year_level'] ;
                        $course = $student['course'] ;
                        $semester = $student['semester'] ;
                        $sql = "SELECT * FROM subject 
                            WHERE year_level = '$year_level' 
                            AND course = '$course' 
                            AND semester = '$semester' 
                            AND id NOT IN (SELECT subject_id FROM student_subject WHERE student_id = '$id')";

                        $result = $conn->query($sql);
                        $result_check = mysqli_num_rows($result);
                        
                        if ($result_check>0) {
                            while ($row = mysqli_fetch_assoc($result)) {?>
                    <tr>
                        <td><input type="checkbox" name="subject[]" value="<?php echo $row['id'] ?>"></td>
                        <td><?php echo $row['subject_code'] ?></td>
                        <td><?php echo $row['subject_desc'] ?></td>

                    </tr>
                    <?php
                            }
                        } else {
                            echo "NO data";
                        }
                    

                    
                    ?>

                </tbody>
            </table>


            <button>ADD CHECKED SUBJECTS</button>
        </form>
    </div>
</body>

</html>