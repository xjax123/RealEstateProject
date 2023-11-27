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
        $stringBuilder .= '<form method="POST" action="./responses/email.php" id="emailresponse">
        <label>
        <label for="fname">Client First Name: '.$_SESSION['Name'].'</label>
        <input type="hidden" id="fname" name="fname" value="'.$_SESSION['Name'].'"><br>
        <label for="email">Client Email: '.$_SESSION['Email'].'</label>
        <input type="hidden" id="email" name="email" value="'.$_SESSION['Email'].'"><br>
        <label for="email">Message:</label><br>
        <textarea class="mbox" name="message" id="message" form="emailresponse">Enter text here...</textarea> <br>
        <input type="submit" id="submit" value="Contact Me">
        </form>';
        echo $stringBuilder;
    }
	require './view/footer.php';
?>