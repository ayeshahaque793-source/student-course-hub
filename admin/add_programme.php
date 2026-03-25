<?php
session_start();
include '../includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $level = $_POST['level'];
    $desc = $_POST['description'];

    $stmt = $conn->prepare("INSERT INTO Programmes (ProgrammeName, LevelID, Description) VALUES (?, ?, ?)");
    $stmt->bind_param("sis", $name, $level, $desc);
    $stmt->execute();

    header("Location: programmes.php");
    exit();
}
?>

<h1>Add Programme</h1>

<form method="POST">
    Name: <input type="text" name="name" required><br><br>

    Level:
    <select name="level">
        <option value="1">Undergraduate</option>
        <option value="2">Postgraduate</option>
    </select><br><br>

    Description:<br>
    <textarea name="description"></textarea><br><br>

    <button type="submit">Add Programme</button>
</form>