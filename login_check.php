<?php 
    session_start();
    if(isset($_REQUEST['submit']))
    {
        $username = trim($_REQUEST['username']);
        $password = trim($_REQUEST['password']);

        if($username == null || empty($password))
        {
            echo "Null username/password";
        }
        elseif($username == $password)
            {
                //echo "valid user";
                $_SESSION['status'] = true;
                $_SESSION['username'] = $username;
                header('location: home_page.php');
            }
    
    }
    else
        {
            //echo "invalid request!";
            header('location: login_page.html');
        }

?>