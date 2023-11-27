<style>
    .mbox {
        width: 400px;
        height: 300px;
        text-align: left;
        text-wrap: wrap;
    }
</style>

<?php
    $email = $_POST['email'];
    $name = $_POST['name'];
	$subtitle = "Contact ".$name;
	require_once './view/header.php';

    $stringBuilder = "";
    if ($_SESSION['user'] == "Unknown") {
        echo "You must be logged in to do that!";
    } else {
        $stringBuilder .= '<h3>Contact '.$name.'</h3>';
        $stringBuilder .= 'Realtor Email: '.$email.'<br>';
        $stringBuilder .= '<form method="POST" action="email.php" id="emailresponse">
        <label>
        <input type="hidden" id="rname" name="rname" value="'.$name.'"><br>
        <input type="hidden" id="remail" name="remail" value="'.$email.'"><br>
        <label for="cname">Client Name: '.$_SESSION['Name'].'</label>
        <input type="hidden" id="cname" name="cname" value="'.$_SESSION['Name'].'"><br>
        <label for="cemail">Client Email: '.$_SESSION['Email'].'</label>
        <input type="hidden" id="cemail" name="cemail" value="'.$_SESSION['Email'].'"><br>
        <label for="email">Message:</label><br>
        <textarea class="mbox" name="message" id="message" form="emailresponse" placeholder="Enter text here..."></textarea> <br>
        <input type="submit" id="submit" value="Contact Me">
        </form>';
        echo $stringBuilder;
    }
	require './view/footer.php';
?>