<?php
/* 
 * Framework methods
 */
function __autoload($class_name) {
    global $CFG;
    if (isset($CFG->autoload_classes) && in_array($class_name, $CFG->autoload_classes) && file_exists(SITE_PATH . "/library/class.".$class_name.".php")) {
        include_once(SITE_PATH . "/library/class.".$class_name.".php");
    }
}
function JLV_EscapeArray($inp) {
    if (is_array($inp)) {
        foreach ($inp as $key => $value) {
            if (is_array($inp[$key])) {
                $inp[$key] = JLV_EscapeArray($inp[$key]);
            } else {
                if (get_magic_quotes_gpc()) {
                    $inp[$key] = mysql_real_escape_string(stripslashes((string)$inp[$key]));
                } else {
                    $inp[$key] = mysql_real_escape_string((string)$inp[$key]);	
                }
            }
        }
    }
    return $inp;
}
?>