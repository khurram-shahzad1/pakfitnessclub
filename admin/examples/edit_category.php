<?php include '../include/header.php';
    include '../../assets/db.php';
    $catid = $_GET['id'];
$data = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM categories WHERE id='$catid'"));

?>

<div class="panel-header panel-header-lg">
  <div class="panel-header">
    <div class="header text-center">
      <h2 class="title">Edit category here</h2>
   
    </div>
  </div>
</div>
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <form id="formCat">
            <div class="row">
              <div class="col-md-5 pr-1">
                <h4 class="card-title">Edit category </h4>
                <div class="alert alert-success alert-dismissible" style="display:none;" id="alertSuccess">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Success!</strong> Indicates a successful or positive action.
    </div>
    <div class="alert alert-danger alert-dismissible"  id="alertFailed" style="display:none;">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Not Success!</strong> Indicates a not successful or negtive action.
    </div>
              </div>
              <div class="col-md-5 p-2 ">
                <div class="form-group">              
                 
                  <input type="text" name="name" class="form-control" value="<?php echo $data['name'];?>">
                  <input type="hidden" name="updateCat">
                  <input type="hidden" name="catid" value="<?php echo $data['id'];?>">

                </div>
              </div>
              <div class="col-md-2 pl-1">
                <input type="submit" class="btn btn-primary" value="Submit">
                
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
    $('#formCat').on('submit',function(e){
    e.preventDefault();
    $.ajax({
        url : '../core/actions.php',
        type : 'POST',
        data : $('#formCat').serialize(),
        success:function(val){
            console.log(val);
            if (val == "1") {
                $("#alertSuccess").fadeIn();
                $("#alertSuccess").fadeOut(3000);
                setTimeout(() => {
                    location.replace('category.php');
                }, 2000);
            }else{
                $("#alertFailed").fadeIn();
                $("#alertFailed").fadeOut(3000);
            }
        }
    })
    })
})
</script>