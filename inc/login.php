<?php

        
        if (!$link = mysql_connect($host, $user, $pass)) {
            echo $_GET['callback'] . '(' . "{'status' : 'Could not connect to mysql'}" . ')';
            exit;
        }

        if (!mysql_select_db($db, $link)) {
            echo $_GET['callback'] . '(' . "{'status' : 'Could not select database'}" . ')';
            exit;
        }
        
        $sql    = 'SELECT * FROM users WHERE username = "'.$un.'" AND password = "'.$saltedHash.'"';
        $result = mysql_query($sql, $link);
        $num_rows = mysql_num_rows($result);

        //if no user exist then report error
          if ($num_rows<1) {
            
           echo $_GET['callback'] . '(' . "{'status' : 'Invalid username or password'}" . ')';
          
        }
          //Else Say we're logged in
          else{
            $sql    = 'SELECT * FROM users WHERE username = "'.$un.'" AND privilege = 1';
            $result = mysql_query($sql, $link);
            $num_rows = mysql_num_rows($result);
             if ($num_rows<1) {
                 echo $_GET['callback'] . '(' . "{'status' : 'The account for $un has not been activated yet. Please check your email for activation link.'}" . ')';
             }
             else{
                echo $_GET['callback'] . '(' . "{'status' : 'logged-in'}" . ')';
             }
          }