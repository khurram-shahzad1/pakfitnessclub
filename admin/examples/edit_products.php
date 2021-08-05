<?php include '../include/header.php';
    include '../../assets/db.php';
    $proid = $_GET['id'];
    $data = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM products WHERE id='$proid'"));
?>

<!-- End Navbar -->
<div class="panel-header panel-header-lg">
    <div class="panel-header">
        <div class="header text-center">
            <h2 class="title">Add new product</h2>
           
        </div>
    </div>
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <form id="formpro">
                        <div class="row px-5 pt-5">

                            <div class="col-md-6 p-2 ">
                                <div class="form-group">
                                    <label>Product category</label>
                                    <select name="catId" id="" class="form-control" required>
                                        <option value="" hidden>Select One</option>
                                        <?php 
                                    $cats ="SELECT * FROM categories ";
                                    $catsQ =mysqli_query($conn,$cats);
                                    while ($data2 = mysqli_fetch_array($catsQ)) {
                                ?>
                        <option value="<?php echo $data2['id']; ?>"><?php echo $data2['name']; ?>
                        <?php if($data['cat_id'] == $data2['id']){echo 'selected'; } ?>>
                    <?php echo $data2['name']; ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 p-2 ">
                                <div class="form-group">
                                    <label>Prodcut name</label>
                                    <input type="text" class="form-control"  name="pname" required placeholder="Add product name" value="<?php echo $data['name'];?>">
                                </div>
                            </div>

                        </div>
                        <div class="row px-5">

                            <div class="col-md-6 p-2 ">
                                <div class="form-group">
                                    <label>Product Price</label>
                                    <input type="number" class="form-control" name="price" required placeholder="Add product price" value="<?php echo $data['price'];?>">
                                </div>
                            </div>
                            <div class="col-md-6 p-2 ">
                                <div class="">
                                    <label>Prodcut image</label><br>
                                    <input type="file" class="" name="productImage" required  name="productImage">
                                </div>
                            </div>

                        </div>
                        <div class="row px-5">

                            <div class="col-md-12 p-2 ">
                                <div class="form-group">
                                    <label>Desctiption</label>
                                    <textarea name="description" id="" rows="5" class="form-control border"
                                        placeholder="Add product description"><?php echo $data['discription'];?></textarea>
                                         <input type="hidden" name="formpro">

                                         <input type="hidden" name="proid" value="<?php echo $data['id'];?>">
                                   

                                </div>
                            </div>
                        </div>
                        <div class="row px-5">
                            <div class="col-md-2 pl-1">
                                <div class="form-group">
                                <!-- <button type="submit" class="btn btn-primary">Save</button> -->
                                <input type="submit" class="btn btn-warning" value="Submit">

                                </div>
                                <div class="col-md-5 p-2 ">
                                </div>
                                <div class="col-md-5 p-2 ">
                                </div>
                            </div>

                    </form>
                </div>
            </div>
        </div>
        
    </div>

</div>
</div>


<?php include '../include/footer.php'?>
<script>
$(function (){
    $('#formpro').on('submit',(function(e) {
        e.preventDefault();
        var updatedProduct = new FormData(this);
        $.ajax({
            type:'POST',
            url: '../core/actions.php',
            data:updatedProduct,
            cache:false,
            contentType: false,
            processData: false,
            success:function(val){
                console.log(val);
                if (val == "1") {
                    $("#alertSuccess").fadeIn();
                    $("#alertSuccess").fadeOut(3000);
                    setTimeout(() => {
                        location.replace('products.php');
                    }, 2000);
                }else{
                    $("#alertFailed").fadeIn();
                    $("#alertFailed").fadeOut(3000);
                }
            }
        });
    }));
})


</script>