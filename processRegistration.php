<!-- Depreciated -->
<!-- THIS FILE is no longer used -->


<?php
    // database connection file
    include 'includes/db.php';

    // POST is used for security
    // In GET password is exposed in browser URL
    // Also POST is used to handle large data such as forms or file uploads

    // Check if form is submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $pdo = connect_db();

        // Fetch and sanitize user inputs
        $user_name     = trim($_POST['user_name']);
        $user_email    = trim($_POST['user_email']);
        $user_password = $_POST['user_password'];
        $user_image    = $_FILES['user_image'];

        $error_message   = '';
        $success_message = '';

        // Basic validation
        if (empty($user_name) || empty($user_email) || empty($user_password) || empty($user_image['name'])) {
            $error_message = "All fields are required!";
        } elseif (! filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
            // Validate email format
            $error_message = "Invalid email format!";
        } else {
            // Check if email already exists
            $check_email = $pdo->prepare("SELECT * FROM users WHERE user_email = ?");
            $check_email->execute([$user_email]);

            if ($check_email->rowCount() > 0) {
                $error_message = "Email is already registered!";
            } else {

                // Handle image upload
                $target_dir         = "uploads/";
                $image_extension    = strtolower(pathinfo($user_image['name'], PATHINFO_EXTENSION));
                $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];

                if (! in_array($image_extension, $allowed_extensions)) {
                    $error_message = "Only JPG, JPEG, PNG, and GIF files are allowed!";
                } else {
                    // Unique filename to prevent overwriting
                    $image_name  = uniqid("IMG_", true) . "." . $image_extension;
                    $target_file = $target_dir . $image_name;

                    // Move uploaded file to the target directory
                    if (move_uploaded_file($user_image['tmp_name'], $target_file)) {
                        // Insert user data into the database
                        $insert = $pdo->prepare("INSERT INTO users (user_name, user_email, user_password, user_image_url) VALUES (?, ?, ?, ?)");
                        $result = $insert->execute([$user_name, $user_email, $user_password, $target_file]);

                        if ($result) {
                            $success_message = "Account created successfully!";
                        } else {
                            $error_message = "Something went wrong. Please try again!";
                        }
                    } else {
                        $error_message = "Failed to upload image!";
                    }
                }
            }
        }
    }
?>

<!-- Display Error or Success Messages -->
<?php if (! empty($error_message)): ?>
    <div class="alert alert-danger text-center"><?php echo $error_message; ?></div>
<?php elseif (! empty($success_message)): ?>
    <div class="alert alert-success text-center"><?php echo $success_message; ?></div>
<?php endif; ?>
