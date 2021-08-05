<?php include 'includes/header.php' ;
?>
<head>
    <style>
        .btn_member {
  margin: 30px 0 0;
  line-height: 38px;
  padding: 0 20px;
  border: 1px solid #323232;
  color: #323232;
  display: inline-block;
  font-size: 12px;
  font-weight: 600;
  border-radius: 30px;
  text-transform: uppercase;
}

.btn_member:hover {
  background: #EC3642;
  border-color: #EC3642;
  color: #fff;
}
        </style>
</head>
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="index.html">home</a></li>
                            <li>our services</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->
    
   

     <!--price table area -->
    <div class="priceing_table">
        <div class="container">   
            <div class="row">
            <?php

                include 'assets/db.php';
                $sql = "SELECT * FROM membership";
                $query = mysqli_query($conn, $sql);
                while ($data = mysqli_fetch_array($query)) {
                    $name = $data['name'];
                    $price = $data['price'];
                    $id = $data['id'];
                     ?> 
                <div class="col-lg-4 col-md-6">
                    <div class="single_priceing">
                        <div class="priceing_title">
                        <form action="strip_membership.php" method="GET">
                        <input type="hidden" class="form-control" value="<?php echo ec($name)?>" name="membership_name" />
                            <h1><?php echo $data['name'];?></h1>
                        </div>
                        <div class="priceing_list">
                        <input type="hidden" class="form-control" value="<?php echo ec($price)?>" name="membership_price" />
                        <input type="hidden" class="form-control" value="<?php echo ec($id)?>" name="membership_id" />
                            <h1><span>$<?php echo $data['price'];?></span>/<?php echo $data['name'];?></h1>
                            <ul>
                                <li><?php echo $data['description'];?></li>
                                <li><?php echo $data['duration'];?></li>
                            </ul>
                            <input type="hidden" name="membership" value="1">
                            <button class="btn_member" type="submit">purchase now</button>
                            </form>
                        </div> 
                    </div>
                </div>
                <?php }?> 
            </div>
        </div>    
    </div>
     <!--price table  end-->

 
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
    <!--newsletter area end-->
   
    
    <?php include 'includes/footer.php' ;
?>