<?php
// Get the 4 most recently added products

    

$stmt = $pdo->prepare('SELECT * FROM produtos');
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
?>

<?=template_header('procurar')?>

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

