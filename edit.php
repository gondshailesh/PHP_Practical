<?php
if (isset($_GET['id'])) {
    include 'config.php';
    $id = $_GET['id'];

    // Prepare and execute the query to fetch the student record
    $sql = "SELECT * FROM students WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    // Fetch the result
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if the record was found
    if ($row) {
        // Record found, display the form with pre-filled data
        echo "<form action='formedit.php?id=" . htmlspecialchars($id) . "' method='POST'>";
        echo "<label>Name:</label><input type='text' name='name' value='" . htmlspecialchars($row['name']) . "'><br><br>";
        echo "<label>Last Name:</label><input type='text' name='last_name' value='" . htmlspecialchars($row['last_name']) . "'><br><br>";
        echo "<label>Email:</label><input type='email' name='email' value='" . htmlspecialchars($row['email']) . "'><br><br>";
        echo "<input type='hidden' name='id' value='" . htmlspecialchars($row['id']) . "'>";
        echo "<button type='submit' name='submit'>Update</button>";
        echo "</form>";
    } else {
        // No record found
        echo "No record found for ID $id.";
    }
}
?>
