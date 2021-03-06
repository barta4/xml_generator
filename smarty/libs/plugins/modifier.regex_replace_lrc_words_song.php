<?php
/**
 * Smarty plugin
 *
 * @package Smarty
 * @subpackage PluginsModifier
 */

/**
 * Smarty regex_replace modifier plugin
 *
 * Type:     modifier<br>
 * Name:     regex_replace<br>
 * Purpose:  regular expression search/replace
 *
 * @link http://smarty.php.net/manual/en/language.modifier.regex.replace.php
 *          regex_replace (Smarty online manual)
 * @author Monte Ohrt <monte at ohrt dot com>
 * @param string       $string   input string
 * @param string|array $search   regular expression(s) to search for
 * @param string|array $replace  string(s) that should be replaced
 * @return string
 */
function smarty_modifier_regex_replace_lrc_words_song($pack, $lan)
{
    $ret = "";
    $words = "";
    $url = "";
    $pat = "/\"(.*)\"@(".$lan."|en).*/";

    if ($pack['properties']['music:words_song']=='PROPERPTY_TYPE_SCALAR') {
        $words = $pack['music:words_song'];    
    } else {
        $words = $pack['music:words_song'][0];
    }

    $words = preg_replace($pat, "$1", $words);
    $url = preg_replace("/.*\\$\\$(.*)/", "$1", $words);
    $words = preg_replace("/(.*)\\$\\$.*/", "$1", $words);

    if (strlen($words) > 1900) {
        $words = substr($words, 0, 1900);
    } else {
        if (0 == strlen($words)) for ($ii = 0; $ii < 2050; $ii++) $words .= "0"; 
        $words .= '\n';
        $words = preg_replace("/(.*\\\\n)\\\\n$/", "$1", $words);
    }
 
    $words = preg_replace("/(([^\\\\]*\\\\n){1,8})(.*)/", "$1", $words);
    $words = preg_replace("/([^\\\\]+)(\\\\n)*/", "$1[br]", $words);

    $ret = "[br]".$words."...[a class=\"gray\" href=\"";
    $ret .= $url;
    $ret .= "\"]";

    if ($lan == "pt") {
        $ret .= preg_replace("/http:\/\/([^\.]*.)([^\/]*)\/.*/", "$1$2", $url);
    } else {
        $ret .= preg_replace("/http:\/\/([^\.]*.)([^\/]*)\/.*/", "$2", $url);
    }    
    
    $ret .= "[/a]";
    
    return $ret; 
}

