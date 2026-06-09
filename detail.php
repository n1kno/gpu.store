<?php require_once 'script.php';
$id = intval($_GET['id'] ?? 0);
$product = getProductById($id);
if (!$product) { http_response_code(404); echo "Товар не найден"; exit; }
?>
<!DOCTYPE html>
<html><head><title><?= $product['name'] ?></title><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"></head>
<body>
<main class="container my-5">
    <div class="row"><div class="col-md-4"><img src="<?= $product['image_url'] ?>" class="img-fluid"></div>
    <div class="col-md-8"><h1><?= $product['name'] ?></h1><p><?= $product['specs'] ?></p><p class="h3 text-success"><?= $product['price'] ?></p>
    <p><?= nl2br($product['full_description']) ?></p><a href="form.php" class="btn btn-success">Заказать</a></div></div>
</main>
</body>
</html>
