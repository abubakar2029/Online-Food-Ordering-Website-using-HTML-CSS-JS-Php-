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
?>

<?php include "includes/head.php"; ?>
<body class="bg-light">
    <div class="my-5">
        <h2 class="text-center mb-4">Order History</h2>
        <?php if ($orders): ?>
            <?php foreach ($orders as $order): ?>
                <div class="mb-4 p-4 rounded shadow-sm bg-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-2">Order ID: <strong>#<?php echo $order['order_id']; ?></strong></h5>
                        <p class="text-muted mb-0 small">Date: <?php echo $order['order_date']; ?></p>
                    </div>
                    <p class="mb-2">Total Amount: <strong>$<?php echo number_format($order['total_price'], 2); ?></strong></p>
                    <h6 class="mt-3">Order Details:</h6>
                    <table class="table table-sm table-borderless">
                        <thead>
                            <tr class="text-muted">
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $order_id = $order['order_id'];
                                $stmt = $pdo->prepare("SELECT * FROM order_details WHERE order_id = ?");
                                $stmt->execute([$order_id]);
                                $order_details = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($order_details as $detail):
                            ?>
                                <tr>
                                    <td><?php echo $detail['product_id']; ?></td>
                                    <td><?php echo $detail['quantity']; ?></td>
                                    <td>$<?php echo number_format($detail['price'], 2); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="alert alert-secondary text-center">
                <strong>No orders found!</strong>
            </div>
        <?php endif; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
