<?php


if (isset($_POST["emp_id"]))
     $id = $_POST["emp_id"];
{
    $output = '';

    $connect = mysqli_connect("localhost", "root", "", "def_safety");  
    $query = "SELECT * FROM order_produto WHERE id_orders = $id";  
    $result = mysqli_query($connect, $query); 
     


    $output .= '  
    <div class="table-responsive">
                <table class="table table-hover " id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Orders</th>
                            <th>Product Name</th>
                            <th>CODE</th>
                            <th>Quantity</th>
                            


                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID Orders</th>
                            <th>Product Name</th>
                            <th>CODE</th>
                            <th>Quantity</th>
                            

                        </tr>
                    </tfoot>
                    <tbody>';
         
         
    while($row = mysqli_fetch_array($result)) {
          $nome = $row["nome_produto"];

          $query2 = "SELECT * FROM produtos where nome_produto = '$nome'";  
          $result2 = mysqli_query($connect, $query2);
          $row2 = mysqli_fetch_array($result2);

         $output .= '  
           <tr>
               <td>'.$row["id_orders"].'  <img src="../img/'.$row2["imagem_produto"].'" width="75";></td>     
               <td>'.$nome.'</td>  
               <td>'.$row["descricao_produto"].'</td>  
               <td>'.$row["quantity"].'</td>  
          </tr> 
               
             
               
              ';  
    }  
    $output .= "</tbody></table></div>";  
    echo $output;  








}