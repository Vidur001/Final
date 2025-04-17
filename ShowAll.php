<?php include 'header.php'; ?>

<h1>All Records</h1>

<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'final');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Display all records
$sql = "SELECT * FROM string_info";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["string_id"]. " - Message: " . $row["message"]. "<br>";
    }
} else {
    echo "0 results";
}

// Delete functionality
if (isset($_POST['delete'])) {
    $string_id = $_POST['string_id'];
    
    $stmt = $conn->prepare("DELETE FROM string_info WHERE string_id = ?");
    $stmt->bind_param("i", $string_id);
    
    if ($stmt->execute()) {
        header("Location: ShowAll.php");
    } else {
        echo "Error deleting record: " . $stmt->error;
    }
    
    $stmt->close();
}
?>

<br><br>
<form action="ShowAll.php" method="POST">
    <label for="string_id">Enter ID to delete:</label>
    <input type="number" id="string_id" name="string_id" required>
    <input type="submit" name="delete" value="Delete">
</form>

<br>
<a href="index.php">Back to Input</a>

<?php include 'footer.php'; 
$conn->close();
?>