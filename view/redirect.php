<?php
    function redirect($message, $url, $delay = 0) {
        echo $message.'<br>';
        header( "refresh:".$delay.";url=".$url );
        echo 'You\'ll be redirected in about'.$delay.' secs. If not, click <a href="register.php">here</a>.';
    }
?>