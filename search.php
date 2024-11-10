<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="POST" action="">
        <label for="">search the data in database exactly match</label>
        <input type="text" name="exactly" placeholder="search in database"><br><br>
        <button name="submit">submit</button><br><br>
    </form>
</body>
</html>

<?php
if (isset($_POST['submit'])) {
    include 'config.php';
    $exactly = $_POST['exactly'];
    $result = $conn->prepare("SELECT * FROM students WHERE name = '$exactly'");
    $result->execute();
    $search = $result->fetchAll();
    echo "<table border='5' bordercolor='skyblue'>";

    echo "<tr>
              <th>Sr.No</th>
              <th>Name</th>
              <th>Last Name</th>
              <th>Email</th>
        </tr>";
        $a=0;
    foreach ($search as $row) {
        $a++;
        
        echo "<tr><td>" .$a. "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>". $row["last_name"] ."</td>";
        echo "<td>". $row["email"] . "</td></tr>";
        echo "</br>";

    }
    echo " </table>";
}
?>