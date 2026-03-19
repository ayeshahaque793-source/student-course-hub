<?php
include 'includes/db.php';

$sql = "SELECT p.ProgrammeID, p.ProgrammeName, p.Description, l.LevelName
        FROM Programmes p
        JOIN Levels l ON p.LevelID = l.LevelID";

$result = $conn->query($sql);

// Simple query check
if (!$result) {
    die("Query failed: " . $conn->error);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Course Hub</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

<h1>Student Course Hub</h1>
<p>Explore our available programmes</p>

<?php if ($result->num_rows > 0): ?>

    <?php while ($row = $result->fetch_assoc()): ?>
        <div class="programme-card">
            <h2><?= htmlspecialchars($row['ProgrammeName']) ?></h2>
            <p><strong>Level:</strong> <?= htmlspecialchars($row['LevelName']) ?></p>
            <p><?= htmlspecialchars($row['Description']) ?></p>
            <a href="programme.php?id=<?= $row['ProgrammeID'] ?>">View Details</a>
        </div>
    <?php endwhile; ?>

<?php else: ?>
    <p>No programmes found.</p>
<?php endif; ?>

</body>
</html>