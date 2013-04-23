<?php
/* =============================================================
 * JLV Framwork
 * https://github.com/jlvweb/jlv-framework
 * =============================================================
 * Copyright 2013 Johan Lingvall
 * 
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * 
 * http://www.apache.org/licenses/LICENSE-2.0
 * 
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * ============================================================= */
 
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