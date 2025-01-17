<?php
    session_start();

    // Check if the user is logged in
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit();
    }

    // Check if the cart is empty
    if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
        header("Location: index.php");
        exit();
    }

    include 'includes/db.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $user_id     = $_SESSION['user_id'];
        $total_price = $_POST['total_price'];
        $order_date  = date("Y-m-d H:i:s");

        // Insert the order into the database
        $pdo = connect_db();
        $stmt = $pdo->prepare("INSERT INTO orders (user_id, total_price, order_date) VALUES (?, ?, ?)");
        $stmt->execute([$user_id, $total_price, $order_date]);

        // Get the order ID
        $order_id = $pdo->lastInsertId();

        // Insert each cart item into order details
        foreach ($_SESSION['cart'] as $product_id => $product) {
            $stmt = $pdo->prepare("INSERT INTO order_details (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
            $stmt->execute([$order_id, $product_id, $product['quantity'], $product['price']]);
        }

        // Clear the cart
        unset($_SESSION['cart']);

        echo "<p style='text-align: center; margin: 20px;'>Order placed successfully! You will be redirected to your order history.</p>";
        header("refresh:2; url=order_history.php");
        exit();
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
</head>
<body>
    <div class="checkout-container" style="width: 80%; margin: 20px auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <h2 style="text-align: center; margin-bottom: 20px;">Confirm Your Order</h2>
        <form method="POST" style="text-align: center;">
            <input type="hidden" name="total_price" value="<?php echo $_POST['total_price']; ?>">
            <button type="submit" class="btn btn-primary" style="padding: 10px 20px; font-size: 16px;">Confirm Order</button>
        </form>
    </div>
</body>
</html>
