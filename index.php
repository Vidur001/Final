<?php include 'header.php'; ?>

<h1>String Input</h1>
<form action="process.php" method="POST">
    <label for="message">Enter a message (max 50 chars):</label><br>
    <input type="text" id="message" name="message" maxlength="50" required>
    <input type="submit" name="submit" value="Submit">
</form>

<br>
<a href="ShowAll.php">Show all records</a>

<?php include 'footer.php'; ?>