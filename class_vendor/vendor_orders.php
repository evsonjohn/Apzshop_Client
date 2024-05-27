<?php
require_once ("vendor_connection.php");

class insert_orderV {

    public $buyer_id;
    public $buyer_name;
    public $product_id;
    public $prd_name;
    public $total;
    public $qty;
    public $option_1;
    public $option_2;
    public $shipping_addid;
    public $payment_method;
    public $vendor_id;
    public $ship_fee;
    public $phone_nu;
    public function __construct($vendor_id,$buyer_id,$buyer_name,$product_id,$prd_name,$total,$qty,$option_1,
    $option_2,$shipping_addid,$payment_method,$ship_fee,$phone_nu) {

        $this->vendor_id = $vendor_id;
        $this->buyer_id = $buyer_id;
        $this->buyer_name = $buyer_name;
        $this->product_id = $product_id;
        $this->prd_name = $prd_name;
        $this->total = $total;
        $this->qty = $qty;
        $this->option_1 = $option_1;
        $this->option_2 = $option_2;
        $this->shipping_addid = $shipping_addid;
        $this->payment_method = $payment_method;
        $this->ship_fee = $ship_fee;
        $this->phone_nu = $phone_nu;
    
    }

    public function insert_OrderV(){//insert order for buyer
        $connection = new vendor_connection();
        $con = $connection ->con();

        $stmt = "INSERT INTO `vendor_order`(`vendor_id`,`product_id`, `product_name`, `buyer_name`, `buyer_id`, `buyer_add`,`phone_number`, `product_qty`, `price`, `option_1`, `option_2`,`shipping_fee`, `payment_method`) 
        VALUES ('$this->vendor_id','$this->product_id','$this->prd_name','$this->buyer_name','$this->buyer_id','$this->shipping_addid','$this->phone_nu','$this->qty','$this->total','$this->option_1','$this->option_2','$this->ship_fee','$this->payment_method')";
        $db = $con->prepare($stmt);
        $db->execute();
        
    }

}
?>