<?php
class user_address extends connection{
    public $street;
    public $barangay;
    public $city;
    public $zipcode;
    public $province;
    public $user_id;
    public $address_ID;

    public function __construct($street,$barangay,$city,$zipcode,$province,$user_id,$address_ID){
        $this->street=$street;
        $this->barangay=$barangay;
        $this->city=$city;
        $this->zipcode=$zipcode;
        $this->province=$province;
        $this->user_id=$user_id;
        $this->address_ID=$address_ID;
    }

    public function Address_1(){
        $con = $this->con();
        $stmt = "UPDATE `buyer_address` SET `street`='$this->street',`barangay`='$this->barangay',`city`='$this->city',
        `zip_code`='$this->zipcode',`province`='$this->province' WHERE `buyer_ID`='$this->user_id' AND `address` = 'Address_1' ";
        $result = $con->prepare($stmt);
        $result->execute();
        

        $stmt1 = "UPDATE `buyer` SET `address1_id`='$this->address_ID' WHERE `buyer_id`='$this->user_id'";//update in database of buyer of what address ID he/she have
        $result1 = $con->prepare($stmt1);
        $result1->execute();

        return true;
    } 

    public function Address_2(){
        $con = $this->con();
        $stmt = "UPDATE `buyer_address` SET `street`='$this->street',`barangay`='$this->barangay',`city`='$this->city',
        `zip_code`='$this->zipcode',`province`='$this->province' WHERE `buyer_ID`='$this->user_id' AND `address` = 'Address_2' ";
        $result = $con->prepare($stmt);
        $result->execute();

        $stmt1 = "UPDATE `buyer` SET `address2_id`='$this->address_ID' WHERE `buyer_id`='$this->user_id'";
        $result1 = $con->prepare($stmt1);
        $result1->execute();
        return true;
    }
    
}

?>