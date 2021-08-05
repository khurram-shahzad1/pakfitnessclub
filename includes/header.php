<!doctype html>
<html class="no-js" lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Pak Fitness Club</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- CSS 
    ========================= -->


    <!-- Plugins CSS -->
    <link rel="stylesheet" href="assets/css/plugins.css">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/jquery.min.js"></script>
</head>

<body>

    <!--Offcanvas menu area start-->
    <div class="off_canvars_overlay">

    </div>
    <div class="Offcanvas_menu Offcanvas_defult">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="canvas_open">
                        <a href="javascript:void(0)"><i class="ion-navicon"></i></a>
                    </div>
                    <div class="Offcanvas_menu_wrapper">
                        <div class="canvas_close">
                            <a href="javascript:void(0)"><i class="ion-android-close"></i></a>
                        </div>
                        <div class="top_right">
                            <ul>
                                <?php
                                  function ec($string)
                                  {
                                      $encrypt_method = "AES-256-CBC";
                                      $secret_key = 'test_secret_key';
                                      $secret_iv = 'test_secret_iv';
                                      $key = hash('sha256', $secret_key);
                                      $iv = substr(hash('sha256', $secret_iv), 0, 16);
                                  
                                      $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
                                      $output = base64_encode($output);
                                  
                                      return $output;
                                  }
                                  function dc($string)
                                  {
                                      $encrypt_method = "AES-256-CBC";
                                      $secret_key = 'test_secret_key';
                                      $secret_iv = 'test_secret_iv';
                                      $key = hash('sha256', $secret_key);
                                      $iv = substr(hash('sha256', $secret_iv), 0, 16);
                                  
                                      $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
                                  
                                      return $output;
                                  }
                            include 'assets/db.php';
                             if(!isset($_COOKIE['user_id'])){
                                echo "<li class='currency'><a href='login.php'><i class='fa fa-user'></i> LogIn</a>
                              </li>
                              <li class='currency'><a href='login.php'><i class='fa fa-user'></i> SignUp</a>
                              </li>";
                                }else{
                                    echo
                                    "<li class='currency'><a href='core/actions.php?signout=1'><i class='fa fa-sign-out'></i> Logout</a>
                                    </li> 
                                    <li class='top_links'><a href='#'><i class='zmdi zmdi-account'></i> My
                                                    Account</a>
                                                <ul class='dropdown_links'>
                                                    <li><a href='checkout.php'>Checkout </a></li>
                                                    <li><a href='my-account.php'>My Account </a></li>
                                                    <li><a href='cart.php'>Shopping Cart</a></li>
                                                    <li><a href='wishlist.php'>Wishlist</a></li>
                                                </ul>
                                            </li>";
                                } ?>
                            </ul>
                        </div>
                        <div class="search_box">
                            <form action="#">
                                <input placeholder="Search entire store here ..." type="text">
                                <button type="submit"><i class="ion-ios-search-strong"></i></button>
                            </form>
                        </div>
                        <div id="menu" class="text-left ">
                            <ul class="offcanvas_main_menu">
                                <li class="menu-item-has-children active">
                                    <a href="index.php">Home</a>
                                    <!-- <ul class="sub-menu">
                                        <li><a href="index.html">Home 1</a></li>
                                        <li><a href="index-2.html">Home 2</a></li>
                                        <li><a href="index-3.html">Home 3</a></li>
                                        <li><a href="index-4.html">Home 4</a></li>
                                    </ul> -->
                                </li>
                               
                                <li class="menu-item-has-children active">
                                    <a href="shop.php">shop</a>
                                    <ul class="sub-menu">
                                        <li><a href="cart.php">cart</a></li>
                                        <li><a href="sell_product.php">sell product</a></li>
                                        <li><a href="wishlist.php">Wishlist</a></li>
                                        <li><a href="checkout.php">Checkout</a></li>
                                        <li><a href="my-account.php">my account</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children active">
                                    <a href="#">Membership</a>
                                    <ul class="sub-menu">
                                        <li><a href="membership.php">Buy Membership</a></li>
                                        <li><a href="sell_membership.php">sell Membership</a></li>
                                    </ul>
                                </li>


                               
                                        <li><a href="trainer_booking.php">Trainers</a></li>
                                <li class="menu-item-has-children">
                                    <a href="about.php">about Us</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="contact.php"> Contact Us</a>
                                </li>
                            </ul>
                        </div>

                        <div class="Offcanvas_footer">
                            <span><a href="#"><i class="fa fa-envelope-o"></i> info@yourdomain.com</a></span>
                            <ul>
                                <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li class="pinterest"><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Offcanvas menu area end-->

    <header>
        <div class="main_header header_defult">
            <!--header top start-->
            <div class="header_top">
                <div class="container">
                    <div class="header_box">
                        <div class="row align-items-center">
                            <div class="col-lg-2">
                                <div class="logo">
                                    <a href="index.php"><img width="110" height="110" src="assets/img/logo/logo.png" alt=""></a>
                                </div>
                            </div>
                            <div class="col-lg-10">
                                <div class="header_top_settings">
                                    <div class="top_right">
                                        <ul>
                                            <?php
                            include 'assets/db.php';
                             if(!isset($_COOKIE['user_id'])){
                                echo "<li class='currency'><a href='login.php'><i class='fa fa-user'></i> LogIn</a>
                              </li>
                              <li class='currency'><a href='login.php'><i class='fa fa-user'></i> SignUp</a>
                              </li>";
                                }else{
                                    echo
                                    "<li class='currency'><a href='core/actions.php?signout=1'><i class='fa fa-sign-out'></i> Logout</a>
                                    </li> 
                                    <li class='top_links'><a href='#'><i class='zmdi zmdi-account'></i> My
                                                    Account</a>
                                                <ul class='dropdown_links'>
                                                    <li><a href='checkout.php'>Checkout </a></li>
                                                    <li><a href='my-account.php'>My Account </a></li>
                                                    <li><a href='cart.php'>Shopping Cart</a></li>
                                                    <li><a href='wishlist.php'>Wishlist</a></li>
                                                </ul>
                                            </li>";
                                } ?>

                                        </ul>
                                    </div>

                                    <?php if(!isset($_COOKIE['user_id'])){
                                        echo "";
                                    }else{
                                        include 'assets/db.php';
                                        $userId = $_COOKIE['user_id'];
                                        $get_items = "select * from cart where user_id='$userId'";
    
                                                $run_items = mysqli_query($conn,$get_items);
                                                
                                                $count_items = mysqli_num_rows($run_items);
                                                $userId = $_COOKIE['user_id'];
                                        $get_items = "select * from cart where user_id='$userId'";
    
                                                $run_items = mysqli_query($conn,$get_items);
                                                
                                                $count_items = mysqli_num_rows($run_items);
    
                                                $total = 0;
                                                
                                                $select_cart = "select * from cart where user_id='$userId'";
                                                
                                                $run_cart = mysqli_query($conn,$select_cart);
                                                
                                                while($record=mysqli_fetch_array($run_cart)){
                                                    
                                                    $pro_id = $record['product_id'];
                                                    
                                                    $pro_qty = $record['qty'];
                                                    
                                                    $get_price = "select * from products where id='$pro_id'";
                                                    
                                                    $run_price = mysqli_query($conn,$get_price);
                                                    
                                                    while($row_price=mysqli_fetch_array($run_price)){
                                                        
                                                        $sub_total = $row_price['price']*$pro_qty;
                                                        
                                                        $total += $sub_total;
                                                        
                                                    }
                                                    
                                                }

                                            
                                        echo 
                                        "<div class='mini_cart_wrapper'>
                                        <a href='cart.php'><img src='assets/img/icon/icon_top_cart.png'
                                                alt='''>
                                                $count_items item(s) <span> - $$total.00</span></a>
                                    </div>";
                                    } ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--header top start-->

            <!--main menu start-->
            <div class="main_menu_area sticky-header">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div class="main_menu menu_two menu_position">
                                <nav>
                                    <ul>
                                        <li><a href="index.php">home</a>
                                            <!-- <ul class="sub_menu">
                                                <li><a href="index.html">Home shop 1</a></li>
                                                <li><a href="index-2.html">Home shop 2</a></li>
                                                <li><a href="index-3.html">Home shop 3</a></li>
                                                <li><a href="index-4.html">Home shop 4</a></li>
                                            </ul> -->
                                        </li>
                                        <li><a href="shop.php">shop<i class="fa fa-angle-down"></i></a>
                                            <ul class="sub_menu">
                                                <li><a href="cart.php">cart</a></li>
                                        <li><a href="sell_product.php">sell product</a></li>
                                                <li><a href="wishlist.php">Wishlist</a></li>
                                                <li><a href="checkout.php">Checkout</a></li>
                                                <li><a href="my-account.php">my account</a></li>

                                            </ul>
                                        </li>
                                        <li><a href="membership.php">Membership<i class="fa fa-angle-down"></i></a>
                                            <ul class="sub_menu">
                                                <li><a href="membership.php">Buy Membership</a></li>
                                                <li><a href="sell_membership.php">Sell Membership</a></li>
                                               
                                            </ul>
                                            
                                        </li>
                                        <li><a href="trainer_booking.php">Trainers</a></li>
                                     

                                        <li><a href="about.php">about Us</a></li>
                                        <li><a href="contact.php"> Contact Us</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--main menu end-->
        </div>
    </header>
    <!--header area end-->