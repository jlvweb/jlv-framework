<?php
/* 
 * Framework paths 
 */
$CFG->DOC_PATH = $_SERVER["DOCUMENT_ROOT"];
if (!isset($CFG->FRAMEWORK_PATH)) $CFG->FRAMEWORK_PATH = $_SERVER["DOCUMENT_ROOT"]."/../framework";
if (!isset($CFG->SITE_PATH)) $CFG->SITE_PATH = $_SERVER["DOCUMENT_ROOT"]."/../site";
$CFG->PUBLIC_PATH = $_SERVER["DOCUMENT_ROOT"]."/../public";
$CFG->DATA_PATH = $_SERVER["DOCUMENT_ROOT"]."/../data";

// Core settings
$CFG->debug = false;
$CFG->start_session = true;
$CFG->url_rules = array();
    // $CFG->url_rules["/^urltest-([0-9]+)$/"] = 'urltest.php';
$CFG->url_vars = array();
$CFG->include_libraries = array();
$CFG->autoload_classes = array();

/*
* Database
*/
$CFG->mysql_extension = "mysql"; // or mysqli
$CFG->mysql_host = "";
$CFG->mysql_username = "";
$CFG->mysql_password = "";
$CFG->mysql_db = "";
$CFG->mysql_escape_http_post = true;
$CFG->mysql_escape_http_get = true;
    
/* 
 * HTML/Shell
 */
$CFG->shell = "default.php";
$CFG->default_charset = 'utf-8'; // This is also defined in public/.htaccess
?>