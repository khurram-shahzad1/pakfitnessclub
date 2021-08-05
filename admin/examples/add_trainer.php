<?php include '../include/header.php';
    include '../../assets/db.php';

?>

<!-- End Navbar -->
<div class="panel-header panel-header-lg">
    <div class="panel-header">
        <div class="header text-center">
            <h2 class="title">Add new trianer</h2>
        
        </div>
    </div>
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <form id="newtrainer">
                        <div class="row px-5 pt-5">
                            <div class="col-md-4 p-2 ">
                                <div class="form-group">
                                    <label>name</label>
                                    <input type="text" class="form-control"  name="name" required placeholder="Add trainer name">
                                </div>
                            </div>
                            <div class="col-md-4 p-2 ">
                            <div class="form-group">
                                    <label>experience</label>
                                    <input type="text" class="form-control"  name="experience" required placeholder="Add trainer experience">
                                </div>
                            </div>
                            <div class="col-md-4 p-2 ">
                                <div class="">
                                    <label>trainer image</label><br>
                                    <input type="file" class="" name="trainerImage" required  >
                                </div>
                            </div>
                        </div>
                        <div class="row px-5">

                            <div class="col-md-12 p-2 ">
                                <div class="form-group">
                                    <label>Desctiption</label>
                                    <textarea name="description" id="" rows="5" class="form-control border"
                                        placeholder="Add trainer description"></textarea>
                                      <input type="hidden" name="newtrainer">

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
                        <th> Name</th>
                        <th> Experience</th>
                        <th> Description</th>
                        <th> Image</th>
                        <th>Update </th>
                        <th>Delete </th>
                    </thead>
                    <tbody>
                        <?php 
                    $s = 0;
                    $trainers =mysqli_query($conn,"SELECT * FROM trainers ");
                    while ($data = mysqli_fetch_array($trainers)) {
                        $s++;
                ?>
                        <tr>
                            <td><?php echo $s;?></td>
                            <td><?php echo $data['name'];?></td>
                            <td><?php echo $data['experience'];?></td>
                            <td><?php echo $data['discription'];?></td>
                            <td><img src="../../assets/img/about/<?php echo $data['image'];?>" width="100px" height="100px"></td>
                            <td> <a href="edit_trainers.php?id=<?php echo $data['id']; ?>">
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
        $('#newtrainer').on('submit', (function (e) {
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
                            location.reload('add_trainer.php');
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
                    deltrainer: 1,
                    id: id
                },
                success: function (val) {
                    console.log(val);
                    if (val == "1") {
                        $("#alertSuccess").fadeIn();
                        $("#alertSuccess").fadeOut(2000);
                        setTimeout(() => {
                            location.reload('add_trainer.php');
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