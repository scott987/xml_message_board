<?php
    if($_POST['name']==NULL||$_POST['message']==NULL)
    {
        echo "<script>alert('留言錯誤!請輸入留言人和留言內容!');location.href='editMessage.php?id=".$_GET['id']."'</script>";
    }
    else{
        $xml = file_get_contents("board.xml");
        $dom = DOMDocument::loadXML($xml);
        $comment = $dom->getElementsByTagName('comment')->item($_GET['id']);
        $name = $comment->getElementsByTagName('name')->item(0);
        $comment->replaceChild(new DOMElement("name", $_POST['name']),$name);
        $message = $comment->getElementsByTagName('message')->item(0);
        $comment->replaceChild(new DOMElement("message", $_POST['message']),$message);
        $dom->formatOutput = true;
        $dom->saveXML();
        $dom->save("board.xml");
        echo "<script>location.href='index.php'</script>";
    }
?>