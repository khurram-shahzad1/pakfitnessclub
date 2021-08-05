<?php include '../include/header.php';
    include '../../assets/db.php';

?>

<!-- End Navbar -->
<div class="panel-header panel-header-lg">
<div class="panel-header">
        <div class="header text-center">
          <h2 class="title">All Membership Orders</h2>
        
        </div>
      </div>
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
                      <th> UserName</th>
                      <th> Membership Name</th>
                      <th >Duration </th>
                      <th >Membership Price </th>
                      </thead>
                    <?php 
                   $s = 0;
                   $sql ="SELECT * FROM membership_orders ";
                   $query =mysqli_query($conn,$sql);
                   while ($data = mysqli_fetch_array($query)) {
                       $user = $data['user_id'];
                       $membership_id = $data['membership_id'];
                       $fn = mysqli_fetch_array(mysqli_query($conn, "SELECT user_name FROM user WHERE id = '$user'"))[0];
                       $membership = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM membership WHERE id = '$membership_id'"));
                    $s++;
                ?>
                    <tbody>
                     <tr>
                     <td><?php echo $s;?></td>
                     <td><?php echo $fn;?></td>
                     <td><?php echo $data['membership_name'];?></td>
                     <td><?php echo $membership['duration'];?></td>
                     <td><?php echo $data['membership_price'];?></td>
                     </tr>
                    </tbody>
                    <?php}?>
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
        $('.acceptOrder').on('click', function (e) {
            e.preventDefault();
            var orderId = $(this).attr('oid');
            $.ajax({
                url: '../core/actions.php',
                type: 'POST',
                data: {
                    acceptOrder: orderId
                },
                success: function (val) {
                    console.log(val);
                    location.reload();
                }
            })
        })
        $('.rejectOrder').on('click', function (e) {
            e.preventDefault();
            var orderId = $(this).attr('oid');
            $.ajax({
                url: '../core/actions.php',
                type: 'POST',
                data: {
                    rejectOrder: orderId
                },
                success: function (val) {
                    console.log(val);
                    location.reload();
                }
            })
        })
    })
</script>