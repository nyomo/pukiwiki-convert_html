<?php
require_once("conf.php");
require_once("convert_html.php");
$vars = array('page'=>'hoge');
$lines = array("test","*test","[[hoge]]","+リスト","+list","''hoge''","#includex(hoge,off)","#hr()");
$html = convert_html($lines);
echo $html;
?>
