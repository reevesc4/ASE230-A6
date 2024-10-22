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
    $updatedProd = $_POST['product'];
    $updatedDesc = $_POST['desc'];

    foreach ($products as &$p) {
        if ($p['id'] == $productId) {
            $p['product'] = $updatedProd;
            $p['desc'] = $updatedDesc;
            break;
        }
    }

    file_put_contents('products_data.json', json_encode($products));

    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Admin - Edit Product</title>
    <link href="../css/styles.css" rel="stylesheet" />
</head>
<body>
    <a href="index.php" class="btn btn-secondary">Back to Products Index</a>

    <div class="container mt-4">
        <h1>Edit Product</h1>
        <form action="edit.php?id=<?= $pageId; ?>" method="post">
            <div class="mb-3">
                <label for="product" class="form-label">Product</label>
                <input type="text" class="form-control" id="product" name="product" value="<?= htmlspecialchars($product['product']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="desc" class="form-label">Description</label>
                <textarea class="form-control" id="desc" name="desc" rows="5" required><?= htmlspecialchars($product['desc']); ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>
</body>
</html>
