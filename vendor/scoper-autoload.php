<?php

// scoper-autoload.php @generated by PhpScoper

// Backup the autoloaded Composer files
if (isset($GLOBALS['__composer_autoload_files'])) {
    $existingComposerAutoloadFiles = $GLOBALS['__composer_autoload_files'];
}

$loader = require_once __DIR__.'/autoload.php';
// Ensure InstalledVersions is available
$installedVersionsPath = __DIR__.'/composer/InstalledVersions.php';
if (file_exists($installedVersionsPath)) require_once $installedVersionsPath;

// Restore the backup
if (isset($existingComposerAutoloadFiles)) {
    $GLOBALS['__composer_autoload_files'] = $existingComposerAutoloadFiles;
} else {
    unset($GLOBALS['__composer_autoload_files']);
}

// Class aliases. For more information see:
// https://github.com/humbug/php-scoper/blob/master/docs/further-reading.md#class-aliases
if (!function_exists('humbug_phpscoper_expose_class')) {
    function humbug_phpscoper_expose_class(string $exposed, string $prefixed): void {
        if (!class_exists($exposed, false) && !interface_exists($exposed, false) && !trait_exists($exposed, false)) {
            spl_autoload_call($prefixed);
        }
    }
}
humbug_phpscoper_expose_class('ComposerAutoloaderInitccd7c41ac176e9e8d6993c15adfa9ea2', 'Lines202307\ComposerAutoloaderInitccd7c41ac176e9e8d6993c15adfa9ea2');
humbug_phpscoper_expose_class('Normalizer', 'Lines202307\Normalizer');

// Function aliases. For more information see:
// https://github.com/humbug/php-scoper/blob/master/docs/further-reading.md#function-aliases
if (!function_exists('ctype_alnum')) { function ctype_alnum() { return \Lines202307\ctype_alnum(...func_get_args()); } }
if (!function_exists('ctype_alpha')) { function ctype_alpha() { return \Lines202307\ctype_alpha(...func_get_args()); } }
if (!function_exists('ctype_cntrl')) { function ctype_cntrl() { return \Lines202307\ctype_cntrl(...func_get_args()); } }
if (!function_exists('ctype_digit')) { function ctype_digit() { return \Lines202307\ctype_digit(...func_get_args()); } }
if (!function_exists('ctype_graph')) { function ctype_graph() { return \Lines202307\ctype_graph(...func_get_args()); } }
if (!function_exists('ctype_lower')) { function ctype_lower() { return \Lines202307\ctype_lower(...func_get_args()); } }
if (!function_exists('ctype_print')) { function ctype_print() { return \Lines202307\ctype_print(...func_get_args()); } }
if (!function_exists('ctype_punct')) { function ctype_punct() { return \Lines202307\ctype_punct(...func_get_args()); } }
if (!function_exists('ctype_space')) { function ctype_space() { return \Lines202307\ctype_space(...func_get_args()); } }
if (!function_exists('ctype_upper')) { function ctype_upper() { return \Lines202307\ctype_upper(...func_get_args()); } }
if (!function_exists('ctype_xdigit')) { function ctype_xdigit() { return \Lines202307\ctype_xdigit(...func_get_args()); } }
if (!function_exists('grapheme_extract')) { function grapheme_extract() { return \Lines202307\grapheme_extract(...func_get_args()); } }
if (!function_exists('grapheme_stripos')) { function grapheme_stripos() { return \Lines202307\grapheme_stripos(...func_get_args()); } }
if (!function_exists('grapheme_stristr')) { function grapheme_stristr() { return \Lines202307\grapheme_stristr(...func_get_args()); } }
if (!function_exists('grapheme_strlen')) { function grapheme_strlen() { return \Lines202307\grapheme_strlen(...func_get_args()); } }
if (!function_exists('grapheme_strpos')) { function grapheme_strpos() { return \Lines202307\grapheme_strpos(...func_get_args()); } }
if (!function_exists('grapheme_strripos')) { function grapheme_strripos() { return \Lines202307\grapheme_strripos(...func_get_args()); } }
if (!function_exists('grapheme_strrpos')) { function grapheme_strrpos() { return \Lines202307\grapheme_strrpos(...func_get_args()); } }
if (!function_exists('grapheme_strstr')) { function grapheme_strstr() { return \Lines202307\grapheme_strstr(...func_get_args()); } }
if (!function_exists('grapheme_substr')) { function grapheme_substr() { return \Lines202307\grapheme_substr(...func_get_args()); } }
if (!function_exists('mb_check_encoding')) { function mb_check_encoding() { return \Lines202307\mb_check_encoding(...func_get_args()); } }
if (!function_exists('mb_chr')) { function mb_chr() { return \Lines202307\mb_chr(...func_get_args()); } }
if (!function_exists('mb_convert_case')) { function mb_convert_case() { return \Lines202307\mb_convert_case(...func_get_args()); } }
if (!function_exists('mb_convert_encoding')) { function mb_convert_encoding() { return \Lines202307\mb_convert_encoding(...func_get_args()); } }
if (!function_exists('mb_convert_variables')) { function mb_convert_variables() { return \Lines202307\mb_convert_variables(...func_get_args()); } }
if (!function_exists('mb_decode_mimeheader')) { function mb_decode_mimeheader() { return \Lines202307\mb_decode_mimeheader(...func_get_args()); } }
if (!function_exists('mb_decode_numericentity')) { function mb_decode_numericentity() { return \Lines202307\mb_decode_numericentity(...func_get_args()); } }
if (!function_exists('mb_detect_encoding')) { function mb_detect_encoding() { return \Lines202307\mb_detect_encoding(...func_get_args()); } }
if (!function_exists('mb_detect_order')) { function mb_detect_order() { return \Lines202307\mb_detect_order(...func_get_args()); } }
if (!function_exists('mb_encode_mimeheader')) { function mb_encode_mimeheader() { return \Lines202307\mb_encode_mimeheader(...func_get_args()); } }
if (!function_exists('mb_encode_numericentity')) { function mb_encode_numericentity() { return \Lines202307\mb_encode_numericentity(...func_get_args()); } }
if (!function_exists('mb_encoding_aliases')) { function mb_encoding_aliases() { return \Lines202307\mb_encoding_aliases(...func_get_args()); } }
if (!function_exists('mb_get_info')) { function mb_get_info() { return \Lines202307\mb_get_info(...func_get_args()); } }
if (!function_exists('mb_http_input')) { function mb_http_input() { return \Lines202307\mb_http_input(...func_get_args()); } }
if (!function_exists('mb_http_output')) { function mb_http_output() { return \Lines202307\mb_http_output(...func_get_args()); } }
if (!function_exists('mb_internal_encoding')) { function mb_internal_encoding() { return \Lines202307\mb_internal_encoding(...func_get_args()); } }
if (!function_exists('mb_language')) { function mb_language() { return \Lines202307\mb_language(...func_get_args()); } }
if (!function_exists('mb_list_encodings')) { function mb_list_encodings() { return \Lines202307\mb_list_encodings(...func_get_args()); } }
if (!function_exists('mb_ord')) { function mb_ord() { return \Lines202307\mb_ord(...func_get_args()); } }
if (!function_exists('mb_output_handler')) { function mb_output_handler() { return \Lines202307\mb_output_handler(...func_get_args()); } }
if (!function_exists('mb_parse_str')) { function mb_parse_str() { return \Lines202307\mb_parse_str(...func_get_args()); } }
if (!function_exists('mb_scrub')) { function mb_scrub() { return \Lines202307\mb_scrub(...func_get_args()); } }
if (!function_exists('mb_str_split')) { function mb_str_split() { return \Lines202307\mb_str_split(...func_get_args()); } }
if (!function_exists('mb_stripos')) { function mb_stripos() { return \Lines202307\mb_stripos(...func_get_args()); } }
if (!function_exists('mb_stristr')) { function mb_stristr() { return \Lines202307\mb_stristr(...func_get_args()); } }
if (!function_exists('mb_strlen')) { function mb_strlen() { return \Lines202307\mb_strlen(...func_get_args()); } }
if (!function_exists('mb_strpos')) { function mb_strpos() { return \Lines202307\mb_strpos(...func_get_args()); } }
if (!function_exists('mb_strrchr')) { function mb_strrchr() { return \Lines202307\mb_strrchr(...func_get_args()); } }
if (!function_exists('mb_strrichr')) { function mb_strrichr() { return \Lines202307\mb_strrichr(...func_get_args()); } }
if (!function_exists('mb_strripos')) { function mb_strripos() { return \Lines202307\mb_strripos(...func_get_args()); } }
if (!function_exists('mb_strrpos')) { function mb_strrpos() { return \Lines202307\mb_strrpos(...func_get_args()); } }
if (!function_exists('mb_strstr')) { function mb_strstr() { return \Lines202307\mb_strstr(...func_get_args()); } }
if (!function_exists('mb_strtolower')) { function mb_strtolower() { return \Lines202307\mb_strtolower(...func_get_args()); } }
if (!function_exists('mb_strtoupper')) { function mb_strtoupper() { return \Lines202307\mb_strtoupper(...func_get_args()); } }
if (!function_exists('mb_strwidth')) { function mb_strwidth() { return \Lines202307\mb_strwidth(...func_get_args()); } }
if (!function_exists('mb_substitute_character')) { function mb_substitute_character() { return \Lines202307\mb_substitute_character(...func_get_args()); } }
if (!function_exists('mb_substr')) { function mb_substr() { return \Lines202307\mb_substr(...func_get_args()); } }
if (!function_exists('mb_substr_count')) { function mb_substr_count() { return \Lines202307\mb_substr_count(...func_get_args()); } }
if (!function_exists('normalizer_is_normalized')) { function normalizer_is_normalized() { return \Lines202307\normalizer_is_normalized(...func_get_args()); } }
if (!function_exists('normalizer_normalize')) { function normalizer_normalize() { return \Lines202307\normalizer_normalize(...func_get_args()); } }
if (!function_exists('setproctitle')) { function setproctitle() { return \Lines202307\setproctitle(...func_get_args()); } }
if (!function_exists('trigger_deprecation')) { function trigger_deprecation() { return \Lines202307\trigger_deprecation(...func_get_args()); } }

return $loader;
