<?php
//ページのデータが存在するか調べる関数
function page_exists($pagename){
	return file_exists(get_filename($pagename));
}
?>
