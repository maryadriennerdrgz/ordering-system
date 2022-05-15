<?php
function pr($arr){
	echo '<pre>';
	print_r($arr);
}

function prx($arr){
	echo '<pre>';
	print_r($arr);
	die();
}

function get_safe_value($con,$str){
	if($str!=''){
		$str=trim($str);
		return mysqli_real_escape_string($con,$str);
	}
}

function get_product($conn,$limit='',$cat_id='',$food_id='',$search_str='',$sort_order=''){
	$sql="select tbl_food.*,tbl_category.id from tbl_food,tbl_category where tbl_food.active='Yes' ";
	if($cat_id!=''){
		$sql.=" and product.categories_id=$cat_id ";
	}
	if($food_id!=''){
		$sql.=" and tbl_food.id=$food_id ";
	}
	// $sql.=" and tbl_food.category_id=tbl_category.id ";
	if($search_str!=''){
		$sql.=" and (tbl_food.title like '%$search_str%' or tbl_food.description like '%$search_str%') ";
	}
	if($sort_order!=''){
		$sql.=$sort_order;
	}else{
		$sql.=" order by tbl_food.id desc ";
	}
	if($limit!=''){
		$sql.=" limit $limit";
	}
	//echo $sql;
	$res=mysqli_query($conn,$sql);
	$data=array();

	while($row=mysqli_fetch_assoc($res)){
			$data[]=$row;
		}
	
	return $data;
}

function wishlist_add($con,$uid,$pid){
	$added_on=date('Y-m-d h:i:s');
	mysqli_query($con,"insert into wishlist(user_id,product_id,added_on) values('$uid','$pid','$added_on')");
}
?>