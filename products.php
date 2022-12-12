<?php
// The amounts of products to show on each page
$num_products_on_each_page = 1000;
// The current page, in the URL this will appear as index.php?page=products&p=1, index.php?page=products&p=2, etc...
$current_page = isset($_GET['p']) && is_numeric($_GET['p']) ? (int)$_GET['p'] : 1;
// Select products ordered by the date added
$stmt = $pdo->prepare('select * from produtos limit 5');
// bindValue will allow us to use integer in the SQL statement, we need to use for LIMIT
$stmt->bindValue(1, ($current_page - 1) * $num_products_on_each_page, PDO::PARAM_INT);
$stmt->bindValue(2, $num_products_on_each_page, PDO::PARAM_INT);
$stmt->execute();
// Fetch the products from the database and return the result as an Array
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Get the total number of products
$total_products = $pdo->query('SELECT * FROM produtos')->rowCount();
?>

<?=template_header('Products')?>

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

<!-- ##### Services Block Area Start ##### -->
<section class="services-block-area section-padding-100-0">
    <div class="container">
        <div class="row">
        <?php foreach ($products as $product): ?>
            <!-- Single Service Block -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="single-service-block mb-50 wow fadeInUp" data-wow-delay="100ms">
                  
                    <a href="index.php?page=product&id=<?=$product['id']?>"><img src="img/<?=$product['imagem_produto']?>"></a>
                    <h4 class="mt-15"><?=$product['nome_produto']?></h4>
                    <p><?=$product['descricao_produto']?></p>
                    <a href="index.php?page=product&id=<?=$product['id']?>" class="btn buy-btn"><i class="fa fa-shopping-cart mr-15" style="font-size:25px ;"></i> ADD CART</a>
                </div>
            </div>
            <?php endforeach; ?> 
        </div>
        
    </div>
</section>
<!-- ##### Services Block Area End ##### -->


<?=template_footer()?>

