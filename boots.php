<?php
include_once('header.php');
include('conecta.php');
?>
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
        <?php $sql ="select * from produtos limit 5";
		$query = $dbh->prepare($sql);
		$query->execute();
		$results=$query->fetchall(PDO::FETCH_OBJ);
		$cnt=1;
		if($query->rowCount() > 0)
		{
		foreach($results as $result)
		{   ?>
            <!-- Single Service Block -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="single-service-block mb-50 wow fadeInUp" data-wow-delay="100ms">
                  
                    <a href="product-details.php?pkgid=<?php echo htmlentities($result->id_produto);?>"><img src="img/<?php echo htmlentities($result->imagem_produto);?>"></a>
                    <h4 class="mt-15"><?php echo htmlentities($result->nome_produto);?></h4>
                    <p><?php echo htmlentities($result->descricao_produto);?></p>
                    <a href="safetyboots.php" class="btn buy-btn"><i class="fa fa-shopping-cart mr-15" style="font-size:25px ;"></i> ADD CART</a>
                </div>
            </div>
            <?php }} ?>
        </div>
       
    </div>
</section>
<!-- ##### Services Block Area End ##### -->
<!-- Modal content-->
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Product details</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <img src="img/boots/52.png" width="300" height="300">
                    </div>


                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<?php
include_once('footer.php');
?>