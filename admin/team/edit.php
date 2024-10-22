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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $updatedTitle = $_POST['title'];
    $updatedContent = $_POST['content'];

    foreach ($team as &$m) {
        if ($m['id'] == $memberId) {
            $m['name'] = $updatedName;
            $m['title'] = $updatedTitle;
            break;
        }
    }

    file_put_contents('team_data.json', json_encode($team));

    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Admin - Edit Team Member</title>
    <link href="../css/styles.css" rel="stylesheet" />
</head>
<body>
    <a href="index.php" class="btn btn-secondary">Back to Team Index</a>

    <div class="container mt-4">
        <h1>Edit Team Member</h1>
        <form action="edit.php?id=<?= $pageId; ?>" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($member['name']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">title</label>
                <textarea class="form-control" id="title" name="title" rows="5" required><?= htmlspecialchars($member['title']); ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>
</body>
</html>
