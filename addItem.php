<html>
    <?php

?>

<?php include 'components/header.php'?>
    <body>
        <main>
            <h2>Create Product</h2>
            <p>Add another delicious food item!</p>
            <form action="">
                <p>
                    <label for="product_name">Product Name</label>
                    <input type="text" name="product_name" id="product_name" required>
                </p>

                <p>
                    <label for="product_price">Price</label>
                    <input type="text" name="product_price" id="product_price" required>
                </p>

                <p>
                    <label for="product_image">Add Image</label>
                    <input name="product_image" id="product_image" required type="file">
                </p>
                <p>
                    <label for="product_category">Category</label>
                    <select name="product_category" id="product_category">
                    <option value="beverages">Beverages</option>
                    <option value="appetizers">Appetizers</option>
                    <option value="desserts">Desserts</option>
                    <option value="salads">Salads</option>
                    <option value="soups">Soups</option>
                    <option value="bakery">Bakery</option>
                    <option value="fast_food">Fast Food</option>
                    </select>
                </p>
                <p>
                    <label for="product_description">Description</label>
                    <textarea name="product_description" id="product_description"></textarea>
                </p>
                <p>
                    <button type="submit" name="create_product">Create Product</button>
                </p>
            </form>
        </main>
            <?php
include 'components/footer.php';
?>
    </body>
</html>