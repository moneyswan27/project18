<?php
		session_start();

		$subject = $_POST['subject'];
		$content = $_POST['content'];
		$content = preg_replace("/[ <>\'\"]/i", "", $content);


		$ID = $_SESSION['ID'];
		$date = date('Y-m-d');
		
		$filename = $_FILES['filename']['name'];
		$ext = substr($filename, -3);
		if(! ((strcmp($ext,"jpg") == 0) or (strcmp($ext,"png") == 0) or (strcmp($ext,"") == 0))){
			echo "<script>alert('업로드 할 수 없는 파일입니다.'); history.go(-1);</script>";
			exit;
		} 

		$tmp = $_FILES['filename']['tmp_name'];

		if (! ($subject and $content))
		{
			echo "<script>alert('제목 내용 확인 요망!'); history.go(-1);</script>";
			exit;
		}
		
        $conn = mysqli_connect("localhost", "root", "toor", "sample") or die('연결 안됨');

		$sql = "insert into board values('','$ID','$subject','$content','$date',0,'$filename')";
		mysqli_query($conn,$sql);
		mysqli_close($conn);

		if( is_uploaded_file($tmp) )
		{
			$destination = "../data/" . $filename;
			move_uploaded_file($tmp, $destination);
		} 
		echo "<script>location.href='/htmls/board.php';</script>"
?>