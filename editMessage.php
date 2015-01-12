<?php
    $xml = simplexml_load_file("board.xml");
    $comment = $xml->xpath('/board/comment')[$_GET['id']];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>留言</title>
    </head>
    <body>
        <h2 style="text-align: center">留言修改</h2>
        <form action="edit.php?id=<?php echo $_GET['id'] ?>" method="post" style="width: 500px;margin: auto;text-align: center">
            <table border="1">
                <tr>
                    <td><label for="name">留言者</label></td>
                    <td>
                        <input type="text" name="name" id="name" style="width: 370px" value="<?php echo $comment->xpath('name')[0] ?>"/>
                    </td>
                </tr>
                <tr>
                    <td><label for="message">留言內容</label></td>
                    <td>
                        <textarea id="message" name="message" cols="50" rows="20" style="resize: none">
<?php echo $comment->xpath('message')[0] ?>
                        </textarea>
                    </td>
                </tr>
            </table>
            <input type="submit" value="修改" style="font-size: 20px"/>
        </form>
    </body>
</html>
