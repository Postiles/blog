<?php
    error_reporting(E_ALL);
    ini_set('display_errors', true);
    define('DATABASE_HOST', 'localhost');
    define('DATABASE_USER', 'root');
    define('DATABASE_PASS', 'root');
    define('DATABASE_NAME', 'typecho');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Subscribe to Postile</title>
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
  
    <p>Email<br /><input type="text" name="inputs[email]" value="" /></p>
    <input type="submit" name="sbmt" value="Subscribe" />
  
  </form>
  <!-- ENOF: Newsletter Subscription Form -->
  
  </body>
  </html>
