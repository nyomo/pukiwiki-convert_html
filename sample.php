<?php
require_once("func.php");
require_once("convert_html.php");
$lines = array("test","*test","[[hoge]]","+リスト","+list","''hoge''");
$html = convert_html($lines);
echo $html;
?>
