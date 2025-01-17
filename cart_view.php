<?php
    session_start();
    include "includes/head.php";

    // Check if the user is logged in
    if (! isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit();
    }

    // Check if the cart is empty
    if (! isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
        echo "<p class='empty-cart'>Your cart is empty! <a href='index.php'>Go back to shop</a></p>";
        exit;
    }
?>
<body>
    <div class="cart-container" style="width: 80%; margin: 20px auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <h2 style="text-align: center; margin-bottom: 20px;">Your Cart</h2>
        <table class="table" style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr>
                    <th style="border-bottom: 2px solid #ddd; text-align: left; padding: 10px;">Product Name</th>
                    <th style="border-bottom: 2px solid #ddd; text-align: left; padding: 10px;">Price</th>
                    <th style="border-bottom: 2px solid #ddd; text-align: left; padding: 10px;">Quantity</th>
                    <th style="border-bottom: 2px solid #ddd; text-align: left; padding: 10px;">Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $total_price = 0;
                    foreach ($_SESSION['cart'] as $product_id => $product) {
                        $total = $product['price'] * $product['quantity'];
                        $total_price += $total;
                        echo "
                        <tr>
                            <td style='padding: 10px;'>{$product['name']}</td>
                            <td style='padding: 10px;'>\$" . number_format($product['price'], 2) . "</td>
                            <td style='padding: 10px;'>{$product['quantity']}</td>
                            <td style='padding: 10px;'>\$" . number_format($total, 2) . "</td>
                        </tr>";
                    }
                ?>
            </tbody>
        </table>
        <p style="text-align: right; font-size: 18px; margin-top: 20px;">Total: <strong>$<?php echo number_format($total_price, 2); ?></strong></p>
        <form action="checkout.php" method="POST" style="text-align: right; margin-top: 10px;">
            <input type="hidden" name="total_price" value="<?php echo $total_price; ?>">
            <button type="submit" class="btn btn-success" style="padding: 10px 20px; font-size: 16px;">Proceed to Checkout</button>
        </form>
    </div>
</body>
</html>
