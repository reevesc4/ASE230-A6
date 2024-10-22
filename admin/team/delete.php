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
    $team = array_filter($team, function($m) use ($memberId) {
        return $m['id'] != $memberId;
    });

    file_put_contents('team_data.json', json_encode(array_values($team)));

    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Admin - Remove Team Member</title>
    <link href="../css/styles.css" rel="stylesheet" />
</head>
<body>
    <a href="index.php" class="btn btn-secondary">Back to Team Index</a>

    <div class="container mt-4">
        <h1>Remove Team Member</h1>
        <p>Are you sure you want to remove this team member: <?= htmlspecialchars($member['name']); ?>?</p>
        <form action="delete.php?id=<?= $memberId; ?>" method="post">
            <button type="submit" class="btn btn-danger">Yes</button>
            <a href="index.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>
