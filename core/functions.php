<?php 

$db = mysqli_connect("localhost","root","","pakfitclub");


function total_price(){
    
    global $db;
    
    $user_id = $_COOKIE['user_id'];
    
    $total = 0;
    
    $select_cart = "select * from cart where user_id='$user_id'";
    
    $run_cart = mysqli_query($db,$select_cart);
    
    while($record=mysqli_fetch_array($run_cart)){
        
        $pro_id = $record['product_id'];
        
        $pro_qty = $record['qty'];
        
        $get_price = "select * from products where id='$pro_id'";
        
        $run_price = mysqli_query($db,$get_price);
        
        while($row_price=mysqli_fetch_array($run_price)){
            
            $sub_total = $row_price['o_price']*$pro_qty;
            
            $total += $sub_total;
            
        }
        
    }
    
    echo "$" . $total;
    
}