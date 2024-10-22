<?php
$products = json_decode(file_get_contents('products_data.json'), true);

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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $products = array_filter($products, function($p) use ($productId) {
        return $p['id'] != $productId;
    });

    file_put_contents('products_data.json', json_encode(array_values($products)));

    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Admin - Delete Product</title>
    <link href="../css/styles.css" rel="stylesheet" />
</head>
<body>
    <a href="index.php" class="btn btn-secondary">Back to Products Index</a>

    <div class="container mt-4">
        <h1>Delete Product</h1>
        <p>Are you sure you want to delete the product: <?= htmlspecialchars($product['product']); ?>?</p>
        <form action="delete.php?id=<?= $productId; ?>" method="post">
            <button type="submit" class="btn btn-danger">Yes</button>
            <a href="index.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>
