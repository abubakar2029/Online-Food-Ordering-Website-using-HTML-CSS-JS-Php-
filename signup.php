<html>
    <?php
?>
    <main>
    <?php
include 'components/header.php';
?>
    <h2>Create Accout</h2>

    <!-- POST is used for security -->
    <!-- In GET password is exposed in browser URL -->
    <!-- Also POST is used to handle large data sucha as form or file uploads -->


    <!-- action -->
    <!-- When the form is submitted, the browser sends the data to the file specified in the action attribute. -->
    <!-- action="", the form data is submitted to the same page where the form resides.  -->
<form action="processRegistration.php" method="POST" enctype="multipart/form-data">
<p>
    <label for="user_name">Name</label>
    <input type="text" name="user_name" id="user_name">
</p>
<p>
    <label for="user_email">Email</label>
    <input type="text" name="user_email" id="user_email">
</p>
<p>
    <label for="user_password">Password</label>
    <input type="text" name="user_password" id="user_password">
</p>
</p>
<p>
    <label for="user_image">Upload Image</label>
    <input type="text" name="user_image" id="user_image" type="file">
</p>
<p>
    <button name="create_account" type="submit">Create Account</button>
</p>
</form>
    </main>
    <?php
include 'components/footer.php';
?>
</html>