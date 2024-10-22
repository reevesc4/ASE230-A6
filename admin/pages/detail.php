<?php
$pages = json_decode(file_get_contents('pages_data.json'), true);

$pageId = $_GET['id'] ?? null;

$page = null;
foreach ($pages as $p) {
    if ($p['id'] == $pageId) {
        $page = $p;
        break;
    }
}

if (!$page) {
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Admin - Page Detail</title>
    <link href="../css/styles.css" rel="stylesheet" />
</head>
<body>
    <a href="index.php" class="btn btn-secondary">Back to Pages Index</a>

    <div class="container mt-4">
        <h1><?= htmlspecialchars($page['title']); ?></h1>
        <p><strong>Content:</strong> <?= htmlspecialchars($page['content']); ?></p>
        <a href="edit.php?id=<?= $pageId; ?>" class="btn btn-warning">Edit</a>
        <a href="delete.php?id=<?= $pageId; ?>" class="btn btn-danger">Delete</a>
    </div>
</body>
</html>
