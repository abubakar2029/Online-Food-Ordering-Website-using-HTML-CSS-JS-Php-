<div class="py-5">
  <?php
      include 'includes/db.php';

      $pdo        = connect_db();
      $food_items = get_menu($pdo);

      if ($food_items) {
          echo '<div class="row justify-content-center g-4">';
          foreach ($food_items as $row) {

              $productId          = $row['product_id'];
              $productImage       = htmlspecialchars($row['image_url']);
              $productName        = htmlspecialchars($row['name']);
              $productDescription = htmlspecialchars($row['description']);
              $productPrice       = htmlspecialchars($row['price']);

              echo "
              <div class=\"col-12 col-sm-6 col-md-4 col-lg-3\">
                  <div class=\"card h-100 shadow-sm border-0\">
                      <img src=\"$productImage\" class=\"card-img-top rounded-top\" alt=\"$productName\" style=\"height: 200px; object-fit: cover;\">
                      <div class=\"card-body d-flex flex-column\">
                          <h5 class=\"card-title text-dark text-truncate\">$productName</h5>
                          <p class=\"card-text text-muted small\">$productDescription</p>
                          <div class=\"mt-auto d-flex justify-content-between align-items-center\">
                              <span class=\"fw-bold text-success\">\$$productPrice</span>
                              <form action=\"cart.php\" method=\"POST\">
                                  <input type=\"hidden\" name=\"product_id\" value=\"$productId\">
                                  <input type=\"hidden\" name=\"product_name\" value=\"$productName\">
                                  <input type=\"hidden\" name=\"product_price\" value=\"$productPrice\">
                                  <button class=\"btn btn-outline-primary btn-sm\" type=\"submit\" name=\"add_to_cart\">
                                      <i class=\"fas fa-cart-plus me-1\"></i> Add to Cart
                                  </button>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
          ";
          }
          echo '</div>';
      } else {
          echo "<p class='text-center text-muted'><i>Loading the products...</i></p>";
      }
  ?>
</div>
