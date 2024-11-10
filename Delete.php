<?php
// if (isset($_GET['id'])) {
//     include 'config.php';
//     $id = $_GET['id'];

// echo"Deleted Record";
// }
if (isset($_GET['id'])) { 
    include 'config.php';
    $id = $_GET['id'];

    // // Prepare and execute the query to fetch the student record
    $sql = "DELETE FROM students WHERE id = :id";
     $stmt = $conn->prepare($sql);
     $stmt->bindParam(':id', $id, PDO::PARAM_INT);
     $stmt->execute();

      header('Location: pullusers.php');
}
?>
