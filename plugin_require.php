<?php
// PukiWiki - Yet another WikiWikiWeb clone.
// $Id: file.php,v 1.72 2006/06/11 14:42:09 henoheno Exp $
// Copyright (C)
//   2002-2006 PukiWiki Developers Team
//   2001-2002 Originally written by yu-ji
// License: GPL v2 or (at your option) any later version
//
// File related functions
require_once('page.class.php');
// Get source(wiki text) data of the page
function check_readable($page, $auth_flag = TRUE, $exit_flag = TRUE)
{
  return PukiwikiPage::check_readable($page, $auth_flag,$exit_flag);
}
function get_source($page = NULL, $lock = TRUE, $join = FALSE)
{
	$result = $join ? '' : array();

	if (is_page($page)) {
		$path  = get_filename($page);

		if ($lock) {
			$fp = @fopen($path, 'r');
			if ($fp == FALSE) return $result;
			flock($fp, LOCK_SH);
		}

		if ($join) {
			// Returns a value
			$result = str_replace("\r", '', fread($fp, filesize($path)));
		} else {
			// Returns an array
			// Removing line-feeds: Because file() doesn't remove them.
			$result = str_replace("\r", '', file($path));
		}

		if ($lock) {
			flock($fp, LOCK_UN);
			@fclose($fp);
		}
	}

	return $result;
}

// Get physical file name of the page
function get_filename($page)
{
	return DATA_DIR . encode($page) . '.txt';
}
?>
