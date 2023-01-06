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
$sql = "SELECT * FROM `distributor`;";
$result = $conn->query($sql);

                        

?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Distributor Data</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table " id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#id</th>
                            <th>email</th>
                            <th>password</th>
                            <th>adress</th>
                            <th>adress2</th>
                            <th>city</th>
                            <th>state</th>
                            <th>zip</th>
                            <th>country</th>
                            


                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#id</th>
                            <th>email</th>
                            <th>password</th>
                            <th>adress</th>
                            <th>adress2</th>
                            <th>city</th>
                            <th>state</th>
                            <th>zip</th>
                            <th>country</th>
                            
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        
                    while ($user_data = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>" . $user_data['id'] . "</td>";
                        echo "<td>" . $user_data['email'] . "</td>";
                        echo "<td>" . $user_data['password'] . "</td>";
                        echo "<td>" . $user_data['adress'] . "</td>";
                        echo "<td>" . $user_data['adress2'] . "</td>";
                        echo "<td>" . $user_data['city'] . "</td>";
                        echo "<td>" . $user_data['state'] . "</td>";
                        echo "<td>" . $user_data['zip'] . "</td>";
                        echo "<td>" . $user_data['country'] . "</td>";

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

<!-- End of Main Content -->

<?php include('footer.php'); ?>