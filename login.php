<?php include('includes/header.php');
?>


    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="index.html">home</a></li>
                            <li>My account</li>
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
    <!-- customer login start -->
    <div class="customer_login mt-60">
        <div class="container"  >
            <div class="row" >
               <!--login area start-->
                <div class="col-lg-6 col-md-6" style="border-right:2px solid #ec3642;">
                    <div class="account_form">
                        <h2>login</h2>
                        <form id="signInForm" method="post">
                            <p>   
                                <label>Email <span>*</span></label>
                                <input type="email"  name="user_email" placeholder="Email*">
                             </p>
                             <p>   
                                <label>Passwords <span>*</span></label>
                                <input type="password" name="user_password" placeholder="Password*">
                             </p>   
                             <input type="hidden" name="signInForm" value="1">
                            <div class="login_submit" >                            
                                <button type="submit">login</button>
                                
                            </div>

                        </form>
                     </div>    
                </div>
                <!--login area start-->

                <!--register area start-->
                <div class="col-lg-6 col-md-6">
                    <div class="account_form register">
                        <h2>Register</h2>
                        <form id="signUpForm" method="post">
                            <p>   
                                <label>Your Name  <span>*</span></label>
                                <input type="text" name="user_name" placeholder="Your Name*" >
                             </p>
                             <p>   
                                <label>Your Email <span>*</span></label>
                                <input type="email" name="user_email" placeholder="Your Email*">
                             </p>
                             <p>   
                                <label>Your Mobile  <span>*</span></label>
                                <input type="text" name="user_mobile" placeholder="Your Mobile*">
                             </p>
                             <p>   
                                <label>Your Password <span>*</span></label>
                                <input type="password" name="user_password" placeholder="Your Password*">
                             </p>
                             <input type="hidden" name="signUpForm" value="1">
                            <div class="login_submit">
                                <button type="submit">Register</button>
                            </div>
                        </form>
                    </div>    
                </div>
                <!--register area end-->
            </div>
        </div>    
    </div>
    <!-- customer login end -->

    <script>
        $(function () {
            $('#signUpForm').on('submit', function (e) {
                e.preventDefault();
                $.ajax({
                    type: 'post',
                    url: 'core/actions.php',
                    data: $('#signUpForm').serialize(),
                    success: function (val) {
                        console.log(val);
                        if (val == "0" || val == "") {
                            $("#txt").html("Sorry... Email already regisrtered!")
                            $("#alertwrong").fadeIn();
                          setTimeout(function () {
                          $("#alertwrong").fadeOut(3000);
                          location.reload();
                        }, 500);
                        } else {
                            if (val == "1") {
                                $("#txt").html("Fill All The Fields!")
                                $("#alertwrong").fadeIn();
                                setTimeout(function () {
                                $("#alertwrong").fadeOut(3000);
                                location.reload();
                                }, 500);
                            } else {
                              setTimeout(function () {
                                location.replace('login.php');
                            }, 500);
                            }
                        }
                    }
                });

            });
        })

        $(function () {
            $('#signInForm').on('submit', function (e) {
                e.preventDefault();
                $.ajax({
                    type: 'post',
                    url: 'core/actions.php',
                    data: $('#signInForm').serialize(),
                    success: function (val) {
                        console.log(val);
                        if (val == "0" || val == "") {
                            $("#alertwrong").fadeIn();
                               setTimeout(function () {
                            $("#alertwrong").fadeOut(3000);
                            location.reload();
                        }, 500);
                        } else {
                                setTimeout(function () {
                                    location.replace('shop.php');
                                }, 500);

                        }
                    }
                });

            });
        })
        </script>
    <?php include('includes/footer.php');
?>

