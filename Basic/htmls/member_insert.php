<?php
   $ID = $_POST['ID'];
   $PW = $_POST['PW'];
   $name = $_POST['name'];
   $email = $_POST['email'];
   $age = $_POST['age'];
   $phone = $_POST['phone'];
   
    if(strlen($ID) < 7){
        echo "<script>alert('ID가 너무 짧습니다.'); history.go(-1); </script>";
        exit;        
    }
    if(strlen($PW) < 8){
        echo "<script>alert('Password가 너무 짧습니다.'); history.go(-1); </script>";
        exit;        
    }

   include "../dbconn.php";
   $sql = "select * from member where id='$ID'";
   $result = mysqli_query($conn, $sql);
   $match = mysqli_num_rows($result);
   
   if($match)
   {
      echo "<script>alert('중복 아이디'); history.go(-1); </script>";
      exit;
   }else{
      $sql = "insert into member values ('','$ID','$PW','$name','$age','$phone','$email', 0, 0)";
      mysqli_query($conn, $sql);
   }
      
   mysqli_close($conn);
   echo "<script>location.href='/index.php';</script>";
?>