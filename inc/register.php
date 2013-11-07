<?php

    if (ctype_alnum($un)) {
        if(strlen($un)>3){
            $emresult = filter_var( $em, FILTER_VALIDATE_EMAIL );
            if($emresult){

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
        $sql2    = 'SELECT * FROM users WHERE email = "'.$em.'"';
        $result = mysql_query($sql, $link);
        $result2 = mysql_query($sql2, $link);
        $num_rows = mysql_num_rows($result);
        $num_rows2 = mysql_num_rows($result2);

        //if no user exist then creat user
          if ($num_rows<1) {
               //Create new account
            if ($num_rows2>1){
              echo $_GET['callback'] . '(' . "{'status' : 'Email is already in use'}" . ')';
            }
            else{
           
          if (mysqli_connect_errno())
            {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            $err = mysqli_connect_error();
            echo $_GET['callback'] . '(' . "{'status' : 'Failed to connect to MySQL: $err'}" . ')';
            }
            else{
                $key = md5(uniqid(rand(), true));
              mysqli_query($con,"INSERT INTO users (username, password, email, privilege, act_key)
                  

              VALUES ('".$un."', '".$saltedHash."','".$em."', 0 ,'".$key."')");
              include('emails/register.php');
              echo $_GET['callback'] . '(' . "{'status' : '$un has been registered please check your email at $em to activate your acount. $result'}" . ')';
              mysqli_close($con);
              
            } 
          }
        }
          //Else Username already exist
          else{
            echo $_GET['callback'] . '(' . "{'status' : 'Username $un is taken'}" . ')';
              
          }
        }
            else{
                echo $_GET['callback'] . '(' . "{'status' : 'Please enter a valid email address'}" . ')';
            }
        
        }
        else{
            echo $_GET['callback'] . '(' . "{'status' : 'Username Must be at least 4 letters long'}" . ')';
        }
      }
      else{
          echo $_GET['callback'] . '(' . "{'status' : 'Username may only contain letters and numbers'}" . ')';
      }