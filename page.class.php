<?php
require_once(__DIR__.'/page.interface.php');
class PukiwikiPage implements PageI{
static function check_readable(){return TRUE; }
function read_auth(){return TRUE; }
function edit_auth(){return TRUE; }
}
