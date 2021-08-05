<?php include '../include/header.php';
    include '../../assets/db.php';
    $date = "all";
    if(isset($_GET['date'])){
      $date = $_GET['date'];
      
      if($date == 'today' || $date == 'yesterday'){
        $currDate = date('Y-m-d');
        $compareDate = date('Y-m-d');
        if($date == 'yesterday'){
          $compareDate = date('Y-m-d', strtotime($currDate. ' -1 days'));
        }
        // echo $compareDate;
        $totalOrderQ = mysqli_query($conn , "SELECT COUNT(id) FROM `orders` WHERE `timestamp` LIKE '$compareDate %'");
        $pendingOrderQ = mysqli_query($conn , "SELECT COUNT(id) FROM `orders` WHERE `order_status` != '3' AND `order_status` != '4' AND `timestamp` LIKE '$compareDate %'");
        $completedOrderQ = mysqli_query($conn , "SELECT COUNT(id) FROM `orders` WHERE `order_status` = '3' AND `timestamp` LIKE '$compareDate %' ");
        $earningsOrderQ = mysqli_query($conn , "SELECT SUM(amount) FROM `orders` WHERE `timestamp` LIKE '$compareDate %'");
        $totalUsersQ = mysqli_query($conn , "SELECT COUNT(id) FROM `user` WHERE `timestamp` LIKE '$compareDate %'");
      }
     
      if($date == 'week' || $date == 'month' || $date == 'year'){
        $currDate = date('Y-m-d');
        $t = $date;
        $t2 =  '1';
        if ($date == 'week') {
          $t = 'days';
          $t = '7';
        }
        $startDate = date('Y-m-d', strtotime($currDate. '-'.$t2.''.$t. 's'));
       
        $totalOrderQ = mysqli_query($conn , "SELECT COUNT(id) FROM `orders` WHERE `timestamp` BETWEEN '$startDate' AND '$currDate'");
        $pendingOrderQ = mysqli_query($conn , "SELECT COUNT(id) FROM `orders` WHERE `order_status` != '3' AND `order_status` != '4' AND `timestamp` BETWEEN '$startDate' AND '$currDate' ");
        $completedOrderQ = mysqli_query($conn , "SELECT COUNT(id) FROM `orders` WHERE `order_status` = '3' AND `timestamp` BETWEEN '$startDate' AND '$currDate' ");
        $earningsOrderQ = mysqli_query($conn , "SELECT SUM(amount) FROM `orders` WHERE `timestamp` BETWEEN '$startDate' AND '$currDate'");
        $totalUsersQ = mysqli_query($conn , "SELECT COUNT(id) FROM `user` WHERE `timestamp` BETWEEN '$startDate' AND '$currDate'");
      }    
    }
    if($date == "all"){
      $totalOrderQ = mysqli_query($conn , "SELECT COUNT(id) FROM `orders`");
      $pendingOrderQ = mysqli_query($conn , "SELECT COUNT(id) FROM `orders` WHERE `order_status` != '3' AND `order_status` != '4'");
      $completedOrderQ = mysqli_query($conn , "SELECT COUNT(id) FROM `orders` WHERE `order_status` = '3' ");
      $earningsOrderQ = mysqli_query($conn , "SELECT SUM(amount) FROM `orders` ");
      $totalUsersQ = mysqli_query($conn , "SELECT COUNT(id) FROM `user` ");
    
    }

?>

<!-- End Navbar -->
<div class="panel-header panel-header-lg">
  <div class="panel-header">
    <div class="header text-center">
      <h2 class="title">Admin Dashboard</h2>
     
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

              <div class="col-md-4 p-2 ">
                <div class="form-group">
                  <label><strong>Select Time</strong></label>
                </div>
              </div>
              <div class="col-md-8 p-2 ">
                <div class="form-group">
                  
                  <select  class="form-control" id="dateFilter" >
                    <option value="all" <?php if($date == 'all'){echo 'selected'; }?>>all</option>
                    <option value="today" <?php if($date == 'today'){echo 'selected'; }?>>Today</option>
                    <option value="yesterday" <?php if($date == 'yesterday'){echo 'selected'; }?>>Yesterday</option>
                    <option value="week"<?php if($date == 'week'){echo 'selected'; }?>>This Week</option>
                    <option value="month"<?php if($date == 'month'){echo 'selected'; }?> >This Month</option>
                    <option value="year" <?php if($date == 'year'){echo 'selected'; }?>>This Year </option>

                  </select>
                </div>
              </div>

            </div>
          </form>
        </div>
        <div class="row w-100 m-auto p-3">
          <div class="col-md-3">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title text-center">Total Orders</h4>
              </div>
              <?php 
                  //  $totalUserQ = mysqli_query($conn, "SELECT count(id) AS total FROM `users` ");
                  $total = mysqli_fetch_array($totalOrderQ)[0];

                      //  $user = $data['total'];
                    ?>
              <div class="row bg-primary text-center text-white">
                <div class="col-md-12 mt-4 border-right">
                  <h3><?php echo $total; ?></h3>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card">
              <div class="card-header">
                <?php    
                        $pending = mysqli_fetch_array($pendingOrderQ)[0];
                    ?>
                <h4 class="card-title text-center">Total Pendding</h4>
              </div>
              <div class="row bg-primary text-center text-white">
                <div class="col-md-12 mt-4 border-right">
                  <h3><?php echo $pending;?></h3>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title text-center">Completed</h4>
              </div>
              <?php 
                      $completed = mysqli_fetch_array($completedOrderQ)[0];
                    ?>
              <div class="row bg-primary text-center text-white">
                <div class="col-md-12 mt-4 border-right">
                  <h3><?php echo $completed;?></h3>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title text-center">Total Earnings</h4>
              </div>
              <?php 
                    $earnings = mysqli_fetch_array($earningsOrderQ)[0];
        ?>
              <div class="row bg-primary text-center text-white">
                <div class="col-md-12 mt-4 border-right">
                  <h3><strong>Rs:</strong> <?php echo $earnings;?></h3>
                </div>
              </div>
            </div>
          </div>


        </div>
        <div class="row w-100 m-auto p-3">
          <div class="col-md-3">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title text-center">Total Users</h4>
              </div>
              <?php 
                   $users = mysqli_fetch_array($totalUsersQ)[0];
        ?>
              <div class="row bg-primary text-center text-white">
                <div class="col-md-12 mt-4 border-right">
                  <h3><?php echo $users;?></h3>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>
<div class="content">

</div>
<?php include '../include/footer.php'?>

<script>
$(function(){
  $('#dateFilter').on('change', function(){
    var value = $(this).val();
    location.replace('./dashboard?date='+value);
  })
})
</script>