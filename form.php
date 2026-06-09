<?php
require_once 'script.php';
$products = getAllProducts();
$success = false;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $product_id = intval($_POST['product_id'] ?? 0);
    $quantity = intval($_POST['quantity'] ?? 1);
    $comment = trim($_POST['comment'] ?? '');

    if (empty($name) || empty($email) || $product_id <= 0) {
        $error = 'Заполните обязательные поля.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Некорректный email.';
    } else {
        if (saveOrder($name, $email, $product_id, $quantity, $comment)) {
            $success = true;
        } else {
            $error = 'Ошибка сохранения заказа.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>GPU Store | Оформление заказа</title>
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
                <li class="nav-item"><a class="nav-link" href="list.php">Видеокарты</a></li>
                <li class="nav-item"><a class="nav-link active" href="form.php">Заказать</a></li>
            </ul>
        </div>
    </div>
</header>

<main class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <?php if ($success): ?>
                <div class="alert alert-success">✅ Заказ принят! Мы свяжемся с вами.</div>
                <div class="text-center"><a href="list.php" class="btn btn-success">Вернуться в каталог</a></div>
            <?php else: ?>
                <?php if ($error): ?>
                    <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
                <?php endif; ?>
                <div class="card bg-dark border-secondary">
                    <div class="card-body p-4">
                        <h2 class="text-center mb-4">Форма заказа</h2>
                        <form method="POST">
                            <div class="mb-3"><label>Имя *</label><input type="text" name="name" class="form-control" required></div>
                            <div class="mb-3"><label>Email *</label><input type="email" name="email" class="form-control" required></div>
                            <div class="mb-3"><label>Видеокарта *</label>
                                <select name="product_id" class="form-select" required>
                                    <option value="">-- Выберите --</option>
                                    <?php foreach ($products as $p): ?>
                                        <option value="<?= $p['id'] ?>" <?= !$p['in_stock'] ? 'disabled' : '' ?>>
                                            <?= htmlspecialchars($p['name']) ?> - <?= $p['price'] ?>
                                            <?= !$p['in_stock'] ? ' (нет)' : '' ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-3"><label>Количество</label><input type="number" name="quantity" class="form-control" value="1" min="1" max="10"></div>
                            <div class="mb-3"><label>Комментарий</label><textarea name="comment" class="form-control" rows="2"></textarea></div>
                            <button type="submit" class="btn btn-success w-100">Отправить заказ</button>
                        </form>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</main>

<footer class="bg-dark text-white pt-4 pb-3 mt-5 text-center small">
    &copy; 2026 GPU Store — заказы сохраняются в базе данных
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
