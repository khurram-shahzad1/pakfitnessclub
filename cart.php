<?php 
     if(!isset($_COOKIE['user_id'])){
        header("Location: login.php");
         }else{

         }
    
?> 
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
                        <li>Shopping Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!--shopping cart area start -->
<div class="shopping_cart_area mt-60">
    <div class="container">
        <form action="#">
            <div class="row">
                <div class="col-12">
                    <div class="table_desc">
                        <div class="cart_page table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="product_remove">Delete</th>
                                        <th class="product_thumb">Image</th>
                                        <th class="product_name">Product</th>
                                        <th class="product-price">Price</th>
                                        <th class="product_quantity">Quantity</th>
                                        <th class="product_total">Total</th>
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
                                      
                                      $product_img1 = $row_products['image'];
                                      
                                      $only_price = $row_products['price'];
                                     
                                      $sub_total = $only_price*$pro_qty;

                                      $total += $sub_total;

                                       ?>
                                    <tr>
                                    <input type="hidden" class="pid" value="<?= $row_cart['id'] ?>">
                                        <td class="product_remove"><a href="#" class="removefromcart"
                                                removeId="<?php echo $row_cart['id']; ?>"><i
                                                    class="fa fa-trash-o"></i></a></td>
                                        <td class="product_thumb"><a href="#"><img
                                                    src="assets/img/product/<?php echo $product_img1; ?>" alt=""></a>
                                        </td>
                                        <td class="product_name"><?php echo $product_title; ?></td>
                                        <td class="product-price">$<?php echo $only_price; ?></td>
                                        <td class="product_quantity">
                                            <label>
                                            <input type="number" class="qty" value="<?= $pro_qty ?>" >
                                            </label>
                                        </td>
                                        <td class="product_total">$<?php echo $sub_total; ?></td>
                                    </tr>
                                    <?php } } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="cart_submit">
                            <button type="submit" class="mb-3 mt-4" ><a href="index.php">Continue Shopping</a></button>
                            <button type="submit " class="mb-3 "><a href="checkout.php">Proceed to Checkout</a></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>
<!--shopping cart area end -->


<script>
    $(function () {
        $('.removefromcart').on('click', function (e) {
            if (confirm("Do you really want to remove this product?")) {
                e.preventDefault();
                var ele = $(this);
                var removeId = $(this).attr('removeId');
                console.log(removeId);
                $.ajax({
                    type: 'post',
                    url: 'core/actions.php',
                    data: {
                        removefromcart: 1,
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



    $(document).ready(function() {

// Change the item quantity
$(".qty").on('change', function() {
  var $el = $(this).closest('tr');

  var pid = $el.find(".pid").val();
  var qty = $el.find(".qty").val();
//   location.reload(true);
  $.ajax({
    url: 'update_cart.php',
    method: 'post',
    cache: false,
    data: {
      qty: qty,
      pid: pid
    },
    success: function (val) {
                    console.log(val);
                    if (val == "0") {
                        alert("Error!");
                        setTimeout(function () {
                            location.reload();
                        }, 500);

                    } else {
                        alert("Cart Updated!");
                        setTimeout(function () {
                            location.replace('cart.php');
                        }, 500);

                    }

                }
  });
});
});
</script>
<?php include('includes/footer.php');
?>