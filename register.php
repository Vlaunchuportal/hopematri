<?php

include_once 'dataconnection.php';
//print_r($_REQUEST);
$dob = $_REQUEST['year'].'-'.$_REQUEST['month'].'-'.$_REQUEST['day'];
$mobile = $_REQUEST['number_code'].'-'.$_REQUEST['mobile'];
$protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
$url  = $protocol."://" . $_SERVER['SERVER_NAME'];
	$from = new DateTime($dob);
	$to   = new DateTime('today');
	$age = $from->diff($to)->y;
	$select_query = "select email_id from register_new where email_id='".$_REQUEST['email']."'";
	$select_result = mysqli_query($conn, $select_query);
	$row_num = mysqli_num_rows($select_result);
	if($row_num == 0){
		$username = $_REQUEST['first_name'].' '.$_REQUEST['last_name'];
		$query = "insert into register_new(email_id, password, profile_created_by, gender, f_name, l_name, dob, religion, mother_tongue, country, state, city, height, contact_no, reg_date, age, username) value('".$_REQUEST['email']."', '".md5($_REQUEST['password'])."', '".$_REQUEST['profile']."', '".$_REQUEST['gender']."', '".$_REQUEST['first_name']."', '".$_REQUEST['last_name']."', '".$dob."', '".$_REQUEST['religion']."', '".$_REQUEST['mother_tongue']."', '".$_REQUEST['country']."', '".$_REQUEST['state']."', '".$_REQUEST['city']."', '".$_REQUEST['height']."', '".$mobile."', '".date('Y-m-d')."', '".$age."', '".$username."')";
		$insert = mysqli_query($conn, $query)or die(mysqli_error($conn)); 
		
		$id = mysqli_insert_id($conn);
		if($insert == 1){
			$matri_id = 'HM'.$id;
			$update_sql = "UPDATE register_new SET matri_id='$matri_id' WHERE id= '$id'";
			$update = mysqli_query($conn, $update_sql)or die(mysqli_error($conn));
			$to = $_REQUEST['email'];

			$result3 = mysqli_query($conn, "SELECT * FROM site_config");
			$rowcc = mysqli_fetch_array($result3);
			//$website = $rowcc['web_name'];
			$website = 'https://sample.hopematri.com/';
							
			$result45 = mysqli_query($conn, "SELECT * FROM email_templates where EMAIL_TEMPLATE_NAME = 'Registration'");
			$rowcs5 = mysqli_fetch_array($result45);
			$subject = $rowcs5['EMAIL_SUBJECT'];
			$message = $rowcs5['EMAIL_CONTENT'];
			$email_template = htmlspecialchars_decode($message,ENT_QUOTES);
			$trans = array("your site name" =>$rowcc['web_frienly_name'],"name"=>$username,"web logo"=>$rowcc['web_logo_path'],"matriid"=>$matri_id,"email_id"=>$to,"cpass"=>md5($_REQUEST['password']),"fb1"=>$rowcc['facebook'],"li1"=>$rowcc['linkedin'],"tw1"=>$rowcc['twitter'],"gp1"=>$rowcc['google'],"site domain name"=>$website,"my_email"=>$to);
			$email_template = strtr($email_template, $trans);
							
		require_once('smtp_function.php');
        $mail->Subject = $subject;
        $mail->MsgHTML($email_template);
		if($mail->Send()){
			echo"An email is sent to you please click verify.";
		}
		}
	}else{
		echo"Email id is already Exist.";
	}
?>