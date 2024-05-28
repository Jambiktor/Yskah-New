<?php
include("sessionchecker.php");
include("connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $product_name = $_POST['product_name'];
    $image_file = $_POST['image_file'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    $found = false;

    foreach ($_SESSION['cart'] as &$item) {
        if ($item['id'] == $id) {
            $item['quantity'] += $quantity;
            $found = true;
            break;
        }
    }

    if (!$found) {
        $_SESSION['cart'][] = array(
            'id' => $id,
            'product_name' => $product_name,
            'price' => $price,
            'image_file' => $image_file,
            'quantity' => $quantity
        );
    }

    header("Location: user_cart.php");
    exit();
} else {
    header("Location: user_products.php");
    exit();
}
?>