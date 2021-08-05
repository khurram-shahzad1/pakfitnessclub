<?php include '../include/header.php';
    include '../../assets/db.php';
    $trainerid = $_GET['id'];
    $data = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM trainers WHERE id='$trainerid'"));
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
                <form id="edittrainer">
                        <div class="row px-5 pt-5">
                            <div class="col-md-4 p-2 ">
                                <div class="form-group">
                                    <label>name</label>
                                    <input type="text" class="form-control"  name="name" required value="<?php echo $data['name']; ?>">
                                </div>
                            </div>
                            <div class="col-md-4 p-2 ">
                            <div class="form-group">
                                    <label>experience</label>
                                    <input type="text" class="form-control"  name="experience" value="<?php echo $data['experience']; ?>" required >
                                </div>
                            </div>
                            <div class="col-md-4 p-2 ">
                                <div class="">
                                    <label>trainer image</label><br>
                                    <input type="file" class="" name="trainerImage" required  >
                                    <input type="hidden" name="trainerid" value="<?php echo $data['id'];?>">
                                </div>
                            </div>
                        </div>
                        <div class="row px-5">

                            <div class="col-md-12 p-2 ">
                                <div class="form-group">
                                    <label>Desctiption</label>
                                    <textarea name="description" id="" rows="5" class="form-control border"><?php echo $data['discription'];?></textarea>
                                      <input type="hidden" name="edittrainer">

                                </div>
                            </div>
                        </div>
                        <div class="row px-5">
                            <div class="col-md-2 pl-1">
                                <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>

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
    $('#edittrainer').on('submit',(function(e) {
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
                        location.replace('add_trainer.php');
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