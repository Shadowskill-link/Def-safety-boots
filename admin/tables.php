<?php
include('header.php');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "def_safety";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM `orders`;";
$result = $conn->query($sql);

                        

?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Oders Table</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table " id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#order_id</th>
                            <th>fullname</th>
                            <th>email</th>
                            <th>company</th>
                            <th>City</th>
                            <th>Province</th>
                            <th>orders</th>


                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#order_id</th>
                            <th>fullname</th>
                            <th>email</th>
                            <th>company</th>
                            <th>City</th>
                            <th>Province</th>
                            <th>orders</th>

                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        
                    while ($user_data = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>" . $user_data['orders_id'] . "</td>";
                        echo "<td>" . $user_data['fullname'] . "</td>";
                        echo "<td>" . $user_data['email'] . "</td>";
                        echo "<td>" . $user_data['company'] . "</td>";
                        echo "<td>" . $user_data['city'] . "</td>";
                        echo "<td>" . $user_data['provincia'] . "</td>";
                        echo "<td>
                        
                        <table class='table' id='dataTable' width='100%' cellspacing='0'>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>CODE</th>
                                    <th>Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                            ";

                        $query = "SELECT * FROM `order_produto` WHERE `id_orders` = ".$user_data['orders_id'].";";
                        $resultados = mysqli_query($conn, $query);
                        while($produtos_ordem = mysqli_fetch_assoc($resultados))
                        {
                        echo "
                              <tr>
                                 <td>".$produtos_ordem['nome_produto']."</td>
                                 <td>".$produtos_ordem['descricao_produto']."</td>
                                 <td>".$produtos_ordem['quantity']."</td>
                              </tr>
                                
                             ";
                        }
                            
                       
                        echo "
                            
                            </tbody>
                            </table>
                             </td>";

                        echo "</tr>";
                    }
                    
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php include('footer.php'); ?>