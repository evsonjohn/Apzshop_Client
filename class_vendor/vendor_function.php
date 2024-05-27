<?php
require_once ("vendor_connection.php");
require_once ("vendor_orders.php");

function products($id){//sidplay all products 
    $connection = new vendor_connection();
    $conn = $connection ->con();
              
    $stmt = "SELECT * FROM `vendor_product` WHERE `product_category`='$id' AND `status`= 'approve' ";
    $db = $conn->prepare($stmt);
    $db->execute();
    $display = $db->fetchAll();

    return $display;
}
function display_img($id){//display all products by categories
    $connection = new vendor_connection();
    $conn = $connection ->con();
    
    $stmt1 = "SELECT * FROM `product_img` WHERE `product_id`='$id'";
    $db1 = $conn->prepare($stmt1);
    $db1->execute();
    $display = $db1->fetchAll();

    return $display;
}


function products_img($id){//display products pictures info when you click products pictures
    $connection = new vendor_connection();
    $conn = $connection ->con();
              
    $stmt = "SELECT * FROM `product_img` WHERE `product_id`='$id'";
    $db = $conn->prepare($stmt);
    $db->execute();
    $display = $db->fetch();

    return $display;
}

function prd_info($id){//display product information
    $connection = new vendor_connection();
    $conn = $connection ->con();
              
    $stmt = "SELECT * FROM `vendor_product` WHERE `product_id`='$id'";
    $db = $conn->prepare($stmt);
    $db->execute();
    $display = $db->fetch();

    return $display;
}
function prd_desc($id){//displat product description
    $connection = new vendor_connection();
    $conn = $connection ->con();
              
    $stmt = "SELECT * FROM `product_description` WHERE `product_id`='$id'";
    $db = $conn->prepare($stmt);
    $db->execute();
    $display = $db->fetch();

    return $display;
}
function prd_size($id){//displat product size
    $connection = new vendor_connection();
    $conn = $connection ->con();
              
    $stmt = "SELECT * FROM `prd_size` WHERE `product_id`='$id'";
    $db = $conn->prepare($stmt);
    $db->execute();
    $display = $db->fetch();

    return $display;
}
function prd_color($id){//displat product color
    $connection = new vendor_connection();
    $conn = $connection ->con();
              
    $stmt = "SELECT * FROM `prd_color` WHERE `product_id`='$id'";
    $db = $conn->prepare($stmt);
    $db->execute();
    $display = $db->fetch();

    return $display;
}
//generate order number
function insert_orderV() {
    if(isset($_POST['check_out'])) {
        $orders = new insert_orderV($_POST['vendor_id'],$_POST['buyer_id'], $_POST['buyer_name'], $_POST['prd_id'], $_POST['prd_name'],
        $_POST['total'], $_POST['qty'], $_POST['option_1'], $_POST['option_2'], $_POST['address'], $_POST['pay-method'],$_POST['ship_fee'],$_POST['phone_number']);
        $orders->insert_OrderV();
    }
    return true;
}
function vendor_info($id){
    $connection = new vendor_connection();
    $conn = $connection ->con();

    $stmt = "SELECT * FROM `vendor` WHERE `id` = '$id'";
    $db = $conn->prepare($stmt);
    $db->execute();
    $display = $db->fetch();

    return $display;
}
function products_info($id){//sidplay products 
    $connection = new vendor_connection();
    $conn = $connection ->con();
              
    $stmt = "SELECT * FROM `vendor_product` WHERE `product_id`='$id'";
    $db = $conn->prepare($stmt);
    $db->execute();
    $display = $db->fetch();

    return $display;
}

function search_prd($name) {
    // Sanitize input to prevent SQL injection
    $name = '%' . $name . '%'; // Add wildcards to search for partial matches

    $connection = new vendor_connection();
    $conn = $connection->con();

    $stmt = "SELECT * FROM `vendor_product` WHERE `product_name` LIKE :name AND `status`= 'approve'";
    $db = $conn->prepare($stmt);
    $db->bindParam(':name', $name, PDO::PARAM_STR);
    $db->execute();
    $results = $db->fetch();
    
    if ($results==null) {
        
        return null; // or return an empty array/object as per your requirement
    }
    return $results;
}

function order_received_vendor()
{
    if(isset($_POST['order_received'])){
    $order_list = $_POST['order_id'];   
    $connection = new vendor_connection();
    $conn = $connection->con();
    $stmt = "UPDATE `vendor_order` SET `order_status`='6' WHERE `order_id`='$order_list'";
    $result = $conn->prepare($stmt);
    $result->execute();
    }
    return true;
}

function cancel_order_vendor($order_id,$reason)
{
    $connection = new vendor_connection();
    $conn = $connection->con();
    $stmt = "INSERT INTO `order_cancelartion_v`(`order_id`, `reason`)
    VALUES ('$order_id','$reason')";
    $result = $conn->prepare($stmt);
    $result->execute();
    return true;
}

function cancel_order_v()
{
    if(isset($_POST['cancel_order'])){
    $order_list = $_POST['order_id'];   
    $connection = new vendor_connection();
    $conn = $connection->con();
    $stmt = "UPDATE `vendor_order` SET `order_status`='7' WHERE `order_id`='$order_list'";
    $result = $conn->prepare($stmt);
    $result->execute();
    }
    return true;
}
function buyer_review(){//insert ewview of product
    $connection = new vendor_connection();
    $conn = $connection->con();

    if(isset($_POST['submit_review'])){
    $star = $_POST['rating'];
    $buyer_id = $_POST['buyer_id'];
    $prd_id = $_POST['product_id'];
    $review = $_POST['review'];
    
    $stmt = "INSERT INTO `review`(`product_id`, `byer_id`, `review`, `star`) 
    VALUES ('$prd_id','$buyer_id','$review','$star')";
    $db = $conn->prepare($stmt);
    $db->execute();
    }
    return true;
}

function display_review($prd_id){
    $connection = new vendor_connection();
    $conn = $connection->con();

    $stmt = "SELECT * FROM `review` WHERE `product_id` = '$prd_id'";
    $db = $conn->prepare($stmt);
    $db->execute();
    $display = $db->fetchAll();

    return $display;

}

function display_review_star($prd_id){
    // Assuming vendor_connection is a class to establish a database connection
    $connection = new vendor_connection();
    $conn = $connection->con();

    // Prepare the SQL statement with a parameter
    $stmt = $conn->prepare("SELECT * FROM `review` WHERE `product_id` = :prd_id");

    // Bind the parameter
    $stmt->bindParam(':prd_id', $prd_id, PDO::PARAM_INT);

    // Execute the prepared statement
    $stmt->execute();

    // Fetch all rows as an associative array
    $display = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return the result
    return $display;
}



// Function to compute the average star rating for a product
function computeProductRating($product_id) {
    // Get all reviews for the product using display_review function
    $reviews = display_review_star($product_id);
    
    $total_ratings = 0;
    $num_reviews = count($reviews);
    
    // Calculate total ratings
    foreach ($reviews as $review) {
        $total_ratings += $review['star'];
    }
    
    // Calculate average rating
    if ($num_reviews > 0) {
        $average_rating = $total_ratings / $num_reviews;
        // Round to one decimal place
        $average_rating = round($average_rating, 1);
    } else {
        $average_rating = 0; // If there are no reviews, set average rating to 0
    }
    
    return $average_rating;
}
function order_list_vendor($id){//display order by user id
    $connection = new connection();
    $conn = $connection ->con();
    $stmt = "SELECT * FROM `vendor_order` WHERE `buyer_id` = '$id'";
    $result = $conn->prepare($stmt);
    $result->execute();
    $order_list = $result->fetchAll();
    return $order_list;
}

function order_info_vendor($id){//display order by order_id
    $connection = new connection();
    $conn = $connection ->con();
    $stmt = "SELECT * FROM `vendor_order` WHERE `order_id` = '$id'";
    $result = $conn->prepare($stmt);
    $result->execute();
    $order_list = $result->fetch();
    return $order_list;
}




// function check_order($buyer_id,$product_id){//check if the buyer order the item
//     $connection = new vendor_connection();
//     $conn = $connection->con();
//     $stmt = "SELECT * FROM `vendor_order` WHERE `buyer_id` = '$buyer_id' AND `product_id` = '$product_id' AND `order_status` = ''";
//     $db = $conn->prepare($stmt);
//     $db->execute();
// }



?>