<?php
    session_start();
    include "includes/head.php";
?>

<?php
    $user_email    = "";
    $user_password = "";
    include 'includes/db.php';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $pdo = connect_db();

        $user_email    = trim($_POST['user_email']);
        $user_password = trim($_POST['user_password']);

        $error_message   = '';
        $success_message = '';

        if (empty($user_email) || empty($user_password)) {
            $error_message = "Email and Password are required!";
        } elseif (! filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
            $error_message = "Invalid email format!";
        } else {
            $check_user = $pdo->prepare("SELECT * FROM users WHERE user_email = ? AND user_password = ?");
            $check_user->execute([$user_email, $user_password]);

            if ($check_user->rowCount() == 1) {
                $_SESSION['user_id']        = $user['user_id'];
                $_SESSION['user_name']      = $user['user_name'];
                $_SESSION['user_id']        = $user_email;
                $_SESSION['user_image_url'] = $user['user_image_url'];

                $success_message = "Login successful! Redirecting...";
                header("refresh:1; url=index.php");
            } else {
                $error_message = "Invalid email or password!";
            }
        }
    }
?>
<main class="shadow-sm mx-auto rounded w-75 p-4">
    <?php if (! empty($error_message)): ?>
        <div class="alert alert-danger text-center"><?php echo $error_message; ?></div>
    <?php elseif (! empty($success_message)): ?>
        <div class="alert alert-success text-center"><?php echo $success_message; ?></div>
    <?php endif; ?>

    <h2 class="h3 font-weight-bold text-dark text-center mb-2">Sign In</h2>
    <p class="small text-muted text-center mb-4">
        Access your account and enjoy all the services!
    </p>

    <form action="" method="POST" class="space-y-4">
        <div class="form-group">
            <label for="user_email" class="form-label small text-muted">Email</label>
            <input type="email" name="user_email" id="user_email" value="<?php echo htmlspecialchars($user_email); ?>
                class="form-control mt-1" required>
        </div>
        <div class="form-group">
            <label for="user_password" class="form-label small text-muted">Password</label>
            <input type="password" name="user_password" id="user_password" value="<?php echo htmlspecialchars($user_password); ?>
                class="form-control mt-1" required>
        </div>
        <div class="form-group">
            <button name="login_account" type="submit"
                class="btn btn-success btn-block py-2 text-lg font-weight-bold">
                Sign In
            </button>
        </div>
    </form>

    <p class="small text-center text-muted mt-3">
        Don't Have An Account?
        <a href="signup.php" class="text-success">Create One</a>
    </p>
</main>

<?php
    include 'components/footer.php';
    ob_end_flush(); // Flush the output buffer and send output to the browser
?>
</body>
</html>
