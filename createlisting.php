<?php
    $subtitle = "Create Listing";
    require_once './backend/dbConnect.php';
    require_once './view/redirect.php';
    require_once './view/header.php';

    $RID = $_POST['RID'];

    $type = $_POST['type'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $price = $_POST['price'];
    $size = $_POST['size'];
    $year = $_POST['year'];
    try{
    $conn = connect();
    $result = $conn -> query('INSERT INTO `properties`(`RealtorID`, `Type`, `City`, `Province`, `Price`, `Size`, `YearBuilt`, `Status`, `ListingDate`) VALUES ('.$RID.',"'.$type.'","'.$city.'","'.$province.'","'.$price.'","'.$size.'","'.$year.'","Active","'.date("Y-m-d H:i:s").'")');
    $preferences = $conn -> query('SELECT * FROM preference WHERE City = "'.$city.'" AND Province = "'.$province.'" AND Type = "'.$type.'" AND SizeMin < '.$size.' AND SizeMax > '.$size.' AND PriceMin < '.$price.' AND PriceMax > '.$price.';');
    $conn->close();
    $mailingList = [];
    foreach($preferences as $pref) {
        $UID = $pref['AccountID'];
        $conn = connect();
        $user = $conn -> query('SELECT * FROM accounts WHERE AccountID = '.$UID.';');
        $conn->close();
        foreach($user as $u) {
            $mailingList[] = $u['Email'];
        }
    }
    foreach($mailingList as $email) {
        $msg = 'We Found A Property that matched your preferences! Heres what it looks like: \n
        '.$type.' | '.$city.' | '.$province.' | $'.$price.' | '.$size.'sqft | '.$year.'';

        $msg = wordwrap($msg,70);
        mail($email,"We Found A Property You May Like", $msg, "From: Webmaster@realestate.com");
    }

    redirect("Successfully Created Listing","listingmanager.php",5);
    } catch(Error $e){
        redirect($e->getMessage(),"listingmanager.php",5);
    }

    
    require_once './view/footer.php';
?>