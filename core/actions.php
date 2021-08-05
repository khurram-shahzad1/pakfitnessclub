<?php
require '../assets/db.php';


if (isset($_POST['signUpForm'])) {
    $user_name=$_POST['user_name'];
    $user_email=$_POST['user_email'];
    $user_mobile=$_POST['user_mobile'];
    $user_password=$_POST['user_password'];
    $sql_e = "SELECT * FROM user WHERE user_email='$user_email'";
    $res_e = mysqli_query($conn, $sql_e);	
    if(mysqli_num_rows($res_e) > 0){
        echo 0;
      }
    elseif ($user_name==""|| $user_email==""|| $user_password==""|| $user_mobile=="") {
        echo 1;
    }

    else {
        $sql="INSERT into `user` (user_name,user_email,user_password,user_mobile) VALUES ('$user_name','$user_email' , '$user_password', '$user_mobile')";
        
        $query=mysqli_query($conn, $sql);

        if ($query) {
            echo 2;
        }

        else {
            echo 1;
        }
    }
}


if (isset($_POST['signInForm'])) {
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];

    if ($user_email==""|| $user_password=="") {
        echo "0";
    }
    else {
            $sql="SELECT * FROM `user` WHERE user_email = '$user_email' AND `user_password` = '$user_password'";

            $query=mysqli_query($conn, $sql);

            if (mysqli_num_rows($query) > 0) {

                $data=mysqli_fetch_array($query);

                setcookie("user_id", $data['id'], time() + (86400 * 3), '/');

                echo $data['id'];
                

            }

            else {
                echo "0";
            }
        }
    }

    if (isset($_GET['signout'])) {

        setcookie("user_id", "", time() - 3600, '/');
    
        header("Location: ../index.php");
    }
   
if (isset($_POST['ModalData'])) {
    $prodId=$_POST['ModalData'];
    $query=mysqli_query($conn, "SELECT * FROM products WHERE id = '$prodId'");
    $fetch=mysqli_fetch_array($query);
    echo json_encode($fetch);
}  

    if(isset($_POST['productId'])) {
        $prodId=$_POST['productId'];
        $userId=$_COOKIE['user_id'];
        $product_qty=$_POST['product_qty'];
        $product_size=$_POST['product_size'];
    
        if(isset($_COOKIE['user_id'])) {
            $sql="SELECT * FROM cart WHERE product_id = '$prodId' AND user_id = '$userId' AND size = '$product_size' ";
            $run_query=mysqli_query($conn, $sql);
            $count=mysqli_num_rows($run_query);
            if($count > 0) {
                $data = mysqli_fetch_array($run_query)['qty'];
                $product_qty2 = $product_qty + $data;
                $sqlUp = "UPDATE cart SET qty = '$product_qty2' WHERE product_id = '$prodId' AND user_id = '$userId' AND size = '$product_size' ";
                $queryUp = mysqli_query($conn, $sqlUp);
                if ($queryUp) {
                    echo "1"; 
                }else{
                    echo mysqli_error($conn);
                }
            }
            else {
                $sql="INSERT INTO cart (product_id, user_id, qty,size) VALUES ('$prodId','$userId','$product_qty','$product_size')";
    
                if(mysqli_query($conn, $sql)) {
                    echo "1";
                }
            }
        }
    
        
    }

    if (isset($_POST['removefromcart'])) {
        $removeId=$_POST['removeId'];
        $del=mysqli_query($conn, "DELETE FROM cart WHERE id = '$removeId'");
    
        if ($del=='1') {
            echo '1';
        }
    }

    if (isset($_POST['removefromwishlist'])) {
        $removeId=$_POST['removeId'];
        $del=mysqli_query($conn, "DELETE FROM saved_products WHERE id = '$removeId'");
    
        if ($del=='1') {
            echo '1';
        }
    }
    
if (isset($_POST['wishlist_manage'])) {
    $prodId=$_POST['wishlist_manage'];
        $user_id=$_COOKIE['user_id'];
        if(mysqli_num_rows(mysqli_query($conn,"select * from saved_products where user_id='$user_id' and product_id='$prodId'"))>0){
            echo "0";
        }else{
            mysqli_query($conn,"insert into saved_products(user_id,product_id) values('$user_id','$prodId')");
            echo "1";
        }
    }

    
if (isset($_POST['order'])) {
    $user_id=$_COOKIE['user_id'];
    $f_name=$_POST['f_name'];
    $l_name=$_POST['l_name'];
    $s_address=$_POST['s_address'];
    $city=$_POST['city'];
    $country=$_POST['country'];
    $p_code=$_POST['p_code'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $check_method=$_POST['check_method'];
    $pro_id=$_POST['pro_id'];
    $qty=$_POST['qty'];
    $size=$_POST['size'];
    $amount=$_POST['amount'];
    if ($f_name==""|| $l_name=="" || $user_id=="" || $s_address=="" || $city=="" || $country=="" || $p_code==""|| $email==""|| $phone=="" || $check_method=="" || $pro_id=="" || $qty=="" || $size=="" || $amount=="") {
        echo "0";
    }

    else {
        $sql="INSERT into `orders` (user_id,f_name,l_name,s_address,city,country,p_code,email,phone,check_method,pro_id,qty,size,amount) VALUES ('$user_id','$f_name','$l_name','$s_address','$city','$country','$p_code','$email','$phone','$check_method','$pro_id','$qty','$size','$amount')";

        $query=mysqli_query($conn, $sql);
        $delete_cart = "delete from cart where user_id='$user_id'";
        $run_delete = mysqli_query($conn,$delete_cart);


        if ($query) {
            echo "1";
        }

        else {
            echo "1";
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

if (isset($_POST['book_trainer'])) {
    $user_id=$_COOKIE['user_id'];
    $day=$_POST['day'];
    $session_duration=$_POST['session_duration'];
    $duration=$_POST['duration'];
    $class=$_POST['class'];
    $gender=$_POST['gender'];
    $id=$_POST['id'];
    $sql_e = "SELECT * FROM book_trainer WHERE trainer_id='$id'";
    $res_e = mysqli_query($conn, $sql_e);	
    if(mysqli_num_rows($res_e) > 0){
        echo "0";
      }
    else if ($day==""|| $session_duration=="" || $user_id=="" || $duration=="" || $class=="" || $gender=="" || $id=="" ) {
        echo "0";
    }

    else {
        $sql="INSERT into `book_trainer` (user_id,trainer_id,day,session_duration,duration,class,gender) VALUES ('$user_id','$id','$day','$session_duration','$duration','$class','$gender')";

        $query=mysqli_query($conn, $sql);
        if ($query) {
            echo "1";
        }

        else {
            echo "0";
        }
    }
}


if (isset($_POST['updateuser'])) {
    $user_name=$_POST['user_name'];
    $user_email=$_POST['user_email'];
    $user_mobile=$_POST['user_mobile'];
    $user_password=$_POST['user_password'];
    $userId=$_COOKIE['user_id'];
    if ($user_name==""|| $user_email==""|| $user_password==""|| $user_mobile=="") {
        echo 0;
    }

    else {
        $sql="UPDATE user SET `user_name` = '$user_name' , `user_email`='$user_email' , `user_mobile`='$user_mobile' , `user_password`='$user_password' WHERE id = '$userId'";

        $query=mysqli_query($conn, $sql);

        if ($query) {
            echo 1;
        }

        else {
            echo 0;
        }
    }
}

?>