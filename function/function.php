<?php

function B_register()//registration
{
    if (isset($_POST["submit"])) { //registration
        $BuyerRegistration = new buyer_registration($_POST['Fname'], $_POST['Lname'],$_POST['email'],$_POST['password1'],$_POST['user_profile_picture'],$_POST['P_number']);
        
        if($BuyerRegistration->checkEmail($_POST['email'])== 0 ){//check email if you are have same email
            if ($BuyerRegistration->Registration()) {
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Registration successful. Your data has been inserted.</strong>
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close' onclick='redirectToLogin()'></button>
                      </div>";
            } else {
                echo "Error: Registration failed.";
            }
        }else{
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong>The email already Registered</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>";
        }

    }
 
}


function login(){//log in 
    if(isset($_POST["login"])) {
        $user_login = new buyer_login($_POST["username"], $_POST["password"]);
        if($user_login->login_buyer()){
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>Registration successful. Your data has been inserted.</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close' onclick='redirectToLogin()'></button>
              </div>";
             
        }else{
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong>Wrong email or password </strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>";
        }
    }
}

function user_Data($id){//Display the data of user
    $connection = new connection();
    $conn = $connection ->con();
    $stmt = ("SELECT * FROM `buyer` WHERE `buyer_id` = '$id' ");
    $db = $conn->prepare($stmt);
    $db->execute();
    $user = $db->fetch();
    return $user;

}
function user_Data_all($id){//Display the data of user using fetchAll
    $connection = new connection();
    $conn = $connection ->con();
    $stmt = ("SELECT * FROM `buyer` WHERE `buyer_id` = '$id' ");
    $db = $conn->prepare($stmt);
    $db->execute();
    $user = $db->fetchAll();
    return $user;

}

function userEdit_info(){//edit or update info
   
    if(isset($_POST["Submit"])){
        $userEdit_info = new updateUser_info($_POST["firstname"],$_POST["lastname"],$_POST["birthday"],$_POST["age"],$_POST["gender"],$_POST["phone_number"]);
    
        if ($userEdit_info->Edit_info($_POST["id"])) {
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong>Update Info successful.</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close' onclick='redirectToaccount()'></button>
                  </div>";
        } else {
            echo "Error: Update Info failed.";
        }
    }
}

function address_id_1($id){//Display ID of address_1
    $connection = new connection();
    $conn = $connection ->con();
    $stmt = ("SELECT * FROM `buyer_address` WHERE `buyer_ID` = '$id' AND `address` = 'Address_1'  ");
    $db = $conn->prepare($stmt);
    $db->execute();
    $user = $db->fetch();
    return $user;
}
function address_id_2($id){//Display ID of address_2
    $connection = new connection();
    $conn = $connection ->con();
    $stmt = ("SELECT * FROM `buyer_address` WHERE `buyer_ID` = '$id' AND `address` = 'Address_2'  ");
    $db = $conn->prepare($stmt);
    $db->execute();
    $user = $db->fetch();
    return $user;
}
function address($id){//Display ID by Adress ID
    $connection = new connection();
    $conn = $connection ->con();
    $stmt = ("SELECT * FROM `buyer_address` WHERE `address_id` = '$id' ");
    $db = $conn->prepare($stmt);
    $db->execute();
    $user = $db->fetch();
    return $user;
}

function user_address_1(){
    if(isset($_POST['Add'])){
        $userAddress = new user_address($_POST['street'],$_POST['barangay'],$_POST['city'],$_POST['zipcode'],$_POST['province'],$_POST['user_id'],$_POST['address_id']);
        
        if($userAddress->Address_1()){
            if(isset($_SESSION['redirect_url'])) {
                // If session URL is set, redirect to that URL
                $redirect_url = $_SESSION['redirect_url'];
                unset($_SESSION['redirect_url']); // Remove the saved URL from the session
                echo "<script>window.location.href = '$redirect_url';</script>";
            } else {
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong>Add  Address successful.</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close' onclick='redirectToaccount1()'></button>
                  </div>";
            }
        } else {
            echo "Error: Update Info failed.";
        }
    }
}








function user_address_2(){//add address 1 or edit address 1
    if(isset($_POST['Add'])){
        $userAddress = new user_address($_POST['street'],$_POST['barangay'],$_POST['city'],$_POST['zipcode'],$_POST['province'],$_POST['user_id'],$_POST['address_id']);
        
            if($userAddress->Address_2()){
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong>Add  Address successful.</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close' onclick='redirectToaccount1()'></button>
                  </div>";
            } else {
                echo "Error: Update Info failed.";
            }
    }  
}

function insert_image($user_id){//insert image in folder
    $connection = new connection();
    $conn = $connection ->con();//database connection

    if(isset($_POST['add_photo']) && isset($_FILES['image'])){
 
            $img_name = $_FILES['image']['name'];
            $img_size = $_FILES['image']['size'];
            $tmp_name = $_FILES['image']['tmp_name'];
            $error = $_FILES['image']['error'];

            if($error === 0){
                if( $img_size >155000){
                    $er ="Sorry your file is too large.";
                    echo "<script>window.location.href = 'account.php?error=$er';</script>"; 
                }else{
                    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                    $img_ex_lc = strtolower($img_ex);

                    $allowed_exs = array("jpg","jpeg","png");

                    if(in_array($img_ex_lc, $allowed_exs)){
                        //insert image n file
                        $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                        $img_upload_path = '../images/'. $new_img_name;
                        move_uploaded_file( $tmp_name,$img_upload_path);

                        //insert image in to database
                        $stmt = "UPDATE `buyer` SET `buyer_image`='$new_img_name' WHERE `buyer_id`='$user_id'";
                        $result = $conn->prepare($stmt);
                        $result->execute();
                        echo "<script>window.location.href = 'account.php';</script>";
                    }else{
                        $er = "unknown Error occured";
                        echo "<script>window.location.href = 'account.php?error=$er';</script>"; 
                    }
                }
            }else{
                $er = "unknown Error occured";
                echo "<script>window.location.href = 'account.php?error=$er';</script>"; 
            }    
    }else{
        $er = "unknown Error occured";
        
    }
}



function insert_cart($user_id){//insert buyer cart
    if(isset($_GET['addto_cart'])){
        $addto_cart = new insert_cart($_GET['vendor_id'],$user_id,$_GET['prd_id'],$_GET['product_name'],$_GET['prd_img'],$_GET['selectedcolor'],$_GET['selectedsize'],$_GET['qty'],$_GET['prd_price']);
        $qty = $addto_cart->cart_d();
        $total_qty =$qty['quantity'] + $_GET['qty'];
        if($addto_cart->cart1()== 1){//check if the cart has same value
            $addto_cart->update_cart($total_qty,$_GET['prd_id']);
        }else{
        $addto_cart->insert_cart();
        }
    }
    return true;
}

function view_cart($id){//display cart by buyer
    $connection = new connection();
    $conn = $connection ->con();
    $stmt = "SELECT * FROM `buyer_cart` WHERE `buyer_ID` = '$id'";
    $result = $conn->prepare($stmt);
    $result->execute();
    $cart = $result->fetchAll();
    return $cart;
}
function cart($id){//display cart by check out 
    $connection = new connection();
    $conn = $connection ->con();
    $stmt = "SELECT * FROM `buyer_cart` WHERE `cart_id` = '$id'";
    $result = $conn->prepare($stmt);
    $result->execute();
    $cart = $result->fetch();
    return $cart;
}

function delete_cart($id){//delete cart after checkout from cart
    $connection = new connection();
    $conn = $connection ->con();
    $stmt = "DELETE FROM `buyer_cart` WHERE `cart_id` = '$id'";
    $result = $conn->prepare($stmt);
    $result->execute();
}
function user_cart($id){//display user carts
    $connection = new connection();
    $conn = $connection ->con();
    $stmt = "SELECT * FROM `buyer_cart` WHERE `buyer_ID` = '$id'";
    $result = $conn->prepare($stmt);
    $result->execute();
    $cart = $result->fetchAll();
    return $cart;
}

function order_list($id){//display order by user id
    $connection = new connection();
    $conn = $connection ->con();
    $stmt = "SELECT * FROM `vendor_order` WHERE `buyer_id` = '$id'";
    $result = $conn->prepare($stmt);
    $result->execute();
    $order_list = $result->fetchAll();
    return $order_list;
}
function order_list_1($id){//display order by user id
    $connection = new connection();
    $conn = $connection ->con();
    $stmt = "SELECT * FROM `vendor_order` WHERE `buyer_id` = '$id'";
    $result = $conn->prepare($stmt);
    $result->execute();
    $order_list = $result->fetch();
    return $order_list;
}


function calculateEstimatedDelivery($startDate, $days) {
    // Convert start date to timestamp
    $startDateTimestamp = strtotime($startDate);
    
    // Calculate delivery date timestamp
    $deliveryDateTimestamp = strtotime("+$days days", $startDateTimestamp);
    
    // Convert delivery date timestamp back to readable date format
    $deliveryDate = date("Y-m-d", $deliveryDateTimestamp);
    
    return $deliveryDate;
}
function cancel_order()
{
    if(isset($_POST['cancel_order'])){
    $order_list = $_POST['order_id'];   
    $connection = new connection();
    $conn = $connection ->con();
    $stmt = "UPDATE `vendor_order` SET `order_status`='7' WHERE `order_id`='$order_list'";
    $result = $conn->prepare($stmt);
    $result->execute();
    }
    return true;
}


function count_cart($id){
    $connection = new connection();
    $conn = $connection ->con();
    $stmt = "SELECT * FROM `buyer_cart` WHERE `buyer_ID` = '$id'";
    $result = $conn->prepare($stmt);
    $result->execute();
    $cart = $result->rowCount();
    return $cart;
}

function order_cancelationreason($order_id,$reason){
    $connection = new connection();
    $conn = $connection ->con();
    $stmt = "INSERT INTO `order_cancelation`(`order_id`, `reason`)
    VALUES ('$order_id','$reason')";
    $result = $conn->prepare($stmt);
    $result->execute();
    return true;
}
function cancel_reason($order_id){
    $connection = new connection();
    $conn = $connection ->con();
    $stmt = "SELECT * FROM `order_cancelation` WHERE `order_id` = '$order_id'";
    $result = $conn->prepare($stmt);
    $result->execute();
    $display = $result->fetch();

    return $display;
}

function check_order($order_id,$buyer_id){
    $connection = new connection();
    $conn = $connection ->con();
    $stmt = "SELECT * FROM `vendor_order` WHERE `order_id` = '$order_id' AND `buyer_id` = '$buyer_id' AND `order_status` = '6'";
    $result = $conn->prepare($stmt);
    $result->execute();

    $check_order = $result->rowCount();

    return $check_order;
}


?>

<script>// when you register you will go to login form
function redirectToLogin() {
    window.location.href = 'login.php';
}
function redirectToaccount() {
    window.location.href = 'account.php';
}
function redirectToaccount1() {
    window.location.href = 'account.php';
}
function redirectToorderlist() {
    window.location.href = 'order_list.php';
}

function redirectToSession() {
    session_start();
                if(isset($_SESSION['redirect_url'])) {
                    $redirect_url = $_SESSION['redirect_url'];
                    unset($_SESSION['redirect_url']); // Alisin ang saved URL mula sa session
                    window.location.href = '$redirect_url';
                }
}
</script>

