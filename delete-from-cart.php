<?php
include("sessionchecker.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $index = $_POST['index'];

    if (isset($_SESSION['cart'][$index])) {
        unset($_SESSION['cart'][$index]);
        $_SESSION['cart'] = array_values($_SESSION['cart']); // Reindex the array
    }

    header("Location: user_cart.php");
    exit();
} else {
    header("Location: user_products.php");
    exit();
}
?>