<?php

// Put code that should execute before anything is loaded here

function view() {
    global $CFG; // This row will make all variables inside the CFG object available here
    
    // Put code that should execute inside the shell here
    echo 'Hello world!';
    
}
?>