<?php include '../include/header.php';
    include '../../assets/db.php';

?>

<!-- End Navbar -->
<div class="panel-header panel-header-lg">
<div class="panel-header">
        <div class="header text-center">
          <h2 class="title">All Orders</h2>
       
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
                      <th> Address</th>
                      <th >Product </th>
                      <th >Quantity </th>
                      <th >Price </th>
                      <th >Status </th>
                    </thead>
                    <?php 
                   $s = 0;
                   $sql ="SELECT * FROM orders ";
                   $query =mysqli_query($conn,$sql);
                   while ($data = mysqli_fetch_array($query)) {
                       $user = $data['user_id'];
                       $prodId = $data['pro_id'];
                       $fn = mysqli_fetch_array(mysqli_query($conn, "SELECT user_name FROM user WHERE id = '$user'"))[0];
                       $prod = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM products WHERE id = '$prodId'"));
                    $s++;
                ?>
                    <tbody>
                     <tr>
                     <td><?php echo $s;?></td>
                     <td><?php echo $fn;?></td>
                     <td><?php echo $data['s_address'];?></td>
                     <td><?php echo $prod['name'];?></td>
                     <td><?php echo $data['qty'];?></td>
                    <td><?php echo $data['amount'];?></td>
                    <td>
                    <?php 
                        $status = $data['order_status'];
                        if($status == 0){
                    ?>
                     <button class="btn btn-success acceptOrder" oid="<?php echo $data['id']; ?>">Accept</button>
                    <button class="btn btn-danger rejectOrder" oid="<?php echo $data['id']; ?>">Reject</button>
                    <?php }
                    elseif($status == 1){ ?>
                    Completed
                    <?php }
                    elseif($status == 2){ ?>
                    Rejected
                    <?php } ?>
                    </td>
          
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