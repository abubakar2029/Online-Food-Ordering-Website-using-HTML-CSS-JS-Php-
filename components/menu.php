<div class="container my-5">
  <?php
  // Including database connection file
  include 'includes/db.php';

  $pdo = connect_db();
  $food_items = get_menu($pdo);

  // Display products
  if ($food_items) {
      echo '<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">';
      foreach ($food_items as $row) {

          $productImage = htmlspecialchars($row['image_url']);
          $productName = htmlspecialchars($row['name']);
          $productDescription = htmlspecialchars($row['description']);
          $productPrice = htmlspecialchars($row['price']);

          echo "
              <div class=\"col\">
                  <div class=\"card border-success\">
                      <img src=\"$productImage\" class=\"card-img-top\" alt=\"$productName\" style=\"height: 200px; object-fit: cover;\">
                      <div class=\"card-body\">
                          <h5 class=\"card-title text-truncate\">$productName</h5>
                          <p class=\"card-text text-muted\">$productDescription</p>
                          <div class=\"d-flex justify-content-between align-items-center\">
                              <p class=\"card-text font-weight-bold\">\$$productPrice</p>
                              <button class=\"btn btn-primary btn-sm\"><i class=\"fas fa-cart-plus\"></i> Add to Cart</button>
                          </div>
                      </div>
                  </div>
              </div>
          ";
      }
      echo '</div>';
  } else {
      echo "<p><i>Loading the products...</i></p>";
  }
  ?>
</div>
