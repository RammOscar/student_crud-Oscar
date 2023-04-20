<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUBJECTS</title>
</head>
<body>
<?php include_once "menu.php"; 
 include "connection.php";
 $year_level = $_GET['year_level'];
 $COURSE = $_GET['course'];
 $sem = $_GET['semester'];
 ?>
    <form action="subject_update.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
        <h1>ENTER SUBJECT DETAILS</h1>
        <label for="">
            ENTER Course Code:
            <input type="text" name="subject_code" value="<?php echo $_GET['subject_code']; ?>">
        </label><br>
        <form action="subject_update.php" method="POST" >
        <label for="">
            ENTER Course Description:
            <input type="text" name="subject_desc" value="<?php echo $_GET['subject_desc']; ?>">
        </label><br>
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
        </label><hr>
        <button type="submit">Submit</button>
    </form>

    <table border="1" style="text-align:center;">
    <thead>
    <tr>
    <th>ID</th>
    <th>Subject Code</th>
    <th>Subject Description</th>
    <th>YEAR LEVEL</th>
    <th>COURSE</th>
    <th>SEMESTER</th>
    <th colspan='6'>ACTION</th>
    </tr>
    </thead>
    
    <tbody>
    <?php
    require_once "connection.php";
    $sql = "SELECT * FROM subject";
    $result = $conn->query($sql);

    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) { ?>
        <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['subject_code']; ?></td>
        <td><?php echo $row['subject_desc']; ?></td>
        <td><?php echo $row['year_level']; ?></td>
        <td><?php echo $row['course']; ?></td>
        <td><?php echo $row['semester']; ?></td>
        <td>
            <a href="subject_delete.php?id=<?php echo $row['id']; ?>">Delete</a>
            <a href="subject_edit.php?id=<?php echo $row['id']; ?>&subject_code=<?php echo $row['subject_code']; ?>&subject_desc=<?php echo $row['subject_desc']; ?>&year_level=<?php echo $row['year_level']; ?>&course=<?php echo $row['course']; ?>&semester=<?php echo $row['semester']; ?>">Edit</a>
        </td>
        </tr>
        <?php
        } // end of while loop...
    } else {
        echo "<tr><td colspan='7' style='text-align: center;'>No results found.</td></tr>";
    }
    ?>
    </tbody>
</table>   
</body>
</html>