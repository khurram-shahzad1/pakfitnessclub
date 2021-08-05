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
                        <li>shop</li>
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
<!--shop  area start-->
<div class="shop_area shop_reverse mt-60 mb-60">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-md-12">
                <!--shop wrapper start-->

                <div class="row shop_wrapper">
                    <?php
include 'assets/db.php';
$sql = "SELECT * FROM products";
$query = mysqli_query($conn, $sql);


?>
                    <?php while ($data = mysqli_fetch_array($query)) { 
            $prodId = $data['id'];
            ?>
                    <div class="col-lg-4 col-md-4 col-12 " >
                        <article class="single_product p-3" style="border:1px solid #ec3642">
                            <figure >
                                <div class="product_thumb " >
                                    <a class="primary_img" href="product-details.php?prodid=<?php echo $prodId; ?>"><img
                                            src="assets/img/product/<?php echo $data['image']; ?>" alt=""></a>
                                    <div class="action_links" >
                                        <ul>
                                            <li class="add_to_cart"><a
                                                    href="product-details.php?prodid=<?php echo $prodId; ?>"
                                                    title="Add to Cart"><i class="fa fa-shopping-cart"
                                                        aria-hidden="true"></i></a></li>
                                            <li class="wishlist"><a href="" class="wishlist_manage"
                                                    prodId="<?php echo $prodId; ?>" title="Add to Wishlist"><i
                                                        class="fa fa-heart" aria-hidden="true"></i></a></li>

                                           
                                        </ul>
                                    </div>
                                </div>
                                <div class="product_content grid_content">
                                    <div class="product_rating">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                    <h4 class="product_name"><a
                                            href="product-details.php?prodid=<?php echo $prodId; ?>"><?php echo $data['name']; ?></a>
                                    </h4>
                                    <div class="price_box">
                                        <span class="current_price">$ <?php echo  $data['price']; ?></span>
                                    </div>
                                </div>

                            </figure>
                        </article>
                    </div>
                    <?php } ?>
                </div>


                <!--shop toolbar end-->
                <!--shop wrapper end-->
            </div>
        </div>
    </div>
</div>
<!--shop  area end-->


<script>


    $(document).ready(function () {

        $('.wishlist_manage').on('click', function (e) {
            e.preventDefault();
            var prodId = $(this).attr('prodId');
            $.ajax({
                url: "core/actions.php",
                type: "POST",
                data: {
                    wishlist_manage: prodId
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
                        setTimeout(function () {
                            location.replace('wishlist.php');
                        }, 500);

                    }
                }
            });
        })
    });


    $('#AddtoCart').on('click', function () {
        $("#AddtoCart").attr("disabled", "disabled");
        var productId = $('#productId').val();
        var product_size = $('#product_size').val();
        var product_qty = $('#product_qty').val();
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
                if (val == "1") {
                    $("#txt1").html("Product Added!")
                                $("#alertok").fadeIn();
                                setTimeout(function () {
                                $("#alertok").fadeOut(3000);
                                location.replace('cart.php');
                                }, 500);

                } else {
                    setTimeout(function () {
                        location.replace('index.php');
                    }, 500);
                }

            }
        });
    });
</script>
<!--newsletter area end-->
<?php include 'includes/footer.php';
?>