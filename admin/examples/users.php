<?php include '../include/header.php';
include '../../assets/db.php';

?>

<!-- End Navbar -->
<div class="panel-header panel-header-lg">
<div class="panel-header">
        <div class="header text-center">
          <h2 class="title">Users</h2>
   
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
<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <!-- <div class="card-header">
               
                  </div> -->
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th> Id </th>
                      <th> User name</th>
                      <th> Email</th>
                      <th >password </th>
                      <th >ph# </th>
                      <th >Delete </th>
                    </thead>
                    <?php 
                   
                   $sql ="SELECT * FROM user ";
                   $query =mysqli_query($conn,$sql);
                   while ($data = mysqli_fetch_array($query)) {
                ?>
                    <tbody>
                     <tr>
                     <td><?php echo $data ['id'];?></td>
                     <td><?php echo $data ['user_name'];?></td>
                     <td><?php echo $data['user_email'];?></td>
                     <td><?php echo $data['user_password'];?></td>
                     <td><?php echo $data['user_mobile'];?></td>
                     <td> <button class="delid btn btn-danger" delid="<?php echo $data['id']?>">Delete</button></td>
           
                     </tr>
                    </tbody>
                    <?php } ?>
                  </table>
                </div>
              </div>
            </div>
          </div>
          
        </div>
      </div>


<?php include '../include/footer.php'?>
<script>
    $(function () {
        $('.delid').on('click', function (e) {
            e.preventDefault();
            var id = $(this).attr("delid");
            $.ajax({
                url: '../core/actions.php',
                type: 'POST',
                data: {
                    deluser: 1,
                    id: id
                },
                success: function (val) {
                    console.log(val);
                    if (val == "1") {
                        $("#alertSuccess").fadeIn();
                        $("#alertSuccess").fadeOut(2000);
                        setTimeout(() => {
                            location.reload('users.php');
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