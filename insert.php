<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'config.php';

    // Check if fields are set
    if (isset($_POST['name'], $_POST['last_name'], $_POST['email'])) {
        $name = $_POST['name'];
        $lastname = $_POST['last_name'];
        $email = $_POST['email'];

        try {
            $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Correct SQL query formatting
            $sql = "INSERT INTO students (name, last_name, email) VALUES (?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$name, $lastname, $email]);
            echo "Welcome ".$name.", your Profile is created";
            header("Location:pullusers.php");
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        $pdo = null;
    } else {
        echo "Please fill out all fields.";
        echo"you should have to fill up all fields other wise your form will not submit";
    }
}
?>
