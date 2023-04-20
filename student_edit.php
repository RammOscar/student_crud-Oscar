<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STUDENTS</title>
</head>
<body>
<?php include_once "menu.php"; 
    include "connection.php";
    $id = $_GET['id'];
    $year_level = $_GET['year_level'];
    $COURSE = $_GET['course'];
    $sem = $_GET['semester'];
$sql = "SELECT * FROM student WHERE id=$id";
        $result = $conn->query($sql);
        $student = $result->fetch_assoc();

        ?>

    <form action="student-update.php" method="POST">
        <h1>ENTER STUDENT DETAILS</h1>
        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
        <label for="">
            ENTER FIRST NAME:
            <input type="text" name="first_name" value="<?php echo $_GET['first_name']; ?>">
        </label><br>
        <label for="">
            ENTER LAST NAME:
            <input type="text" name="last_name" value="<?php echo $_GET['last_name']; ?>">
        </label><br>
        <div>
            <label for="">MALE <input type="radio" name="gender" id="" <?php if (isset($_GET['gender']) && $_GET['gender']=="Male") echo "checked";?> value="Male"></label>
            <label for="">FEMALE <input type="radio" name="gender" id="" <?php if (isset($_GET['gender']) && $_GET['gender']=="Female") echo "checked";?> value="Female"></label>
        </div>
        <label for="">
            YEAR LEVEL:
            <select name="year_level" id="">
                <option <?php if($year_level=='1ST YEAR') echo 'selected' ?> value="1ST YEAR">1ST YEAR</option>
                <option <?php if($year_level=='2ND YEAR') echo 'selected' ?> value="2ND YEAR">2ND YEAR</option>
                <option <?php if($year_level=='3RD YEAR') echo 'selected' ?> value="3RD YEAR">3RD YEAR</option>
                <option <?php if($year_level=='4TH YEAR') echo 'selected' ?> value="4TH YEAR">4TH YEAR</option>
            </select>
        </label><br>
        <label for="">
            COURSE:
            <select name="course" id="">
                <option <?php if($COURSE=='BSIT') echo 'selected' ?> value="BSIT">BSIT</option>
                <option <?php if($COURSE=='BSED') echo 'selected' ?> value="BSED">BSED</option>
                <option <?php if($COURSE=='BSBA') echo 'selected' ?> value="BSBA">BSBA</option>
                <option <?php if($COURSE=='BEED') echo 'selected' ?> value="BEED">BEED</option>
            </select>
        </label><br>
        <label for="">
            SEMESTER: 
            <select name="semester" id="">
                <option <?php if($sem=='1ST') echo 'selected' ?> value="1ST">1ST</option>
                <option <?php if($sem=='2ND') echo 'selected' ?> value="2ND">2ND</option>
            </select>
        </label>
        <hr>
        <button type="submit">Submit</button>
    </form>
    <div>

    <table border="1">
    <thead>
    <tr>
    <th>ID</th>
    <th>STUDENT NAME</th>
    <!-- <th>STUDENT LAST NAME</th> -->
    <th>GENDER</th>
    <th>YEAR</th>
    <th>COURSE</th>
    <th>SEMESTER</th>
    <th colspan='6'>ACTION</th>
    </tr>
    </thead>
    
    <tbody>
    <?php
    require_once "connection.php";
    $sql = "SELECT * FROM student";
    $result = $conn->query($sql);

    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) { ?>
        <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['first_name']; ?>
        <?php echo $row['last_name']; ?></td>
        <td><?php echo $row['gender']; ?></td>
        <td><?php echo $row['year_level']; ?></td>
        <td><?php echo $row['course']; ?></td>
        <td><?php echo $row['semester']; ?></td>
        <td>
            <a href="student_delete.php?id=<?php echo $row['id']; ?>">Delete</a>
            <a href="student_edit.php?id=<?php echo $row['id']; ?>&first_name=<?php echo $row['first_name']; ?>&last_name=<?php echo $row['last_name']; ?>&gender=<?php echo $row['gender']; ?>&year_level=<?php echo $row['year_level']; ?>&course=<?php echo $row['course']; ?>&semester=<?php echo $row['semester']; ?>">Edit</a>
            <a href="student-subjects.php?id=<?php echo $row['id']; ?>&first_name=<?php echo $row['first_name']; ?>&last_name=<?php echo $row['last_name']; ?>&gender=<?php echo $row['gender']; ?>&year_level=<?php echo $row['year_level']; ?>&course=<?php echo $row['course']; ?>&semester=<?php echo $row['semester']; ?>"><button>ADD SUBJECTS</button></a>
        </td>
        </tr>
        <?php
        } // end of while loop...
    } else {
        echo "<tr><td colspan='6' style='text-align: center;'>No results found.</td></tr>";
    }
    ?>
    </tbody>
</table>
    </div>
</body>
</html>