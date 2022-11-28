<?php
include_once('header.php');
include('conecta.php');
?>

<!-- ##### Breadcrumb Area Start ##### -->
<section class="breadcrumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/60.png);">
  <div class="container-fluid h-100">
    <div class="row h-100 align-items-center">
      <div class="col-12">

        <div class="breadcrumb-content mt-70">
          <h2>Product-details</h2>
        </div>
      </div>
    </div>
  </div>
  </div>
</section>
<!-- ##### Breadcrumb Area End ##### -->

<?php
$pid = intval($_GET['pkgid']);
$sql = "select * from produtos where id_produto=:pid";
$query = $dbh->prepare($sql);
$query->bindParam(':pid', $pid, PDO::PARAM_STR);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);
$cnt = 1;
if ($query->rowCount() > 0) {
  foreach ($results as $result) { ?>

<section class="safety-boots section-padding-100" ;>
  <div class="container">
    <div class="card">
      <div class="row">
        <aside class="col-sm-5 border-right">
          <article class="gallery-wrap">
            <div class="img-big-wrap">
              <div> <a href="#"><img class="img-big-wrap ml-15"
                    src="img/<?php echo htmlentities($result->imagem_produto); ?>" id="trocarimg"></a></div>
            </div> <!-- slider-product.// -->

            <div class="img-small-wrap">
              <div class="item-gallery">
                <a><img src="img/<?php echo htmlentities($result->imagem_produto); ?>" onmouseover="img01();"></a>
              </div>
              <div class="item-gallery">
                <a><img src="img/<?php echo htmlentities($result->imagem_produto_baixo); ?>" onmouseover="img02();"></a>
              </div>
              <div class="item-gallery">
                <a><img src="img/<?php echo htmlentities($result->imagem_produto_frente); ?>" onmouseover="img03();"></a>
              </div>

            </div> <!-- slider-nav.// -->
          </article> <!-- gallery-wrap .end// -->
        </aside>
        <aside class="col-sm-7">
          <article class="card-body p-5">
            <h3 class="title mb-3">
              <?php echo htmlentities($result->nome_produto); ?>
            </h3>

            <p class="price-detail-wrap">
              <span class="price h3 text-warning">
                <span class="currency">US $</span><span class="num">1299</span>
              </span>

            </p> <!-- price-detail-wrap .// -->
            <dl class="item-property">
              <dt>Description</dt>
              <dd>
                <p>
                  <?php echo htmlentities($result->detalhes_produto); ?>
                </p>
              </dd>
            </dl>
            <dl class="param param-feature">
              <dt>Model#</dt>
              <dd>12345611</dd>
            </dl> <!-- item-property-hor .// -->
            <dl class="param param-feature">
              <dt>Color</dt>
              <dd>Brown</dd>
            </dl> <!-- item-property-hor .// -->
            <hr>
            <div class="row">
              <div class="col-sm-5">
                <dl class="param param-inline">
                  <dt>Quantity: </dt>
                  <dd>
                    <select class="form-control form-control-sm" style="width:70px;">
                      <option> 1 </option>
                      <option> 2 </option>
                      <option> 3 </option>
                    </select>
                  </dd>
                </dl> <!-- item-property .// -->
              </div> <!-- col.// -->
              <div class="col-sm-7">
                <dl class="param param-inline">
                  <dt>Size: </dt>
                  <dd>
                    <label class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                        value="option2">
                      <span class="form-check-label">SM</span>
                    </label>
                    <label class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                        value="option2">
                      <span class="form-check-label">MD</span>
                    </label>
                    <label class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                        value="option2">
                      <span class="form-check-label">XXL</span>
                    </label>
                  </dd>
                </dl> <!-- item-property .// -->
              </div> <!-- col.// -->
            </div> <!-- row.// -->
            <hr>
            <a href="#" class="btn pixel2-btn"><i class="fa fa-file-pdf-o"></i> download spec
            </a>
            <a href="#" class="btn btn-outline pixel2-btn"> <i class="fa fa-shopping-cart"></i> Add
              to cart </a>
          </article> <!-- card-body.// -->
        </aside> <!-- col.// -->
      </div> <!-- row.// -->
    </div> <!-- card.// -->
  </div>
</section>
<?php }
} ?>

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
        <a href="product-details.php?pkgid=<?php echo htmlentities($result->id_produto); ?>"><img
            src="img/<?php echo htmlentities($result->imagem_produto); ?>" alt=""></a>
        <h4 class="text-muted mt-15">
          <?php echo htmlentities($result->nome_produto); ?>
        </h4>
      </div>
      <?php }
           } ?>

    </div>
  </div>
</section>
<script>
  function img01() {
    document.getElementById("trocarimg").src = "img/<?php echo htmlentities($result->imagem_produto); ?>"
  }
  function img02() {
    document.getElementById("trocarimg").src = "img/<?php echo htmlentities($result->imagem_produto_baixo); ?>"
  }
  function img03() {
    document.getElementById("trocarimg").src = "img/<?php echo htmlentities($result->imagem_produto_frente); ?>"
  }
</script>



<?php
include_once('footer.php');
?>