<?php
    if($_POST['name']==NULL||$_POST['message']==NULL)
    {
        echo "<script>alert('留言錯誤!請輸入留言人和留言內容!');location.href='addMessage.html'</script>";
    }
    else{
        $xml = simplexml_load_file("board.xml");
        $board = $xml;
        $board = $board->addChild('comment');
        $board->addChild('name',$_POST['name']);
        $board->addChild('message',$_POST['message']);
        $xml->asXML("board.xml");
        echo "<script>location.href='index.php'</script>";
    }
?>