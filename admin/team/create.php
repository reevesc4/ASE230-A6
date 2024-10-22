<?php
$team = json_decode(file_get_contents('team_data.json'), true);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newName = $_POST['name'];
    $newTitle = $_POST['title'];

    $newMember = [
        'id' => count($team) + 1,
        'name' => $newName,
        'title' => $newTitle
    ];

    $team[] = $newMember;

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
    <title>Admin - Add New Team Member</title>
    <link href="../css/styles.css" rel="stylesheet" />
</head>
<body>
    <a href="index.php" class="btn btn-secondary">Back to Team Index</a>

    <div class="container mt-4">
        <h1>Add New Team Member</h1>
        <form action="create.php" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <textarea class="form-control" id="title" name="title" rows="2" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add Team Member</button>
        </form>
    </div>
</body>
</html>
