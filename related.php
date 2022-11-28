<section class="info-hero2 ">
  <div class="container">
    <h3 class="wow fadeInUp text-left" data-wow-delay="400ms">Some realeted products </h3>
    <div class=" section-padding-100-0"></div>
    <div class="owl-carousel owl-theme container">
      <?php $sql = "select * from produtos  ORDER BY RAND() limit 30";
           $query = $dbh->prepare($sql);
           $query->execute();
           $results = $query->fetchall(PDO::FETCH_OBJ);
           $cnt = 1;
           if ($query->rowCount() > 0) {
             foreach ($results as $result) { ?>
      <div class="item">
        <a href="product-details.php?pkgid=<?php echo htmlentities($result->id_produto); ?>">
        <img src="img/<?php echo htmlentities($result->imagem_produto); ?>" alt=""></a>
        <h4 class="text-muted mt-15">
          <?php echo htmlentities($result->nome_produto); ?>
        </h4>
      </div>
      <?php }
           } ?>

    </div>
  </div>
</section>