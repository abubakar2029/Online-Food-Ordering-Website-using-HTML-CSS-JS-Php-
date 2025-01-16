<?php
    session_start();

    // Check if user is logged in
    if (! isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit();
    }
    include 'includes/db.php';

    if (! isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
        header("Location: index.php");
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                             // Get user details and cart items
        $user_id     = $_SESSION['user_id']; // Assuming user is logged in
        $total_price = $_POST['total_price'];
        $order_date  = date("Y-m-d H:i:s");

        // Insert order into database
        $pdo  = connect_db();
        $stmt = $pdo->prepare("INSERT INTO orders (user_id, total_price, order_date) VALUES (?, ?, ?)");
        $stmt->execute([$user_id, $total_price, $order_date]);

        // Get the order ID
        $order_id = $pdo->lastInsertId();

        // Insert each cart item as order details
        foreach ($_SESSION['cart'] as $product_id => $product) {
            $stmt = $pdo->prepare("INSERT INTO order_details (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
            $stmt->execute([$order_id, $product_id, $product['quantity'], $product['price']]);
        }

        // Clear the cart
        unset($_SESSION['cart']);

        echo "<p>Order placed successfully! You will be redirected to your order history.</p>";
        header("refresh:2; url=order_history.php");
        exit;
    }
?>

<form method="POST">
    <input type="hidden" name="total_price" value="<?php echo $_POST['total_price'] ?>">
    <button type="submit" class="btn btn-primary">Confirm Order</button>
</form>
