<?php
session_start();

// if user is not logged in
if (! isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'includes/db.php';

if (! isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "<p>Your cart is empty!</p>";
    exit;
}

$total_price = 0;
echo '<h2>Your Cart</h2>';
echo '<table class="table">';
echo '<thead><tr><th>Product Name</th><th>Price</th><th>Quantity</th><th>Total</th><th>Action</th></tr></thead>';
echo '<tbody>';
foreach ($_SESSION['cart'] as $product_id => $product) {
    $total = $product['price'] * $product['quantity'];
    $total_price += $total;

    echo "
        <tr>
            <td>{$product['name']}</td>
            <td>\${$product['price']}</td>
            <td>{$product['quantity']}</td>
            <td>\$$total</td>
            <td><a href='remove_item.php?product_id=$product_id' class='btn btn-danger'>Remove</a></td>
        </tr>
    ";
}
echo '</tbody>';
echo '</table>';
echo "<p>Total: \$$total_price</p>";
echo '<a href="checkout.php" class="btn btn-success">Proceed to Checkout</a>';
