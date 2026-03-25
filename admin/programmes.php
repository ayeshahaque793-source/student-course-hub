<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

include '../includes/db.php';

$sql = "SELECT p.*, l.LevelName 
        FROM Programmes p
        JOIN Levels l ON p.LevelID = l.LevelID";

$result = $conn->query($sql);
?>

<h1>Manage Programmes</h1>

<a href="add_programme.php">+ Add New Programme</a>

<table border="1" cellpadding="10">
<tr>
    <th>Name</th>
    <th>Level</th>
    <th>Actions</th>
</tr>

<?php while ($row = $result->fetch_assoc()): ?>
<tr>
    <td><?php echo htmlspecialchars($row['ProgrammeName']); ?></td>
    <td><?php echo htmlspecialchars($row['LevelName']); ?></td>
    <td>
        <a href="edit_programme.php?id=<?php echo $row['ProgrammeID']; ?>">Edit</a>
        |
        <a href="delete_programme.php?id=<?php echo $row['ProgrammeID']; ?>">Delete</a>
    </td>
</tr>
<?php endwhile; ?>

</table>