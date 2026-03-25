<?php
session_start();
include '../includes/db.php';

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $level = $_POST['level'];
    $desc = $_POST['description'];

    $stmt = $conn->prepare("UPDATE Programmes SET ProgrammeName=?, LevelID=?, Description=? WHERE ProgrammeID=?");
    $stmt->bind_param("sisi", $name, $level, $desc, $id);
    $stmt->execute();

    header("Location: programmes.php");
    exit();
}

$result = $conn->query("SELECT * FROM Programmes WHERE ProgrammeID=$id");
$data = $result->fetch_assoc();
?>

<h1>Edit Programme</h1>

<form method="POST">
    Name: <input type="text" name="name" value="<?php echo $data['ProgrammeName']; ?>"><br><br>

    Level:
    <select name="level">
        <option value="1">Undergraduate</option>
        <option value="2">Postgraduate</option>
    </select><br><br>

    Description:<br>
    <textarea name="description"><?php echo $data['Description']; ?></textarea><br><br>

    <button type="submit">Update</button>
</form>