<?php if(!isset($_COOKIE['user_id'])){
        header("Location: login.php");
         }else{

         }
    
?> 
<?php include 'includes/header.php';
 $id = $_GET['id'];
?>
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="index.html">home</a></li>
                        <li>our services</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<div class="alert alert-danger alert-dismissible" id="alertwrong" style="display:none;">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong id="txt">SORRY! Your password is wrong!</strong> 
                </div>
                <div class="alert alert-success alert-dismissible" id="alertok" style="display:none;">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong id="txt1">SORRY! Your password is wrong!</strong> 
                </div>


<!--services section area-->
<div class="unlimited_services">
    <div class="container my-5 ">
        <div class="trainer_booking text-center mb-5">
            <h2><strong>BOOKING</strong></h2>
        </div>
        <div class="row align-items-center ">
            <div class="col-lg-2 col-md-6 col-sm-12 col-12">
                <form id="book_trainer" method="post">
                    <div class="mb-3">
                        <div class="form-group">
                            <select class="form-control" name="day" id="exampleFormControlSelect1" placeholder="">
                                <option>Select Day</option>
                                <option>Saturday</option>
                                <option>Sunday</option>
                                <option>Tuesday</option>
                                <option>Wenesday</option>
                                <option>Thursday</option>
                                <option>Friday</option>
                            </select>
                        </div>
                    </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-12 col-12">
                    <div class="mb-3">
                        <div class="form-group">
                            <select class="form-control" name="session_duration" id="exampleFormControlSelect1" placeholder="">
                                <option>Session</option>
                                <option>Morning</option>
                                <option>Day</option>
                                <option>Evening</option>

                            </select>
                        </div>
                    </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-12 col-12">
                    <div class="mb-3">
                        <div class="form-group">
                            <select class="form-control" name="duration" id="exampleFormControlSelect1" placeholder="">
                                <option>Duration</option>
                                <option>1 Month</option>
                                <option>2 Month</option>
                                <option>3 Month</option>

                            </select>
                        </div>
                    </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-12 col-12">
                    <div class="mb-3">
                        <div class="form-group">
                            <select class="form-control" name="class" id="exampleFormControlSelect1" placeholder="">
                                <option>Class</option>
                                <option>Yogga</option>
                                <option>Weight Lifting</option>
                                <option>Chest</option>

                            </select>
                        </div>
                    </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-12 col-12">
                    <div class="mb-3">
                        <div class="form-group">
                            <select class="form-control" name="gender" id="exampleFormControlSelect1" placeholder="">
                                <option>Gender</option>
                                <option>Male</option>
                                <option>Female</option>

                            </select>
                        </div>
                    </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-12 col-12">
                    <div class="mb-3">
                        <div class="form-group">
                        <input type="hidden" name="book_trainer" value="1">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                            <button type="submit" class="btn btn-secondary btn-md">Book Trianer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
   
</div>

<!--services section end-->



<script>
    $(function () {
        $('#book_trainer').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                type: 'post',
                url: 'core/actions.php',
                data: $('#book_trainer').serialize(),
                success: function (val) {
                    console.log(val);
                    if (val == "0" || val == "") {
                        $("#txt").html("You Have Already Booked This Trainer!")
                                $("#alertwrong").fadeIn();
                                setTimeout(function () {
                                $("#alertwrong").fadeOut(3000);
                                location.reload();
                                }, 500);
                    } else {
                            $("#txt1").html("Trainer Booked!")
                                $("#alertok").fadeIn();
                                setTimeout(function () {
                                $("#alertok").fadeOut(3000);
                                location.replace('trainer_booking.php');
                                }, 500);
                        

                    }
                }
            });

        });
    })
</script>

<?php include 'includes/footer.php';
?>