<?php
/*
 * ABOUT THIS FILE
 * Put your custom function or includes here
 * This will load in the init-file, before actions
 *
 * The functions  belove are some useful bonus functions included.
 * They are not used by the framework and can be deleted
 */

/* 
 * Performing a redirect with header:location. Default location is the current URL (Refreshing the page)
 */
function refresh($url="") {
    if (empty($url)) $url = me();
    if (headers_sent()) {
        echo '<meta http-equiv="Refresh" content="0; url='.$url.'">';
        exit;
    } else {
        header("Location: $url");
        exit;
    }
}

/* 
 * Returning the current location URI
 */
function me($include_querystring=false) {
	$url = (isset($_SERVER['REQUEST_URI'])) ? $_SERVER['REQUEST_URI'] : $_SERVER['PHP_SELF'];
	return ($include_querystring) ? $url : stripQuerystring($url);
}

/* 
 * Stripping the query string from an URL and returning the clean URL
 */
function stripQuerystring($url) {
	return ($commapos = strpos($url, '?')) ? substr($url, 0, $commapos) : $url;
}
?>