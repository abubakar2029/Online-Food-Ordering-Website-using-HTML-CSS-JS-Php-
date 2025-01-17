<div>
  <nav class="navbar navbar-expand-lg navbar-light bg-light px-5">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <a class="navbar-brand fw-bold fs-4" href="#">
      <img src="/images/logo.webp" alt="Logo" height="40" class="me-2">
      Tom Foods
    </a>

    <div class="collapse navbar-collapse justify-content-between" id="navbarTogglerDemo03">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about_us.php">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="booking.php">Book a Table</a>
        </li>
        <?php if (isset($_SESSION['user_id'])): ?>
        <li class="nav-item">
          <a class="nav-link" href="orders.php">All Orders</a>
        </li>
        <?php endif; ?>
      </ul>

      <!-- User Info on the Right -->
      <div class="ml-auto d-flex align-items-center">
        <?php if (isset($_SESSION['user_id'])): ?>
          <!-- User Image and Name -->
          <div class="d-flex align-items-center me-3">
            <span class="fw-bold">Welcome <?php echo htmlspecialchars($_SESSION['user_name']); ?></span>
            <img src="<?php echo $_SESSION['user_image_url']; ?>" alt="User Image" height="40" width="40" class="rounded-circle me-2" style="object-fit: cover;">
          </div>
          <a href="logout.php" class="btn btn-danger">Logout</a>
        <?php else: ?>
          <a href="signup.php" class="btn btn-outline-success">Signup/Login</a>
        <?php endif; ?>
      </div>
    </div>
  </nav>
</div>

<!-- Add Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
