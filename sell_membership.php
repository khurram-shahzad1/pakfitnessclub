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
                            <li>Sell Membership</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->
    
    <!--contact map start-->
    <div class="mt-60">
    </div>
    <!--contact map end-->
    
    <!--contact area start-->
    <div class="contact_area">
        <div class="container ">   
            <div class="row ">
            <div class="col-lg-2 col-md-12"></div>               
                <div class="col-lg-8 col-md-12 shadow p-5">
                   <div class="contact_message form">
                        <h3>Sell Your Membership</h3>   
                        <form id="membership">
                                <div class="form-group">
                                    <label>Membership Name</label>
                                    <input type="text" class="form-control"  name="name" required placeholder="Add Membership Name">
                                </div>
                                <div class="form-group">
                                    <label>Product Price</label>
                                    <input type="number" class="form-control" name="price" required placeholder="Add Membership Price">
                                </div>
                            <p>       
                               <label>  Duration</label>
                               <input type="text" class="form-control"  name="duration" required placeholder="Add Membership Duration">
                            </p>
                            <div class="form-group">
                                    <label>Desctiption</label>
                                    <textarea name="description" id="" rows="5" class="form-control border"
                                        placeholder="Add Membership Description"></textarea>
                                      <input type="hidden" name="membership">

                                </div>   
                             
                            <button type="submit"> Submit</button>  
                            <p class="form-messege"></p>
                        </form> 

                    </div> 
                </div>
            <div class="col-lg-2 col-md-12"></div>               

            </div>
        </div>    
    </div>

    <!--contact area end-->
<script>
    $('#membership').on('submit', (function (e) {
            e.preventDefault();
            $.ajax({
                url: 'core/actions.php',
                type: 'POST',
                data: $('#membership').serialize(),
                success: function (data) {
                    console.log(data);
                    if (data == "1") {
                        setTimeout(() => {
                            location.replace('membership.php');
                        }, 1000);
                    } else {
                        setTimeout(() => {
                            location.replace('sell_membership.php');
                        }, 1000);
                    }
                }
            });
        }));
        </script>
    <?php include 'includes/footer.php';
?>