<?php
// need to have the password store here
    error_reporting(E_ALL);
    ini_set('display_errors', true);
    define('DATABASE_HOST', 'localhost');
    define('DATABASE_USER', 'root');
    define('DATABASE_PASS', 'postile123');
    define('DATABASE_NAME', 'typecho');

    @mysql_connect( DATABASE_HOST, DATABASE_USER, DATABASE_PASS) or die('Unable to connect to database server.');
    @mysql_select_db( DATABASE_NAME ) or die('Cannot select specified database.');
   
    # get the action/inputs and then generate new variables from inputs that are mysql escaped  ($db_firstname etc.)
    $action = strtolower($_POST['sbmt']);   
    $input = $_POST['inputs'];
    ${"db_email"} = mysql_real_escape_string($input);
    
    # action based on value of "sbmt" submit button
    switch ( $action )
    {
        case 'subscribe':
            if ( trim($db_email) == '' )
            {
                $message = 'You must supply an email address!';
                break;
            }
            
            $sql   = "SELECT COUNT(email) FROM subscriptions WHERE email = LOWER('$db_email');";
            $ds    = mysql_query($sql);
            $count = (int)mysql_result($ds, 0);
            if ( $count == 0 )
            {            
                $sql = "INSERT INTO subscriptions ( email ) VALUES ( LOWER('$db_email') );";
                $result  = mysql_query( $sql );
                if ( !$result )
                    $message = 'Unable to enter your details in our database at this time: ' . mysql_error();
                else
                    $message = 'Thank you, you have been  successfully subscribed.';
            }
            else
            {
                $message = 'The email address is already subscribed.';
            }
            break;
        default:
            $message = 'Unknown action was not processed.';
            break;
    }

    echo $message;