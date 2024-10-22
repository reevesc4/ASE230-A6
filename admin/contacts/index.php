<?php
$contacts = json_decode(file_get_contents('contacts_data.json'), true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Admin - Contacts</title>
    <link href="../css/styles.css" rel="stylesheet" />
</head>
<body>
    <div class="container mt-4">
        <h1>Admin Dashboard</h1>
        <ul class="list-group">
            <li class="list-group-item"><a href="../pages/index.php">Manage Pages</a></li>
            <li class="list-group-item"><a href="../team/index.php">Manage Team</a></li>
            <li class="list-group-item"><a href="../awards/index.php">Manage Awards</a></li>
            <li class="list-group-item"><a href="../products/index.php">Manage Products</a></li>
            <li class="list-group-item"><a href="../contacts/index.php">Manage Contacts</a></li>
        </ul>
    </div>
    <div class="container mt-4">
        <h1>Contacts</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contacts as $contact): ?>
                <tr>
                    <td><?= htmlspecialchars($contact['type']); ?></td>
                    <td>
                        <a href="detail.php?id=<?= $contact['id']; ?>" class="btn btn-info btn-sm">View</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
