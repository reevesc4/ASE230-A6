<?php
$products  = json_decode(file_get_contents('products_data.json'), true);

$productId = $_GET['id'] ?? null;

$product = null;
foreach ($products as $p) {
    if ($p['id'] == $productId) {
        $product = $p;
        break;
    }
}

if (!$product) {
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Admin - Product Details</title>
    <link href="../css/styles.css" rel="stylesheet" />
</head>
<body>
    <a href="index.php" class="btn btn-secondary">Back to Products Index</a>

    <div class="container mt-4">
        <h1><?= htmlspecialchars($product['product']); ?></h1>
        <p><strong>Description:</strong> <?= htmlspecialchars($product['desc']); ?></p>
        <a href="edit.php?id=<?= $productId; ?>" class="btn btn-warning">Edit</a>
        <a href="delete.php?id=<?= $productId; ?>" class="btn btn-danger">Delete</a>
    </div>
</body>
</html>
