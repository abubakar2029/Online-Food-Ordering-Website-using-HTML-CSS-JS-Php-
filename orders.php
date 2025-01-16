<?php
session_start();
include 'includes/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$pdo = connect_db();
$stmt = $pdo->prepare("SELECT * FROM orders WHERE user_id = ?");
$stmt->execute([$user_id]);
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
echo '<h2>Your Orders</h2>';
if ($orders) {
    foreach ($orders as $order) {
        echo "<p>Order ID: {$order['order_id']} - Total: \${$order['total_price']} - Date: {$order['order_date']}</p>";
        echo "<ul>";
        $order_id = $order['order_id'];
        $stmt = $pdo->prepare("SELECT * FROM order_details WHERE order_id = ?");
        $stmt->execute([$order_id]);
        $order_details = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($order_details as $detail) {
            echo "<li>Product: {$detail['product_id']} - Quantity: {$detail['quantity']} - Price: \${$detail['price']}</li>";
        }
        echo "</ul>";
    }
} else {
    echo "<p>No orders found.</p>";
}
?>
