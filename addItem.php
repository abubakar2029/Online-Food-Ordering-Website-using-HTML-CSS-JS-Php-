<?php include "includes/head.php" ?>
<main class="min-h-screen bg-gray-50 flex items-center justify-center px-4">
    <div class="w-full max-w-xl bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-gray-800 mb-2 text-center">Create Product</h2>
        <p class="text-gray-600 text-center mb-6">Add another delicious food item!</p>
        <form action="" method="post" enctype="multipart/form-data" class="space-y-6">
            <!-- Product Name -->
            <div>
                <label for="product_name" class="block text-sm font-medium text-gray-700">Product Name</label>
                <input type="text" name="product_name" id="product_name" required 
                    class="mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>

            <!-- Product Price -->
            <div>
                <label for="product_price" class="block text-sm font-medium text-gray-700">Price</label>
                <input type="text" name="product_price" id="product_price" required 
                    class="mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>

            <!-- Product Image -->
            <div>
                <label for="product_image" class="block text-sm font-medium text-gray-700">Add Image</label>
                <input type="file" name="product_image" id="product_image" required 
                    class="mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>

            <!-- Product Category -->
            <div>
                <label for="product_category" class="block text-sm font-medium text-gray-700">Category</label>
                <select name="product_category" id="product_category" 
                    class="mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <option value="beverages">Beverages</option>
                    <option value="desserts">Desserts</option>
                    <option value="salads">Salads</option>
                    <option value="soups">Soups</option>
                    <option value="bakery">Bakery</option>
                    <option value="fast_food">Fast Food</option>
                </select>
            </div>

            <!-- Product Description -->
            <div>
                <label for="product_description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="product_description" id="product_description" rows="4"
                    class="mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" name="create_product" 
                    class="w-full bg-indigo-600 text-white font-medium py-2 px-4 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    Create Product
                </button>
            </div>
        </form>
    </div>
</main>
<?php include 'components/footer.php'; ?>
</body>
</html>
