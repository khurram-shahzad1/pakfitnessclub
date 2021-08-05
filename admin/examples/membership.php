<?php include '../include/header.php';
    include '../../assets/db.php';

?>

<!-- End Navbar -->
<div class="panel-header panel-header-lg">
    <div class="panel-header">
        <div class="header text-center">
            <h2 class="title">Add New Membership</h2>
            
        </div>
    </div>
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <form id="membership">
                        <div class="row px-5 pt-5">

                
                            <div class="col-md-4 p-2 ">
                                <div class="form-group">
                                    <label>Membership Name</label>
                                    <input type="text" class="form-control"  name="name" required placeholder="Add Membership Name">
                                </div>
                            </div>
                            <div class="col-md-4 p-2 ">
                                <div class="form-group">
                                    <label>Membership Duration</label>
                                    <input type="text" class="form-control" name="duration" required placeholder="Add Membership Duration ">
                                </div>
                            </div>
                            <div class="col-md-4 p-2 ">
                            <div class="form-group">
                                    <label>Membership Price</label>
                                    <input type="number" class="form-control" name="price" required placeholder="Add Membership Price">
                                </div>
                            </div>
                        </div>
                      
                        <div class="row px-5">

                            <div class="col-md-12 p-2 ">
                                <div class="form-group">
                                    <label>Membership Desctiption</label>
                                    <textarea name="description" id="" rows="5" class="form-control border"
                                        placeholder="Add Membership Description"></textarea>
                                      <input type="hidden" name="membership">

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
                        <th>Membership Name</th>
                        <th>Membership Duration</th>
                        <th> Membership Price</th>
                        <th> Membership Description</th>
                        <th>Delete </th>
                    </thead>
                    <tbody>
                        <?php 
                    $s = 0;
                    $membership =mysqli_query($conn,"SELECT * FROM membership ");
                    while ($data = mysqli_fetch_array($membership)) {
                        $s++;
                ?>
                        <tr>
                            <td><?php echo $s;?></td>
                            <td><?php echo $data['name'];?></td>
                            <td><?php echo $data['duration'];?></td>
                            <td><?php echo $data['price'];?></td>
                            <td><?php echo $data['description'];?></td>
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
        $('#membership').on('submit', (function (e) {
            e.preventDefault();
            $.ajax({
              url: '../core/actions.php',
                type: 'POST',
                data: $('#membership').serialize(),
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
                    delmembership: 1,
                    id: id
                },
                success: function (val) {
                    console.log(val);
                    if (val == "1") {
                        $("#alertSuccess").fadeIn();
                        $("#alertSuccess").fadeOut(2000);
                        setTimeout(() => {
                            location.reload('membership.php');
                        }, 1000);
                    } else {
                        $("#alertFailed").fadeIn();
                        $("#alertFailed").fadeOut(2000);
                    }
                }
            })
        })
    })
</script>