<?php include('partials-front/menu.php'); ?>

<body>
    
<!-- header section starts  -->

<!-- <header class="header">

    <a href="#" class="logo"> <i class="fas fa-utensils"></i> Ylaiza's Burger House </a>
    
    <nav class="navbar">
        <a href="#home">home</a>
        <a href="categories.php">categories</a>
        <a href="foods.php">menu</a>
        <a href="#about">about us</a>
    </nav>

    <div class="icons">
        <div id="menu-btn" class="fas fa-bars"></div>
        <div id="search-btn" class="fas fa-search"></div>
        <div id="cart-btn" class="fas fa-shopping-cart"></div>
        <div id="login-btn" class="fas fa-user"></div>
    </div>
    
</header> -->


<section class="categories">
        <div class="container">
            <div class="heading">
                <h3>Explore Various Food Categories</h3>
            </div>

            <?php 

                //Display all the cateories that are active
                //Sql Query
                $sql = "SELECT * FROM tbl_category WHERE active='Yes'";

                //Execute the Query
                $res = mysqli_query($conn, $sql);

                //Count Rows
                $count = mysqli_num_rows($res);

                //CHeck whether categories available or not
                if($count>0)
                {
                    //CAtegories Available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the Values
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        ?>
                        
                        <a href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id; ?>">
                            <div class="box-3 float-container">
                                <?php 
                                    if($image_name=="")
                                    {
                                        //Image not Available
                                        echo "<div class='error'>Image not found.</div>";
                                    }
                                    else
                                    {
                                        //Image Available
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="Pizza" class="img-responsive img-curve">
                                        <?php
                                    }
                                ?>
                                

                                <h3 class="float-text text-white"><?php echo $title; ?></h3>
                            </div>
                        </a>

                        <?php
                    }
                }
                else
                {
                    //CAtegories Not Available
                    echo "<div class='error'>Category not found.</div>";
                }
            
            ?>
            

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->



<!-- <section class="footer">

    <div class="box-container">

        
        <div class="box">
            <h3>extra links</h3>
            <a href="html/T&C.html"> <i class="fas fa-arrow-right"></i> terms and conditions</a>
        </div>

    </div>

    <div class="bottom">

        <div class="credit"> created <span>Ylaiza's Burger House</span> | all rights reserved! </div>
        
    </div>

</section>
 -->
















<!-- custom js file link  -->
<!-- <script src="js/script.js"></script>

</body>
</html> -->

<?php include('partials-front/footer.php'); ?>