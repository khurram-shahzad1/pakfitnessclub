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
                            <li>Sell Product</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->
    
    <!--contact map start-->
    <div class="mt-60">
    </div>
    <!--contact map end-->
    
    <!--contact area start-->
    <div class="contact_area">
        <div class="container ">   
            <div class="row ">
            <div class="col-lg-2 col-md-12"></div>               
                <div class="col-lg-8 col-md-12 shadow p-5">
                   <div class="contact_message form">
                        <h3>Uplaod Product</h3>   
                        <form id="newProduct">
                        <div class="form-group">
                                    <label>Product Category</label>
                                    <select name="catId" id="" class="form-control" required>
                                        <option value="" hidden>Select One</option>
                                        <?php 
                                    $cats ="SELECT * FROM categories ";
                                    $catsQ =mysqli_query($conn,$cats);
                                    while ($data2 = mysqli_fetch_array($catsQ)) {
                                ?>
                                        <option value="<?php echo $data2['id']; ?>"><?php echo $data2['name']; ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Prodcut Name</label>
                                    <input type="text" class="form-control"  name="pname" required placeholder="Add Product Name">
                                </div>
                                <div class="form-group">
                                    <label>Product Price</label>
                                    <input type="number" class="form-control" name="price" required placeholder="Add Product Price">
                                </div>
                            <p>       
                               <label>  Your Product Image (required)</label>
                                <input  type="file" class="" name="productImage" required >
                            </p>
                            <div class="form-group">
                                    <label>Desctiption</label>
                                    <textarea name="description" id="" rows="5" class="form-control border"
                                        placeholder="Add Product Description"></textarea>
                                      <input type="hidden" name="newProduct">

                                </div>   
                             
                            <button type="submit"> Uplaod</button>  
                            <p class="form-messege"></p>
                        </form> 

                    </div> 
                </div>
            <div class="col-lg-2 col-md-12"></div>               

            </div>
        </div>    
    </div>

    <!--contact area end-->
<script>
    $('#newProduct').on('submit', (function (e) {
            e.preventDefault();
            var newProductForm = new FormData(this);
            $.ajax({
                type: 'POST',
                url: 'admin/core/actions.php',
                data: newProductForm,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    console.log(data);
                    if (data == "1") {
                        setTimeout(() => {
                            location.replace('shop.php');
                        }, 1000);
                    } else {
                        setTimeout(() => {
                            location.replace('sell_product.php');
                        }, 1000);
                    }
                }
            });
        }));
        </script>
    <?php include 'includes/footer.php' ;
?>