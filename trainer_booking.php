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
                        <li>our services</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->
<!--services section area-->
<div class="unlimited_services">
    <div class="container my-5">

        <div class="my-5">
            <h2 class="text-center ">Our Trainers</h2>
        </div>
    
        <div class="row align-items-center">

        <?php
                include 'assets/db.php';
                $sql = "SELECT * FROM trainers";
                $query = mysqli_query($conn, $sql);
                while ($data = mysqli_fetch_array($query)) { ?> 
            <div class="col-lg-6 col-md-12">
                <div class="unlimited_services_content text-left">
                    <div class="card mb-3 shadow" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img class="pt-3 pl-4" src="assets/img/about/<?php echo $data['image'];?>" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h4 class="card-title"><strong><?php echo $data['name'];?></strong></h4>
                                    <p><small><?php echo $data['experience'];?></small></p>
                                    <p class="card-text"><?php echo $data['discription'];?></p>
                                    <div class="view__work">
                                        <a href="booking.php?id=<?php echo $data['id'];?>">Booking Now <i class="fa fa-angle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           <?php 
           }
        ?>
    </div>
</div>
<!--services section end-->
<?php include 'includes/footer.php' ;
?>