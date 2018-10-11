<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="../css/style-view.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+KR" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+KR" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Do+Hyeon" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Do+Hyeon" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet">

    <script src="../js/modernizr-custom.js"></script>
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="http://malsup.github.com/jquery.cycle2.js"></script>


    <title>SMTM777</title>
</head>

<?php include "../header.php"; 
    $conn = mysqli_connect("localhost", "root", "toor", "sample") or die('연결 안됨'); 
    $num = $_GET['num'];
    $sql = "select * from board where num='$num'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    $subject = $row['subject'];
    $content = $row['content'];
    $date = $row['date'];
    $hit = $row['hit'];
    $filename = $row['filename'];
    $ID =$row['ID'];
    $hit++;

    $sql = "update board set hit='$hit' where num='$num'";
    mysqli_query($conn, $sql); 
?>

        <main>
            <div class="board_container">
                <div class="inner_wrap">
                    <div class="view_page_wrap">
                        <h2>게시글</h2>

                        <div class="in_view">
                            <div class="view_title"><?=$subject?></div>
                            <div class="container_view">
                                <div class="writer_container">
                                    <span class="writer"><?=$ID?> |</span>
                                    <span class="date"><?=$date?> |</span>
                                    <span class="count"><?=$hit?></span>

                                </div>
                                <div class="content_view">
                                    <textarea class="textarea_view" readonly cols=61; rows=10; name="reply" id="top_reply"><?=$content?></textarea>
                                </div>
                                <div class="input_file">첨부 파일 : <a href="./download.php?filename=<?=$filename?>"><?=$filename?></a></div>
                                <form action="/htmls/board_delete.php" method="GET">
                                    <div class="buttons">
                                        <input type="button" class="view_button" value="Ok" name="">
                                        <input type="button" class="view_button" value="Edit" name="">
                                        <input type="button" class="view_button" value="Destory" onClick="location.href='/htmls/board_delete.php?num=<?=$num?>&ID=<?=$ID?>'">
                                    </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

        </main>
<?php include "../footer.php"; ?>