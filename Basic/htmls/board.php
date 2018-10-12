<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="../css/style3.css" rel="stylesheet">
    
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+KR" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+KR" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Do+Hyeon" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Do+Hyeon" rel="stylesheet">

    <script src="../js/modernizr-custom.js"></script>
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="http://malsup.github.com/jquery.cycle2.js"></script>


  <?php include "../header.php";
          $page = $_GET['page'];
          if(! $page){
              $page = 1;
          }
          $sql = "select * from board order by num desc";
          $conn = mysqli_connect("localhost", "root", "toor", "sample") or die('연결 안됨');
          $result = mysqli_query($conn, $sql);
          $record = mysqli_num_rows($result);
          $scroll = 10;
          if($record / $scroll == 0)
          {
              $cnt_page = $record / $scroll;
          }else{
              $cnt_page = ceil($record / $scroll);  
          }
          
          $start = ($page-1) * $scroll;
          $number = $record - $start;      
  ?>
        <main>
            <div class="board_container">
                <div class="inner_wrap">
                    <div class="right_picture">
                        <div class="notice_picture"><img src="../images/notice_picture.PNG" alt="ntpic" width="250px;"
                                height="200px;"></div>
                        <div class="new_video_wr">
                            &nbsp;&nbsp;&nbsp;최신영상</div>
                        <div class="new_viedo">
                            <img src="../images/new_video.PNG" alt="new_video" width="250px;" height="170px;">
                        </div>
                        <div class="under_picture_txt">&nbsp;&nbsp;&nbsp;&nbsp;[5회]먹방 요정 EK~ EK~</div>
                        <div class="music_list"><img src="../images/music.PNG" alt="music_list" width="250px;" height="250px;"></div>
                    </div>
                    <div class="board_wrap">

                        <div class="notice">게시판

                            <div class="board_list">
                                <table summary="BOARD">
                                    <caption>BOARD</caption>
                                    <colgroup>
                                        <col width="62">
                                        <col width="*">
                                        <col width="88">
                                        <col width="80">
                                        <col width="45">
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th class="no">번호</th>
                                            <th class="subject">제목</th>
                                            <th>작성자</th>
                                            <th>작성일</th>
                                            <th>조회수</th>
                                        </tr>
                                    </thead>
        
                                    <tbody>
                                    <?php
                                    for($i = $start; $i<$scroll+$start && $i < $record; $i++){
                                        mysqli_data_seek($result, $i);
                                        $row = mysqli_fetch_array($result);
                                        $subject = $row['subject'];
                                        $ID = $row['ID'];
                                        $date = $row['date'];
                                        $hit = $row['hit'];
                                        $num = $row['num'];
                                    ?>
                                        <tr>
                                            <td class="no"><?=$num?></td>
                                            <td class="ntitle"><a href="view.php?num=<?=$num?>&page=<?=$page?>"><?=$subject?></a></td>
                                            <td class="writer"><?=$ID?></td>
                                            <td class="date"><?=$date?></td>
                                            <td class="see"><?=$hit?></td>
                                        </tr>
                                    <?php $number--; } ?>                                    
                                    </tbody>
                                </table>
                            </div>

                            <div class="clear"></div>
                            <div class="page_control">
                                <?php if($page <=1 ){
                                    echo "<a href='./board.php'>Prev</a>";
                                } else {
                                    $page--;
                                    echo "<a href='./board.php?page=$page'>Prev</a>";
                                    $page++;
                                }
                                for($i=1;$i <= $cnt_page; $i++){
                                    if($page == $i){
                                        echo "<b> $i </b>";
                                    } else {
                                        echo "<a href='./board.php?page=$i'> $i </a>";
                                    }
                                }
                                if($page >= $cnt_page){
                                    echo "<a href='list.php?page=$cnt_page'> Next</a>";
                                } else {
                                    $page++;
                                    echo "<a href='./board.php?page=$page'> Next</a>";
                                }
                                ?>
                                <a href="./board.php"></a>
                                <a href="#"></a>
                                <a href="./board.php"></a>
                            </div>

                        </div>

                        <script>
                            function move(){
                                document.form_mem.action="board_insert.php";
                                document.form_mem.submit();
                            }
                        </script>

                        <?php if($_SESSION['ID']) { ?>
                            <div class="comment">Write</div>
                            <div class="comments">
                                <form enctype="multipart/form-data" method="POST" name="form_mem">
                                    <fieldset>
                                        <legend>
                                            상단 댓글 입력 창
                                        </legend>
                                        <div class="title"><input type=text placeholder="제목" style='width:300px' name="subject" value=<?=$_SESSION['subject']?> ></div>
                                        <div class="input_zone">
                                            <div class="reply_textarea">
                                                <textarea cols="80;" rows="6;" name="content" value="<?=$_SESSION['content']?>" id="top_reply" placeholder="자유롭게 적어주세요."></textarea>
                                                <input type="button" class="input_apply" value="등록" onclick="move();">
                                            </div>
                                            <div class="input_file"><input name="filename" type="file"></div>
                                            
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="upload"></div>

                    <div class="comment_view">comment_view</div>
                    <div class="click"><a href="">이전 댓글 더보기 (1937-1957)</a></div>
                </div>
            </div>

        </main>
<?php include "../footer.php"; ?>