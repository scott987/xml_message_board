<?php
    $xml = simplexml_load_file("board.xml");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>簡易留言板</title>
        <style>
            .center{
                width: 800px;
                margin: auto;
            }
            .message{
                width: 800px;
                margin: auto;
                height: 400px;
                border: 3px ridge;
            }
            button{
                height: 50px;
                width: 300px;
                border-radius: 25px;
                font-size: 20px;
            }
        </style>
    </head>
    <body>
        <h1 style="text-align: center;">簡易留言系統</h1>
        <div class="message">
            <table border="0">
                <?php
                    $comments = $xml->xpath('/board/comment');
                    foreach($comments as $i=>$comment)
                    {
                ?><tr>
                <?php
                        echo "<td>".$comment->xpath('name')[0] . ": ".$comment->xpath('message')[0] . "</td>";
                        echo "<td><a href='editMessage.php?id=".$i."'>修改</a> <a href='delete.php?id=".$i."'>刪除</a></td>"
                ?></tr>
                <?php
                    }
                ?>
            </table>
        </div>
        <div class="center" style="text-align: center">
            <a href="addMessage.html"><button>我要留言(￣3￣)</button></a>   
        </div>
        </form>
    </body>
</html>
