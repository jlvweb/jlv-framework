# Filestructure
---------------
* data
* public
* framework
  * library
  * config
* site
  * library
  * pages
  * shells


# Installation
---------------
1.  Copy files in the src directory to your server
2.  Set the "public" directory to be your public http document root
3.  Edit site/config.php to set up your site


# How to work with JLV Framework
---------------
### The shell
The shell contains the core elements of the site, such as header, navigation, footer and so on
Build the shell and set the function
```php
$this->fetchView();
```
where you want the page specific content to appear. 

### Pages
In the pages directory you put php-files that referes to different URL:s. 
For example, if someone visits 
*example.com/something/some-other-thing
The framework will try to execute the code in the file
*site/pages/something/some-other-thing.php
Put code that controlles the page here. 

### Views
In the page file, you should create the function 
```php
view();
```
That function will be called in your shell by the adding 
```php
$this->fetchView();
```
In the view() function you can put all visible content specific for this current URL

### URL Rules
In the config file you can setup URL rules. They work similar to rewrite rules you 
might be familiar with in Apaches mod_rewrite. A rule can look something like this:
```php
$CFG->url_rules["/^urltest-([0-9]+)$/"] = 'urltest';
```
When a visitor enters a URL that matches the regular expression /^urltest-([0-9]+)$/
the URL will be rewritten to urltest and it will use the page file urltest.php You
can then catch the number in the URL in the page file, like this:
```php
$entire_url = $CFG->url_vars[0]; // The complete URL
$test_id = $CFG->url_vars[1]; // The match in the first pharentheses
```
Learn more about regular expressions in PHP here http://www.php.net/manual/en/reference.pcre.pattern.syntax.php