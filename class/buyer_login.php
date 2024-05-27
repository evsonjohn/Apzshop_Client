<?php

require_once 'connection.php';

class buyer_login extends connection{
    public $username;
    public $password;

    public function __construct($username, $password){
        $this->username = $username;
        $this->password = $password;
    }

    public function login_buyer(){
        $conn = $this->con();
        $stmt = "SELECT * FROM `buyer` WHERE email ='$this->username'";
        $result = $conn->prepare($stmt);
        $result->execute();
        $user = $result->fetch();
        $total = $result->rowCount();

        if($total > 0){
            // Verify the hashed password
            if(password_verify($this->password, $user['password'])){
                // Redirect to checkout page if redirected from there
                session_start();
                if(isset($_SESSION['redirect_url'])) {
                    
                    $redirect_url = $_SESSION['redirect_url'];
                    unset($_SESSION['redirect_url']); // Alisin ang saved URL mula sa session
                    echo "<script>window.location.href = '$redirect_url';</script>";
                }
                
                // Redirect to index page
                echo "<script>window.location.href = '../index.php?id=$user[buyer_id]';</script>";
                $userS = new user_session();
                $userS->set_User($user);

                // Insert default addresses if not present
                if($this->checkAddress1($user['buyer_id']) == 0){
                    $addresses = array("Address_1", "Address_2"); // Array of addresses
                    foreach($addresses as $address) {
                        $stmt1 ="INSERT INTO `buyer_address`( `buyer_ID`, `address`) VALUES ('$user[buyer_id]', '$address')";
                        $result1 = $conn->prepare($stmt1);
                        $result1->execute();
                    }
                }
            } else {
                echo "Invalid password!";
                return false;
            }
        } else {
            echo "User not found!";
            return false;
        }
    }
    
    public function checkAddress1($address1_id){
        $con = $this->con();
        $stmt3 = "SELECT * FROM `buyer_address` WHERE `buyer_ID` = '$address1_id' ";
        $result3 = $con->prepare($stmt3);
        $result3->execute();
        $total = $result3->rowCount();

        return $total;
    }
}

?>
