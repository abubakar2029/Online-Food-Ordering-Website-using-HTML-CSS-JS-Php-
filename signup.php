<?php include "includes/head.php" ?>

<main class="shadow-sm mx-auto rounded w-75 p-4">
    <h2 class="h3 font-weight-bold text-dark text-center mb-2">Create An Account</h2>
    <p class="small text-muted text-center mb-4">
        Create an account to enjoy all the services without any ads for free!
    </p>

    <!-- POST is used for security -->
    <!-- In GET password is exposed in browser URL -->
    <!-- Also POST is used to handle large data such as forms or file uploads -->

    <!-- action -->
    <!-- When the form is submitted, the browser sends the data to the file specified in the action attribute. -->
    <!-- action="", the form data is submitted to the same page where the form resides.  -->
    <form action="processRegistration.php" method="POST" enctype="multipart/form-data" class="space-y-4">
        <div class="form-group">
            <label for="user_name" class="form-label small text-muted">Name</label>
            <input type="text" name="user_name" id="user_name" 
                class="form-control mt-1">
        </div>
        <div class="form-group">
            <label for="user_email" class="form-label small text-muted">Email</label>
            <input type="text" name="user_email" id="user_email" 
                class="form-control mt-1">
        </div>
        <div class="form-group">
            <label for="user_password" class="form-label small text-muted">Password</label>
            <input type="password" name="user_password" id="user_password" 
                class="form-control mt-1">
        </div>
        <div class="form-group">
            <label for="user_image" class="form-label small text-muted">Upload Image</label>
            <input type="file" name="user_image" id="user_image" 
                class="form-control mt-1">
        </div>
        <div class="form-group">
            <button name="create_account" type="submit" 
                class="btn btn-success btn-block py-2 text-lg font-weight-bold">
                Create Account
            </button>
        </div>
    </form>

    <p class="small text-center text-muted mt-3">
        Already Have An Account? 
        <a href="#" class="text-success">Sign In</a>
    </p>
</main>
<?php include 'components/footer.php'; ?>
</body>
</html>
