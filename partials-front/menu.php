<?php include('config/constants.php');
include('functions.php');
include('add_to_cart.php');
$obj=new add_to_cart();
$totalProduct=$obj->totalProduct();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ylaiza's Burger House</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="icon" type="image/x-icon" href="https://www.4shared.com/img/z-0hzU4Uiq/s25/17f79325c90/Burger">

    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/custom-style.css">
    <link rel="stylesheet" href="css/register.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>

<body>
    <!-- Navbar Section Starts Here -->
    <header class="header">

        <a href="index.php" class="logo"> <i class="fas fa-utensils"></i> Ylaiza's Burger House </a>
        
        <nav class="navbar">
            <a href="index.php">home</a>
            <a href="categories.php">categories</a>
            <a href="foods.php">menu</a>
            <a href="AboutUs.php">about</a>
        </nav>
        <?php if(isset($_SESSION['id'])){ ?>
        <!-- <div class="htc__shopping__cart">
            <a href="cart.php"><i class="icon-handbag icons"></i></a>
            <a href="cart.php">
            <span class="htc__qua"><?php echo $totalProduct?></span>
            </a>
        </div> -->
        <?php } ?>

        <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <?php if(isset($_SESSION['id'])){
            echo '<a href="cart.php">
                <div id="cart-btn" class="fas fa-shopping-cart">
                    <span class="htc__qua"><?php echo $totalProduct?></span>
                </div>
                
            </a>';
            } ?>

            <div class="btn-group mb-3">
                
                <a href="#" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    <div id="login-btn" class="fas fa-user"></div>
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <?php if(isset($_SESSION['id'])){?>
                    <!-- <li><a class="dropdown-item" href="cart.php">Orders </a></li> -->
                    <li><a class="dropdown-item" href="logout.php">Logout </a></li>
                    <?php }else{
                       echo '<li><a class="dropdown-item" href="loginpage.php">Login </a></li>';
					}
                    ?>
                </ul>
            </div>
        </div>
    
    </header>