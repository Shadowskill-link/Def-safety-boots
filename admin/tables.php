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
                        <!-- Large modal -->
                        <button type='button' class='btn btn-primary' id=".$user_data['orders_id']." data-toggle='modal' data-target='.bd-example-modal-lg'> Products </button>
                        <button type='button' id='products' class='btn btn-primary' id=".$user_data['orders_id'].">Generate PDF</button>
                        
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

<!----Modal------>
<div class="modal fade bd-example-modal-lg" tabindex="-1" id="myModal" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Products from </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
        
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- End of Main Content -->
<script>
$(document).ready(function(){
    $('button').click(function(){
  id_emp = $(this).attr('orders_id')
        $.ajax({url: "select.php",
        method:'post',
        data:{emp_id:id_emp},
         success: function(result){
    $(".modal-body").html(result);
  }});


        $('#myModal').modal("show");
    })
})

  </script>

<?php include('footer.php'); ?>
