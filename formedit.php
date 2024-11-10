<?php
if (isset($_POST['submit'])) {
    // Include database config
    include 'config.php';

    // Retrieve form data
    $id = $_POST['id'];
    $name = $_POST['name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];

    // Prepare the SQL UPDATE query
    $sql = "UPDATE students SET name = :name, last_name = :last_name, email = :email WHERE id = :id";
    $stmt = $conn->prepare($sql);

    // Bind the parameters to the prepared statement
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':last_name', $last_name, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    // Execute the statement
    if ($stmt->execute()) {
        echo"Please Wait for 5 second.......";
        header("refresh: 2; url = pullusers.php");
    } else {
        echo "Error updating record.";
    }
}
?>
