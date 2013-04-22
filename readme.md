FILESTRUCTURE
=============
* data
* public
* framework
  * library
  * config
* site
  * library
  * pages
  * shells


INSTALLATION
============
1.  Copy files to the server
2.  Set "public" directory to be your public http document root
3.  Edit site/config.php to set up your site


HOW TO WORK WITH JLV FRAMEWORK
==============================
The shell
----------
The shell contains the core elements of the site, such as header, navigation, footer and so on
Build the shell and set the function $this->fetchView() where you want the page specific content to appear. 

Pages
--------
In the pages directory you put php-files that referes to different URL:s. 
For example, if someone visits 
*example.com/something/some-other-thing
The framework will try to execute the script
*site/pages/something/some-other-thing.php
Put code that controlles the page here. 

Views
--------
In the page file, you should create the function view(); That function will be called in your shell by the function $this->fetchView().
In the view() function you can put all visible content specific for this current URL