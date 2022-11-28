<?php
session_start();
include_once('header.php');
include('conecta.php');
session_destroy();

$produto_ids = array();

if(filter_input(INPUT_POST, 'add_to_cart')){
  if(isset($_SESSION['shopping_cart'])){
    $count = count($_SESSION['shopping_cart']);
    $produto_ids = array_column($_SESSION['shopping_cart'], 'id_produto');
  }
  else{
    $_SESSION['shopping_cart'][0] = array
    (
      'id_produto' => filter_input(INPUT_GET, 'id_produto'),
      'nome_produto' => filter_input(INPUT_POST, 'nome_produto'),
      'quantidade_produto' => filter_input(INPUT_POST, 'quantidade_produto'),
    );
  }
}
print_r($_SESSION);
function pre_r($array){
  echo '<pre>';
  print_r($array);
  echo '</pre>';
}

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
  <form method="POST" action="addcart.php?action=add&id=<?php echo htmlentities($result->id_produto); ?>">
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
            </div> <!-- slider-nav.// -->
          </article> <!-- gallery-wrap .end// -->
        </aside>
        <aside class="col-sm-7">
          <article class="card-body p-5">
            <h3 class="title mb-3" style="color: #006; font-weight: bold ;" >
              <?php echo htmlentities($result->nome_produto); ?>
            </h3>

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
              <dd style="color: #006; font-weight: bold ;"><?php echo htmlentities($result->descricao_produto); ?></dd>
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
                    <input type="number" class="form-control" name="quantidade_produto" value="1" width="150">
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
                    <input type="hidden" name="id_produto" value="<?php echo htmlentities($result->id_produto); ?>">
                    <input type="hidden" name="nome_produto" value="<?php echo htmlentities($result->nome_produto); ?>">
                    <input type="hidden" name="imagem_produto" value="<?php echo htmlentities($result->imagem_produto); ?>">
                    <input type="hidden" name="quantidade" value="<?php echo htmlentities($result->quantidade_produto); ?>">
                  </dd>
                </dl> <!-- item-property .// -->
              </div> <!-- col.// -->
            </div> <!-- row.// -->
            <hr>
            <a href="#" class="btn pixel2-btn"><i class="fa fa-file-pdf-o"></i> download spec
            </a>
            <input class="btn btn-outline pixel2-btn" type="submit" name="add_to_cart" value="add to cart"> 
          </article> <!-- card-body.// -->
        </aside> <!-- col.// -->
     
      </div> <!-- row.// -->
    </div> <!-- card.// -->
  </form>
  </div>
  <?php }
} ?>
</section>

<script type="text/javascript">
        function img01(){
            document.getElementById("trocarimg").src="img/<?php echo htmlentities($result->imagem_produto);?>";
        }
        function img02(){
            document.getElementById("trocarimg").src="img/<?php echo htmlentities($result->imagem_produto_baixo); ?>";
        }
      
</script>


<?php
include_once('related.php');
include_once('footer.php');
?>