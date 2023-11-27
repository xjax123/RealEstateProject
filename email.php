<?php
    $rname = $_POST['rname'];
    $remail = $_POST['remail'];
    $cname = $_POST['cname'];
    $cemail = $_POST['cemail'];
    $message = $_POST['message'];

	$subtitle = "Contact ".$rname;
	require_once './view/header.php';

    $msg = "Sent By:".$cname."\n Email: ".$cemail."\n Heres What They Had To Say: \n".$message;
    $msg = wordwrap($msg,70,"\n");
    mail($remail,'Hey '.$rname.' we got a lead for you!',$msg,"From: Webmaster@realestate.com");

    echo "Email Sent! your realtor should reply once they see it!".'<br>';
    header( "refresh:5;url=index.php" );
  
    echo 'You\'ll be redirected in about 5 secs. If not, click <a href="index.php">here</a>.';
	require_once './view/footer.php';
?>