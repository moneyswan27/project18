<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="../css/style4.css" rel="stylesheet">
    <script src="../js/modernizr-custom.js"></script>
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/main.js"></script>
    <title>회원가입</title>
</head>

<body>
    <div class="wrap">
        <div class="header">
                    회원가입
        </div>
        <div class=""></div>  
        <main>
            <div class="main">
                <div class="content">
                    <form action="member_insert.php" method="post" name="form_mem">
                    <div class="login_box">
                        <div class="id_box">
                            <input type="text" id="userid" name="ID" class="ipText" value placeholder="아이디*"
                                onfocus="clearFirstClick(this, defaultMsg)" style="ime-mode:disabled;" >
                        </div>
                        <div class="pw_box">
                            <input type="password" id="pw" name="PW" class="ipText" placeholder="비밀번호*">
                        </div>
                        <div class="pwcheck_box">
                            <input type="password" id="pwcheck" name="PW2" class="ipText" placeholder="비밀번호확인*">
                        </div>
                        <p class="noti_type02">비밀번호는 숫자, 영문, 특수문자(!@#$%^&amp;*()?_~) 조합으로 8~12자리를 사용해야 합니다.</p>
                    </div>
                    <div class="error_box"></div>
                    <div class="info_box">
                        <div class="name_box">
                            <input type="text" id="name" name="name" class="ipText" placeholder="이름*">
                        </div>
                        <div class="age_box">
                            <input type="text" id="age" name="age" class="ipText" placeholder="나이*">
                        </div>
                        <div class="phone_box">
                            <input type="text" id="phone" name="phone" class="ipText" placeholder="휴대폰번호*">
                        </div>
                        <div class="email_box">
                            <input type="text" id="email" name="email" class="ipText" placeholder="이메일*">
                        </div>
                    </div>
                    <div class="button">
                        <a><input type="submit" value="제출" onclick="check();">
                        </a>
                    </div> 
                    </form>
                </div>                
            </div>
        </main>
        <footer>
        <div class="login_footer">
            Copyright (C) CJ DigitalMusic All rights reserved.
        </div>

    </footer>
    </div>

</body>

</html>