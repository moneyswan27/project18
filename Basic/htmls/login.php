<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="../css/style-login.css" rel="stylesheet">
    <script src="../js/modernizr-custom.js"></script>
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/main.js"></script>
    <title>로그인</title>
</head>

<body>


    <header>

        <div class="header">
            로그인
        </div>

    </header>
    <div class="wrap">
        <main>
            <div class="main">
                <div class="content">
                    <div class="login_box">
                        <div class="id_box">
                        <form action="./login_ok.php" method="post">
                            <input type="text" id="userid" name="ID" class="ipText" value placeholder="ID or E-mail"
                                onfocus="clearFirstClick(this, defaultMsg)" style="ime-mode:disabled;" >
                        </div>
                        <div class="pw_box">
                            <input type="password" id="pw" name="PW" class="ipText" placeholder="비밀번호">
                        </div>
                    </div>
                    <div class="error_box"></div>
                    <div class="id_save">
                            <input type="checkbox" id="saveid" name="save_id">
                            아이디 저장
                    </div>
                    <div class="button">
                        <a><input type="submit" id="button" value="로그인">
                 
                        </a>
                    </div>
                    </form>
                    <div class="join">
                        <a href="./member_join.php" target="_blank" class="memjoin">회원가입 ></a>
                        <a href="#" target="_blank" class="search"> 아이디 / 비밀번호찾기 ></a>
                    </div>
                    <div class="sns">
                        <div class="sns_img">
                            <a href="https://www.facebook.com">
                                <img src="../images/facebook.PNG" alt="facebook" width="564px"; height="50px";>
                            </a>
                        </div>
                        <div class="sns_img">
                            <a href="https://www.twiter.com">
                                <img src="../images/twiter.PNG" alt="twiter" width="564px"; height="50px";>
                            </a>
                        </div>
                        <div class="sns_img">
                            <a href="https://www.kakao.com">
                                <img src="../images/kakao.PNG" alt="kakao" width="564px"; height="50px";>
                            </a>
                        </div>
                    </div>
                    <p class="snsMsg">페이스북, 트위터, 카카오 SNS계정으로도 서비스 이용이 가능합니다.</p>

                </div>
            </div>
            </div>
        </main>
        <footer>
            <div class="login_footer">
                    Copyright (C) CJ DigitalMusic All rights reserved.
            </div>
        </footer>
    
</body>

</html>