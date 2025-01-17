<?php
session_start();
include 'includes/db.php';

// Initializing variables
$email = "";
$date = "";
$people = "";
$success_message = "";
$error_message = "";

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pdo = connect_db();

    $email  = trim($_POST['email']);
    $date   = $_POST['date'];
    $people = $_POST['people'];

    // Basic validation
    if (empty($email) || empty($date) || empty($people)) {
        $error_message = "All fields are required!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Invalid email format!";
    } elseif ($people <= 0) {
        $error_message = "Number of people must be at least 1.";
    } else {
        // Insert booking into the database
        $stmt = $pdo->prepare("INSERT INTO bookings (email, booking_date, number_of_people) VALUES (?, ?, ?)");
        $result = $stmt->execute([$email, $date, $people]);

        if ($result) {
            $success_message = "Your booking has been confirmed!";
            $email = $date = $people = ""; // Reset form
        } else {
            $error_message = "Failed to process your booking. Please try again.";
        }
    }
}
?>


<?php include "includes/head.php"; ?>
<body class="bg-light">

<div class="mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <h3 class="card-title text-center mb-3">Book a Table</h3>

                    <!-- Display success or error messages -->
                    <?php if (!empty($error_message)): ?>
                        <div class="alert alert-danger text-center"><?php echo $error_message; ?></div>
                    <?php elseif (!empty($success_message)): ?>
                        <div class="alert alert-success text-center"><?php echo $success_message; ?></div>
                    <?php endif; ?>

                    <!-- Booking Form -->
                    <form action="" method="POST">
                        <!-- Date Picker -->
                        <div class="mb-3">
                            <label for="date" class="form-label">Pick a Date</label>
                            <input type="date" name="date" id="date" class="form-control" value="<?php echo htmlspecialchars($date); ?>" required>
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Your Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="<?php echo htmlspecialchars($email); ?>" placeholder="example@domain.com" required>
                        </div>

                        <!-- Number of People -->
                        <div class="mb-3">
                            <label for="people" class="form-label">Number of People</label>
                            <input type="number" name="people" id="people" class="form-control" value="<?php echo htmlspecialchars($people); ?>" min="1" required>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary w-100">Confirm Booking</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
