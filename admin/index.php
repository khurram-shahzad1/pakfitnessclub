<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="https://use.fontawesome.com/2bb349828a.js"></script>
    <style>
body {
  font-family: Arial, Helvetica, sans-serif;
}

.flip-card {
  background-color: transparent;
  width: 300px;
  height: 300px;
  perspective: 1000px;
}

.flip-card-inner {
  position: relative;
  width: 100%;
  height: 100%;
  text-align: center;
  transition: transform 0.6s;
  transform-style: preserve-3d;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
}

.flip-card:hover .flip-card-inner {
  transform: rotateY(180deg);
}

.flip-card-front, .flip-card-back {
  position: absolute;
  width: 100%;
  height: 100%;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
}

.flip-card-front {
  background-color: #bbb;
  color: black;
}

.flip-card-back {
  /* background-color: #2980b9; */
  color: white;
  transform: rotateY(180deg);
}
#lrki{
    background-image: url(lrki.jpg);
    width: 100%;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;  
}
</style>

</head>
<body id="lrki">
    <div class="alert alert-success alert-dismissible" style="display:none;" id="alertSuccess">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Success!</strong> Indicates a successful or positive action.
    </div>
    <div class="alert alert-danger alert-dismissible"  id="alertFailed" style="display:none;">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Not Success!</strong> Indicates a not successful or negtive action.
    </div>
    <br><br>
   <div class="container text-center mt-5">
   <br>
        <!-- <h1>Please Sign-In</h1> -->
        <!-- <h3>Hover over the image below:</h3> -->

        <div class="flip-card text-center" style="margin-left: 400px;">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                <img src="admin.jpg" style="width:300px;height:300px;">
            </div>
            <div class="flip-card-back">
            <br><br>
                <form id="adminForm">
                    <div class="container">
                        <h4 style="color:black;">Email</h4>
                        <input type="email" name="email" class="form-control">
                        <h4 style="color:black;">Password</h4>
                        <input type="password" name="password" class="form-control">
                        <input type="hidden" name="signin">
                        <br>
                        <input type="submit" name="sigin" class="btn btn-info" value="Log In">
                    </div>
                </form>
            </div>
        </div>
        </div>
   </div>
</body>
</html>
<script>
$(function (){
    $('#adminForm').on('submit',function(e){
        e.preventDefault();
        $.ajax({
            url : 'core/actions.php',
            type : 'POST',
            data : $('#adminForm').serialize(),
            success:function(val){
                console.log(val);
                if (val == "1"){
                    $('#alertSuccess').fadeIn(2000);
                    $('#alertFailed').fadeOut(3000);
                    setTimeout(() => {
                        location.replace('examples/dashboard.php');
                    }, 2000);
                }else{
                    $('#alertFailed').fadeIn(2000);
                    $('#alertSuccess').fadeOut(3000);
                }
            }
        })
    })
});
</script>