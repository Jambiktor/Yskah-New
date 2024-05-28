<?php
include("sessionchecker.php");
include("connection.php");

if (!isset($_GET['index'])) {
    header("Location: user_cart.php");
    exit();
}

$index = $_GET['index'];
if (!isset($_SESSION['cart'][$index])) {
    header("Location: user_cart.php");
    exit();
}

$item = $_SESSION['cart'][$index];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $quantity = $_POST['quantity'];
    if ($quantity > 0) {
        $_SESSION['cart'][$index]['quantity'] = $quantity;
    }
    header("Location: user_cart.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Cart Item</title>
    <link rel="stylesheet" href="css/cart6.css" />
</head>

<body>
    <h2>Edit Cart Item</h2>
    <form action="edit-cart-item.php?index=<?php echo $index; ?>" method="post">
        <p>Product Name: <?php echo $item['product_name']; ?></p>
        <p>Price: ₱ <?php echo $item['price']; ?>.00</p>
        <p>Current Quantity: <?php echo $item['quantity']; ?></p>
        <label for="quantity">New Quantity:</label>
        <input type="number" name="quantity" id="quantity" value="<?php echo $item['quantity']; ?>" min="1">
        <button type="submit">Update</button>
    </form>
    <a href="user_cart.php">Back to Cart</a>
</body>

</html>