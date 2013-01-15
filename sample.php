<?php
$lines = array("test","*test","[[hoge]]","+リスト","+list","''hoge''");
$html = convert_html($lines);
echo $html;
?>
