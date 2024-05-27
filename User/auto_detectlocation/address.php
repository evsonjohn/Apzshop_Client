<?php

require_once "../../class/connection.php";
// Database connection settings


// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $user_id= $_POST['user_id']?? "";
    $road = $_POST["road"] ?? "";
    $quarter = $_POST["quarter"] ?? "";
    $city = $_POST["city"] ?? "";
    $neighbourhood = $_POST["neighbourhood"] ?? "";
    $postcode = $_POST["postcode"] ?? "";
    $region = $_POST["region"] ?? "";
    $state_district = $_POST["state_district"] ?? "";
    $country = $_POST["country"] ?? "";
    $latitude = $_POST["latitude"] ?? "";
    $longitude = $_POST["longitude"] ?? "";

    // Create connection
    $connection = new connection();
    $conn = $connection ->con();
    // Prepare SQL statement to insert data into the database
    $sql = "UPDATE `buyer_address` SET `street`='$road',`barangay`='$quarter',`city`='$city',
    `zip_code`='$postcode',`province`='$region' WHERE `buyer_ID`= '$user_id' AND `address` = 'Address_1'";
    $db = $conn->prepare($sql);

    if ($db->execute() === TRUE) {
        echo "Data inserted successfully.";
    }  else {
        echo "Error: " . $sql . "<br>";
    }

    // Close connection
} else {
    // If the form is not submitted, return an error message
    echo "Error: Form not submitted.";
}
?>