<?php include 'includes/header.php' ;
?>
<?php
include 'assets/db.php';
if(isset($_GET['prodid'])){
    $prodid = $_GET['prodid'];
    $sql = "SELECT * FROM products WHERE id = '$prodid'";
    $query = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($query);
    $inventory = $data['inventory'];
    $cat_id = $data['cat_id'];
    $sql_cat = "SELECT * FROM categories WHERE id = '$cat_id'";
    $query_cat = mysqli_query($conn, $sql_cat);
    $data_cat = mysqli_fetch_array($query_cat);
    }
?>

<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="index.html">home</a></li>
                        <li>product details</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

                <div class="alert alert-success alert-dismissible" id="alertwrong" style="display:none;">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong id="txt">SORRY! Your password is wrong!</strong> 
                </div>
<!--product details start-->
<div class="product_details mt-60 mb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="product-details-tab">
                    <div id="img-1" class="zoomWrapper single-zoom">
                        <a href="#">
                            <img src="assets/img/product/<?php echo $data['image'] ?>"
                            alt="big-1">
                        </a>
                    </div>

                </div>
            </div>
            <div class="col-lg-8 col-md-8">
                <div class="product_d_right">
                        <h1><?php echo $data['name']?></h1>
                        <div class=" product_ratting">
                            <ul>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li class="review"><a href="#"> (customer review ) </a></li>
                            </ul>

                        </div>
                        <div class="price_box">
                            <span class="current_price">$<?php echo $data['price']?></span>

                        </div>
                        <div class="product_desc">
                            <p><?php echo $data['discription']?> </p>
                        </div>
                       
                        <div class="product_variant quantity">
                            <div class="variants_size">
                                <h2>size</h2>
                                <form id="fupForm" name="form1" method="post">
                                <select name="product_size" id="product_size" class="select_option">
                                    <option selected>S</option>
                                    <option>M</option>
                                    <option>L</option>
                                    <option>XL</option>
                                </select>
                            </div>
                            <select name="product_qty" id="product_qty" class="select_option ml-1">
                                <option selected>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                            <input type="hidden" class="form-control" id="productId" value="<?php echo $data['id']; ?>"  name="productId">
                            <button class="btn button" <?php if($inventory < 1){echo "disabled";}?> name="save"  id="AddtoCart">add to cart</button>
                            </form>
                        </div>
                        <div class="product_meta">
                            <span>Category: <a href="#"><?php echo $data_cat['name']?> </a></span>
                        </div>
                        <div class="product_meta">
                            <span>Stock: <a href="#"><?php if($inventory < 1){echo "Out of stock";}else{echo $inventory;}?> </a></span>
                        </div>

                    


                </div>
            </div>
        </div>
    </div>
</div>
<!--product details end-->


<?php include 'includes/footer.php' ;
?>
<script>
    $(document).ready(function() {
	$('#AddtoCart').on('click', function() {
		$("#AddtoCart").attr("disabled", "disabled");
		var product_size = $('#product_size').val();
		var product_qty = $('#product_qty').val();
            var productId = $('#productId').val();
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
                        if(val == "1") {
                            $("#txt1").html("Product Added!")
                                $("#alertok").fadeIn();
                                setTimeout(function () {
                                $("#alertok").fadeOut(3000);
                                location.replace('cart.php');
                                }, 500);
                        }else{
                            setTimeout(function () {
                                location.replace('login.php');
                            }, 500);
                        }
					
				}
			});
		
	});
});
</script>