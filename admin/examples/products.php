<?php include '../include/header.php';
    include '../../assets/db.php';

?>

<!-- End Navbar -->
<div class="panel-header panel-header-lg">
    <div class="panel-header">
        <div class="header text-center">
            <h2 class="title">Add New Product</h2>
     
        </div>
    </div>
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <form id="newProduct">
                        <div class="row px-5 pt-5">

                            <div class="col-md-6 p-2 ">
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
                            </div>
                            <div class="col-md-6 p-2 ">
                                <div class="form-group">
                                    <label>Prodcut Name</label>
                                    <input type="text" class="form-control"  name="pname" required placeholder="Add product name">
                                </div>
                            </div>

                        </div>
                        <div class="row px-5">

                            <div class="col-md-6 p-2 ">
                                <div class="form-group">
                                    <label>Product Price</label>
                                    <input type="number" class="form-control" name="price" required placeholder="Add product price">
                                </div>
                            </div>
                            <div class="col-md-6 p-2 ">
                                <div class="">
                                    <label>Prodcut Image</label><br>
                                    <input type="file" class="" name="productImage" required  >
                                </div>
                            </div>

                        </div>
                        <div class="row px-5">

                            <div class="col-md-12 p-2 ">
                                <div class="form-group">
                                    <label>Desctiption</label>
                                    <textarea name="description" id="" rows="5" class="form-control border"
                                        placeholder="Add product description"></textarea>
                                      <input type="hidden" name="newProduct">

                                </div>
                            </div>
                        </div>
                        <div class="row px-5">
                            <div class="col-md-2 pl-1">
                                <div class="form-group">
                                <button type="submit" class="btn btn-primary">Save</button>

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
        <div class="alert alert-success alert-dismissible" style="display:none;" id="alertSuccess">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Success!</strong> Indicates a successful or positive action.
    </div>
    <div class="alert alert-danger alert-dismissible"  id="alertFailed" style="display:none;">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Not Success!</strong> Indicates a not successful or negtive action.
    </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead class=" text-primary">
                        <th> Id </th>
                        <th> Category</th>
                        <th> Name</th>
                        <th> Price</th>
                        <th> Description</th>
                        <th> Image</th>
                        <th> TimeStemp</th>
                        <th>Update </th>
                        <th>Delete </th>
                    </thead>
                    <tbody>
                        <?php 
                    $s = 0;
                    $products =mysqli_query($conn,"SELECT * FROM products ");
                    while ($data = mysqli_fetch_array($products)) {
                        $s++;
                        $catId = $data['cat_id'];
                        $fetchCat = mysqli_query($conn, "SELECT * FROM categories WHERE id = '$catId'");
                        $fetchCat = mysqli_fetch_array($fetchCat);
                ?>
                        <tr>
                            <td><?php echo $s;?></td>
                            <td><?php echo $fetchCat['name'];?></td>
                            <td class="updateName" pid="<?php echo $data['id'];?> "><?php echo $data['name'];?></td>
                            <td class="updateprice" pid="<?php echo $data['id'];?> "><?php echo $data['price'];?></td>
                            <td><?php echo $data['discription'];?></td>
                            <td><img src="../../assets/img/product/<?php echo $data['image'];?>" width="100px" height="100px"></td>
                            <td><?php echo $data['timestamp'];?></td>
                            <td> <a href="edit_products.php?id=<?php echo $data['id']; ?>">
                                    <button class="btn btn-sm btn-info" style=" background-color:#25215E; color:white;">Update</button>
                                </a>
                            </td>
                            <td> <button class="delid btn btn-danger" delid="<?php echo $data['id']?>">Delete</button>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
</div>


<?php include '../include/footer.php'?>
<script>
    $(function () {
        $('#newProduct').on('submit', (function (e) {
            e.preventDefault();
            var newProductForm = new FormData(this);
            $.ajax({
                type: 'POST',
                url: '../core/actions.php',
                data: newProductForm,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    console.log(data);
                    if (data == "1") {
                        $("#alertSuccess").fadeIn();
                        $("#alertSuccess").fadeOut(2000);
                        setTimeout(() => {
                            location.reload('products.php');
                        }, 1000);
                    } else {
                        $("#alertFailed").fadeIn();
                        $("#alertFailed").fadeOut(2000);
                    }
                }
            });
        }));
        $('.delid').on('click', function (e) {
            e.preventDefault();
            var id = $(this).attr("delid");
            $.ajax({
                url: '../core/actions.php',
                type: 'POST',
                data: {
                    delProduct: 1,
                    id: id
                },
                success: function (val) {
                    console.log(val);
                    if (val == "1") {
                        $("#alertSuccess").fadeIn();
                        $("#alertSuccess").fadeOut(2000);
                        setTimeout(() => {
                            location.reload('products.php');
                        }, 1000);
                    } else {
                        $("#alertFailed").fadeIn();
                        $("#alertFailed").fadeOut(2000);
                    }
                }
            })
        })
        $('.updateName').on('dblclick', function (e) {
            e.preventDefault();
            var pid = $(this).attr("pid");
            var value = $(this).html();
            if (value[0] != "<");
            console.log(pid);
            $(this).html('<input type="text" class="form-control newName" pid="' + pid + '" value="' +
                value + '">');

        })
        $(document).on('keypress', function (e) {
            console.log(e.which);
            if (e.which == 13) {
                $('.newName').each(function (e) {
                    var newName = $(this).val();
                    var pid = $(this).attr('pid');
                    console.log(newName);
                    $(this).parent().html(newName);
                    $.ajax({
                        url: '../core/actions.php',
                        type: 'POST',
                        data: {
                            updateProdName: pid,
                            newName: newName
                        },
                        success: function (val) {}
                    })
                })
            }
        });
        $(document).on('click', function (e) {
            if (!$(e.target).hasClass('newName')) {
                $('.newName').each(function (e) {
                    var newName = $(this).val();
                    var pid = $(this).attr('pid');
                    console.log(newName);
                    $(this).parent().html(newName);
                    $.ajax({
                        url: '../core/actions.php',
                        type: 'POST',
                        data: {
                            updateProdName: pid,
                            newName: newName
                        },
                        success: function (val) {}
                    })
                })
            }
        });

        $('.updateprice').on('dblclick', function (e) {
            e.preventDefault();
            var pid = $(this).attr("pid");
            var value = $(this).html();
            if (value[0] != "<");
            console.log(pid);
            $(this).html('<input type="text" class="form-control newprice" pid="' + pid + '" value="' +
                value + '">');

        })
        $(document).on('keypress', function (e) {
            console.log(e.which);
            if (e.which == 13) {
                $('.newprice').each(function (e) {
                    var newprice = $(this).val();
                    var pid = $(this).attr('pid');
                    console.log(newprice);
                    $(this).parent().html(newprice);
                    $.ajax({
                        url: '../core/actions.php',
                        type: 'POST',
                        data: {
                            updatenewprice: pid,
                            newprice: newprice
                        },
                        success: function (val) {}
                    })
                })
            }
        });
        $(document).on('click', function (e) {
            if (!$(e.target).hasClass('newprice')) {
                $('.newprice').each(function (e) {
                    var newprice = $(this).val();
                    var pid = $(this).attr('pid');
                    console.log(newprice);
                    $(this).parent().html(newprice);
                    $.ajax({
                        url: '../core/actions.php',
                        type: 'POST',
                        data: {
                            updatenewprice: pid,
                            newprice: newprice
                        },
                        success: function (val) {}
                    })
                })
            }
        });
    
    })
</script>