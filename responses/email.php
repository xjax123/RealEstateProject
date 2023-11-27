<?php
    //I cant actually send emails with XAMPP, but in theory this would just be collecting the POST valirables and using the PHP mail() function to actually send that.

    echo "Email Sent! your realtor should reply once they see it!".'<br>';
    header( "refresh:5;url=index.php" );
  
    echo 'You\'ll be redirected in about 5 secs. If not, click <a href="index.php">here</a>.';
?>