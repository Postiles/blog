<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Subscribe to Postile</title>
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<link href='http://fonts.googleapis.com/css?family=Titillium+Web' rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=Play' rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="subscription_style.css" />
<script type="text/javascript" src="window.js"></script>
<script type="text/javascript" src="success.js"></script>
</head>
<body>
    <div id="bLine"></div>
    <div id="content">
        <div id= header>
            <div id="nav">
                <p><a href="/concept.html">CONCEPT</a></p>
                <p><a href="/">BULLETIN</a></p>
                <p><a href="/team.html">TEAM</a></p>
            </div>
        </div>

        <div id="logo">
        </div>
        <div id="sub_form">
            <div id="notice">
                <p>Thank you</p>
            </div>
            <div id="invalid">
                <p>Please provide a valid email address</p>
            </div>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div id="emailText">
                    <input placeholder="your email address here" type="text" name="inputs[email]" value="" />
                </div>
                <div>
                    <input id="sBt" type="submit" name="sbmt" value="GO"/>
                </div>
            </form>
        </div>
    </div>
  </body>
</html>
