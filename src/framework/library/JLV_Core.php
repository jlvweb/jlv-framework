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
 
class JLV_Core 
{
	private $main_file;
	
    /*
     * Setting up variables
     */
	public function __construct() {	
        global $CFG;        
        
		// Get page uri
		$uri = $this->getUri();
		$basefile = basename($uri);
		if (substr($uri,-1) == "/" || empty($basefile)) {
			$basefile = "index";
			$rel_path = $uri;
		} else {
			$rel_path = substr($uri,0,-strlen($basefile));
		}
		if (empty($rel_path)) {
            $rel_path = "/";
		}
        
		// Set action file
		$main_path = SITE_PATH . "/pages";
		$this->main_file = (substr($uri,-4)==".php") ? $main_path.$rel_path.$basefile : $main_path.$rel_path.$basefile.".php";
		if (!file_exists($this->main_file)) {
            $this->main_file = false;
        }
		if (!$this->main_file) {
			$this->main_file = $main_path . "/catcher.php";
		}
	}
	
    /*
     * Including the main file and the shell
     */
	public function buildPage() {
        global $CFG;

        // Include the main page file
		if ($this->main_file) {
            include($this->main_file);
        }
        
        // Include the shell
		if ($shell_full_path = $this->getShell()) {
            include($shell_full_path);
        }
	}
    
    /*
     * Returns the full path to the current shell
     */
    private function getShell() {
        global $CFG;
        if (!empty($CFG->shell)) {
            $shell_full_path = SITE_PATH . "/shells/" . basename($CFG->shell);
            return (file_exists($shell_full_path)) ? $shell_full_path : false;
        }
        return false;
    }
	
    /*
     * Executing the view function inside the shell.
     */
    private function fetchView($function_name='') {
        if (!empty($function_name) && function_exists($function_name)) {
            $function_name();
        } else if (function_exists('view')) {
            view();
        }
	}
	
    /*
     * Looping through url rules and returning the current request uri
     */
	private function getUri() {
        global $CFG;
		if (isset($CFG->url_rules) && is_array($CFG->url_rules)) {
			foreach ($CFG->url_rules as $regex => $uri) {
				if (preg_match($regex,$this->me(),$matches)) {
					$CFG->url_vars = $matches;
					return $uri;
				}
			}
		}
		return $this->me();
	}
	
    /*
     * Fetching request uri
     */
	private function me() {
		$url = (isset($_SERVER['REQUEST_URI'])) ? $_SERVER['REQUEST_URI'] : $_SERVER['PHP_SELF'];
        return ($commapos = strpos($url, '?')) ? substr($url, 0, $commapos) : $url;
	}
}
?>