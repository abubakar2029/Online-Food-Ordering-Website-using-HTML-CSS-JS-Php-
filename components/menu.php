
<div>

<?php
// including database connection file
include 'connection/db.php';

// fetching all products data
$sql = "SELECT * FROM products";
$result = mysqli_query($db, $sql);

// if there are products, display them
if (mysqli_num_rows($result) > 0) {

    // iterating over the result
    while ($row = mysqli_fetch_assoc($result)) {
        $productImage = htmlspecialchars($row['product_image']);
        $productName = htmlspecialchars($row['product_name']);
        $productDescription = htmlspecialchars($row['product_description']);
        $productPrice = htmlspecialchars($row['product_price']);

        echo "
        <div>
            <!-- product_image -->
            <img src=\"$productImage\" alt=\"$productName\">
            <div>
                <!-- product_name -->
                <p class=\"product-name\">$productName</p>
                <!-- product_description -->
                <p class=\"product-description\">$productDescription</p>
                <!-- footer of card -->
                <div>
                    <!-- product_price -->
                    <p class=\"product-price\">\$$productPrice</p>
                    <!-- add_to_cart -->
                    <span>
                        <img src=\"images/logos/add_to_cart.png\" alt=\"Add to cart icon\" width=\"25px\">
                        <button>Add to Cart</button>
                    </span>
                </div>
            </div>
        </div>";
    }

} else {
    echo "<p><i>Loading the products</i></p>";
}

// closing database connection
mysqli_close($db);
?>


</div>
