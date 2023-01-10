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
                        <button type='button' class='btn btn-primary clicks' id=".$user_data['orders_id']."> Products </button>
                        <a href='export/generate_pdf.php' type='button' class='btn btn-primary print' id=".$user_data['orders_id'].">Generate PDF</a>
                       
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

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Products</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        Modal body..
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<!-- End of Main Content -->


<?php include('footer.php'); ?>

<script>
$(document).ready(function(){
    $('.clicks').click(function(){
        id_emp = $(this).attr('id')
        $.ajax({url: "select.php",
        method:'post',
        data:{emp_id: id_emp},
         success: function(result){
    $(".modal-body").html(result);
  }});
        $('#myModal').modal("show");
    })
})

  </script>
