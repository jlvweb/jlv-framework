<?php
$CFG->FRAMEWORK_PATH = $_SERVER["DOCUMENT_ROOT"]."/../framework";
$CFG->CONFIG_FILE = $_SERVER["DOCUMENT_ROOT"]."/../site/config.php";
require_once("../framework/library/init.php");
$Core = new JLV_Core();
$Core->buildPage();
?>