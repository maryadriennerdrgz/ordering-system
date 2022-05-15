<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ylaiza's Burger House</title>
    <link rel="icon" type="image/x-icon" href="https://www.4shared.com/img/z-0hzU4Uiq/s25/17f79325c90/Burger">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/register.css">

</head>
    <header class="header">

    <a href="index.php" class="logo"> <i class="fas fa-utensils"></i> Ylaiza's Burger House </a>
    
    <div class="icons">
        <div id="menu-btn" class="fas fa-bars"></div>
        <div id="login-btn" class="fas fa-user"></div>
    </div>
    
</header>

<body>

<div class="login-form-container">
    <form action="login.php" method="post">
        <h3>login form</h3>
        <?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
        <input type="username" name="username" placeholder="enter your username" id="" class="box">
        <input type="password" name="password" placeholder="enter your password" id="" class="box">
        <div class="remember">
            <input type="checkbox" name="" id="remember-me">
            <label for="remember-me">remember me</label>
        </div>
        <input type="submit" value="login now" class="btn">
        <p>don't have an account? <a href="signup.php">create one</a></p>
    </form>

</div>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>
