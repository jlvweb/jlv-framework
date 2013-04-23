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