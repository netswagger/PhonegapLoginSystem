<?php

        $con=mysqli_connect($host,$user,$pass,$db);


        if (!$link = mysql_connect($host, $user, $pass)) {
            echo $_GET['callback'] . '(' . "{'status' : 'Could not connect to mysql'}" . ')';
            exit;
        }

        if (!mysql_select_db($db, $link)) {
            echo $_GET['callback'] . '(' . "{'status' : 'Could not select database'}" . ')';
            exit;
        }
        
        $sql    = 'SELECT * FROM users WHERE username = "'.$un.'"';
        $result = mysql_query($sql, $link);
        $num_rows = mysql_num_rows($result);
        
        //if no user exist then creat user
          if ($num_rows<1) {
            
           echo $_GET['callback'] . '(' . "{'status' : 'available'}" . ')';
          
        }
          //Else Username already exist
          else{
            echo $_GET['callback'] . '(' . "{'status' : 'taken'}" . ')';
              
          }