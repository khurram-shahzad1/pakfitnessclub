<?php include '../include/header.php';
    include '../../assets/db.php';

?>

<!-- End Navbar -->
<div class="panel-header panel-header-lg">
<div class="panel-header">
        <div class="header text-center">
          <h2 class="title">All Bookings</h2>
      
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
                      <th> TrainerName</th>
                      <th >Day </th>
                      <th >Session Timming </th>
                      <th >Duration </th>
                      <th >Class </th>
                      <th >Gender </th>
                      <th >Status </th>
                    </thead>
                    <?php 
                   $s = 0;
                   $sql ="SELECT * FROM book_trainer ";
                   $query =mysqli_query($conn,$sql);
                   while ($data = mysqli_fetch_array($query)) {
                       $user = $data['user_id'];
                       $trainerid = $data['trainer_id'];
                       $fn = mysqli_fetch_array(mysqli_query($conn, "SELECT user_name FROM user WHERE id = '$user'"))[0];
                       $prod = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM trainers WHERE id = '$trainerid'"));
                    $s++;
                ?>
                    <tbody>
                     <tr>
                     <td><?php echo $s;?></td>
                     <td><?php echo $fn;?></td>
                      <td><?php echo $prod['name'];?></td>
                     <td><?php echo $data['day'];?></td>
                     <td><?php echo $data['session_duration'];?></td>
                     <td><?php echo $data['duration'];?></td>
                     <td><?php echo $data['class'];?></td>
                    <td><?php echo $data['gender'];?></td>
                    <td>
                    <?php 
                        $status = $data['booking_status'];
                        if($status == 0){
                    ?>
                     <button class="btn btn-success booktrainer" bid="<?php echo $data['id']; ?>">Accept</button>
                    <button class="btn btn-danger rejecttrainer" bid="<?php echo $data['id']; ?>">Reject</button>
                    <?php }
                    elseif($status == 1){ ?>
                    Accepted
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
        $('.booktrainer').on('click', function (e) {
            e.preventDefault();
            var bookId = $(this).attr('bid');
            $.ajax({
                url: '../core/actions.php',
                type: 'POST',
                data: {
                  booktrainer: bookId
                },
                success: function (val) {
                    console.log(val);
                    location.reload();
                }
            })
        })
        $('.rejecttrainer').on('click', function (e) {
            e.preventDefault();
            var bookId = $(this).attr('bid');
            $.ajax({
                url: '../core/actions.php',
                type: 'POST',
                data: {
                  rejecttrainer: bookId
                },
                success: function (val) {
                    console.log(val);
                    location.reload();
                }
            })
        })
    })
</script>