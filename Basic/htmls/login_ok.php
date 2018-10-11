<?php
   session_start();
   
   function checkInjection($str){
    if(preg_match("/[#\&\\+\-%=\/\\\:;\\'\"\^`~\_|\\/\?\*$#<>()\[\]\{\}]/i", $str,  $match))
          {
        echo "<script>alert('바르게 입력해주세요 ^^.'); history.go(-1);</script>";
         exit;
          }
    }

   $ID = $_POST['ID'];
   $PW = $_POST['PW'];
   $conn = mysqli_connect("localhost", "root", "toor", "sample") or die('연결 안됨');

   checkInjection($ID);
   checkInjection($PW);

   if(! ($ID and $PW) )
   {
      echo "<script>alert('입력하자'); history.go(-1); </script>";
      exit;
   }
   
   $sql = "select * from member where ID='$ID'";
   $result = mysqli_query($conn, $sql);
   $match = mysqli_num_rows($result);
   $row = mysqli_fetch_array($result);

   if(! $match )
   {
      echo "<script>alert('등록되지 않은 정보입니다.1'); history.go(-1);</script>";
      exit;
   } else {
      if($row['try'] > 5) 
      {
        $sql = "update member set locked=1 where ID='$ID'";
        mysqli_query($conn, $sql);
        echo "<script>alert('잠김'); location.href='http://www.president.go.kr/';</script>";
      }

      if( $row['PW'] != $PW ){
            $try = ++$row['try'];
            $sql = "update member set try='$try' where ID='$ID'";
            mysqli_query($conn, $sql);
            echo "<script>alert('비밀번호 틀림'); history.go(-1);</script>";
      }
      $_SESSION['ID'] = $row['ID'];
      $_SESSION['name'] = $row['name'];
      $_SESSION['email'] = $row['email'];
      $_SESSION['age'] = $row['age'];
      $_SESSION['phone'] = $row['phone'];
      $sql = "update member set try=0 where ID='$ID'";
      mysqli_query($conn, $sql);

      echo "<script>location.href='../index.php';</script>";
   }
   mysqli_close($conn);
/*
       if( $ID == admin){
                echo "<script>alert('관리자 계정은 다른 방법으로 로그인 하세요.'); history.go(-1);</script>";
                exit;
                
             $sql = "select * from member where ID='admin' and PW=md5('$PW')";
          $result = mysqli_query($conn, $sql);
          $match = mysqli_num_rows($result);
       }else {
          $sql = "select * from member where ID='$ID' and PW='$PW'";
          $result = mysqli_query($conn, $sql);
          $match = mysqli_num_rows($result);
        }
     if(! $match){
      echo "<script>alert('ID or PW가 틀립니다.'); history.go(-1);</script>";
      exit;
   }else {

      $row = mysqli_fetch_array($result);
      
      $_SESSION['ID'] = $row['ID'];
      $_SESSION['name'] = $row['name'];
      $_SESSION['email'] = $row['email'];
      $_SESSION['age'] = $row['age'];
      $_SESSION['phone'] = $row['phone'];
      $ID = $_SESSION['ID'] ;
      echo "<script>alert('$ID' + '님 환영합니다.');</script>";
      echo "<script>location.href='/index.php';</script>";
         }
   mysqli_close($conn);
*/
   ?>


