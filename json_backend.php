<?php
 if(isset($_GET['pw'])){$pw = $_GET['pw'];$salt='ben_created_this_software';
 $saltedHash = md5( $pw.$salt);}
 
 if(isset($_GET['un'])){$un = $_GET['un'];}
 if(isset($_GET['em'])){$em = $_GET['em'];}
 
 
include('config.php');
 

 $action = $_GET['action'];

    //Redgister Action
    if($action == 'reg'){
        include('inc/register.php');
    }
    
    //Login 
    if($action == 'login'){
        include('inc/login.php');
    }
    
    //check if username is avaiable in realtime
     if($action == 'check'){
        include('inc/check.php');
    }
      //check if username is avaiable in realtime
     if($action == 'forgot'){
        include('inc/forgot.php');
    }
