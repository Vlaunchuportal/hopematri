
<?php 
include_once 'dataconnection.php';
session_start();
$matri_id = $_SESSION['matri_id'];
$date = date('Y-m-d');
//print_r($_POST);
//$razorpay_payment_id = $_POST['razorpay_payment_id'];
//if($_POST['razorpay_payment_id']){
	
	/* $select = mysqli_query($conn, "select * from payment_new where order_id='".$_POST['razorpay_payment_id']."'");
	$result = mysqli_fetch_array($select);
	if($result==''){	 */
		$insert = mysqli_query($conn, "insert into payment_new(matri_id, plan_name, plan_buy_date, order_id, expiry_date, plan_type) value('".$matri_id."', '".$_POST['product_id']."', '".date('Y-m-d')."', '".$_POST['razorpay_payment_id']."','".date('Y-m-d', strtotime($date. ' + '.$_POST['days'].' days'))."', '".$_POST['plan_type']."')")or die(mysqli_error($conn)); 
		$id =  mysqli_insert_id($conn);
		if($id){
			$plan='';
			if($_POST['plan_type']=='spotlight'){$plan = 'yes'}else{$plan='no'}
			$update = mysqli_query($conn, 'update register_new set sportlight= "'.$plan.'" where matri_id = "'.$matri_id.'"');
			echo"success payment";
		}
	//}
//}
?>
