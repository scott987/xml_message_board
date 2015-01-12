<?php
    $xml = file_get_contents("board.xml");
    $dom = DOMDocument::loadXML($xml);
    $child = $dom->getElementsByTagName('comment')->item($_GET['id']);
    $dom->documentElement->removeChild($child);
    $dom->formatOutput = true;
    $dom->saveXML();
    $dom->save("board.xml");
?>
<script>
    location.href = "index.php";
</script>