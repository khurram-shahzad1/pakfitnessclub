<?php 
     if(!isset($_COOKIE['user_id'])){
        header("Location: login.php");
         }else{

         }
    
?>
<?php include 'includes/header.php' ;
?>

    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="index.html">home</a></li>
                            <li>My account</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->
    
    <!-- my account start  -->
    <section class="main_content_area">
        <div class="container">   
            <div class="account_dashboard">
                <div class="row">
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <!-- Nav tabs -->
                        <div class="dashboard_tab_button">
                            <ul role="tablist" class="nav flex-column dashboard-list">
                                <li><a href="#dashboard" data-toggle="tab" class="nav-link active">Dashboard</a></li>
                                <li> <a href="#orders" data-toggle="tab" class="nav-link">Orders</a></li>
                                <li> <a href="#bookings" data-toggle="tab" class="nav-link">Bookings</a></li>
                                <li> <a href="#membership" data-toggle="tab" class="nav-link">Memberships</a></li>
                                <li><a href="#address" data-toggle="tab" class="nav-link">Addresses</a></li>
                                <li><a href="#account-details" data-toggle="tab" class="nav-link">Account details</a></li>
                                <li><a class="nav-link" href='core/actions.php?signout=1'>Logout</a></li>
                            </ul>
                        </div>    
                    </div>
                    <div class="col-sm-12 col-md-9 col-lg-9">
                        <!-- Tab panes -->
                        <div class="tab-content dashboard_content">
                            <div class="tab-pane fade show active" id="dashboard">
                                <h3>Dashboard </h3>
                                <div class="welcome">
<?php
include 'assets/db.php';
$user_id = $_COOKIE['user_id'];
$prod = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM user WHERE id = '$user_id'"));
?>
                                                <p>Hello, <strong><a href="#"><?php echo $prod['user_name'];?></a></strong> </p>
                                            </div>
                                <p>From your account dashboard. you can easily check &amp; view your <a href="#">recent orders</a>, manage your <a href="#">shipping and billing addresses</a> and <a href="#">Edit your password and account details.</a></p>
                            </div>
                            <div class="tab-pane fade" id="bookings">
                                <h3>Bookings</h3>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                            <th>#</th>
                                                            <th>Day</th>
                                                            <th>Session</th>
                                                            <th>Duration</th>
                                                            <th>Class</th>	 	 	 	
                                                            <th>Gender</th>
                                                            <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                            <?php 
                    $s = 0;
                   $sql ="SELECT * FROM book_trainer WHERE `user_id`= '$user_id'";
                   $query =mysqli_query($conn,$sql);
                   while ($data = mysqli_fetch_array($query)) {
                    $s++;
                ?>
                    <tbody>
                                                        <tr>
                                                            <td><?php echo $s;?></td>
                                                            <td><?php echo $data['day'];?></td>
                                                            
                                                            <td><?php echo $data['session_duration'];?></td>
                                                            <td><?php echo $data['duration'];?></td>
                                                            <td><?php echo $data['class'];?></td>
                                                            <td><?php echo $data['gender'];?></td>
                                                            <td>  <?php 
                        $status = $data['booking_status'];
                        if($status == 0){
                    ?>
                    Pending
                    <?php }
                    elseif($status == 1){ ?>
                    Approved
                    <?php }
                    elseif($status == 2){ ?>
                    Rejected
                    <?php } ?></td>
                                            </tr>
                                        </tbody>
                                        <?php } ?>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="membership">
                                <h3>Your Memberships</h3>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                            <th>#</th>
                                                            <th>User Name</th>
                                                            <th>Membership Name</th>
                                                            <th>Membership Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                            <?php 
                    $s = 0;
                   $sql ="SELECT * FROM membership_orders WHERE `user_id`= '$user_id'";
                   $query =mysqli_query($conn,$sql);
$user = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM user WHERE id = '$user_id'"));
                   while ($data = mysqli_fetch_array($query)) {
                    $s++;
                ?>
                    <tbody>
                                                        <tr>
                                                            <td><?php echo $s;?></td>
                                                            <td><?php echo $user['user_name'];?></td>
                                                            
                                                            <td><?php echo $data['membership_name'];?></td>
                                                            <td><?php echo $data['membership_price'];?></td>
                                                          
                                            </tr>
                                        </tbody>
                                        <?php } ?>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="orders">
                                <h3>Orders</h3>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                            <th>Order</th>
                                                            <th>Date</th>
                                                            <th>Status</th>
                                                            <th>Total</th>	 	 	 	
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                            <?php 
                    $s = 0;
                   $sql ="SELECT * FROM orders WHERE `user_id`= '$user_id'";
                   $query =mysqli_query($conn,$sql);
                   while ($data = mysqli_fetch_array($query)) {
                    $s++;
                ?>
                    <tbody>
                                                        <tr>
                                                            <td><?php echo $s;?></td>
                                                            <td><?php echo $data['timestamp'];?></td>
                                                            <td>  <?php 
                        $status = $data['order_status'];
                        if($status == 0){
                    ?>
                    Pending
                    <?php }
                    elseif($status == 1){ ?>
                    Completed
                    <?php }
                    elseif($status == 2){ ?>
                    Rejected
                    <?php } ?></td>
                                                            <td>$<?php echo $data['amount'];?></td>
                                            </tr>
                                        </tbody>
                                        <?php } ?>
                                    </table>
                                </div>
                            </div>
                            
                            <div class="tab-pane" id="address">
                            <?php $user_id = $_COOKIE['user_id'];
$user = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM user WHERE id = '$user_id'"));
$prod = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM orders WHERE id = '$user_id'"));?>
                                <h4 class="billing-address">Billing address</h4>
                                <p><strong><?php echo $user['user_name'];?></strong></p>
                                <address>
                                <?php echo $prod['s_address'];?>
                                </address>
                                <p><?php echo $prod['city'];?></p>   
                            </div>
                            <div class="tab-pane fade" id="account-details">
                                <h3>Account details </h3>
                                <div class="login">
                                    <div class="login_form_container">
                                        <div class="account_login_form">
                                        <?php $user_id = $_COOKIE['user_id'];
$user = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM user WHERE id = '$user_id'"));
?>
                                            <form id="updateuser" method="post">
                                                <label>Name</label>
                                                <input type="text" value="<?php echo $user['user_name'];?>" name="user_name">
                                                <label>Email</label>
                                                <input type="email" name="user_email" value="<?php echo $user['user_email'];?>">
                                                <label>Password</label>
                                                <input type="text" name="user_password" value="<?php echo $user['user_password'];?>">
                                                <label>Ph#</label>
                                                <input type="text" name="user_mobile" value="<?php echo $user['user_mobile'];?>">
                                                <input type="hidden" name="updateuser" value="1">
                                                <br>
                                                <div class="save_button primary_btn default_button">
                                                   <button type="submit">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        </div>        	
    </section>			
    <!-- my account end   --> 
    <script>
      $('#updateuser').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
          type: 'post',
          url: 'core/actions.php',
          data: $('#updateuser').serialize(),
          success: function (val) {
            console.log(val);
            if (val == 1) {
              setTimeout(function () {
                location.reload();
              }, 500);
            } else {
              setTimeout(function () {
                location.reload();
              }, 500);
            }
          }
        });
      });
    </script>
  
    <?php include 'includes/footer.php' ;
?>