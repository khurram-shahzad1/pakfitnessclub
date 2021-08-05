<?php
require '../../assets/db.php';
if (isset($_POST['signin'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($email==""|| $password=="") {
        echo "0";
    }else{
        $sql = "SELECT * FROM `admin` WHERE email='$email' AND `password`='$password'";
        $query = mysqli_query($conn,$sql);
        $data = mysqli_num_rows($query);
        if ($data == "0") {
            echo 0;
        
        }
        else{
            echo 1;
            $info = mysqli_fetch_array($query);
            $uid = $info['id'];
            setcookie ('admin_id',$uid,time() + (86400 * 3) , '/');
            // echo mysqli_error($conn);
        }
    }

    
}


if(isset($_POST['membership'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $duration = $_POST['duration'];
    $description = $_POST['description'];
    $sql = "INSERT into `membership`(name,description,duration,price) VALUES ('$name', '$description', '$duration', '$price')";
    $query = mysqli_query($conn, $sql);

    if($query == "1") {
        echo 1;
    }else{
        echo 0;
        echo mysqli_error($conn);
    }

}

if (isset($_GET['signout'])) {

    setcookie("admin_id", "", time() - 3600, '/');

    header("Location: ../index.php");
}


if(isset($_POST['newCategory'])) {
    $name = $_POST['name'];
    $sql = "INSERT into categories (`name`) VALUES ('$name')";
    $query = mysqli_query($conn, $sql);

    if($query == "1") {
        echo 1;
    }else{
        echo 0;
        echo mysqli_error($conn);
    }

}


if(isset($_POST['delcat'])){
    $id = $_POST['id'];

    $sql = "DELETE FROM categories WHERE id='$id'";
    $query = mysqli_query($conn,$sql);

    if($query == "1"){
        echo 1;
    }else{
        echo 0;
        echo mysqli_error($conn);
    }
}

if(isset($_POST['delmembership'])){
    $id = $_POST['id'];

    $sql = "DELETE FROM membership WHERE id='$id'";
    $query = mysqli_query($conn,$sql);

    if($query == "1"){
        echo 1;
    }else{
        echo 0;
        echo mysqli_error($conn);
    }
}


if(isset($_POST['deluser'])){
    $id = $_POST['id'];

    $sql = "DELETE FROM user WHERE id='$id'";
    $query = mysqli_query($conn,$sql);

    if($query == "1"){
        echo 1;
    }else{
        echo 0;
        echo mysqli_error($conn);
    }
}




if (isset($_POST['updateCat'])) {
    $id = $_POST['catid'];
    $cname = $_POST['name'];

    $sql = "UPDATE categories SET `name`='$cname' WHERE id='$id'";
    $query = mysqli_query($conn,$sql);
    if ($query == "1") {
        echo 1;
    }else{
        echo 0;
        echo mysqli_error($conn);
    }
}

if(isset($_POST['newProduct'])) {
    $cat = $_POST['catId'];
    $name = $_POST['pname'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    $target_dir = "../../assets/img/product/";
    $target_file = basename($_FILES["productImage"]["name"]);

    $path = $target_dir . $target_file;
    if (move_uploaded_file($_FILES["productImage"]["tmp_name"], $path)) {
        $insert = mysqli_query($conn, "INSERT into products (cat_id, `name`, `discription`, `image`, price ) VALUES ('$cat', '$name', '$description',  '$target_file', '$price') ");
        if($insert){
            echo 1;
        }else{
            echo mysqli_error($conn);
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}


if(isset($_POST['newtrainer'])) {
    $name = $_POST['name'];
    $experience = $_POST['experience'];
    $description = $_POST['description'];

    $target_dir = "../../assets/img/about/";
    $target_file = basename($_FILES["trainerImage"]["name"]);

    $path = $target_dir . $target_file;
    if (move_uploaded_file($_FILES["trainerImage"]["tmp_name"], $path)) {
        $insert = mysqli_query($conn, "INSERT into trainers (`name`, `image` , experience ,`discription` ) VALUES ('$name',  '$target_file' , '$experience' ,'$description') ");
        if($insert){
            echo 1;
        }else{
            echo mysqli_error($conn);
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

if (isset($_POST['edittrainer'])) {
    $id = $_POST['trainerid'];
    $name = $_POST['name'];
    $experience = $_POST['experience'];
    $description = $_POST['description'];

    if($_FILES['trainerImage']['name'] != ""){
        $target_dir = "../../assets/img/about/";
        $target_file = basename($_FILES["trainerImage"]["name"]);
    
        $path = $target_dir . $target_file;
        
        if (move_uploaded_file($_FILES["trainerImage"]["tmp_name"], $path)) {
            $update = mysqli_query($conn, "UPDATE trainers SET  `name`='$name' , `discription`='$description' , experience='$experience', `image` = '$target_file' WHERE id='$id'");
            if($update == '1'){
                echo '1';
            }else{
                echo mysqli_error($conn);
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }else{
        $update = mysqli_query($conn, "UPDATE trainers SET  `name`='$name' , `discription`='$description' , experience='$experience', `image` = '$target_file' WHERE id='$id'");
            if($update == '1'){
            echo '1';
        }else{
            echo mysqli_error($conn);
        }
    }

}


if (isset($_POST['delProduct'])) {
    $id = $_POST['id'];

    // $imageSQL = "SELECT `image` FROM products WHERE id = '$id'";
    // $imageQuery = mysqli_query($conn, $imageSQL);
    // $image = mysqli_fetch_array($imageQuery);
    // $imageName = $image[0];


    $image = mysqli_fetch_array(mysqli_query($conn, "SELECT `image` FROM products WHERE id = '$id'"))[0];

    unlink("../../assets/img/product/$image");

    $sql = "DELETE  FROM products WHERE id='$id'";
    $query = mysqli_query($conn,$sql);

    if ($query == "1") {
        echo 1;
    }else{
        echo 0;
        mysqli_error($conn);
    }
}


if (isset($_POST['deltrainer'])) {
    $id = $_POST['id'];

    // $imageSQL = "SELECT `image` FROM products WHERE id = '$id'";
    // $imageQuery = mysqli_query($conn, $imageSQL);
    // $image = mysqli_fetch_array($imageQuery);
    // $imageName = $image[0];


    $image = mysqli_fetch_array(mysqli_query($conn, "SELECT `image` FROM trainers WHERE id = '$id'"))[0];

    unlink("../../assets/img/about/$image");

    $sql = "DELETE  FROM trainers WHERE id='$id'";
    $query = mysqli_query($conn,$sql);

    if ($query == "1") {
        echo 1;
    }else{
        echo 0;
        mysqli_error($conn);
    }
}




if (isset($_POST['formpro'])) {
    $id = $_POST['proid'];
    $cat = $_POST['catId'];
    $name = $_POST['pname'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    if($_FILES['productImage']['name'] != ""){
        $target_dir = "../../assets/img/product/";
        $target_file = basename($_FILES["productImage"]["name"]);
    
        $path = $target_dir . $target_file;
        
        if (move_uploaded_file($_FILES["productImage"]["tmp_name"], $path)) {
            $update = mysqli_query($conn, "UPDATE products SET  cat_id ='$cat', `name`='$name' , `discription`='$description' , price='$price', `image` = '$target_file' WHERE id='$id'");
            if($update == '1'){
                echo '1';
            }else{
                echo mysqli_error($conn);
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }else{
        $update = mysqli_query($conn, "UPDATE products SET  cat_id ='$cat', `name`='$name' , `discription`='$description' , price='$price' WHERE id='$id'");
        if($update == '1'){
            echo '1';
        }else{
            echo mysqli_error($conn);
        }
    }

}
if(isset($_POST['acceptOrder'])){
    $oid = $_POST['acceptOrder'];

    echo mysqli_query($conn,"UPDATE orders SET `order_status` = '1' WHERE id = '$oid'");

}
if(isset($_POST['rejectOrder'])){
    $oid = $_POST['rejectOrder'];

    echo mysqli_query($conn,"UPDATE orders SET `order_status` = '2' WHERE id = '$oid'");
}

if(isset($_POST['booktrainer'])){
    $bid = $_POST['booktrainer'];

    echo mysqli_query($conn,"UPDATE book_trainer SET `booking_status` = '1' WHERE id = '$bid'");

}
if(isset($_POST['rejecttrainer'])){
    $bid = $_POST['rejecttrainer'];

    echo mysqli_query($conn,"UPDATE book_trainer SET `booking_status` = '2' WHERE id = '$bid'");
}

if(isset($_POST['addInventory'])){
    $pid = $_POST['addInventory'];
    $value = $_POST['value'];

    $preInv = mysqli_fetch_array(mysqli_query($conn, "SELECT inventory FROM products WHERE id = '$pid'"))[0];
    $newInv = $preInv + $value;
    echo mysqli_query($conn,"UPDATE products SET `inventory` = '$newInv' WHERE id = '$pid'");

}
if(isset($_POST['delInventory'])){
    $pid = $_POST['delInventory'];
    $value = $_POST['value'];

    $preInv = mysqli_fetch_array(mysqli_query($conn, "SELECT inventory FROM products WHERE id = '$pid'"))[0];
    if($preInv < $value){
        $newInv = 0;
    }else{
        $newInv = $preInv - $value;
    }
    if($value > 0){
        echo mysqli_query($conn,"UPDATE products SET `inventory` = '$newInv' WHERE id = '$pid'");
    }

  
}
if(isset($_POST['updateProdName'])){
    $pid = $_POST['updateProdName'];
    $newName = $_POST['newName'];

    echo mysqli_query($conn,"UPDATE products SET `name` = '$newName' WHERE id = '$pid'");
}
if(isset($_POST['updatenewprice'])){
    $pid = $_POST['updatenewprice'];
    $newprice = $_POST['newprice'];

    echo mysqli_query($conn,"UPDATE products SET `price` = '$newprice' WHERE id = '$pid'");
}

?>