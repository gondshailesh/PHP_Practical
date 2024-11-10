<?php
include 'config.php';

// Query to fetch student names
$result = $conn->query("SELECT name FROM students"); // Assuming 'name' is the column for student names
$result->execute();
$students = $result->fetchAll(PDO::FETCH_COLUMN); // Fetch only the 'name' column

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dropdown</title>   

</head>
<body>
    <label for="cars">Select Name of Student</label>
    <select name="ind" id="ind">
        <?php
        foreach ($students as $student) {
            echo "<option value='$student'>$student</option>";
        }
        ?>
    </select>
</body>
</html>