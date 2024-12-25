<?php include "includes/head.php" ?>

<main class="shadow-md mx-auto rounded-lg w-96 p-6">
        <h2 class="text-2xl font-bold text-gray-700 text-center mb-2">Create An Account</h2>
        <p class="text-sm text-gray-500 text-center mb-6">
            Create an account to enjoy all the services without any ads for free!
        </p>

        <!-- POST is used for security -->
        <!-- In GET password is exposed in browser URL -->
        <!-- Also POST is used to handle large data such as forms or file uploads -->

        <!-- action -->
        <!-- When the form is submitted, the browser sends the data to the file specified in the action attribute. -->
        <!-- action="", the form data is submitted to the same page where the form resides.  -->
        <form action="processRegistration.php" method="POST" enctype="multipart/form-data" class="space-y-4">
            <p>
                <label for="user_name" class="block text-sm font-medium text-gray-600">Name</label>
                <input type="text" name="user_name" id="user_name" 
                    class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-transparent">
            </p>
            <p>
                <label for="user_email" class="block text-sm font-medium text-gray-600">Email</label>
                <input type="text" name="user_email" id="user_email" 
                    class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-transparent">
            </p>
            <p>
                <label for="user_password" class="block text-sm font-medium text-gray-600">Password</label>
                <input type="password" name="user_password" id="user_password" 
                    class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-transparent">
            </p>
            <p>
                <label for="user_image" class="block text-sm font-medium text-gray-600">Upload Image</label>
                <input type="file" name="user_image" id="user_image" 
                    class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-transparent">
            </p>
            <p>
                <button name="create_account" type="submit" 
                    class="w-full bg-green-500 text-white py-2 rounded-md text-lg font-semibold hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400">
                    Create Account
                </button>
            </p>
        </form>

        <p class="text-sm text-center text-gray-500 mt-4">
            Already Have An Account? 
            <a href="#" class="text-green-600 hover:underline">Sign In</a>
        </p>
    </main>
    <?php include 'components/footer.php'; ?>
</body>
</html>
