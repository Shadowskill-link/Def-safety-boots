<?php

// If the user clicked the add to cart button on the product page we can check for the form data
if (isset($_POST['product_id'], $_POST['quantity']) && is_numeric($_POST['product_id']) && is_numeric($_POST['quantity'])) {
  // Set the post variables so we easily identify them, also make sure they are integer
  $product_id = (int) $_POST['product_id'];
  $quantity = (int) $_POST['quantity'];
  // Prepare the SQL statement, we basically are checking if the product exists in our databaser
  $stmt = $pdo->prepare('SELECT * FROM produtos WHERE id = ?');
  $stmt->execute([$_POST['product_id']]);
  // Fetch the product from the database and return the result as an Array
  $product = $stmt->fetch(PDO::FETCH_ASSOC);
  // Check if the product exists (array is not empty)
 
  if ($product && $quantity > 0) {
    // Product exists in database, now we can create/update the session variable for the cart
    if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {

      if (array_key_exists($product_id, $_SESSION['cart'])) {
        // Product exists in cart so just update the quanity
        $_SESSION['cart'][$product_id] += $quantity;
      } else {
        // Product is not in cart so add it
        $_SESSION['cart'][$product_id] = $quantity;
      }
    } else {
      // There are no products in cart, this will add the first product to cart
      $_SESSION['cart'] = array($product_id => $quantity);

    }
  }
  // Prevent form resubmission...
  header('location: index.php?page=cart');
  exit;
}



// Check the session variable for products in cart
$products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
$products = array();
$subtotal = 0.00;
// If there are products in cart
if ($products_in_cart) {
  // There are products in the cart so we need to select those products from the database
  // Products in cart array to question mark string array, we need the SQL statement to include IN (?,?,?,...etc)
  $array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), '?'));
  $stmt = $pdo->prepare('SELECT * FROM produtos WHERE id IN (' . $array_to_question_marks . ')');
  // We only need the array keys, not the values, the keys are the id's of the products
  $stmt->execute(array_keys($products_in_cart));
  // Fetch the products from the database and return the result as an Array
  $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

}



?>
<?= template_header('Place Order') ?>
  <!-- ##### Breadcrumb Area Start ##### -->
  <section class="breadcrumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/60.png); top: 50%">
    <div class="container-fluid h-100">
      <div class="row h-100 align-items-center">
        <div class="col-12">
          <div class="breadcrumb-content">
            <h2>Safety Boots</h2>
          </div>
          <div class="breadcrumb-button">
            <a href="safetyboots.php" class="btn pixel-btn">know Boots</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ##### Breadcrumb Area End ##### -->
  <section class="info-hero2 section-padding-100 ">
    <div class="container">
      <h5 class="text-left ml-50 wow fadeInUp" data-wow-delay="400ms">Contact details</h5>
      <div class="container">
        <div class="row">
          <div class="col">
            <form action="index.php?page=checkout" method="post">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="name">Full name</label>
                  <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Fill your name">
                </div>
                <div class="form-group col-md-6">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                </div>
                <div class="form-group col-md-12">
                  <label for="company">Company name</label>
                  <input type="text" class="form-control" id="company"  name="company" placeholder="Company name">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="address">Address</label>
                  <input type="text" class="form-control" id="address"  name="address" placeholder="1234 Main St">
                </div>
                <div class="form-group col-md-6">
                  <label for="Address2">Address 2</label>
                  <input type="text" name="address2"  id="address2"class="form-control" placeholder="Apartment, studio, or floor">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="city">City</label>
                  <input type="text" name="city"  class="form-control" id="city">
                </div>
                <div class="form-group col-md-6">
                  <label for="provincia">Province</label>
                  <select id="inputState" name="provincia" id="provincia" class="form-control">
                    <option selected>...</option>
                    <option value="Maputo City">Maputo City</option>
                    <option value="Maputo Province"> Maputo Province</option>
                    <option value="Gaza"> Gaza</option>
                    <option value="Inhambane"> Inhambane</option>
                    <option value="Sofala"> Sofala</option>
                    <option value="Manica"> Manica</option>
                    <option value="Tete"> Tete</option>
                    <option value="Nampula"> Tete</option>
                    <option value="Niassa"> Niassa</option>
                    <option value="Zambezia"> Zambezia</option>
                    <option value="Cabo Delgado"> Cabo Delgado</option>
                  </select>
                </div>
              </div>
          </div>
          <div class="col">
            <div style="overflow-y:scroll;  height:300px;">
              <table class="table">
                <thead>
                  <tr>
                    <td>Prduct</td>
                    <td>Prduct name</td>
                    <td>Code</td>
                    <td>Quantity</td>
                  </tr>
                </thead>
                <tbody>
                  <?php if (empty($products)): ?>
                  <tr>
                    <td colspan="5" style="text-align:center;">You have no products added in your Shopping Cart
                    </td>
                  </tr>
                  <?php else: ?>
                  <?php foreach ($products as $product): ?>
                  <tr>
                    <td class="img">
                      <a href="index.php?page=product&id=<?= $product['id'] ?>">
                        <img src="img/<?= $product['imagem_produto'] ?>" width="50" height="50"
                          alt="<?= $product['nome_produto'] ?>">
                      </a>
                    </td>

                    <td>
                       <a
                        href="index.php?page=product&id=<?= $product['id'] ?>">
                        <?= $product['nome_produto'] ?>
                      </a>
                    </td>
                    <td>
                      <input type="hidden" name="">
                      <a href="index.php?page=product&id=<?= $product['id'] ?>">
                      <?= $product['descricao_produto'] ?>
                      </a>
                        
                      </a>
                    </td>
                    <td class="quantity">
                      <input type="number" style="width: 70px;" name="quantidade" id="quantity" class="form-control" readonly
                        name="quantity<?= $product['id'] ?>" value="<?= $products_in_cart[$product['id']] ?>">
                        
                    </td>
                  </tr>
                  <?php
                  if(!empty($_SESSION['dados']) || $_SESSION['dados'] ==null){
                    $_SESSION['dados'] = array();}
                    array_push(
                      
                      $_SESSION['dados'],
                      array('id_produto' => $product['id'],
                            'Nome_produto' => $product['nome_produto'],
                            'quantidade' =>$products_in_cart[$product['id']]
                      )
                      
                    );
                 
                  
                      echo  var_dump($_SESSION['dados']);
                      
                  ?> 

                  <?php endforeach; ?>
                  <?php endif; ?>
                </tbody>
              </table>
            </div>
          </div>
          
        </div>
        <hr>
        <input type="submit" class="btn pixel2-btn" value="Checkout">
        </form>
      </div>
  </section>
  <?= template_footer() ?>