<?php 
     if(!isset($_COOKIE['user_id'])){
        header("Location: login.php");
         }else{

         }
    
?>
<?php include 'includes/header.php';
?>

    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="index.html">home</a></li>
                            <li>Checkout</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->
    
    <!--Checkout page section-->
    <div class="Checkout_section mt-60">
       <div class="container">
            <div class="checkout_form">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <form id="order" method="post">
                            <h3>Billing Details</h3>
                            <div class="row">

                                <div class="col-lg-6 mb-20">
                                    <label>First Name <span>*</span></label>
                                    <input type="text" name="f_name">    
                                </div>
                                <div class="col-lg-6 mb-20">
                                    <label>Last Name  <span>*</span></label>
                                    <input type="text" name="l_name"> 
                                </div>
                                <div class="col-12 mb-20">
                                    <label>Street address  <span>*</span></label>
                                    <input placeholder="House number and street name" type="text" name="s_address">     
                                </div>
                                <div class="col-12 mb-20">
                                    <label>Town / City <span>*</span></label>
                                    <input  type="text" name="city">    
                                </div> 
                                 <div class="col-12 mb-20">
                                    <label>State / Country <span>*</span></label>
                                    <input type="text" name="country">    
                                </div> 
                                <div class="col-12 mb-20">
                                    <label>Postal Code  <span>*</span></label>
                                    <input placeholder="Postal Code" type="text" name="p_code">     
                                </div>
                                <div class="col-lg-6 mb-20">
                                    <label>Phone<span>*</span></label>
                                    <input type="text" name="phone"> 

                                </div> 
                                 <div class="col-lg-6 mb-20">
                                    <label> Email Address   <span>*</span></label>
                                      <input type="text" name="email"> 

                                </div>    	    	    	    	    	    
                            </div>   
                    </div>
                    <div class="col-lg-6 col-md-6"> 
                            <h3>Your order</h3> 
                            <div class="order_table table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                   
                             include 'assets/db.php';
                             $userId = $_COOKIE['user_id'];
                             $sql = "SELECT * FROM cart WHERE user_id = '$userId' ";
                             $run_cart = mysqli_query($conn, $sql);
                             $count = mysqli_num_rows($run_cart);
                             ?>

                                    <?php 
                              $total = 0;
                              while($row_cart = mysqli_fetch_array($run_cart)){
                               $pro_id = $row_cart['product_id'];
                                  
                               $pro_size = $row_cart['size'];
                                 
                               $pro_qty = $row_cart['qty'];

                              
                               $run_products =mysqli_query($conn, "SELECT * FROM products WHERE id='$pro_id'");
                               while($row_products = mysqli_fetch_array($run_products)){
                               $product_title = $row_products['name'];
                                    
                                      $only_price = $row_products['price'];
                                     
                                      $sub_total = $only_price*$pro_qty;

                                      $total += $sub_total;

                                      $ship_fee = 50;

                                      $order_total = $total+$ship_fee;

                                       ?>
                                        <tr>
                                            <td> <?php echo $product_title; ?> <strong> × <?php echo $pro_qty; ?></strong></td>
                                            <td> $<?php echo $sub_total; ?></td>
                                        </tr>
                                        <?php } } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Cart Subtotal</th>
                                            <td>$<?php echo $total; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Shipping</th>
                                            <td><strong>$<?php echo $ship_fee; ?></strong></td>
                                        </tr>
                                        <tr class="order_total">
                                            <th>Order Total</th>
                                            <td><strong>$<?php echo $order_total; ?></strong></td>
                                        </tr>
                                    </tfoot>
                                    
                                </table>     
                            </div>
                            <div class="payment_method">
                               <div class="panel-default">
                                    <input name="check_method" id="check_method" value="COD" type="radio" data-target="createp_account" />
                                    <label data-toggle="collapse" data-target="#method" aria-controls="method">COD</label>

                                    <div id="method" class="collapse one" data-parent="#accordion">
                                        <div class="card-body1">
                                           <p>Cash on delivery</p>
                                        </div>
                                    </div>
                                </div> 
                               <div class="panel-default">
                                    <input name="check_method" id="check_method" value="Card" type="radio" data-target="createp_account" />
                                    <label data-toggle="collapse" data-target="#collapsedefult" aria-controls="collapsedefult">Credit Card<img class="ml-1" src="assets/img/icon/card.png" alt=""></label>

                                    <div id="collapsedefult" class="collapse one" data-parent="#accordion">
                                        <div class="card-body1">
                                           <p>Pay via credit card.</p> 
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="order" value="1">
                                <input type="hidden" name="pro_id" value="<?php  echo $pro_id; ?>">
                                <input type="hidden" name="qty" value="<?php  echo ec($pro_qty) ?>">
                                <input type="hidden" name="size" value="<?php  echo $pro_size; ?>">
                                <input type="hidden" name="amount" value="<?php  echo ec($order_total) ?>">
                                <div class="order_button">
                                    <button  type="submit" id="submit">Place Order</button> 
                                </div>    
                            </div> 
                        </form>         
                    </div>
                </div> 
            </div> 
        </div>       
    </div>
    <!--Checkout page section end-->

    <script>
    $(function () {
            $('#order').on('submit', function (e) {
                e.preventDefault();
                var check_method = $('#check_method:checked').val();
                if(check_method == "COD"){
                    console.log(check_method);
                $.ajax({
                    type: 'post',
                    url: 'core/actions.php',
                    data: $('#order').serialize(),
                    success: function (val) {
                        console.log(val);
                        if (val == "0" || val == "") {
                            alert("Error");
                        } else{
                            location.replace("cart.php");
                        }
                    }
                });
                }else{
                    console.log(check_method);
                // $.ajax({
                //     type: 'post',
                //     url: 'strip.php',
                //     data: $('#order').serialize(),
                //     success: function (val) {
                //         console.log(val);
                //         if (val == "0" || val == "") {
                //             alert("Error");
                //         } else{
                            location.replace("strip.php?"+$('#order').serialize());
                //         }
                //     }
                // });
                }
            });
        })
      </script>
    <?php include 'includes/footer.php' ;
?>