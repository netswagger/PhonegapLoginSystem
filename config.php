<?php


 
 if($_SERVER['HTTP_HOST'] == 'localhost:8888'){
    $siteName = 'Mobile Login';
    $domain = 'localhost:8888';
    $host = 'localhost';
    $user = 'root';
    $pass = 'root';
    $db = 'json';
 } 
 if($_SERVER['HTTP_HOST'] == 'bencbond.com'){
    $siteName = 'Mobile Login';
    $domain = 'bencbond.com/login';
    $host = 'localhost';
    $user = '********';
    $pass = '********';
    $db = 'bencbo5_json';
 }
