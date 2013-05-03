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
 * Inport default configuration file
 */
if (isset($CFG->FRAMEWORK_PATH)) {
    require_once($CFG->FRAMEWORK_PATH . "/config/config.default.php");
} else {
    require_once($_SERVER["DOCUMENT_ROOT"] . "/../framework/config/config.default.php");
}

/* 
 * Start the session
 */
if ($CFG->start_session) {
    session_start();
}

/*
 * Inport custom configuration file
  */
if (isset($CFG->CONFIG_FILE)) {
    require_once($CFG->CONFIG_FILE);
} else {
    require_once($_SERVER["DOCUMENT_ROOT"] . "/../site/config.php");
}

if (isset($CFG->default_charset) && !empty($CFG->default_charset)) {
    header("Content-Type: text/html; charset=" . $CFG->default_charset);
    ini_set('default_charset', $CFG->default_charset);
}

/* 
 * Define paths used in the application
 */
define("DOC_PATH",$CFG->DOC_PATH);
define("FRAMEWORK_PATH",$CFG->FRAMEWORK_PATH);
define("PUBLIC_PATH",$CFG->PUBLIC_PATH);
define("SITE_PATH",$CFG->SITE_PATH);
define("DATA_PATH",$CFG->DATA_PATH);

    
/*
 * Set error reporting
 */
if ($CFG->debug) {
    $CFG->debug_data = "";
    ini_set("display_errors",1);
    error_reporting(E_ALL);
}

/*
 * Connect to db
 */
if (isset($CFG->mysql_host) && !empty($CFG->mysql_host)) {
    if ($CFG->mysql_extension == 'mysql') {
        mysql_connect($CFG->mysql_host, $CFG->mysql_username, $CFG->mysql_password);
        mysql_select_db($CFG->mysql_db);
    }
}

/*
 * Import framework libraries and classes
 */
require_once(FRAMEWORK_PATH . "/library/JLV_Core.php");
require_once(FRAMEWORK_PATH."/library/JLV_lib.php");

/*
 * Import custom libraries and classes
 */
@include_once(SITE_PATH."/library/custom.methods.php");
foreach($CFG->include_libraries as $libname) {
	if (file_exists(SITE_PATH."/library/lib.".$libname.".php")) {
		@include_once(SITE_PATH."/library/lib.".$libname.".php");
	}
} 


/*
 * Escape input variables
 */
if ($CFG->mysql_escape_http_post && isset($_POST) && count($_POST)) {
    $_POST = JLV_EscapeArray($_POST);
}
if ($CFG->mysql_escape_http_get && isset($_GET) && count($_GET)) {
    $_GET = JLV_EscapeArray($_GET);
}
?>