<?php
   session_start();
   
   $ID = $_POST['ID'];
   $PW = $_POST['PW'];

   if(! ($ID and $PW) )
   {
      echo "<script>alert('입력하자'); history.go(-1);</script>";
      exit;
   }
   
   include "../dbconn.php";
   
   $sql = "select * from member where ID='$ID'";
   $result = mysqli_query($conn, $sql);
   $match = mysqli_num_rows($result);
   if(! $match)
   {
      echo "<script>alert('등록되지 않은 정보입니다.'); history.go(-1);</script>";
      exit;
   }else {
      $row = mysqli_fetch_array($result);
      if($row['PW'] != $PW)
      {
         echo "<script>alert('등록되지 않은 정보입니다.'); history.go(-1);</script>";
         exit;
      }
      
      $_SESSION['ID'] = $row['ID'];
      $_SESSION['name'] = $row['name'];
      $_SESSION['email'] = $row['email'];
      $_SESSION['age'] = $row['age'];
      $_SESSION['phone'] = $row['phone'];
      
      echo "<script>location.href='/index.php';</script>";
   }
   mysqli_close($conn);
?>