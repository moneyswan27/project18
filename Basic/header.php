<?php session_start();?>
<?php
$ID = $_SESSION['ID'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+KR" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+KR" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Do+Hyeon" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">

    <script src="/js/modernizr-custom.js"></script>
    <script src="/js/jquery-3.2.1.min.js"></script>
    <script src="/js/main.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="http://malsup.github.com/jquery.cycle2.js"></script>



<body>
    <div class="container">
        <header>
            <div class="top_header_in">
                <?php if(! $_SESSION['ID']) { ?>
                <div class="top_header">
                    <a href="#"><img src="/images/mnet.jpg" alt="mnet"></a>
                    <a href="#">TV</a>
                    <a href="#">뮤직</a>
                    <a href="#">프라임팩</a>
                    <a href="/htmls/login.php">로그인</a>
                </div>
                <?php } else { ?>
             
                <div class="top_header">
                   <a href="#" id="session"> Login:&nbsp<?=$ID?> </a>
                    <a href="#"><img src="/images/mnet.jpg" alt="mnet"></a>
                    <a href="#">TV</a>
                    <a href="#">뮤직</a>
                    <a href="#">프라임팩</a>
                    <a href="/htmls/logout.php">로그아웃</a>
                </div>
                <?php } ?>
            </div>
            <div class="header_wrapper">

                <div class="sns"><img src="/images/btn-sns2.png" alt="sns"></div>
                <h1> <a href="/index.php"><img src="/images/logo.png" alt="logo"></a></h1>
                <div class="header_menu">
                    <ul class="gnbDepth1">
                        <li class="menubar"><a href="/htmls/intro.php">프로그램 소개</a></li>
                        <li><a href="">라인업</a>
                            <ul class="gnbDepth2">
                                <li>
                                    <a href="">GIRIBOY & Swings</a>
                                    <a href="">Deepflow & Nucksal</a>
                                    <a href="">CODE KUNST & Paloalto</a>
                                    <a href="">The Quiett & CHANGMO</a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="">파이트머니 현황</a></li>
                        <li><a href="">다시보기</a>
                            <ul class="gnbDepth2">
                                <li>
                                    <a href="">시즌7</a>
                                    <a href="">시즌6</a>
                                    <a href="">시즌5</a>
                                    <a href="">시즌4</a>
                                    <a href="">시즌3</a>
                                    <a href="">시즌2</a>
                                    <a href="">시즌1</a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="">명예의 전당</a>
                            <ul class="gnbDepth2">
                                <li>
                                    <a href="">시즌6</a>
                                    <a href="">시즌5</a>
                                    <a href="">시즌4</a>
                                    <a href="">시즌3</a>
                                    <a href="">시즌2</a>
                                    <a href="">시즌1</a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="">스폰서</a></li>
                        <li><a href="/htmls/board.php">게시판</a></li>

                    </ul>
                </div>

            </div>
        </header>