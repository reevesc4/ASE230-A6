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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pages = array_filter($pages, function($p) use ($pageId) {
        return $p['id'] != $pageId;
    });

    file_put_contents('pages_data.json', json_encode(array_values($pages)));

    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Admin - Delete Page</title>
    <link href="../css/styles.css" rel="stylesheet" />
</head>
<body>
    <a href="index.php" class="btn btn-secondary">Back to Pages Index</a>

    <div class="container mt-4">
        <h1>Delete Page</h1>
        <p>Are you sure you want to delete the page: <?= htmlspecialchars($page['title']); ?>?</p>
        <form action="delete.php?id=<?= $pageId; ?>" method="post">
            <button type="submit" class="btn btn-danger">Yes</button>
            <a href="index.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>
