<?php
class vendor_connection{
    private $username = "root";//username 
    private $password = "";//password
    private $option = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,//PDO
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
    private $pdo = null;

   public function con(){//connect to the database using PDO
    try{
      $this->pdo = new PDO('mysql:host=localhost;dbname=apz_shop_client', $this->username, $this->password, $this->option);
    }catch(PDOException $e){
        die($e->getMessage());
    }
    return $this->pdo;
}

}//https://www.w3schools.com/js/js_api_intro.asp


?>