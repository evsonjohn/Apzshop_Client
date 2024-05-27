<?php
class updateUser_info extends connection{
   public $firstname;
   public $lastname;
   public $birthday;
   public $age;
   public $gender;
   public $phone_number;
   public $id;
   public function __construct($firstname,$lastname,$birthday,$age,$gender,$phone_number){
    $this->firstname = $firstname;
    $this->lastname = $lastname;
    $this->birthday = $birthday;
    $this->age = $age;
    $this->gender = $gender;
    $this->phone_number = $phone_number;
   }

   public function Edit_info($id){
    $con = $this->con();
    $stmt = "UPDATE `buyer` SET `first_name`='$this->firstname',`last_name`='$this->lastname',
    `gender`='$this->gender',`age`=' $this->age',`birthday`='$this->birthday',`phone_number`='$this->phone_number'  WHERE `buyer_id`='$id'";
    $result = $con->prepare($stmt);
    $result->execute();
    return true;
   }
}



?>