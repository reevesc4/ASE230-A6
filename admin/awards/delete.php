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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $awards = array_filter($awards, function($a) use ($awardId) {
        return $a['id'] != $awardId;
    });

    file_put_contents('awards_data.json', json_encode(array_values($awards)));

    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Admin - Delete Award</title>
    <link href="../css/styles.css" rel="stylesheet" />
</head>
<body>
    <a href="index.php" class="btn btn-secondary">Back to Awards Index</a>

    <div class="container mt-4">
        <h1>Delete Award</h1>
        <p>Are you sure you want to delete the award: <?= htmlspecialchars($award['award']); ?>?</p>
        <form action="delete.php?id=<?= $awardId; ?>" method="post">
            <button type="submit" class="btn btn-danger">Yes</button>
            <a href="index.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>
