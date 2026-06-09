<?php require_once 'script.php';
$products = getAllProducts();
$topTwo = array_slice($products, 0, 2);
?>
<!DOCTYPE html>
<html lang="ru">
<head><meta charset="UTF-8"><title>GPU Store</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="style.css"></head>
<body>
<header class="navbar navbar-expand-lg bg-dark sticky-top"><div class="container"><a class="navbar-brand" href="index.php">GPU Store</a>...</div></header>
<main class="container my-5">
    <h1>Новое поколение графических процессоров</h1>
    <div class="row">
        <?php foreach ($topTwo as $p): ?>
        <div class="col-md-6">
            <div class="card"><img src="<?= $p['image_url'] ?>" class="card-img-top" style="max-height:200px"><div class="card-body">
                <h5><?= $p['name'] ?></h5>
                <p><?= $p['specs'] ?></p>
                <a href="detail.php?id=<?= $p['id'] ?>" class="btn btn-success">Подробнее</a>
            </div></div>
        </div>
        <?php endforeach; ?>
    </div>
</main>
<footer class="bg-dark text-white text-center py-3">&copy; 2026 GPU Store</footer>
</body>
</html>
