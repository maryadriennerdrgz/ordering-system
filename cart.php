<?php 
include('partials-front/menu.php');
if(!isset($_SESSION['cart']) || count($_SESSION['cart'])==0){
	?>
	<script>
		window.location.href='index.php';
	</script>
	<?php
}

$cart_total=0;

if(isset($_POST['submit'])){
	$id=$_SESSION['id'];
    $query = "SELECT * FROM tbl_customer WHERE customer_id=$id";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_assoc($result);
	$address=$row['address'];
	$status='Ordered';
	$customer_name = $row['firstname']." ".$row['lastname'];
    $customer_contact = $row['contact'];
    $customer_email = $row['email'];
    $customer_address = $row['address'];
	$order_date=date('Y-m-d h:i:s');
    foreach($_SESSION['cart'] as $key=>$val){
		$productArr=get_product($conn,'','',$key);
        $title=$productArr[0]['title'];
		$price=$productArr[0]['price'];
		$qty=$val['qty'];
		$total=$price*$qty;
        mysqli_query($conn,"insert into `tbl_order`(food,price,qty,total,order_date,status,customer_name,customer_contact,customer_email,customer_address, customer_id) values('$title','$price','$qty','$total','$order_date','$status','$customer_name','$customer_contact','$customer_email','$customer_address', '$customer_id')");
		
	}
		
	
	// mysqli_query($conn,"insert into `tbl_order`(customer_id,address,city,pincode,payment_type,payment_status,order_status,added_on,total_price,txnid) values('$user_id','$address','$city','$pincode','$payment_type','$payment_status','$order_status','$added_on','$total_price','$txnid')");
	
	// $order_id=mysqli_insert_id($conn);
	
	// foreach($_SESSION['cart'] as $key=>$val){
	// 	$productArr=get_product($conn,'','',$key);
	// 	$price=$productArr[0]['price'];
	// 	$qty=$val['qty'];
		
	// 	mysqli_query($conn,"insert into `order_detail`(order_id,product_id,qty,price) values('$order_id','$key','$qty','$price')");
	// }
	
	unset($_SESSION['cart']);
	
	
	?>
	<script>
		window.location.href='thank_you.php';
	</script>
	<?php
	}	
	

?>



<body>
   
    <!-- Start All Title Box -->
    <!-- <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>CART</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a>Shopping</a></li>
                        <li class="breadcrumb-item active">CART</li>
                    </ul>
                </div>
            </div>
        </div>
    </div> -->
    <!-- End All Title Box -->
        <!-- cart-main-area start -->

        <div class="cart-main-area ptb--100 bg__white">
            <div class="container">
                    <div class="col-md-12 col-sm-12 col-xs-12">          
                            <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail">products</th>
                                            <th class="product-name">name of products</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-subtotal">Total</th>
                                            <th class="product-remove">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php
										if(isset($_SESSION['cart'])){
											foreach($_SESSION['cart'] as $key=>$val){
											$productArr=get_product($conn,'','',$key);
											$pname=$productArr[0]['title'];
											$price=$productArr[0]['price'];
											$image=$productArr[0]['image_name'];
											$qty=$val['qty'];
                                            $cart_total=$cart_total+($price*$qty);
											?>
											<tr>
												<td class="product-thumbnail"><a href="#"><img src="<?php echo SITEURL; ?>images/food/<?php echo $image; ?>" class="img-responsive img-curve" /></a></td>
												<td class="product-name"><a href="#"><?php echo $pname; ?></a>
												</td>
												<td class="product-price"><span class="amount">PHP <?php echo $price?></span></td>
												<td class="product-quantity"><input type="number" id="<?php echo $key?>qty" value="<?php echo $qty?>" />
												<br/><a href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','update')">update</a>
												</td>
												<td class="product-subtotal">PHP <?php echo $qty*$price?>.00</td>
												<td class="product-remove"><a href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','remove')"><i class="fas fa-trash-alt"></i></a></td>
											</tr>
											<?php } } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="float-center">
                                    <div class="ordre-details__total">
                                        <h1>Total Price </h1>
                                        <h1><span class="price">₱ <?php echo $cart_total?></span></h1>
                                    </div>
                            </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="buttons-cart--inner">
                                            <form method="POST">
                                            <div class="buttons-cart checkout--btn">
                                            <input type="submit" name="submit" value="Checkout"/>
                                                <!-- <button type="submit">Checkout</button> -->
                                                <!-- <a type="submit" href="#">Checkout</a>  -->
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                    </div>
                </div>
            
        </div>
										
<?php include('partials-front/footer.php'); ?> 