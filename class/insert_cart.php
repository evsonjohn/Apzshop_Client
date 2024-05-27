<?php

class insert_cart extends connection{

    public $buyer_id;
    public $product_id;
    public $product_name;
    public $product_picture;
    public $option_1;
    public $option_2;
    public $quantity;
    public $price;
    public $vendor_id;

public function  __construct($vendor_id,$buyer_id,$product_id,$product_name,$product_picture,$option_1,$option_2,$quantity,$price){
    $this->vendor_id=$vendor_id;
    $this->buyer_id=$buyer_id;
    $this->product_id=$product_id;
    $this->product_name=$product_name;
    $this->product_picture=$product_picture;
    $this->option_1=$option_1;
    $this->option_2=$option_2;
    $this->quantity=$quantity;
    $this->price=$price;
}

public function insert_cart(){
    $con = $this->con();
    $stmt = "INSERT INTO `buyer_cart`(`buyer_ID`,`vendor_id`, `product_id`, `product_name`, `product_picture`, `option_1`, `option_2`, `quantity`,`price`)
     VALUES ('$this->buyer_id','$this->vendor_id','$this->product_id','$this->product_name','$this->product_picture','$this->option_1','$this->option_2','$this->quantity','$this->price')";
     $result = $con->prepare($stmt);
     $result->execute();
    
}
public function cart_d(){
    $con = $this->con();
    $stmt = "SELECT * FROM `buyer_cart` WHERE `product_id` = '$this->product_id'";
    $result = $con->prepare($stmt);
    $result->execute();
    $cart = $result->fetch();
    return $cart;
}
public function update_cart($total,$prd_id){//update if same id and size and color
    $con = $this->con();
    $stmt = "UPDATE `buyer_cart` SET `quantity`='$total' WHERE `product_id` = '$prd_id'";
    $result = $con->prepare($stmt);
    $result->execute(); 
        
     
}
public function cart1(){//display cart by buyer
    $con = $this->con();
    $stmt = "SELECT * FROM `buyer_cart` WHERE `product_id` = '$this->product_id' AND `option_1`= '$this->option_1' AND  `option_2`= '$this->option_2'";
    $result = $con->prepare($stmt);
    $result->execute();
    $cart = $result->rowCount();
    return $cart;
}
}
?>