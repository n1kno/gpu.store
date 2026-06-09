<?php
require_once 'script.php';
$products = getAllProducts();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>GPU Store | Список видеокарт (из БД)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header class="navbar navbar-expand-lg bg-dark sticky-top">
    <div class="container">
        <a class="navbar-brand" href="index.php"><i class="bi bi-cpu fs-2 text-success me-2"></i>GPU Store</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Главная</a></li>
                <li class="nav-item"><a class="nav-link active" href="list.php">Видеокарты</a></li>
                <li class="nav-item"><a class="nav-link" href="form.php">Заказать</a></li>
            </ul>
        </div>
    </div>
</header>

<main class="container my-5">
    <h1 class="display-5 mb-4">Каталог видеокарт</h1>
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-dark">
                <tr><th>ID</th><th>Модель</th><th>Характеристики</th><th>Цена</th><th>Наличие</th><th>Действие</th></tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= $product['id'] ?></td>
                    <td>>
                        <img src="<?= htmlspecialchars($product['image_url']) ?>" width="50" class="rounded me-2">
                        <?= htmlspecialchars($product['name']) ?>
                     </td>
                    <td><?= htmlspecialchars($product['specs']) ?></td>
                    <td><span class="fw-bold text-success"><?= $product['price'] ?></span></td>
                    <td><?= $product['in_stock'] ? '<span class="badge bg-success">В наличии</span>' : '<span class="badge bg-secondary">Нет</span>' ?></td>
                    <td><a href="detail.php?id=<?= $product['id'] ?>" class="btn btn-sm btn-success">Подробнее</a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>

<footer class="bg-dark text-white pt-4 pb-3 mt-5 text-center small">
    &copy; 2026 GPU Store — данные из базы данных
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
