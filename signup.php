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
<body>
    <header class="header">

    <a href="index.php" class="logo"> <i class="fas fa-utensils"></i> Ylaiza's Burger House </a>
    
    <div class="icons">
        <div id="menu-btn" class="fas fa-bars"></div>
        <div id="login-btn" class="fas fa-user"></div>
    </div>
    
</header>

    <div class="login-form-container">

    <form action="signup-check.php" method="post">
        <h3>Register form</h3>
        <?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>
        
        
        <?php if (isset($_GET['firstname'])) { ?>             
            <input type="firstname" name="firstname" placeholder="firstname" id="" class="box" value="<?php echo $_GET['firstname']; ?>">
        <?php }else{ ?>
               <input type="firstname" 
                      name="firstname" 
                      placeholder="firstname"
                      class="box">
        <?php }?>
        
        <?php if (isset($_GET['lastname'])) { ?>
        <input type="lastname" name="lastname" placeholder="lastname" id="" class="box" value="<?php echo $_GET['lastname']; ?>"><br>
        <?php }else{ ?>
               <input type="lastname" 
                      name="lastname" 
                      placeholder="lastname"
                      class="box">
        <?php }?>

        <?php if (isset($_GET['contact'])) { ?>
        <input type="contact" name="contact" placeholder="contact number" id="" class="box" value="<?php echo $_GET['contact']; ?>"><br>
        <?php }else{ ?>
               <input type="contact" 
                      name="contact" 
                      placeholder="contact number"
                      class="box">
        <?php }?>
        
        
        
        <?php if (isset($_GET['email'])) { ?>
        <input type="email" name="email" placeholder="email" id="" class="box" value="<?php echo $_GET['email']; ?>"><br>
        <?php }else{ ?>
               <input type="email" 
                      name="email" 
                      placeholder="email"
                      class="box">
        <?php }?>

        <?php if (isset($_GET['username'])) { ?>
        <input type="username" name="username" placeholder="username" id="" class="box" value="<?php echo $_GET['username']; ?>"><br>
        <?php }else{ ?>
               <input type="username" 
                      name="username" 
                      placeholder="username"
                      class="box">
        <?php }?>

        <input type="password" name="password" placeholder="password" id="" class="box">
        <input type="password" name="re_password" placeholder="confirm password" id="" class="box"><br><br>
            
        <?php if (isset($_GET['address'])) { ?>
        <!-- <input type="username" name="address" placeholder="address" id="" class="box" value="<?php echo $_GET['address']; ?>"><br> -->
        <textarea name="address" class="form-control" style="min-width: 100%;resize: none;background:#23453a;border-radius: 10px;" rows="5" placeholder="  Address"></textarea>
        <?php }else{ ?>
            <textarea name="address" class="form-control" style="min-width: 100%;resize: none;background:#23453a;border-radius: 10px;" rows="5" placeholder="  Address"></textarea>
        <?php }?>
    
        <div class="remember">
            <input type="checkbox" name="" id="remember-me">
            <label for="remember-me">remember me</label>
        </div>
        <p>By creating an account you agree to our <a href="html/T&C.html">Terms and Privacy</a></p>
        <input type="submit" value="register now" class="btn">
        
        <p>Already have an account? <a href="loginpage.php">Click Here</a></p>
    </form>

</div>








<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>