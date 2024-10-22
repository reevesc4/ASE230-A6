<?php
$team = json_decode(file_get_contents('team_data.json'), true);

$memberId = $_GET['id'] ?? null;

$member = null;
foreach ($team as $m) {
    if ($m['id'] == $memberId) {
        $member = $m;
        break;
    }
}

if (!$member) {
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Admin - Member Details</title>
    <link href="../css/styles.css" rel="stylesheet" />
</head>
<body>
    <a href="index.php" class="btn btn-secondary">Back to Team Index</a>

    <div class="container mt-4">
        <h1><?= htmlspecialchars($member['name']); ?></h1>
        <p><strong>Title:</strong> <?= htmlspecialchars($member['title']); ?></p>
        <a href="edit.php?id=<?= $memberId; ?>" class="btn btn-warning">Edit</a>
        <a href="delete.php?id=<?= $memberId; ?>" class="btn btn-danger">Delete</a>
    </div>
</body>
</html>
