<?php
$contacts = json_decode(file_get_contents('contacts_data.json'), true);

$contactId = $_GET['id'] ?? null;

$contact = null;
foreach ($contacts as $c) {
    if ($c['id'] == $contactId) {
        $contact = $c;
        break;
    }
}

if (!$contact) {
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Admin - Contact Details</title>
    <link href="../css/styles.css" rel="stylesheet" />
</head>
<body>
    <a href="index.php" class="btn btn-secondary">Back to Contacts Index</a>

    <div class="container mt-4">
        <h1><?= htmlspecialchars($contact['type']); ?></h1>
        <p><strong>Details:</strong> <?= htmlspecialchars($contact['details']); ?></p>
    </div>
</body>
</html>
