<?php 
	session_start();
	if($_SESSION['ID'] == "")
	{
		echo "<script>alert('^^'); location.href='/index.php';</script>";
		exit;
	}
		
    $conn = mysqli_connect("localhost", "root", "toor", "sample") or die('연결 안됨');
	$num = $_GET['num'];
	$sql = "select * from board where num='$num'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
	
	$subject = $row['subject'];
	$content = $row['content'];
	$nick = $row['nick'];
	$date = $row['date'];
	$hit = $row['hit'];
	$filename = $row['filename'];
	$ID = $row['ID'];
	
	
	if($_SESSION['ID'] != $ID )
	{
		echo "<script>alert('^^!'); location.href='/index.php';</script>";
		exit;
	}	
	
	$sql = "delete from board where num='$num'";
	unlink("../data/".$filename);
	mysqli_query($conn, $sql);
	mysqli_close($conn);
	echo "<script>alert('삭제 완료 '); location.href='/htmls/board.php';</script>";
?>