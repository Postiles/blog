<?php

    /* 
     * Example Subscription Script by Anthony Ogden <hide@address.com>
     * 
     * This script should work on PHP 4 or 5 and servces as a beginners example for creating a
     * subscribe/unsubscribe facility.
     * 
     * Visit http://www.og9.co.uk/
     * 
     */ 


    error_reporting(E_ALL);
    ini_set('display_errors', true);
    define('DATABASE_HOST', 'enter hostname here');
    define('DATABASE_USER', 'enter username here');
    define('DATABASE_PASS', 'enter password here');
    define('DATABASE_NAME', 'enter database here');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>OG9 Beginner Tutorial - PHP Newsletter Subscription</title>
</head>
<body>
<?php
  
  /* IF "POST" REQUEST SAVES USER RESPONSE IN DATABASE */  
  if ( isset($_POST['sbmt']) )
  {
  
    @mysql_connect( DATABASE_HOST, DATABASE_USER, DATABASE_PASS) or die('Unable to connect to database server.');
    @mysql_select_db( DATABASE_NAME ) or die('Cannot select specified database.');
   
    # get the action/inputs and then generate new variables from inputs that are mysql escaped  ($db_firstname etc.)
    $action = strtolower($_POST['sbmt']);   
    $inputs = $_POST['inputs'];
    foreach( $inputs as $key=>$value )
        ${"db_$key"} = mysql_real_escape_string($value);
    
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
                $sql = "INSERT INTO subscriptions ( firstname, lastname, email ) VALUES ( '$db_firstname', '$db_lastname', LOWER('$db_email') );";
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
            
        case 'unsubscribe';
            $sql = "DELETE FROM subscriptions WHERE email = '$db_email' LIMIT 1;";
            $result = mysql_query($sql) or die(mysql_error());
            if ( mysql_affected_rows() > 0 )
                $message = 'You have been unsubscribed.';
            else
                $message = 'The address was not present in our subscriptions database.';
                
            break;
            
        default:
            $message = 'Unknown action was not processed.';
            break;
    }

    # output the result
    echo '<h1>Thank you for your ' . htmlentities($action) . ' request.</h1>';
    echo '<p>' . htmlentities($message) . '</p>';
    echo '<p><a href="' . $_SERVER['PHP_SELF'] . '">Back</a></p>';
    exit();
      
  }
  
  /* OTHERWISE, "GET" REQUEST DISPLAYS FORM */  
  ?>
  
  <!-- BEGIN: Newsletter Subscription Form -->
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  
    <fieldset>
    <legend>Newsletter Subscription Request</legend>
    <p>To <em>subscribe</em> to our newsletter, please enter your details and <em>click Subscribe</em>.   You can also <em>unsubscribe</em>, enter your email address only and <em>click Unsubscribe</em>.</p>
    <p>Firstname<br /><input type="text" name="inputs[firstname]" value="" /></p>
    <p>Surname<br /><input type="text" name="inputs[lastname]" value="" /></p>
    <p>Email<br /><input type="text" name="inputs[email]" value="" /></p>
    <p><input type="submit" name="sbmt" value="Subscribe" /><input type="submit" name="sbmt" value="Unsubscribe" /></p>
    </fieldset>
  
  </form>
  <!-- ENOF: Newsletter Subscription Form -->
  
  </body>
  </html>
