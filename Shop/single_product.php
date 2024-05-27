<?php
session_start();
require_once "../function/init.php";
require_once "../class_vendor/vendor_function.php";

$_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];

if(isset($_SESSION['buyer1'])){//check if session have value of buyer
  $user_details = new user_session();
  $userSession = $user_details->get_User();
  $user_Data = user_Data($userSession['id']);//fetch data of user
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
  <title>Apz Shop Ecommerce</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/vendor.css">
    <link rel="stylesheet" type="text/css" href="../style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&family=Open+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  </head>
  <body>

    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
      <defs>
        <symbol xmlns="http://www.w3.org/2000/svg" id="link" viewBox="0 0 24 24">
          <path fill="currentColor" d="M12 19a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm5 0a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm0-4a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm-5 0a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm7-12h-1V2a1 1 0 0 0-2 0v1H8V2a1 1 0 0 0-2 0v1H5a3 3 0 0 0-3 3v14a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3V6a3 3 0 0 0-3-3Zm1 17a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-9h16Zm0-11H4V6a1 1 0 0 1 1-1h1v1a1 1 0 0 0 2 0V5h8v1a1 1 0 0 0 2 0V5h1a1 1 0 0 1 1 1ZM7 15a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm0 4a1 1 0 1 0-1-1a1 1 0 0 0 1 1Z"/>
        </symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" id="arrow-right" viewBox="0 0 24 24">
          <path fill="currentColor" d="M17.92 11.62a1 1 0 0 0-.21-.33l-5-5a1 1 0 0 0-1.42 1.42l3.3 3.29H7a1 1 0 0 0 0 2h7.59l-3.3 3.29a1 1 0 0 0 0 1.42a1 1 0 0 0 1.42 0l5-5a1 1 0 0 0 .21-.33a1 1 0 0 0 0-.76Z"/>
        </symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" id="category" viewBox="0 0 24 24">
          <path fill="currentColor" d="M19 5.5h-6.28l-.32-1a3 3 0 0 0-2.84-2H5a3 3 0 0 0-3 3v13a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3v-10a3 3 0 0 0-3-3Zm1 13a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-13a1 1 0 0 1 1-1h4.56a1 1 0 0 1 .95.68l.54 1.64a1 1 0 0 0 .95.68h7a1 1 0 0 1 1 1Z"/>
        </symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" id="calendar" viewBox="0 0 24 24">
          <path fill="currentColor" d="M19 4h-2V3a1 1 0 0 0-2 0v1H9V3a1 1 0 0 0-2 0v1H5a3 3 0 0 0-3 3v12a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3V7a3 3 0 0 0-3-3Zm1 15a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-7h16Zm0-9H4V7a1 1 0 0 1 1-1h2v1a1 1 0 0 0 2 0V6h6v1a1 1 0 0 0 2 0V6h2a1 1 0 0 1 1 1Z"/>
        </symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" id="heart" viewBox="0 0 24 24">
          <path fill="currentColor" d="M20.16 4.61A6.27 6.27 0 0 0 12 4a6.27 6.27 0 0 0-8.16 9.48l7.45 7.45a1 1 0 0 0 1.42 0l7.45-7.45a6.27 6.27 0 0 0 0-8.87Zm-1.41 7.46L12 18.81l-6.75-6.74a4.28 4.28 0 0 1 3-7.3a4.25 4.25 0 0 1 3 1.25a1 1 0 0 0 1.42 0a4.27 4.27 0 0 1 6 6.05Z"/>
        </symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" id="plus" viewBox="0 0 24 24">
          <path fill="currentColor" d="M19 11h-6V5a1 1 0 0 0-2 0v6H5a1 1 0 0 0 0 2h6v6a1 1 0 0 0 2 0v-6h6a1 1 0 0 0 0-2Z"/>
        </symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" id="minus" viewBox="0 0 24 24">
          <path fill="currentColor" d="M19 11H5a1 1 0 0 0 0 2h14a1 1 0 0 0 0-2Z"/>
        </symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" id="cart" viewBox="0 0 24 24">
          <path fill="currentColor" d="M8.5 19a1.5 1.5 0 1 0 1.5 1.5A1.5 1.5 0 0 0 8.5 19ZM19 16H7a1 1 0 0 1 0-2h8.491a3.013 3.013 0 0 0 2.885-2.176l1.585-5.55A1 1 0 0 0 19 5H6.74a3.007 3.007 0 0 0-2.82-2H3a1 1 0 0 0 0 2h.921a1.005 1.005 0 0 1 .962.725l.155.545v.005l1.641 5.742A3 3 0 0 0 7 18h12a1 1 0 0 0 0-2Zm-1.326-9l-1.22 4.274a1.005 1.005 0 0 1-.963.726H8.754l-.255-.892L7.326 7ZM16.5 19a1.5 1.5 0 1 0 1.5 1.5a1.5 1.5 0 0 0-1.5-1.5Z"/>
        </symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" id="check" viewBox="0 0 24 24">
          <path fill="currentColor" d="M18.71 7.21a1 1 0 0 0-1.42 0l-7.45 7.46l-3.13-3.14A1 1 0 1 0 5.29 13l3.84 3.84a1 1 0 0 0 1.42 0l8.16-8.16a1 1 0 0 0 0-1.47Z"/>
        </symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" id="trash" viewBox="0 0 24 24">
          <path fill="currentColor" d="M10 18a1 1 0 0 0 1-1v-6a1 1 0 0 0-2 0v6a1 1 0 0 0 1 1ZM20 6h-4V5a3 3 0 0 0-3-3h-2a3 3 0 0 0-3 3v1H4a1 1 0 0 0 0 2h1v11a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V8h1a1 1 0 0 0 0-2ZM10 5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v1h-4Zm7 14a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1V8h10Zm-3-1a1 1 0 0 0 1-1v-6a1 1 0 0 0-2 0v6a1 1 0 0 0 1 1Z"/>
        </symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" id="star-outline" viewBox="0 0 15 15">
          <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M7.5 9.804L5.337 11l.413-2.533L4 6.674l2.418-.37L7.5 4l1.082 2.304l2.418.37l-1.75 1.793L9.663 11L7.5 9.804Z"/>
        </symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" id="star-solid" viewBox="0 0 15 15">
          <path fill="currentColor" d="M7.953 3.788a.5.5 0 0 0-.906 0L6.08 5.85l-2.154.33a.5.5 0 0 0-.283.843l1.574 1.613l-.373 2.284a.5.5 0 0 0 .736.518l1.92-1.063l1.921 1.063a.5.5 0 0 0 .736-.519l-.373-2.283l1.574-1.613a.5.5 0 0 0-.283-.844L8.921 5.85l-.968-2.062Z"/>
        </symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" id="search" viewBox="0 0 24 24">
          <path fill="currentColor" d="M21.71 20.29L18 16.61A9 9 0 1 0 16.61 18l3.68 3.68a1 1 0 0 0 1.42 0a1 1 0 0 0 0-1.39ZM11 18a7 7 0 1 1 7-7a7 7 0 0 1-7 7Z"/>
        </symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" id="user" viewBox="0 0 24 24">
          <path fill="currentColor" d="M15.71 12.71a6 6 0 1 0-7.42 0a10 10 0 0 0-6.22 8.18a1 1 0 0 0 2 .22a8 8 0 0 1 15.9 0a1 1 0 0 0 1 .89h.11a1 1 0 0 0 .88-1.1a10 10 0 0 0-6.25-8.19ZM12 12a4 4 0 1 1 4-4a4 4 0 0 1-4 4Z"/>
        </symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" id="close" viewBox="0 0 15 15">
          <path fill="currentColor" d="M7.953 3.788a.5.5 0 0 0-.906 0L6.08 5.85l-2.154.33a.5.5 0 0 0-.283.843l1.574 1.613l-.373 2.284a.5.5 0 0 0 .736.518l1.92-1.063l1.921 1.063a.5.5 0 0 0 .736-.519l-.373-2.283l1.574-1.613a.5.5 0 0 0-.283-.844L8.921 5.85l-.968-2.062Z"/>
        </symbol>
      </defs>
    </svg>

    <div class="preloader-wrapper">
      <div class="preloader">
      </div>
    </div>

    <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasCart">
      <div class="offcanvas-header justify-content-center">
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>

      <div class="offcanvas-body">
        <div class="order-md-last">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-primary">Your cart</span>
            <span class="badge bg-primary rounded-pill"></span>
          </h4>
          <?php if(isset($_SESSION['buyer1'])){//if user is login ?>
          <?php $view_cart = view_cart($userSession['id']);// diplay cart 
          foreach($view_cart as $view_carts){?>
          <form action="checkout.php" method="get">
          <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-sm">
              <div>
                <h6 class="my-0"><?php echo $view_carts['product_name']; ?></h6>
                <input type="hidden" name="cart_id" value="<?php echo $view_carts['cart_id'];?>">
                <input type="hidden" name="prd_id" value="<?php echo $view_carts['product_id'];?>" > 
              </div>
              <div>
                <h6 class="my-0">Quantity: <?php echo $view_carts['quantity']; ?></h6>
                <span class="text-body-secondary">Price: <?php echo $view_carts['price']; ?></span>
              </div>
            </li>
          </ul>
  
          <button type="submit" name="checkout_cart" class="w-100 btn btn-primary btn-lg">Continue to checkout</button>
          </form>
          <br>
          <br>
        <?php }} ?>
          <a href="cart.php" class="w-100 btn btn-primary btn-lg"> Go to Cart </a>
        </div>
      </div>
    </div>
    
    <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasSearch">
      <div class="offcanvas-header justify-content-center">
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <div class="order-md-last">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-primary">Search</span>
          </h4>
          <form id="search-form" action="../search.php" method="post" class="d-flex mt-3 gap-0">
            <input class="form-control rounded-start rounded-0 bg-light" type="email" placeholder="What are you looking for?" aria-label="What are you looking for?">
            <button class="btn btn-dark rounded-end rounded-0" type="submit" name="submit_search">Search</button>
          </form>
        </div>
      </div>
    </div>

    <header>
      <div class="container-fluid">
        <div class="row py-3 border-bottom">
          
          <div class="col-sm-4 col-lg-3 text-center text-sm-start">
            <div class="main-logo">
              <a href="../index.php">
                <img src="../images/APZShop_photo.png" alt="logo" class="img-fluid">
              </a>
            </div>
          </div>
          
          <div class="col-md-5 offset-sm-2 offset-md-0 col-md-3 d-none d-lg-block">
          <div class="search-bar row bg-light mt-3 rounded-4 pb-3 pt-2 p-3">
            <div class="order-md-last">
              <form role="search" action="../search.php" method="post" class="d-flex mt-2 gap-0 ">
                <input class="form-control rounded-start rounded-0 bg-light" type="text" name="search_prd" placeholder="What are you looking for?" aria-label="What are you looking for?">
                <div class="col-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M21.71 20.29L18 16.61A9 9 0 1 0 16.61 18l3.68 3.68a1 1 0 0 0 1.42 0a1 1 0 0 0 0-1.39ZM11 18a7 7 0 1 1 7-7a7 7 0 0 1-7 7Z"/></svg>
                <button class="btn btn-primary rounded" type="submit" name="submit_search">Search</button>
              </div>
              </form>
            </div>
          </div>
          </div>
        
          <style>
            .smaller-profile-image {
                width: 40px;
                height: 40px;
            }
            .smaller-profile-image1 {
                width: 120px;
                height: 120px;
            }
          </style>
          
          <div class="col-sm-8 col-lg-4 d-flex justify-content-end gap-5 align-items-center mt-4 mt-sm-0 justify-content-center justify-content-sm-end">
            <div class="support-box text-end d-none d-xl-block">
            </div>

            <ul class="d-flex justify-content-end list-unstyled mx-2 mb-1 ">

              <li class="nav-item dropdown mb-1">
                  <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 
                  <img class="wd-35 ht-35 rounded-circle smaller-profile-image" 
                  src="../images/<?php  if(!isset($_SESSION['buyer1'])){echo "display_profile_photo.png";//check if the session has value
                  }else{ echo $user_Data['buyer_image'];} ?>" alt="profile">

                </a>
                  <div class="dropdown-menu p-3 mx-2" aria-labelledby="profileDropdown">
                      <div class="d-flex flex-column align-items-center border-bottom px-3 py-3">
                          <div class="mb-3">

                              <img class="wd-50 ht-50 rounded-circle smaller-profile-image1" 
                              src="../images/<?php  if(!isset($_SESSION['buyer1'])){echo "display_profile_photo.png";//check if the session has value
                              }else{ echo $user_Data['buyer_image'];} ?>" alt="profile">

                          </div>
                          <div class="text-center">

                              <p class="tx-16 fw-bolder"><?php if(!isset($_SESSION['buyer1'])){echo "Fullname";//check if the session has value
                              }else{ echo $user_Data['first_name']." ".$user_Data['last_name'];}?></p>

                              <p class="tx-12 text-muted"><?php if(!isset($_SESSION['buyer1'])){echo "Email";//check if the session has value
                              }else{ echo $user_Data['email'];}?></p>

                          </div>
                      </div>
                      <ul class="list-unstyled p-1">
                        <li class="dropdown-item py-2">
                          <a href="../User/account.php" class="text-body ms-0">
                            <i class="me-2 icon-md" data-feather="user"></i>
                            <span>Profile</span>
                          </a>
                        </li>
                        <li class="dropdown-item py-2">
                          <a href="../User/edit_info.php" class="text-body ms-0">
                            <i class="me-2 icon-md" data-feather="edit"></i>
                            <span>Edit Profile</span>
                          </a>
                        </li>
                        <li class="dropdown-item py-2">
                          <?php if(!isset($_SESSION['buyer1'])){echo "<a href=../User/login.php class=text-body ms-0>
                            <i class=me-2 icon-md data-feather=log-out></i>
                            <span>Log In</span>
                            </a>";
                            }else{ echo "<a href=../User/log_out.php class=text-body ms-0>
                            <i class=me-2 icon-md data-feather=log-out></i>
                            <span>Log Out</span>
                          </a>";}
                          ?>
                        </li>
                      </ul>
                    </div> 
                    <p>Profile</p>
                  </li>
                  
              <li>
                <a href="#" class=" p-4 mx-2">
                  <svg width="24" height="24" viewBox="0 0 24 24"><use xlink:href="#heart"></use></svg>
                </a>
              </li>

              <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"> 
              <li class="nav-item dropdown mb-1">
                   <a class="nav-link-dark dropdown-toggle  p-0.5 mx-1" href="#"  role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-truck fa-2x"></i>
                  </a>
                  <div class="dropdown-menu p-3 mx-2" aria-labelledby="profileDropdown">
                    <ul class="list-unstyled p-1">
                      <li class="dropdown-item py-2">
                        <a href="../Order_track_list_info_cancel/order_list.php" class="text-body ms-0">
                          <i class="me-2 icon-md" data-feather="user"></i>
                          <span>Order list</span>
                        </a>
                      </li>
                      <li class="dropdown-item py-2">
                        <a href="../Order_track_list_info_cancel/order_history.php" class="text-body ms-0">
                          <i class="me-2 icon-md" data-feather="edit"></i>
                          <span>Order History</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                  <p>&nbsp;&nbsp;Order</p>
              </li>


              <li class="d-lg-none">
                <a href="#" class=" p-3 mx-2" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart" aria-controls="offcanvasCart">
                  <svg width="35" height="35" viewBox="0 0 24 24"><use xlink:href="#cart"></use></svg>
                </a>
                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cart</p>
              </li>
              <li class="d-lg-none">
                <a href="#" class=" p-2 mx-1" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSearch" aria-controls="offcanvasSearch">
                  <svg width="35" height="35" viewBox="0 0 24 24"><use xlink:href="#search"></use></svg>
                </a>
                <p>&nbsp;&nbsp;&nbsp;Search</p>
              </li>
            </ul>

            <div class="cart text-end d-none d-lg-block dropdown mb-4 ">
              <button class="border-0 bg-transparent d-flex flex-column gap-2 lh-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart" aria-controls="offcanvasCart">
                <span class="fs-6 text-muted dropdown-toggle">Your Cart</span>
                <span class="cart-total fs-5 fw-bold"><?php
                if(isset($_SESSION['buyer1'])){
                  $cart = count_cart($userSession['id']); 
                  echo "Your cart: ".$cart;}
                  else{echo "Your cart: 0";}?></span>
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="container-fluid">
        <div class="row py-3">
          <div class="d-flex  justify-content-center justify-content-sm-between align-items-center">
            <nav class="main-menu d-flex navbar navbar-expand-lg">

              <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">

                <div class="offcanvas-header justify-content-center">
                  <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>

                <div class="offcanvas-body">           
                  <ul class="navbar-nav justify-content-end menu-list list-unstyled d-flex gap-md-3 mb-0">
                    <li class="nav-item active">
                      <a href="../index.php" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                      <a href="category.php?id=1" class="nav-link">Clothes</a>
                    </li>
                    <li class="nav-item">
                      <a href="category.php?id=2" class="nav-link">Shoes</a>
                    </li>
                    <li class="nav-item">
                      <a href="category.php?id=3" class="nav-link">Gadgets</a>
                    </li>
                    <li class="nav-item">
                      <a href="category.php?id=4" class="nav-link">Appliances</a>
                    </li>
                    <li class="nav-item">
                      <a href="category.php?id=5" class="nav-link">Fruits and Meat </a>
                  </ul>
                </div>
              </div>
            </nav>
            <div class="d-none d-lg-block">
              <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"> 
              <i class="fas fa-phone-alt" style="font-size: 1.5em;"></i>
              <div class="d-inline-block ml-2">
                  <span class="fs-6 text-muted">For Support?</span>
                  <h5 class="mb-0">+63-9776022316</h5>
              </div>
          </div>
          </div>
        </div>
      </div>
    </header>
    <?php 
    $prd_info1 = products_info($_GET['id']);//product info using fetch only
    $vendor_ifo = vendor_info($prd_info1['vendor_id']);//vendor info  ?>              
    <section id="selling-product" class="single-product mt-0 mt-md-5">
      <div class="container-fluid">
      <nav class="breadcrumb">
      <span class="breadcrumb-item active" aria-current="page" style="font-size: xx-large;"><?php echo "Shop Name: ".$vendor_ifo['shop_name']; ?></span>
      </nav>
        <div class="row g-5">
          <div class="col-lg-7">
            <div class="row flex-column-reverse flex-lg-row">
              <?php $id = $_GET['id'];//get product id
              $product_img = products_img($id);//get pproduct_image?>
              
              <div class="col-md-12 col-lg-2">
                <!-- product-thumbnail-slider -->
                <div class="swiper product-thumbnail-slider">
                  <div class="swiper-wrapper">
                    <div class="swiper-slide">
                      <img src="../images/product_pictures/<?php echo $product_img['1st_img'];?>" alt="" class="thumb-image img-fluid">
                    </div>
                    <div class="swiper-slide">
                      <img src="../images/product_pictures/<?php echo $product_img['2nd_img'];?>" alt="" class="thumb-image img-fluid">
                    </div>
                    <div class="swiper-slide">
                      <img src="../images/product_pictures/<?php echo $product_img['3rd_img'];?>" alt="" class="thumb-image img-fluid">
                    </div>
                    <div class="swiper-slide">
                      <img src="../images/product_pictures/<?php echo $product_img['4th_img'];?>" alt="" class="thumb-image img-fluid">
                    </div>
                    <div class="swiper-slide">
                      <img src="../images/product_pictures/<?php echo $product_img['1st_img'];?>" alt="" class="thumb-image img-fluid">
                    </div>
                  </div>
                </div>
                <!-- / product-thumbnail-slider -->
              </div>
               
              <div class="col-md-12 col-lg-10">
                <!-- product-large-slider -->
                <div class="swiper product-large-slider">
                  <div class="swiper-wrapper">
                    <div class="swiper-slide">
                      <div class="image-zoom" data-scale="2.5" data-image="../images/product_pictures/<?php echo $product_img['1st_img'];?>"><img
                          src="../images/product_pictures/<?php echo $product_img['1st_img'];?>" alt="product-large" class="img-fluid"></div>
                    </div>
                    <div class="swiper-slide">
                      <div class="image-zoom" data-scale="2.5" data-image="../images/product_pictures/<?php echo $product_img['2nd_img'];?>"><img
                          src="../images/product_pictures/<?php echo $product_img['2nd_img'];?>" alt="product-large" class="img-fluid"></div>
                    </div>
                    <div class="swiper-slide">
                      <div class="image-zoom" data-scale="2.5" data-image="../images/product_pictures/<?php echo $product_img['3rd_img'];?>"><img
                          src="../images/product_pictures/<?php echo $product_img['3rd_img'];?>" alt="product-large" class="img-fluid"></div>
                    </div>
                    <div class="swiper-slide">
                      <div class="image-zoom" data-scale="2.5" data-image="../images/product_pictures/<?php echo $product_img['4th_img'];?>"><img
                          src="../images/product_pictures/<?php echo $product_img['4th_img'];?>" alt="product-large" class="img-fluid"></div>
                    </div>
                    <div class="swiper-slide">
                      <div class="image-zoom" data-scale="2.5" data-image="../images/product_pictures/<?php echo $product_img['1st_img'];?>"><img
                          src="../images/product_pictures/<?php echo $product_img['1st_img'];?>" alt="product-large" class="img-fluid"></div>
                    </div>
                  </div>
                  <div class="swiper-pagination"></div>
                </div>
                <!-- / product-large-slider -->
              </div>
            </div>
          </div>
          <?php $prd_info = prd_info($id);//product info ?>
          <div class="col-lg-5">
            <div class="product-info">
              <div class="element-header">
                <h2 itemprop="name" class="display-6"><?php echo $prd_info['product_name'];?></h2>
                <div class="rating-container d-flex gap-0 align-items-center">
                <div class="rating-container d-flex gap-0 align-items-center">

                    <?php for ($i = 1; $i <= 5; $i++): //product rating
                      $product_rating = computeProductRating($id);?>
                      <div class="rating" data-rating="<?php echo $i; ?>">
                        <?php if ($i <= $product_rating): ?>
                          <svg width="32" height="32" class="text-primary"><use xlink:href="#star-solid"></use></svg>
                        <?php else: ?>
                          <svg width="32" height="32" class="text-secondary"><use xlink:href="#star-solid"></use></svg>
                        <?php endif; ?>
                      </div>
                    <?php endfor; ?>
                    <span class="rating-count"><?php echo "($product_rating)"; ?></span>
                    
                  </div>
              </div>
              <?php
              $price = $prd_info['product_price'];
              $increase = 0.30 * $price;
              $saleprice = $price + $increase;
              ?>
              <div class="product-price pt-3 pb-3">
                <strong class="text-primary display-6 fw-bold"><?php echo $prd_info['product_price']?></strong> Less 30%<del class="ms-2"><?php echo $saleprice; ?></del>
              </div>
              <p></p>
            <form id="productForm" action="checkout.php?" method="get">

                <input type="hidden" name="prd_id" value="<?php echo $id;?>" > 
                <input type="hidden" name="product_name" value="<?php echo $prd_info['product_name'];?>"> 
                <input type="hidden" name="prd_img" value="<?php echo $product_img['1st_img'];?>">
                <input type="hidden" name="prd_price" value ="<?php echo $prd_info['product_price'];?>">
                <input type="hidden" name="vendor_id" value ="<?php echo $prd_info['vendor_id'];?>">

              <?php if(!$prd_info['prd_color'] == null || $prd_info['prd_size'] == null ){//check if the category is clothes or shoes ?>
                <div class="cart-wrap py-5">
                    <?php 
                    // Split the string into an array using commas as delimiter
                    $colors = explode(',', $prd_info['prd_color']);

                    ?>
                    <div class="color-options product-select">
                        <div class="color-toggle" data-option-index="0">
                            <h6 class="item-title text-uppercase text-dark">Color:</h6>
                            <ul class="select-list list-unstyled d-flex">
                                <?php foreach($colors as $color): ?>
                                <li class="select-item pe-3" data-val="<?php echo $color; ?>" title="<?php echo $color; ?>">
                                    <a class="btn btn-light" onclick="selectColor(this)" data-color="<?php echo $color; ?>"><?php echo $color; ?></a>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>


                        <input type="hidden" id="selectedColor" name="selectedcolor" required>
                        <input type="hidden" id="selectedSize" name="selectedsize" required>
                    </div>

                    <?php
                    $size = explode(',', $prd_info['prd_size']);
                    ?>
                    <div class="swatch product-select" data-option-index="1">
                        <h6 class="item-title text-uppercase text-dark">Size:</h6>
                        <ul class="select-list list-unstyled d-flex">
                            <?php foreach($size as $sizes){ ?>
                            <li class="select-item pe-3" data-val="<?php echo $sizes; ?>">
                                <a  class="btn btn-light" onclick="selectSize(this)" data-size="<?php echo $sizes; ?>"><?php echo $sizes; ?></a>
                            </li>
                            <?php }?>
                        </ul>
                    </div>
                    <?php } ?>
                    <div class="stock-number text-dark"><em>Available Stock: <?php echo $prd_info['product_stock']?></em></div>
                        <div class="stock-button-wrap">

                            <div class="input-group product-qty" style="max-width: 150px;">
                                <span class="input-group-btn">
                                    <button type="button" class="quantity-left-minus btn btn-light btn-number"  data-type="minus" data-field="">
                                        <svg width="16" height="16"><use xlink:href="#minus"></use></svg>
                                    </button>
                                </span>
                                <input type="number" id="quantity" name="qty" class="form-control quantity input-number text-center" value="1" min="1" max="6">
                                <span class="input-group-btn">
                                    <button type="button" class="quantity-right-plus btn btn-light btn-number" data-type="plus" data-field="" >
                                        <svg width="16" height="16"><use xlink:href="#plus"></use></svg>
                                    </button>
                                </span>
                            </div>
                              
                                <div class="qty-button d-flex flex-wrap pt-3">
                                <button type="submit" name="buy_now" class="btn btn-primary py-3 px-4 text-uppercase me-3 mt-3" onclick="redirectToCheckout()">Buy now</button>
                                <button type="submit" id="addToCartBtn" name="addto_cart" class="btn btn-dark py-3 px-4 text-uppercase mt-3">Add to cart</button>                      
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  <script>

// Function to redirect to checkout page when "Buy now" button is clicked
function redirectToCheckout() {
    window.location.href = 'checkout.php'; // Redirect to checkout page
}
 
function selectColor(element) {
    // Remove the active class from all color buttons
    var colorButtons = document.querySelectorAll('.color-options .select-item a');
    colorButtons.forEach(function(button) {
        button.classList.remove('active');
    });
    // Add active class to the clicked color button
    element.classList.add('active');
    
    // Set the selected color value to the hidden input field
    var color = element.getAttribute('data-color');
    document.getElementById('selectedColor').value = color;
}

function selectSize(element) {
    // Remove the active class from all size buttons
    var sizeButtons = document.querySelectorAll('.swatch .select-item a');
    sizeButtons.forEach(function(button) {
        button.classList.remove('active');
    });
    // Add active class to the clicked size button
    element.classList.add('active');
    
    // Set the selected size value to the hidden input field
    var size = element.getAttribute('data-size');
    document.getElementById('selectedSize').value = size;
}

</script>

<style>
    /* Add a style for the active class to change the appearance of selected buttons */
    .select-item a.active {
        background-color: grey; /* Change to your desired color */
        color: white; /* Change to your desired color */
    }
</style>                            

    <section class="product-info-tabs py-5">
      <div class="container-fluid">
        <div class="row">
          <div class="d-flex flex-column flex-md-row align-items-start gap-5">
            <div class="nav flex-row flex-wrap flex-md-column nav-pills me-3 col-lg-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
              <button class="nav-link text-start active" id="v-pills-description-tab" data-bs-toggle="pill" data-bs-target="#v-pills-description" type="button" role="tab" aria-controls="v-pills-description" aria-selected="true">Description</button>
              <button class="nav-link text-start" id="v-pills-reviews-tab" data-bs-toggle="pill" data-bs-target="#v-pills-reviews" type="button" role="tab" aria-controls="v-pills-reviews" aria-selected="false">Customer Reviews</button>
            </div>
            <div class="tab-content" id="v-pills-tabContent">
              <div class="tab-pane fade show active" id="v-pills-description" role="tabpanel" aria-labelledby="v-pills-description-tab" tabindex="0">
                <?php
                $description = prd_desc($id);//product_description
                ?>
                <h5>Product Description</h5>
                <p><?php echo $description['description']?></p>
              </div>
              <div class="tab-pane fade" id="v-pills-additional" role="tabpanel" aria-labelledby="v-pills-additional-tab" tabindex="0">
              </div>


              <!--Review of people  -->
              <div class="tab-pane fade" id="v-pills-reviews" role="tabpanel" aria-labelledby="v-pills-reviews-tab" tabindex="0">
              <div class="row">
                <?php 
                $review_D = display_review($id); // display review

                // Loop through reviews
                 foreach($review_D as $review) {
                  $user_D = user_Data_all($review['byer_id']);
                  $star = $review['star'];
              ?>
              <!-- Review HTML -->
              <div class="col-md-6">
                  <div class="review-box d-flex flex-wrap mb-4">
                      <div class="col-md-9 d-flex flex-wrap gap-2">
                          <div class="col-md-2">
                              <?php foreach($user_D as $user){ ?>
                                  <div class="image-holder">
                                      <img src="../images/<?php echo  $user['buyer_image']; ?>" alt="review" class="img-fluid rounded-circle">
                                  </div>
                              <?php } ?>
                          </div>
                          <div class="col-md-8">
                              <div class="review-content">
                                  <!-- Star Rating Display -->
                                  <div class="rating-container d-flex align-items-center">
                                      <?php 
                                      // Loop to display the star icons based on the rating
                                      for ($i = 1; $i <= 5; $i++) {
                                          if ($i <= $star) {
                                              echo '<div class="rating text-primary"><svg width="24" height="24"><use xlink:href="#star-solid"></use></svg></div>';
                                          } else {
                                              echo '<div class="rating text-secondary"><svg width="24" height="24"><use xlink:href="#star-solid"></use></svg></div>';
                                          }
                                      }
                                      ?>
                                  </div>
              
                                  <!-- Review Header and Content -->
                                  <div class="review-header">
                                      <?php foreach($user_D as $user){ ?>
                                          <span class="author-name"><?php echo $user['first_name']." ".$user['last_name']; ?></span>
                                      <?php } ?>
                                      <br>
                                      <span class="review-date">Date: <?php echo $review['date']; ?> </span>
                                  </div>
                                  <p>Review:<?php echo $review['review']; ?> </p>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <?php } ?>
              
              </div>


                <div class="add-review mt-5">
                  <h3>Add a review</h3>
                  <p>Your email address will not be published. Required fields are marked *</p>
                  <form action=" " method="post">
                    <div class="pb-3">
                    <div class="review-rating">
                      <span>Your rating *</span>
                      <div class="rating-container">
                        <input type="hidden" name="rating" id="rating-input" value="0">
                        <span class="star" data-value="1">★</span>
                        <span class="star" data-value="2">★</span>
                        <span class="star" data-value="3">★</span>
                        <span class="star" data-value="4">★</span>
                        <span class="star" data-value="5">★</span>
                      </div>
                    </div>

                    <style>
                      .star {
                        font-size: 24px;
                        cursor: pointer;
                        color: #ccc;
                      }
                      .star:hover,
                      .star.active {
                        color: #ffcc00; /* Change color when hovered or active */
                      }
                    </style>

                    <script>
                      document.addEventListener("DOMContentLoaded", function() {
                        const stars = document.querySelectorAll('.star');
                        const ratingInput = document.getElementById('rating-input');

                        stars.forEach(function(star) {
                          star.addEventListener('click', function() {
                            const value = parseInt(star.getAttribute('data-value'));
                            ratingInput.value = value;

                            stars.forEach(function(s, index) {
                              if (index < value) {
                                s.classList.add('active');
                              } else {
                                s.classList.remove('active');
                              }
                            });
                          });
                        });
                      });
                    </script>
                    </div>
                    
                    <div class="pb-3">
                      <label>Your Review *</label>
                      <textarea class="form-control" name="review" placeholder="Write your review here"></textarea>
                    </div>
                    <input type="hidden" name="product_id" value="<?php echo $id ?>">
                    <input type="hidden" name="buyer_id" value="<?php echo $userSession['id']; ?>">
                    <div class="pb-3">
                      <label>
                        <input type="checkbox" required="">
                        <span class="label-body">Save my name, email, and website in this browser for the next time.</span>
                      </label>
                    </div>
                    <button type="submit" name="submit_review" class="btn btn-dark btn-large text-uppercase w-100">Submit</button>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- para bukas naman is display na ng mga na review taspo upload natin sa online paramasaya hahah -->
    <?php
    if(isset($_POST['submit_review'])){
      if(check_order($_GET['order_id'],$userSession['id']) == 1){//check if the product is order and received the product
            buyer_review();//insert review of buyer 
            echo '<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">';
            echo '    <div class="modal-dialog">';
            echo '        <div class="modal-content">';
            echo '            <div class="modal-header">';
            echo '                <h5 class="modal-title" id="successModalLabel">Success</h5>';
            echo '                <a href="../index.php" class="btn-close" data-dismiss="modal" aria-label="Close">&times;</a>';
            echo '            </div>';
            echo '            <div class="modal-body">';
            echo '                Success Review!';
            echo '            </div>';
            echo '            <div class="modal-footer">';
            echo '                <a href="../index.php" class="btn btn-secondary" data-dismiss="modal">Close</a>';
            echo '            </div>';
            echo '        </div>';
            echo '    </div>';
            echo '</div>';
            
            // Output JavaScript to trigger modal display and redirect
            echo '<script>';
            echo '    $(document).ready(function() {';
            echo '        $("#successModal").modal("show");';
            echo '        $("#successModal").on("hidden.bs.modal", function () {';
            echo '            window.location.href = "../index.php";'; // Change this to your desired redirect page
            echo '        });';
            echo '    });';
            echo '</script>';
            }else{//if the product not order yet
              echo '<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">';
              echo '    <div class="modal-dialog">';
              echo '        <div class="modal-content">';
              echo '            <div class="modal-header">';
              echo '                <h5 class="modal-title" id="successModalLabel">Not order yet</h5>';
              echo '                <a href="../index.php" class="btn-close" data-dismiss="modal" aria-label="Close">&times;</a>';
              echo '            </div>';
              echo '            <div class="modal-body">';
              echo '                The product not order yet';
              echo '            </div>';
              echo '            <div class="modal-footer">';
              echo '                <a href="../index.php" class="btn btn-secondary" data-dismiss="modal">Close</a>';
              echo '            </div>';
              echo '        </div>';
              echo '    </div>';
              echo '</div>';
              
              // Output JavaScript to trigger modal display and redirect
              echo '<script>';
              echo '    $(document).ready(function() {';
              echo '        $("#successModal").modal("show");';
              echo '        $("#successModal").on("hidden.bs.modal", function () {';
              echo '            window.location.href = "../index.php";'; // Change this to your desired redirect page
              echo '        });';
              echo '    });';
              echo '</script>';
            }
          }

    ?>

    <section id="related-products" class="product-store position-relative py-5">
      <div class="container-fluid">

        <div class="row">
          <div class="col-md-12">

            <div class="section-header d-flex justify-content-between my-5">
              
              <h2 class="section-title">Related Products</h2>

              <div class="d-flex align-items-center">
                <div class="swiper-buttons">
                  <button class="swiper-prev products-carousel-prev btn btn-primary">❮</button>
                  <button class="swiper-next products-carousel-next btn btn-primary">❯</button>
                </div>  
              </div>
            </div>
            
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">

            <div class="products-carousel swiper">
              <div class="swiper-wrapper">
                
                <div class="product-item swiper-slide">
                  <a href="#" class="btn-wishlist"><svg width="24" height="24"><use xlink:href="#heart"></use></svg></a>
                  <figure>
                    <a href="../product-single.html" title="Product Title">
                      <img src="../images/thumb-tomatoes.png"  class="tab-image">
                    </a>
                  </figure>
                  <h3>Sunstar Fresh Melon Juice</h3>
                  <span class="qty">1 Unit</span><span class="rating"><svg width="24" height="24" class="text-primary"><use xlink:href="#star-solid"></use></svg> 4.5</span>
                  <span class="price">$18.00</span>
                  <div class="d-flex align-items-center justify-content-between">
                    <div class="input-group product-qty">
                        <span class="input-group-btn">
                            <button type="button" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus" data-field="">
                              <svg width="16" height="16"><use xlink:href="#minus"></use></svg>
                            </button>
                        </span>
                        <input type="text" id="quantity" name="quantity" class="form-control input-number" value="10" min="1" max="100">
                        <span class="input-group-btn">
                            <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="">
                                <svg width="16" height="16"><use xlink:href="#plus"></use></svg>
                            </button>
                        </span>
                    </div>
                    <a href="#" class="nav-link">Add to Cart <iconify-icon icon="uil:shopping-cart"></a>
                  </div>
                </div>

                <div class="product-item swiper-slide">
                  <a href="#" class="btn-wishlist"><svg width="24" height="24"><use xlink:href="#heart"></use></svg></a>
                  <figure>
                    <a href="../product-single.html" title="Product Title">
                      <img src="../images/thumb-tomatoketchup.png"  class="tab-image">
                    </a>
                  </figure>
                  <h3>Sunstar Fresh Melon Juice</h3>
                  <span class="qty">1 Unit</span><span class="rating"><svg width="24" height="24" class="text-primary"><use xlink:href="#star-solid"></use></svg> 4.5</span>
                  <span class="price">$18.00</span>
                  <div class="d-flex align-items-center justify-content-between">
                    <div class="input-group product-qty">
                        <span class="input-group-btn">
                            <button type="button" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus" data-field="">
                              <svg width="16" height="16"><use xlink:href="#minus"></use></svg>
                            </button>
                        </span>
                        <input type="text" id="quantity" name="quantity" class="form-control input-number" value="10" min="1" max="100">
                        <span class="input-group-btn">
                            <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="">
                                <svg width="16" height="16"><use xlink:href="#plus"></use></svg>
                            </button>
                        </span>
                    </div>
                    <a href="#" class="nav-link">Add to Cart <iconify-icon icon="uil:shopping-cart"></a>
                  </div>
                </div>

                <div class="product-item swiper-slide">
                  <a href="#" class="btn-wishlist"><svg width="24" height="24"><use xlink:href="#heart"></use></svg></a>
                  <figure>
                    <a href="../product-single.html" title="Product Title">
                      <img src="../images/thumb-bananas.png"  class="tab-image">
                    </a>
                  </figure>
                  <h3>Sunstar Fresh Melon Juice</h3>
                  <span class="qty">1 Unit</span><span class="rating"><svg width="24" height="24" class="text-primary"><use xlink:href="#star-solid"></use></svg> 4.5</span>
                  <span class="price">$18.00</span>
                  <div class="d-flex align-items-center justify-content-between">
                    <div class="input-group product-qty">
                        <span class="input-group-btn">
                            <button type="button" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus" data-field="">
                              <svg width="16" height="16"><use xlink:href="#minus"></use></svg>
                            </button>
                        </span>
                        <input type="text" id="quantity" name="quantity" class="form-control input-number" value="10" min="1" max="100">
                        <span class="input-group-btn">
                            <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="">
                                <svg width="16" height="16"><use xlink:href="#plus"></use></svg>
                            </button>
                        </span>
                    </div>
                    <a href="#" class="nav-link">Add to Cart <iconify-icon icon="uil:shopping-cart"></a>
                  </div>
                </div>

                <div class="product-item swiper-slide">
                  <a href="#" class="btn-wishlist"><svg width="24" height="24"><use xlink:href="#heart"></use></svg></a>
                  <figure>
                    <a href="../product-single.html" title="Product Title">
                      <img src="../images/thumb-bananas.png"  class="tab-image">
                    </a>
                  </figure>
                  <h3>Sunstar Fresh Melon Juice</h3>
                  <span class="qty">1 Unit</span><span class="rating"><svg width="24" height="24" class="text-primary"><use xlink:href="#star-solid"></use></svg> 4.5</span>
                  <span class="price">$18.00</span>
                  <div class="d-flex align-items-center justify-content-between">
                    <div class="input-group product-qty">
                        <span class="input-group-btn">
                            <button type="button" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus" data-field="">
                              <svg width="16" height="16"><use xlink:href="#minus"></use></svg>
                            </button>
                        </span>
                        <input type="text" id="quantity" name="quantity" class="form-control input-number" value="10" min="1" max="100">
                        <span class="input-group-btn">
                            <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="">
                                <svg width="16" height="16"><use xlink:href="#plus"></use></svg>
                            </button>
                        </span>
                    </div>
                    <a href="#" class="nav-link">Add to Cart <iconify-icon icon="uil:shopping-cart"></a>
                  </div>
                </div>
                <div class="product-item swiper-slide">
                  <a href="#" class="btn-wishlist"><svg width="24" height="24"><use xlink:href="#heart"></use></svg></a>
                  <figure>
                    <a href="../product-single.html" title="Product Title">
                      <img src="../images/thumb-tomatoes.png"  class="tab-image">
                    </a>
                  </figure>
                  <h3>Sunstar Fresh Melon Juice</h3>
                  <span class="qty">1 Unit</span><span class="rating"><svg width="24" height="24" class="text-primary"><use xlink:href="#star-solid"></use></svg> 4.5</span>
                  <span class="price">$18.00</span>
                  <div class="d-flex align-items-center justify-content-between">
                    <div class="input-group product-qty">
                        <span class="input-group-btn">
                            <button type="button" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus" data-field="">
                              <svg width="16" height="16"><use xlink:href="#minus"></use></svg>
                            </button>
                        </span>
                        <input type="text" id="quantity" name="quantity" class="form-control input-number" value="10" min="1" max="100">
                        <span class="input-group-btn">
                            <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="">
                                <svg width="16" height="16"><use xlink:href="#plus"></use></svg>
                            </button>
                        </span>
                    </div>
                    <a href="#" class="nav-link">Add to Cart <iconify-icon icon="uil:shopping-cart"></a>
                  </div>
                </div>

                <div class="product-item swiper-slide">
                  <a href="#" class="btn-wishlist"><svg width="24" height="24"><use xlink:href="#heart"></use></svg></a>
                  <figure>
                    <a href="../product-single.html" title="Product Title">
                      <img src="../images/thumb-tomatoketchup.png"  class="tab-image">
                    </a>
                  </figure>
                  <h3>Sunstar Fresh Melon Juice</h3>
                  <span class="qty">1 Unit</span><span class="rating"><svg width="24" height="24" class="text-primary"><use xlink:href="#star-solid"></use></svg> 4.5</span>
                  <span class="price">$18.00</span>
                  <div class="d-flex align-items-center justify-content-between">
                    <div class="input-group product-qty">
                        <span class="input-group-btn">
                            <button type="button" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus" data-field="">
                              <svg width="16" height="16"><use xlink:href="#minus"></use></svg>
                            </button>
                        </span>
                        <input type="text" id="quantity" name="quantity" class="form-control input-number" value="10" min="1" max="100">
                        <span class="input-group-btn">
                            <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="">
                                <svg width="16" height="16"><use xlink:href="#plus"></use></svg>
                            </button>
                        </span>
                    </div>
                    <a href="#" class="nav-link">Add to Cart <iconify-icon icon="uil:shopping-cart"></a>
                  </div>
                </div>

                <div class="product-item swiper-slide">
                  <a href="#" class="btn-wishlist"><svg width="24" height="24"><use xlink:href="#heart"></use></svg></a>
                  <figure>
                    <a href="../product-single.html" title="Product Title">
                      <img src="../images/thumb-bananas.png"  class="tab-image">
                    </a>
                  </figure>
                  <h3>Sunstar Fresh Melon Juice</h3>
                  <span class="qty">1 Unit</span><span class="rating"><svg width="24" height="24" class="text-primary"><use xlink:href="#star-solid"></use></svg> 4.5</span>
                  <span class="price">$18.00</span>
                  <div class="d-flex align-items-center justify-content-between">
                    <div class="input-group product-qty">
                        <span class="input-group-btn">
                            <button type="button" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus" data-field="">
                              <svg width="16" height="16"><use xlink:href="#minus"></use></svg>
                            </button>
                        </span>
                        <input type="text" id="quantity" name="quantity" class="form-control input-number" value="10" min="1" max="100">
                        <span class="input-group-btn">
                            <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="">
                                <svg width="16" height="16"><use xlink:href="#plus"></use></svg>
                            </button>
                        </span>
                    </div>
                    <a href="#" class="nav-link">Add to Cart <iconify-icon icon="uil:shopping-cart"></a>
                  </div>
                </div>

                <div class="product-item swiper-slide">
                  <a href="#" class="btn-wishlist"><svg width="24" height="24"><use xlink:href="#heart"></use></svg></a>
                  <figure>
                    <a href="../product-single.html" title="Product Title">
                      <img src="../images/thumb-bananas.png"  class="tab-image">
                    </a>
                  </figure>
                  <h3>Sunstar Fresh Melon Juice</h3>
                  <span class="qty">1 Unit</span><span class="rating"><svg width="24" height="24" class="text-primary"><use xlink:href="#star-solid"></use></svg> 4.5</span>
                  <span class="price">$18.00</span>
                  <div class="d-flex align-items-center justify-content-between">
                    <div class="input-group product-qty">
                        <span class="input-group-btn">
                            <button type="button" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus" data-field="">
                              <svg width="16" height="16"><use xlink:href="#minus"></use></svg>
                            </button>
                        </span>
                        <input type="text" id="quantity" name="quantity" class="form-control input-number" value="10" min="1" max="100">
                        <span class="input-group-btn">
                            <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="">
                                <svg width="16" height="16"><use xlink:href="#plus"></use></svg>
                            </button>
                        </span>
                    </div>
                    <a href="#" class="nav-link">Add to Cart <iconify-icon icon="uil:shopping-cart"></a>
                  </div>
                </div>
                
              </div>
            </div>
            <!-- / products-carousel -->

          </div>
        </div>
        
      </div>
    </section>

    <footer class="py-5">
      <div class="container-fluid">
        <div class="row">

          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="footer-menu">
              <div clas="">
                <img src="../images/APZShop_photo.png" alt="logo" class="img-fluid">
              </div>
              <div class="social-links mt-5">
                <ul class="d-flex list-unstyled gap-2">
                  <li>
                    <a href="#" class="btn btn-outline-light">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M15.12 5.32H17V2.14A26.11 26.11 0 0 0 14.26 2c-2.72 0-4.58 1.66-4.58 4.7v2.62H6.61v3.56h3.07V22h3.68v-9.12h3.06l.46-3.56h-3.52V7.05c0-1.05.28-1.73 1.76-1.73Z"/></svg>
                    </a>
                  </li>
                  <li>
                    <a href="#" class="btn btn-outline-light">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M22.991 3.95a1 1 0 0 0-1.51-.86a7.48 7.48 0 0 1-1.874.794a5.152 5.152 0 0 0-3.374-1.242a5.232 5.232 0 0 0-5.223 5.063a11.032 11.032 0 0 1-6.814-3.924a1.012 1.012 0 0 0-.857-.365a.999.999 0 0 0-.785.5a5.276 5.276 0 0 0-.242 4.769l-.002.001a1.041 1.041 0 0 0-.496.89a3.042 3.042 0 0 0 .027.439a5.185 5.185 0 0 0 1.568 3.312a.998.998 0 0 0-.066.77a5.204 5.204 0 0 0 2.362 2.922a7.465 7.465 0 0 1-3.59.448A1 1 0 0 0 1.45 19.3a12.942 12.942 0 0 0 7.01 2.061a12.788 12.788 0 0 0 12.465-9.363a12.822 12.822 0 0 0 .535-3.646l-.001-.2a5.77 5.77 0 0 0 1.532-4.202Zm-3.306 3.212a.995.995 0 0 0-.234.702c.01.165.009.331.009.488a10.824 10.824 0 0 1-.454 3.08a10.685 10.685 0 0 1-10.546 7.93a10.938 10.938 0 0 1-2.55-.301a9.48 9.48 0 0 0 2.942-1.564a1 1 0 0 0-.602-1.786a3.208 3.208 0 0 1-2.214-.935q.224-.042.445-.105a1 1 0 0 0-.08-1.943a3.198 3.198 0 0 1-2.25-1.726a5.3 5.3 0 0 0 .545.046a1.02 1.02 0 0 0 .984-.696a1 1 0 0 0-.4-1.137a3.196 3.196 0 0 1-1.425-2.673c0-.066.002-.133.006-.198a13.014 13.014 0 0 0 8.21 3.48a1.02 1.02 0 0 0 .817-.36a1 1 0 0 0 .206-.867a3.157 3.157 0 0 1-.087-.729a3.23 3.23 0 0 1 3.226-3.226a3.184 3.184 0 0 1 2.345 1.02a.993.993 0 0 0 .921.298a9.27 9.27 0 0 0 1.212-.322a6.681 6.681 0 0 1-1.026 1.524Z"/></svg>
                    </a>
                  </li>
                  <li>
                    <a href="#" class="btn btn-outline-light">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M23 9.71a8.5 8.5 0 0 0-.91-4.13a2.92 2.92 0 0 0-1.72-1A78.36 78.36 0 0 0 12 4.27a78.45 78.45 0 0 0-8.34.3a2.87 2.87 0 0 0-1.46.74c-.9.83-1 2.25-1.1 3.45a48.29 48.29 0 0 0 0 6.48a9.55 9.55 0 0 0 .3 2a3.14 3.14 0 0 0 .71 1.36a2.86 2.86 0 0 0 1.49.78a45.18 45.18 0 0 0 6.5.33c3.5.05 6.57 0 10.2-.28a2.88 2.88 0 0 0 1.53-.78a2.49 2.49 0 0 0 .61-1a10.58 10.58 0 0 0 .52-3.4c.04-.56.04-3.94.04-4.54ZM9.74 14.85V8.66l5.92 3.11c-1.66.92-3.85 1.96-5.92 3.08Z"/></svg>
                    </a>
                  </li>
                  <li>
                    <a href="#" class="btn btn-outline-light">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M17.34 5.46a1.2 1.2 0 1 0 1.2 1.2a1.2 1.2 0 0 0-1.2-1.2Zm4.6 2.42a7.59 7.59 0 0 0-.46-2.43a4.94 4.94 0 0 0-1.16-1.77a4.7 4.7 0 0 0-1.77-1.15a7.3 7.3 0 0 0-2.43-.47C15.06 2 14.72 2 12 2s-3.06 0-4.12.06a7.3 7.3 0 0 0-2.43.47a4.78 4.78 0 0 0-1.77 1.15a4.7 4.7 0 0 0-1.15 1.77a7.3 7.3 0 0 0-.47 2.43C2 8.94 2 9.28 2 12s0 3.06.06 4.12a7.3 7.3 0 0 0 .47 2.43a4.7 4.7 0 0 0 1.15 1.77a4.78 4.78 0 0 0 1.77 1.15a7.3 7.3 0 0 0 2.43.47C8.94 22 9.28 22 12 22s3.06 0 4.12-.06a7.3 7.3 0 0 0 2.43-.47a4.7 4.7 0 0 0 1.77-1.15a4.85 4.85 0 0 0 1.16-1.77a7.59 7.59 0 0 0 .46-2.43c0-1.06.06-1.4.06-4.12s0-3.06-.06-4.12ZM20.14 16a5.61 5.61 0 0 1-.34 1.86a3.06 3.06 0 0 1-.75 1.15a3.19 3.19 0 0 1-1.15.75a5.61 5.61 0 0 1-1.86.34c-1 .05-1.37.06-4 .06s-3 0-4-.06a5.73 5.73 0 0 1-1.94-.3a3.27 3.27 0 0 1-1.1-.75a3 3 0 0 1-.74-1.15a5.54 5.54 0 0 1-.4-1.9c0-1-.06-1.37-.06-4s0-3 .06-4a5.54 5.54 0 0 1 .35-1.9A3 3 0 0 1 5 5a3.14 3.14 0 0 1 1.1-.8A5.73 5.73 0 0 1 8 3.86c1 0 1.37-.06 4-.06s3 0 4 .06a5.61 5.61 0 0 1 1.86.34a3.06 3.06 0 0 1 1.19.8a3.06 3.06 0 0 1 .75 1.1a5.61 5.61 0 0 1 .34 1.9c.05 1 .06 1.37.06 4s-.01 3-.06 4ZM12 6.87A5.13 5.13 0 1 0 17.14 12A5.12 5.12 0 0 0 12 6.87Zm0 8.46A3.33 3.33 0 1 1 15.33 12A3.33 3.33 0 0 1 12 15.33Z"/></svg>
                    </a>
                  </li>
                  <li>
                    <a href="#" class="btn btn-outline-light">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M1.04 17.52q.1-.16.32-.02a21.308 21.308 0 0 0 10.88 2.9a21.524 21.524 0 0 0 7.74-1.46q.1-.04.29-.12t.27-.12a.356.356 0 0 1 .47.12q.17.24-.11.44q-.36.26-.92.6a14.99 14.99 0 0 1-3.84 1.58A16.175 16.175 0 0 1 12 22a16.017 16.017 0 0 1-5.9-1.09a16.246 16.246 0 0 1-4.98-3.07a.273.273 0 0 1-.12-.2a.215.215 0 0 1 .04-.12Zm6.02-5.7a4.036 4.036 0 0 1 .68-2.36A4.197 4.197 0 0 1 9.6 7.98a10.063 10.063 0 0 1 2.66-.66q.54-.06 1.76-.16v-.34a3.562 3.562 0 0 0-.28-1.72a1.5 1.5 0 0 0-1.32-.6h-.16a2.189 2.189 0 0 0-1.14.42a1.64 1.64 0 0 0-.62 1a.508.508 0 0 1-.4.46L7.8 6.1q-.34-.08-.34-.36a.587.587 0 0 1 .02-.14a3.834 3.834 0 0 1 1.67-2.64A6.268 6.268 0 0 1 12.26 2h.5a5.054 5.054 0 0 1 3.56 1.18a3.81 3.81 0 0 1 .37.43a3.875 3.875 0 0 1 .27.41a2.098 2.098 0 0 1 .18.52q.08.34.12.47a2.856 2.856 0 0 1 .06.56q.02.43.02.51v4.84a2.868 2.868 0 0 0 .15.95a2.475 2.475 0 0 0 .29.62q.14.19.46.61a.599.599 0 0 1 .12.32a.346.346 0 0 1-.16.28q-1.66 1.44-1.8 1.56a.557.557 0 0 1-.58.04q-.28-.24-.49-.46t-.3-.32a4.466 4.466 0 0 1-.29-.39q-.2-.29-.28-.39a4.91 4.91 0 0 1-2.2 1.52a6.038 6.038 0 0 1-1.68.2a3.505 3.505 0 0 1-2.53-.95a3.553 3.553 0 0 1-.99-2.69Zm3.44-.4a1.895 1.895 0 0 0 .39 1.25a1.294 1.294 0 0 0 1.05.47a1.022 1.022 0 0 0 .17-.02a1.022 1.022 0 0 1 .15-.02a2.033 2.033 0 0 0 1.3-1.08a3.13 3.13 0 0 0 .33-.83a3.8 3.8 0 0 0 .12-.73q.01-.28.01-.92v-.5a7.287 7.287 0 0 0-1.76.16a2.144 2.144 0 0 0-1.76 2.22Zm8.4 6.44a.626.626 0 0 1 .12-.16a3.14 3.14 0 0 1 .96-.46a6.52 6.52 0 0 1 1.48-.22a1.195 1.195 0 0 1 .38.02q.9.08 1.08.3a.655.655 0 0 1 .08.36v.14a4.56 4.56 0 0 1-.38 1.65a3.84 3.84 0 0 1-1.06 1.53a.302.302 0 0 1-.18.08a.177.177 0 0 1-.08-.02q-.12-.06-.06-.22a7.632 7.632 0 0 0 .74-2.42a.513.513 0 0 0-.08-.32q-.2-.24-1.12-.24q-.34 0-.8.04q-.5.06-.92.12a.232.232 0 0 1-.16-.04a.065.065 0 0 1-.02-.08a.153.153 0 0 1 .02-.06Z"/></svg>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>

          <div class="col-md-2 col-sm-6">
            <div class="footer-menu">
              <h5 class="widget-title">Ultras</h5>
              <ul class="menu-list list-unstyled">
                <li class="menu-item">
                  <a href="#" class="nav-link">About us</a>
                </li>
                <li class="menu-item">
                  <a href="#" class="nav-link">Conditions </a>
                </li>
                <li class="menu-item">
                  <a href="#" class="nav-link">Our Journals</a>
                </li>
                <li class="menu-item">
                  <a href="#" class="nav-link">Careers</a>
                </li>
                <li class="menu-item">
                  <a href="#" class="nav-link">Affiliate Programme</a>
                </li>
                <li class="menu-item">
                  <a href="#" class="nav-link">Ultras Press</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-md-2 col-sm-6">
            <div class="footer-menu">
              <h5 class="widget-title">Customer Service</h5>
              <ul class="menu-list list-unstyled">
                <li class="menu-item">
                  <a href="#" class="nav-link">FAQ</a>
                </li>
                <li class="menu-item">
                  <a href="#" class="nav-link">Contact</a>
                </li>
                <li class="menu-item">
                  <a href="#" class="nav-link">Privacy Policy</a>
                </li>
                <li class="menu-item">
                  <a href="#" class="nav-link">Returns & Refunds</a>
                </li>
                <li class="menu-item">
                  <a href="#" class="nav-link">Cookie Guidelines</a>
                </li>
                <li class="menu-item">
                  <a href="#" class="nav-link">Delivery Information</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-md-2 col-sm-6">
            <div class="footer-menu">
              <h5 class="widget-title">Customer Service</h5>
              <ul class="menu-list list-unstyled">
                <li class="menu-item">
                  <a href="#" class="nav-link">FAQ</a>
                </li>
                <li class="menu-item">
                  <a href="#" class="nav-link">Contact</a>
                </li>
                <li class="menu-item">
                  <a href="#" class="nav-link">Privacy Policy</a>
                </li>
                <li class="menu-item">
                  <a href="#" class="nav-link">Returns & Refunds</a>
                </li>
                <li class="menu-item">
                  <a href="#" class="nav-link">Cookie Guidelines</a>
                </li>
                <li class="menu-item">
                  <a href="#" class="nav-link">Delivery Information</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="footer-menu">
              <h5 class="widget-title">Subscribe Us</h5>
              <p>Subscribe to our newsletter to get updates about our grand offers.</p>
              <form class="d-flex mt-3 gap-0" action="../index.html">
                <input class="form-control rounded-start rounded-0 bg-light" type="email" placeholder="Email Address" aria-label="Email Address">
                <button class="btn btn-dark rounded-end rounded-0" type="submit">Subscribe</button>
              </form>
            </div>
          </div>
          
        </div>
      </div>
    </footer>
   
    <script src="../js/jquery-1.11.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="../js/plugins.js"></script>
    <script src="../js/script.js"></script>
  </body>
</html>