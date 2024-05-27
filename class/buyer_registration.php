<?php
require_once 'connection.php';
class buyer_registration extends connection{
    public $conn;
    public $Fname;
    public $Lname;
    public $email;
    public $password1;
    public $p_number;

    public $profile_img;

    public function __construct($Fname,$Lname,$email,$password1,$profile_img,$p_number){//construct
        $this->Fname = $Fname;
        $this->Lname = $Lname;
        $this->email = $email;
        $this->password1 = $password1;
        $this->profile_img=$profile_img;
        $this->p_number=$p_number;
    }
   public function Registration(){//insert data in table buyer for registration
        $conn =  $this->con();
        // Hash the password
        $hashed_password = password_hash($this->password1, PASSWORD_DEFAULT);
        $stmt = "INSERT INTO `buyer`(`first_name`, `last_name`,`buyer_image`, `email`, `password`,`phone_number`) 
        VALUES ('$this->Fname','$this->Lname','$this->profile_img','$this->email','$hashed_password','$this->p_number')";
        $result = $conn->prepare( $stmt );

        if(!$result->execute()){
            echo "failed insert data!";
        }
        return true;
    }

    function checkEmail($email){
        $con = $this->con();
        $stmt = "SELECT * FROM `buyer` WHERE `email` = '$this->email' ";
        $result = $con->prepare($stmt);
        $result->execute();
        $total = $result->rowCount();

        return $total;
    }
}

?>
