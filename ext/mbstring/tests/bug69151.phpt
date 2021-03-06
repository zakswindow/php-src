--TEST--
Bug #69151 (mb_ereg should reject ill-formed byte sequence)
--SKIPIF--
<?php extension_loaded('mbstring') or die('skip mbstring not available'); ?>
--FILE--
<?php
$str = "\x80";
var_dump(
    false === mb_eregi('.', $str, $matches),
    [] === $matches,
    NULL === mb_ereg_replace('.', "\\0", $str),
    false === mb_ereg_search_init("\x80", '.'),
    false === mb_ereg_search()
);
?>
--EXPECT--
bool(true)
bool(true)
bool(true)
bool(true)
bool(true)
