<?php

// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Start a session
session_start();

// Require the autoload file
require_once("vendor/autoload.php");

// Instantiate the F3 Base Class
$f3 = Base::instance();

// Default route
$f3->route('GET /', function($f3)
{
    //echo '<h1>Week 5</h1>';

    // Create variables in the hive
    $f3->set('username', 'jshmo');
    $f3->set('password', sha1('Password01'));
    $f3->set('title', 'Working with Templates');
    $f3->set('temp', 67);
    $f3->set('color', "purple");
    $f3->set('radius', '10');

    // Define an array of bookmarks
    $f3->set('bookmarks', array('http://ww.cnet.com', 'http://www.reddit.com/r/news', 'http://edition.cnn.com/sport'));

    // Define an associative array of desserts
    $f3->set('desserts', array("chocolate"=>"Chocolate Mousse", "vanilla"=>"Vanilla Custard", "strawberry"=>"Strawberry Shortcake"));

    // Conditional Content
    $f3->set('preferredCustomer', true);
    $f3->set('lastLogin', strtotime('-1 week'));

    // Display template
    $view = new Template();
    echo $view->render('views/info.html');
});

// Run F3
$f3->run();

