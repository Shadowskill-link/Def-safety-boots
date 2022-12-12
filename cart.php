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

// Remove product from cart, check for the URL param "remove", this is the product id, make sure it's a number and check if it's in the cart
if (isset($_GET['remove']) && is_numeric($_GET['remove']) && isset($_SESSION['cart']) && isset($_SESSION['cart'][$_GET['remove']])) {
    // Remove the product from the shopping cart
    unset($_SESSION['cart'][$_GET['remove']]);
}
// Update product quantities in cart if the user clicks the "Update" button on the shopping cart page
if (isset($_POST['update']) && isset($_SESSION['cart'])) {
    // Loop through the post data so we can update the quantities for every product in cart
    foreach ($_POST as $k => $v) {
        if (strpos($k, 'quantity') !== false && is_numeric($v)) {
            $id = str_replace('quantity-', '', $k);
            $quantity = (int) $v;
            // Always do checks and validation
            if (is_numeric($id) && isset($_SESSION['cart'][$id]) && $quantity > 0) {
                // Update new quantity
                $_SESSION['cart'][$id] = $quantity;
            }
        }
    }
    // Prevent form resubmission...
    header('location: index.php?page=cart');
    exit;
}
// Send the user to the place order page if they click the Place Order button, also the cart should not be empty
if (isset($_POST['placeorder']) && isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    header('Location: index.php?page=placeorder');
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

<?= template_header('Cart') ?>

    <!-- ##### Breadcrumb Area Start ##### -->
    <section class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url(img/bg-img/108.png);">
        <div class="container-fluid h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>shopping-cart</h2>
                    </div>
                    <div class="breadcrumb-button">

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Breadcrumb Area End ##### -->
    <section>
        <div class=" container cart content-wrapper">
            
            <form action="index.php?page=cart" method="post">
                <table cl>
                    <thead>
                        <tr>
                            <td colspan="2">Product</td>
                            <td>Prduct code</td>
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
                                <a href="index.php?page=product&id=<?= $product['id'] ?>">
                                    <?= $product['nome_produto'] ?>
                                </a>
                                <br>
                                <a style="color: red;" href="index.php?page=cart&remove=<?= $product['id'] ?>"
                                    class="remove">Remove</a>
                            </td>
                            <td>
                                <ul>
                                    <li>
                                        <a href="index.php?page=product&id=<?= $product['id'] ?>">
                                            <?= $product['descricao_produto'] ?>
                                        </a>
                                    </li>
                                </ul>
                            </td>
                            <td class="quantity">
                                <input type="number" name="quantity-<?= $product['id'] ?>"
                                    value="<?= $products_in_cart[$product['id']] ?>" min="1" placeholder="Quantity"
                                    required>
                            </td>

                        </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>

                <div class="buttons">
                    <br>
                    <input class="btn pixel2-btn" type="submit" value="Update" name="update">
                    <input class="btn pixel2-btn" type="submit" value="Place Order" name="placeorder">
                </div>
            </form>
        </div>
    </section>
    <section class="info-hero2 section-padding-100 ">
        <div class="">
            <h6 class="text-left ml-50 wow fadeInUp" data-wow-delay="400ms">Some featured products </h6>
            <div class=" section-padding-100-0">

            </div>
            <div class="owl-carousel owl-theme container">
                <?php
                // Get the 4 most recently added products
                $stmt = $pdo->prepare('SELECT * FROM produtos  ORDER BY RAND() limit 30');
                $stmt->execute();
                $recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
                // Get the total number of products
                $total_products = $pdo->query('SELECT * FROM produtos')->rowCount();

                ?>
                <?php foreach ($recently_added_products as $product): ?>


                <div class="item">
                    <a href="index.php?page=product&id=<?= $product['id'] ?>"><img
                            src="img/<?= $product['imagem_produto'] ?>" alt=""></a>
                    <h4 class="text-muted mt-15">
                        <?= $product['nome_produto'] ?>
                    </h4>
                </div>

                <?php endforeach; ?>
            </div>

        </div>
    </section>

    <style>
        .cart h1 {
            display: block;
            font-weight: normal;
            margin: 0;
            padding: 40px 0;
            font-size: 24px;
            text-align: center;
            width: 100%;
        }

        .cart table {
            width: 100%;
        }

        .cart table thead td {
            padding: 30px 0;
            border-bottom: 1px solid #EEEEEE;
        }

        .cart table thead td:last-child {
            text-align: right;
        }

        .cart table tbody td {
            padding: 20px 0;
            border-bottom: 1px solid #EEEEEE;
        }

        .cart table tbody td:last-child {
            text-align: right;
        }

        .cart table .img {
            width: 80px;
        }

        .cart table .remove {
            color: #777777;
            font-size: 12px;
            padding-top: 3px;
        }

        .cart table .remove:hover {
            text-decoration: underline;
        }

        .cart table .price {
            color: #999999;
        }

        .cart table a {
            text-decoration: none;
            color: #555555;
        }

        .cart table input[type="number"] {
            width: 68px;
            padding: 10px;
            border: 1px solid #ccc;
            color: #555555;
            border-radius: 5px;
        }

        .cart .subtotal {
            text-align: right;
            padding: 40px 0;
        }

        .cart .subtotal .text {
            padding-right: 40px;
            font-size: 18px;
        }

        .cart .subtotal .price {
            font-size: 18px;
            color: #999999;
        }

        .cart .buttons {
            text-align: right;
            padding-bottom: 40px;
        }
    </style>

    <?= template_footer() ?>