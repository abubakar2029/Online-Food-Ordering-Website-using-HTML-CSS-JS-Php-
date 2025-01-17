<?php
session_start();
    include "includes/head.php";
?>

<body>

    <!-- Logo at the Top -->
    <div class="text-center pt-4">
        <img src="images/logo.webp" alt="Tom Foods Logo" height="80">
    </div>

    <!-- About Us Section -->
    <section class="container py-5">
        <div class="text-center mb-4">
            <h1 class="fw-bold">About Tom Foods</h1>
            <p class="text-muted">Bringing you the best flavors, one bite at a time.</p>
        </div>

        <div class="row align-items-center">
            <!-- Left: Image -->
            <div class="col-md-6">
                <img src="images/about.jpeg" alt="Delicious Food" class="img-fluid rounded shadow">
            </div>

            <!-- Right: Content -->
            <div class="col-md-6">
                <h3 class="fw-bold">Our Story</h3>
                <p>
                    Founded with a passion for exceptional food, <strong>Tom Foods</strong> started as a small kitchen and has grown into a hub for food lovers.
                    Our mission is simple: deliver delicious, high-quality meals that bring people together.
                </p>

                <h4 class="fw-bold mt-4">Why Choose Us?</h4>
                <ul class="list-unstyled">
                    <li><i class="fas fa-check-circle text-success me-2"></i>Fresh, high-quality ingredients</li>
                    <li><i class="fas fa-check-circle text-success me-2"></i>Quick and reliable delivery</li>
                    <li><i class="fas fa-check-circle text-success me-2"></i>Affordable and delicious meals</li>
                    <li><i class="fas fa-check-circle text-success me-2"></i>Exceptional customer service</li>
                </ul>

                <a href="index.php" class="btn btn-primary mt-3">Explore Our Menu</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include "components/footer.php"; ?>

    <!-- Add Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
