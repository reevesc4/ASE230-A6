<?php
$products = json_decode(file_get_contents('products_data.json'), true);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newProd = $_POST['product'];
    $newDesc = $_POST['desc'];

    $newProd = [
        'id' => count($products) + 1,
        'product' => $newProd,
        'desc' => $newDesc
    ];

    $products[] = $newProd;

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
    <title>Admin - Create Product</title>
    <link href="../css/styles.css" rel="stylesheet" />
</head>
<body>
    <a href="index.php" class="btn btn-secondary">Back to Products Index</a>

    <div class="container mt-4">
        <h1>Create New Product</h1>
        <form action="create.php" method="post">
            <div class="mb-3">
                <label for="product" class="form-label">Product</label>
                <input type="text" class="form-control" id="product" name="product" required>
            </div>
            <div class="mb-3">
                <label for="desc" class="form-label">Description</label>
                <textarea class="form-control" id="desc" name="desc" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Create Product</button>
        </form>
    </div>
</body>
</html>
