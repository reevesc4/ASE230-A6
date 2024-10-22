<?php
$pages = json_decode(file_get_contents('pages_data.json'), true);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newTitle = $_POST['title'];
    $newContent = $_POST['content'];

    $newPage = [
        'id' => count($pages) + 1,
        'title' => $newTitle,
        'content' => $newContent
    ];

    $pages[] = $newPage;

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
    <title>Admin - Create Page</title>
    <link href="../css/styles.css" rel="stylesheet" />
</head>
<body>
    <a href="index.php" class="btn btn-secondary">Back to Pages Index</a>

    <div class="container mt-4">
        <h1>Create New Page</h1>
        <form action="create.php" method="post">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Create Page</button>
        </form>
    </div>
</body>
</html>
