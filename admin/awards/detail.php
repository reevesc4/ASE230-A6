<?php
$awards = json_decode(file_get_contents('awards_data.json'), true);

$awardId = $_GET['id'] ?? null;

$award = null;
foreach ($awards as $a) {
    if ($a['id'] == $awardId) {
        $award = $a;
        break;
    }
}

if (!$award) {
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Admin - Award Detail</title>
    <link href="../css/styles.css" rel="stylesheet" />
</head>
<body>
    <a href="index.php" class="btn btn-secondary">Back to Awards Index</a>

    <div class="container mt-4">
        <h1><?= htmlspecialchars($award['award']); ?></h1>
        <p><strong>Year:</strong> <?= htmlspecialchars($award['year']); ?></p>
        <a href="edit.php?id=<?= $awardId; ?>" class="btn btn-warning">Edit</a>
        <a href="delete.php?id=<?= $awardId; ?>" class="btn btn-danger">Delete</a>
    </div>
</body>
</html>
