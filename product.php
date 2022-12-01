<?php
// Check to make sure the id parameter is specified in the URL
if (isset($_GET['id'])) {
  // Prepare statement and execute, prevents SQL injection
  $stmt = $pdo->prepare('SELECT * FROM produtos WHERE id_produto = ?');
  $stmt->execute([$_GET['id']]);
  // Fetch the product from the database and return the result as an Array
  $product = $stmt->fetch(PDO::FETCH_ASSOC);
  // Check if the product exists (array is not empty)
  if (!$product) {
    // Simple error to display if the id for the product doesn't exists (array is empty)
    exit('Product does not exist!');
  }
} else {
  // Simple error to display if the id wasn't specified
  exit('Product does not exist!');
}
?>

<?= template_header('Product') ?>

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

  <section class="safety-boots section-padding-100" ;>
    <div class="container">
      <div class="card">
        <div class="row">

          <aside class="col-sm-5 border-right">

            <article class="gallery-wrap">
              <div class="img-big-wrap">
                <div> <a href="#"><img class="img-big-wrap ml-15" src="img/<?= $product['imagem_produto'] ?>"
                      id="trocarimg"></a></div>
              </div> <!-- slider-product.// -->

              <div class="img-small-wrap">
                <div class="item-gallery">
                  <a><img src="img/<?= $product['imagem_produto'] ?>" onmouseover="img01();"></a>
                </div>
                <div class="item-gallery">
                  <a><img src="img/<?= $product['imagem_produto_baixo'] ?>" onmouseover="img02();"></a>
                </div>
              </div> <!-- slider-nav.// -->
            </article> <!-- gallery-wrap .end// -->
          </aside>
          <aside class="col-sm-7">
            <article class="card-body p-5">
              <h3 class="title mb-3" style="color: #006; font-weight: bold ;">
                <?= $product['nome_produto'] ?>
              </h3>
              <dl class="param param-feature">
                <dt>Model#</dt>
                <dd style="color: #006; font-weight: bold ;">
                  <?= $product['descricao_produto'] ?>
                </dd>
              </dl> <!-- item-property-hor .// -->
              <dl class="param param-feature">
                <dt>Color</dt>
                <dd>Brown</dd>
              </dl> <!-- item-property-hor .// -->
              
              <dl class="item-property">
                <dt>DESCRIPTION</dt>
                <dd>
                  <p>
                    <?= $product['detalhes_produto'] ?>
                  </p>
                </dd>
              </dl>
              <hr>
              <div class="row">
                <form action="index.php?page=cart" method="post">
                  <div class="col-sm-5">
                    <dl class="param param-inline">
                      <dt>Quantity:</dt>
                         <input class="form-control" type="number" name="quantity" placeholder="quantity" >
                         <input type="hidden" name="product_id" value="<?=$product['id']?>">
                    </dl> <!-- item-property .// -->
                  </div> <!-- col.// -->
                  <hr>
                  <a href="" class="btn pixel2-btn"><i class="fa fa-file-pdf-o"></i> download spec</a>
                  <input class="btn pixel2-btn" type="submit" value="add to cart">
                </form>
              </div> <!-- row.// -->
            </article> <!-- card-body.// -->
          </aside> <!-- col.// -->
        </div> <!-- row.// -->
      </div> <!-- card.// -->
    </div>
  </section>




  <script type="text/javascript">
    function img01() {
      document.getElementById("trocarimg").src = "img/<?= $product['imagem_produto'] ?>";
    }
    function img02() {
      document.getElementById("trocarimg").src = "img/<?= $product['imagem_produto_baixo'] ?>";
    }

  </script>


  <?= template_footer() ?>