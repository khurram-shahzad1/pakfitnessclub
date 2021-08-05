<?php
require 'assets/db.php';

    if (isset($_POST['qty'])) {
        $qty = $_POST['qty'];
        $pid = $_POST['pid'];
        $update=mysqli_query($conn, "UPDATE cart SET qty = '$qty' WHERE id = '$pid'");
        if ($update=='1') {
                echo '1';
            }else{
                echo '0';
            }
      }
?>