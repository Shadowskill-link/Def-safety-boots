<?php


if(isset($_POST["emp_id"]))  
{ 
    $output = '';

    $connect = mysqli_connect("localhost", "root", "", "def_safety");  
    $query = "SELECT * FROM `order_produto` WHERE `id_orders` = '".$_POST["emp_id"]."'";  
    $result = mysqli_query($connect, $query);  


    $output .= '  
    <div class="table-responsive">  
         <table class="table table-bordered">';  
    while($row = mysqli_fetch_array($result))  
    {  
         $output .= '  
              <tr>  
                   <td width="30%"><label>#id</label></td>  
                   <td width="70%">'.$row["id_orders"].'</td>  
              </tr>  
              <tr>  
                   <td width="30%"><label>Nomde Produto</label></td>  
                   <td width="70%">'.$row["nome_produto"].'</td>  
              </tr>  
              <tr>  
                   <td width="30%"><label>CODE</label></td>  
                   <td width="70%">'.$row["descricao_produto"].'</td>  
              </tr>  
              <tr>  
                   <td width="30%"><label>Quantity</label></td>  
                   <td width="70%">'.$row["quantity"].'</td>  
              </tr>  
           
              ';  
    }  
    $output .= "</table></div>";  
    echo $output;  








}