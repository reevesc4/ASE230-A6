<?php
$awards = json_decode(file_get_contents('awards_data.json'), true);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newAward = $_POST['award'];
    $newYear = $_POST['year'];

    $newAwards = [
        'id' => count($awards) + 1,
        'award' => $newAward,
        'year' => $newYear
    ];

    $awards[] = $newAwards;

    file_put_contents('awards_data.json', json_encode($awards));

    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Admin - Create Award</title>
    <link href="../css/styles.css" rel="stylesheet" />
</head>
<body>
    <a href="index.php" class="btn btn-secondary">Back to Awards Index</a>

    <div class="container mt-4">
        <h1>Create New Award</h1>
        <form action="create.php" method="post">
            <div class="mb-3">
                <label for="award" class="form-label">Award</label>
                <input type="text" class="form-control" id="award" name="award" rows="2" required>
            </div>
            <div class="mb-3">
                <label for="year" class="form-label">Year</label>
                <textarea class="form-control" id="year" name="year" rows="1" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Create Award</button>
        </form>
    </div>
</body>
</html>
