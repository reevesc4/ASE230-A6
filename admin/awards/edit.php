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
    $updatedAward = $_POST['award'];
    $updatedYear = $_POST['year'];

    foreach ($awards as &$a) {
        if ($a['id'] == $awardId) {
            $a['award'] = $updatedAward;
            $a['year'] = $updatedYear;
            break;
        }
    }

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
    <title>Admin - Edit Award</title>
    <link href="../css/styles.css" rel="stylesheet" />
</head>
<body>
    <a href="index.php" class="btn btn-secondary">Back to Awards Index</a>

    <div class="container mt-4">
        <h1>Edit Award</h1>
        <form action="edit.php?id=<?= $awardId; ?>" method="post">
            <div class="mb-3">
                <label for="award" class="form-label">Award</label>
                <input type="text" class="form-control" id="award" name="award" rows="3" value="<?= htmlspecialchars($award['award']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="year" class="form-label">Year</label>
                <textarea class="form-control" id="year" name="year" rows="1" required><?= htmlspecialchars($award['year']); ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>
</body>
</html>
