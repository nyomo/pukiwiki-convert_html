<?php
//convert_htmlに必要なグローバル変数と定数
//convert_html用の設定
//ページ名を指定しない時に表示されるページの名前
$defaultpage  = 'FrontPage';
//autolinkを有効にする場合にはTRUE
$autolink = TRUE;
//未作成ページの場合リンクが設定される文字
$_symbol_noexists = '?';
//ソーステキストの改行を有効にする場合にはTRUE
$line_break = TRUE;
//wikiname(大文字始まりの英単語が二つ以上続いた単語)に対する自動リンクを有効にするか
$nowikiname = FALSE;
//画面上部へ戻るリンク
$top = '<div class="jumpmenu"><a href="#toolmenu">&uarr;</a></div>';
//defaultは0でkeitaiは1だった
//FALSEだとget_pg_passage呼ぶからTRUEにしとく
$link_compact = TRUE;

// PKWK_READONLY - Prohibits editing and maintain via WWW
//   NOTE: Counter-related functions will work now (counter, attach count, etc)
if (! defined('PKWK_READONLY'))
	define('PKWK_READONLY', FALSE); // 0 or 1

//変更の必要がなさそうな物
$preformat_ltrim = TRUE;
$interwiki    = 'InterWikiName';
$hr = '<hr class="full_hr">';
$_symbol_anchor   = '&dagger;';
$NotePattern = '/\(\(((?:(?>(?:(?!\(\()(?!\)\)(?:[^\)]|$)).)+)|(?R))*)\)\)/ex';
$BracketName='(?!\s):?[^\r\n\t\f\[\]<>#&":]+:?(?<!\s)';
$_list_pad_str = ' class="list%d"';
$line_rules = array(
  'COLOR\(([^\(\)]*)\){([^}]*)}'  => '<span style="color:$1">$2</span>',
  'SIZE\(([^\(\)]*)\){([^}]*)}' => '<span style="font-size:$1px">$2</span>',
  'COLOR\(([^\(\)]*)\):((?:(?!COLOR\([^\)]+\)\:).)*)' => '<span style="color:$1"
>$2</span>',
  'SIZE\(([^\(\)]*)\):((?:(?!SIZE\([^\)]+\)\:).)*)' => '<span class="size$1">$2<
/span>',
  '%%%(?!%)((?:(?!%%%).)*)%%%'  => '<ins>$1</ins>',
  '%%(?!%)((?:(?!%%).)*)%%' => '<del>$1</del>',
  "'''(?!')((?:(?!''').)*)'''"  => '<em>$1</em>',
  "''(?!')((?:(?!'').)*)''" => '<strong>$1</strong>',
);
$foot_explain = array();	// Footnotes
$related      = array();	// Related pages
$head_tags    = array();	// XHTML tags in <head></head>

define('WIKI_NAME','(?:[A-Z][a-z]+){2,}(?!\w)');
// 脚注のアンカーに埋め込む本文の最大長
define('PKWK_FOOTNOTE_TITLE_MAX', 16); // Characters

// 脚注のアンカーを相対パスで表示する (FALSE = 絶対パス)
//  * 相対パスの場合、以前のバージョンのOperaで問題になることがあります
//  * 絶対パスの場合、calendar_viewerなどで問題になることがあります
// (詳しくは: BugTrack/698)
define('PKWK_ALLOW_RELATIVE_FOOTNOTE_ANCHOR', TRUE);

// PKWK_DISABLE_INLINE_IMAGE_FROM_URI - Disallow using inline-image-tag for URIs
//   Inline-image-tag for URIs may allow leakage of Wiki readers' information
//   (in short, 'Web bug') or external malicious CGI (looks like an image's URL)
//   attack to Wiki readers, but easy way to show images.
if (! defined('PKWK_DISABLE_INLINE_IMAGE_FROM_URI'))
	define('PKWK_DISABLE_INLINE_IMAGE_FROM_URI', FALSE);

// Multiline plugin hack (See BugTrack2/84)
// EXAMPLE(with a known BUG):
//   #plugin(args1,args2,...,argsN){{
//   argsN+1
//   argsN+1
//   #memo(foo)
//   argsN+1
//   }}
//   #memo(This makes '#memo(foo)' to this)
define('PKWKEXP_DISABLE_MULTILINE_PLUGIN_HACK', TRUE); // TRUE = Disabled

define('PKWK_ENCODING_HINT', isset($_LANG['encode_hint'][LANG]) ? $_LANG['encode_hint'][LANG] : '');
?>

