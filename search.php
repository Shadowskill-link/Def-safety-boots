<?= template_header('Products') ?>

    <!-- ##### Breadcrumb Area Start ##### -->
    <section class="breadcrumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/60.png); top: 50%">
        <div class="container-fluid h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>Search Items</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Breadcrumb Area End ##### -->
    <div class="container container-fluid section-padding-100-0">
        <div class="row">
            <div class="col-md-2" >
                <div class="" >
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home"
                            role="tab" aria-controls="v-pills-home" aria-selected="true">Boots</a>
                        <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile"
                            role="tab" aria-controls="v-pills-profile" aria-selected="false">Gloves</a>
                        <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages"
                            role="tab" aria-controls="v-pills-messages" aria-selected="false">Reflective Vests</a>
                        <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings"
                            role="tab" aria-controls="v-pills-settings" aria-selected="false">Eye Safety</a>
                    </div>
                </div>
            </div>

            <div class="col-md-10" style="overflow-y:scroll; height: 300px; ;">
                 
            <?php
            require('config.php');
            if (isset($_POST['submit'])) {
                $key = $_POST['key'];
                $stmt = $pdo->prepare('SELECT * FROM produtos WHERE categoria LIKE :keyword OR nome_produto LIKE :keyword');
                $stmt->bindValue(':keyword', '%' . $key . '%', PDO::PARAM_STR);
                $stmt->execute();
                $products = $stmt->fetchAll();
                $linha = $stmt->rowCount();

            }
            if ($linha != 0) {
                //echo input...........
                echo ' 
    <div class="container">
        <div class="row">';


                foreach ($products as $product) {


                    echo '  <!-- Single Service Block -->
            <div class="col-12 col-md-2 col-lg-2">
                <div class="single-service-block mb-50 " data-wow-delay="100ms">
                  
                    <a href="index.php?page=product&id=' . $product['id'] . '"><img src="img/' . $product['imagem_produto'] . '" width="250"></a>
                    <h6 class="mt-15">' . $product['nome_produto'] . '</h6>
                    <p>' . $product['descricao_produto'] . '</p>
                    
                </div>
            </div> 
            ';
                }
                echo '</div>     
    </div>
</section>
<!-- ##### Services Block Area End ##### -->
';


            } else {
                echo '
        <div class="container">
        <div class="jumbotron">
        <h1 class="display-4 text-center text-warning">UPS NO DATA FOUND!</h1>
        <p class="lead text-center">Check some products underneath OR be especific with your words. Thank You</p>
        <hr class="my-4">
        </div> 
      </div>';
            }


            ?>

        </div>
    </div>
            </div>
            </div>
        </div>
    </div>





    <!-- ##### Services Block Area Start ##### -->
    <section class="services-block-area ">
        <div class="container">
            <div class="row">

                <div class="col-12">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                            aria-labelledby="v-pills-home-tab">
                            <?php
                            // The amounts of products to show on each page
                            $num_products_on_each_page = 1000;
                            // The current page, in the URL this will appear as index.php?page=products&p=1, index.php?page=products&p=2, etc...
                            $current_page = isset($_GET['p']) && is_numeric($_GET['p']) ? (int) $_GET['p'] : 1;
                            // Select products ordered by the date added
                            $stmt = $pdo->prepare('select * from produtos where categoria_id = 1');
                            // bindValue will allow us to use integer in the SQL statement, we need to use for LIMIT
                            $stmt->bindValue(1, ($current_page - 1) * $num_products_on_each_page, PDO::PARAM_INT);
                            $stmt->bindValue(2, $num_products_on_each_page, PDO::PARAM_INT);
                            $stmt->execute();
                            // Fetch the products from the database and return the result as an Array
                            $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

                            ?>
                            <!-- ##### Services Block Area Start ##### -->
                            <section class="services-block-area">
                                <div class="container">
                                    <div class="row">
                                        <?php foreach ($products as $product): ?>
                                        <!-- Single Service Block -->
                                        <div class="col-12 col-md-3 col-lg-3">
                                            <div class="single-service-block mb-50 " data-wow-delay="100ms">

                                                <a href="index.php?page=product&id=<?= $product['id'] ?>"><img
                                                        src="img/<?= $product['imagem_produto'] ?>"></a>
                                                <h6 class="mt-15">
                                                    <?= $product['nome_produto'] ?>
                                                </h6>
                                                <p>
                                                    <?= $product['descricao_produto'] ?>
                                                </p>

                                            </div>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>

                                </div>
                            </section>
                        </div>
                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                            aria-labelledby="v-pills-profile-tab">
                            <?php
                            // The amounts of products to show on each page
                            $num_products_on_each_page = 1000;
                            // The current page, in the URL this will appear as index.php?page=products&p=1, index.php?page=products&p=2, etc...
                            $current_page = isset($_GET['p']) && is_numeric($_GET['p']) ? (int) $_GET['p'] : 1;
                            // Select products ordered by the date added
                            $stmt = $pdo->prepare('select * from produtos where categoria_id = 5');
                            // bindValue will allow us to use integer in the SQL statement, we need to use for LIMIT
                            $stmt->bindValue(1, ($current_page - 1) * $num_products_on_each_page, PDO::PARAM_INT);
                            $stmt->bindValue(2, $num_products_on_each_page, PDO::PARAM_INT);
                            $stmt->execute();
                            // Fetch the products from the database and return the result as an Array
                            $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

                            ?>
                            <!-- ##### Services Block Area Start ##### -->
                            <section class="services-block-area mt-15">
                                <div class="container">
                                    <div class="row">
                                        <?php foreach ($products as $product): ?>
                                        <!-- Single Service Block -->
                                        <div class="col-12 col-md-2 col-lg-2">
                                            <div class="single-service-block mb-50 " data-wow-delay="100ms">

                                                <a href="index.php?page=product&id=<?= $product['id'] ?>"><img
                                                        src="img/<?= $product['imagem_produto'] ?>"></a>
                                                <h6 class="mt-15">
                                                    <?= $product['nome_produto'] ?>
                                                </h6>
                                                <p>
                                                    <?= $product['descricao_produto'] ?>
                                                </p>

                                            </div>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>

                                </div>
                            </section>

                        </div>
                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                            aria-labelledby="v-pills-messages-tab">
                            <?php
                            // The amounts of products to show on each page
                            $num_products_on_each_page = 1000;
                            // The current page, in the URL this will appear as index.php?page=products&p=1, index.php?page=products&p=2, etc...
                            $current_page = isset($_GET['p']) && is_numeric($_GET['p']) ? (int) $_GET['p'] : 1;
                            // Select products ordered by the date added
                            $stmt = $pdo->prepare('select * from produtos where categoria_id = 2');
                            // bindValue will allow us to use integer in the SQL statement, we need to use for LIMIT
                            $stmt->bindValue(1, ($current_page - 1) * $num_products_on_each_page, PDO::PARAM_INT);
                            $stmt->bindValue(2, $num_products_on_each_page, PDO::PARAM_INT);
                            $stmt->execute();
                            // Fetch the products from the database and return the result as an Array
                            $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

                            // Get the total number of products

                            ?>
                            <!-- ##### Services Block Area Start ##### -->
                            <section class="services-block-area mt-15">
                                <div class="container">
                                    <div class="row">
                                        <?php foreach ($products as $product): ?>
                                        <!-- Single Service Block -->
                                        <div class="col-12 col-md-2 col-lg-2">
                                            <div class="single-service-block mb-50 " data-wow-delay="100ms">

                                                <a href="index.php?page=product&id=<?= $product['id'] ?>"><img
                                                        src="img/<?= $product['imagem_produto'] ?>"></a>
                                                <h6 class="mt-15">
                                                    <?= $product['nome_produto'] ?>
                                                </h6>
                                                <p>
                                                    <?= $product['descricao_produto'] ?>
                                                </p>

                                            </div>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>

                                </div>
                            </section>
                        </div>
                        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                            aria-labelledby="v-pills-settings-tab">
                            <?php
                            // The amounts of products to show on each page
                            $num_products_on_each_page = 1000;
                            // The current page, in the URL this will appear as index.php?page=products&p=1, index.php?page=products&p=2, etc...
                            $current_page = isset($_GET['p']) && is_numeric($_GET['p']) ? (int) $_GET['p'] : 1;
                            // Select products ordered by the date added
                            $stmt = $pdo->prepare('select * from produtos where categoria_id = 4');
                            // bindValue will allow us to use integer in the SQL statement, we need to use for LIMIT
                            $stmt->bindValue(1, ($current_page - 1) * $num_products_on_each_page, PDO::PARAM_INT);
                            $stmt->bindValue(2, $num_products_on_each_page, PDO::PARAM_INT);
                            $stmt->execute();
                            // Fetch the products from the database and return the result as an Array
                            $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

                            ?>
                            <!-- ##### Services Block Area Start ##### -->
                            <section class="services-block-area mt-15">
                                <div class="container">
                                    <div class="row">
                                        <?php foreach ($products as $product): ?>
                                        <!-- Single Service Block -->
                                        <div class="col-12 col-md-2 col-lg-2">
                                            <div class="single-service-block mb-50 " data-wow-delay="100ms">

                                                <a href="index.php?page=product&id=<?= $product['id'] ?>"><img
                                                        src="img/<?= $product['imagem_produto'] ?>"></a>
                                                <h6 class="mt-15">
                                                    <?= $product['nome_produto'] ?>
                                                </h6>
                                                <p>
                                                    <?= $product['descricao_produto'] ?>
                                                </p>

                                            </div>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>

                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </section>
    <!-- ##### Services Block Area End ##### -->


    <?= template_footer() ?>