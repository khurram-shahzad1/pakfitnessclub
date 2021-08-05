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
                            <li>Wishlist</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->
    
    <div class="alert alert-danger alert-dismissible" id="alertwrong" style="display:none;">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong id="txt">SORRY! Your password is wrong!</strong> 
                </div>
<div class="alert alert-success alert-dismissible" id="alertok" style="display:none;">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong id="txt1">SORRY! Your password is wrong!</strong> 
                </div>
     <!--wishlist area start -->
    <div class="wishlist_area mt-60">
        <div class="container">    
                <div class="row">
                    <div class="col-12">
                        <div class="table_desc wishlist">
                            <div class="cart_page table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product_remove">Delete</th>
                                            <th class="product_thumb">Image</th>
                                            <th class="product_name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-price">Quantity</th>
                                            <th class="product-price">Size</th>
                                            <th class="product_total">Add To Cart</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                             include 'assets/db.php';
                             $userId = $_COOKIE['user_id'];
                             $sql = "SELECT * FROM saved_products WHERE user_id = '$userId' ";
                             $run_save_product = mysqli_query($conn, $sql);
                             $count = mysqli_num_rows($run_save_product);
                             ?>
                             <?php
                             while($row_cart = mysqli_fetch_array($run_save_product)){
                                $productId = $row_cart['product_id'];

                             $run_products =mysqli_query($conn, "SELECT * FROM products WHERE id='$productId'");
                               while($row_products = mysqli_fetch_array($run_products)){
                               $product_title = $row_products['name'];
                                      
                                      $product_img1 = $row_products['image'];
                                      
                                      $only_price = $row_products['price'];

                                       ?>
                                        <tr>
                                           <td class="product_remove"><a href="#" class="removefromwishlist"
                                                removeId="<?php echo $row_cart['id']; ?>">X</a></td>
                                            <td class="product_thumb"><a href="#"><img src="assets/img/product/<?php echo $product_img1; ?>" alt=""></a></td>
                                            <td class="product_name"><a href="#"><?php echo $product_title; ?></a></td>
                                            <td class="product-price">$<?php echo $only_price; ?></td>
                                            <td class="product_quantity">
                                            <form method="post">
                                           <select name="product_size" class="product_size2 select_option">
                                               <option selected >S</option>
                                               <option >M</option>
                                               <option >L</option>
                                               <option >XL</option>
                                           </select></td>
                                        <td class="product_quantity"><input type="hidden" class="productId2" name="productId" value="<?php echo $productId ?>">
                                        <select name="product_qty" class="product_qty2 select_option">
                                               <option selected >1</option>
                                               <option >2</option>
                                               <option >3</option>
                                               <option >4</option>
                                               <option >5</option>
                                           </select></td>
                                            <td class="product_total"><a href="#" class="AddtoCart">Add To Cart</a></td>
                                            </form> 
                                        </tr>
                                        <?php } } ?>
                                    </tbody>
                                </table>   
                            </div>  

                        </div>
                     </div>
                 </div>
            <div class="row">
                <div class="col-12">
                     <div class="wishlist_share">
                        <h4>Share on:</h4>
                        <ul>
                            <li><a href="#"><i class="fa fa-rss"></i></a></li>           
                            <li><a href="#"><i class="fa fa-vimeo"></i></a></li>           
                            <li><a href="#"><i class="fa fa-tumblr"></i></a></li>           
                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>        
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>        
                        </ul>      
                    </div>
                </div> 
            </div>

        </div>
    </div>
     <!--wishlist area end -->
    
    <!--newsletter area start-->
    <div class="newsletter_area">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <div class="col-lg-7 col-md-7">
                    <figure class="single_banner">
                        <div class="banner_thumb">
                            <a href="shop.html"><img src="assets/img/bg/banner7.jpg" alt=""></a>
                            <div class="banner_text text_style3">
                                <h3>Fitness Store</h3>
                                <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat.</p>
                            </div>
                        </div>
                    </figure>
                </div>
                <div class="col-lg-5 col-md-5">
                    <div class="newsletter_container">
                        <h4>Sign up for </h4>
                        <h2>send</h2>
                        <h3>Newsletter</h3>
                        <div class="subscribe_form">
                            <form id="mc-form" class="mc-form footer-newsletter" >
                                <input id="mc-email" type="email" autocomplete="off" placeholder="Please enter your email to subscribe" />
                                <button id="mc-submit">Subscribe!</button>
                            </form>
                            <!-- mailchimp-alerts Start -->
                            <div class="mailchimp-alerts text-centre">
                                <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                                <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                                <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                            </div><!-- mailchimp-alerts end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    $('.AddtoCart').on('click', function () {
                var productId = $(this).parent().parent().find('.productId2').val();
                var product_size = $(this).parent().parent().find('.product_size2').val();
                var product_qty = $(this).parent().parent().find('.product_qty2').val();
                // console.log(productId);
                // console.log(product_size);
                // console.log(product_qty);
                $.ajax({
                    url: "core/actions.php",
                    type: "POST",
                    data: {
                        product_size: product_size,
                        product_qty: product_qty,
                        productId: productId
                    },
                    cache: false,
                    success: function (val) {
                        console.log(val);
                        if (val == "0" || val == "") {

                            $("#txt").html("Product Already Added!")
                                $("#alertwrong").fadeIn();
                                setTimeout(function () {
                                $("#alertwrong").fadeOut(3000);
                                location.reload();
                                }, 500);

                        } else {
                            $("#txt1").html("Product Added!")
                                $("#alertok").fadeIn();
                                setTimeout(function () {
                                $("#alertok").fadeOut(3000);
                                location.replace('cart.php');
                                }, 500);

                        }

                    }
                });
            });
            $(function () {
        $('.removefromwishlist').on('click', function (e) {
            if (confirm("Do you really want to remove this product?")) {
                e.preventDefault();
                var ele = $(this);
                var removeId = $(this).attr('removeId');
                console.log(removeId);
                $.ajax({
                    type: 'post',
                    url: 'core/actions.php',
                    data: {
                        removefromwishlist: 1,
                        removeId: removeId
                    },
                    success: function (val) {
                        if (val == 1) {
                            location.reload();
                        }
                    }
                });
            }
        });
    })
    </script>
    <!--newsletter area end-->
    <?php include 'includes/footer.php';
?>