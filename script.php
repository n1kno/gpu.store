<?php
// script.php
require_once 'config.php';

// Получить все товары
function getAllProducts() {
    global $conn;
    $result = $conn->query("SELECT * FROM products ORDER BY id");
    $products = [];
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
    return $products;
}

// Получить один товар по ID
function getProductById($id) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

// Сохранить заказ
function saveOrder($name, $email, $product_id, $quantity, $comment) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO orders (customer_name, email, product_id, quantity, comment) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiis", $name, $email, $product_id, $quantity, $comment);
    return $stmt->execute();
}
?>
