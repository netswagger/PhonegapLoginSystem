<?php
$un = $_GET['un'];
$key = $_GET['key'];

include("config.php");



 if (!$link = mysql_connect($host, $user, $pass)) {
            echo  'Could not connect to mysql';
            exit;
        }

 if (!mysql_select_db($db, $link)) {
            echo 'Could not select database';
            exit;
        }
        
        $sql    = 'SELECT * FROM users WHERE act_key = "'.$key.'" AND username = "'.$un.'"';
        $result = mysql_query($sql, $link);
        $num_rows = mysql_num_rows($result);

        //if no user exist then report error
          if ($num_rows<1) {
            
           echo 'Invalid activation';
          
        }
          //Else Say we're logged in
          else{
            $sql    = 'UPDATE users SET privilege=1 WHERE act_key = "'.$key.'" AND username = "'.$un.'"';
            $result = mysql_query($sql, $link);
            if (!$result) {
                die('Invalid query: ' . mysql_error());
            }
            
            echo 'Your account is now active';
              
          }



