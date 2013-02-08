<?php
//convert_htmlに必要なグローバル変数と定数
//convert_html用の設定
if (! defined('PLUGIN_DIR')) 
 define('PLUGIN_DIR',__DIR__.'/plugin/');
//ページ名を指定しない時に表示されるページの名前
if (! defined('DEFAULT_PAGE'))
  define('DEFAULT_PAGE','FrontPage');// $defaultpage  = 'FrontPage';
//autolinkを有効にする場合にはTRUE
if( !defined('AUTOLINK')) 
  define('AUTOLINK',TRUE);// $autolink = TRUE;
//未作成ページの場合リンクが設定される文字
//$_symbol_noexists = '?';
define('SYMBOL_NOEXISTS','?');
//ソーステキストの改行を有効にする場合にはTRUE
define('LINE_BREAK',TRUE);
//wikiname(大文字始まりの英単語が二つ以上続いた単語)に対する自動リンクを有効にするか
if( !defined('NO_WIKINAME')) 
  define('NO_WIKINAME',FALSE);// $nowikiname = FALSE;
//画面上部へ戻るリンク
define('TOP','<div class="jumpmenu"><a href="#toolmenu">&uarr;</a></div>');
//$top = '<div class="jumpmenu"><a href="#toolmenu">&uarr;</a></div>';
//defaultは0でkeitaiは1だった
//FALSEだとget_pg_passage呼ぶからTRUEにしとく
define('LINK_COMPACT',TRUE);//$link_compact = TRUE;

// PKWK_READONLY - Prohibits editing and maintain via WWW
//   NOTE: Counter-related functions will work now (counter, attach count, etc)
if (! defined('PKWK_READONLY'))
	define('PKWK_READONLY', FALSE); // 0 or 1

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

//変更の必要がなさそうな物
if (!defined('INTERWIKI'))
  define('INTERWIKI','InterWikiName');//$interwiki;
define('WIKI_NAME','(?:[A-Z][a-z]+){2,}(?!\w)');
define('PREFORMAT_LTRIM',TRUE); //$preformat_ltrim = TRUE;
define('HR','<hr class="full_hr">');//$hr
define('SYMBOL_ANCHOR','&dagger;');//$symbok_anchor
define('NOTE_PATTERN','/\(\(((?:(?>(?:(?!\(\()(?!\)\)(?:[^\)]|$)).)+)|(?R))*)\)\)/ex');//$NotePattern
define('BRACKET_NAME','(?!\s):?[^\r\n\t\f\[\]<>#&":]+:?(?<!\s)');//$BracketName
define('LIST_PAD_STR',' class="list%d"');//$list_pad_str
define('PKWK_ENCODING_HINT', isset($_LANG['encode_hint'][LANG]) ? $_LANG['encode_hint'][LANG] : '');
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
//グローバル変数の初期化
$foot_explain = array();	// Footnotes
$related      = array();	// Related pages
$head_tags    = array();	// XHTML tags in <head></head>
?>
