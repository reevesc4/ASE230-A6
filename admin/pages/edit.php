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
    $updatedTitle = $_POST['title'];
    $updatedContent = $_POST['content'];

    foreach ($pages as &$p) {
        if ($p['id'] == $pageId) {
            $p['title'] = $updatedTitle;
            $p['content'] = $updatedContent;
            break;
        }
    }

    file_put_contents('pages_data.json', json_encode($pages));

    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Admin - Edit Page</title>
    <link href="../css/styles.css" rel="stylesheet" />
</head>
<body>
    <a href="index.php" class="btn btn-secondary">Back to Pages Index</a>

    <div class="container mt-4">
        <h1>Edit Page</h1>
        <form action="edit.php?id=<?= $pageId; ?>" method="post">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="<?= htmlspecialchars($page['title']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" id="content" name="content" rows="5" required><?= htmlspecialchars($page['content']); ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>
</body>
</html>
