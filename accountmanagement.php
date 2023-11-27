<?php
	$subtitle = "My Account";
	require './view/header.php';
?>

<h3>Adjust Account Details</h3>
Username: <input type="text" id="username"><br>
<button onclick='updateValue("username","usernameresult", "account", "Username")'>Adjust Username</button><br>
<div id="usernameresult"></div><br>
Password: <input type="text" id="password"><br>
<button onclick='updateValue("password","passwordresult", "account", "Password")'>Adjust Password</button><br>
<div id="passwordresult"></div><br>
Email: <input type="text" id="email"><br>
<button onclick='updateValue("email","emailresult", "account", "Email")'>Adjust Email</button><br>
<div id="emailresult"></div><br>
Phone Number: <input type="text" id="phone"><br>
<button onclick='updateValue("phone","phoneresult", "account", "PhoneNumber")'>Adjust Phone Number</button><br>
<div id="phoneresult"></div><br>
Name: <input type="text" id="name"><br>
<button onclick='updateValue("name","nameresult", "account", "Name")'>Adjust Name</button><br>
<div id="nameresult"></div><br>
<div class="preference">
    <h3>Adjust Preference Details</h3>
    Current Details:
    <style type="text/css">
        .outputTable  {border-collapse:collapse;border-spacing:0;}
        .outputTable td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
        overflow:hidden;padding:10px 5px;word-break:normal;}
        .outputTable th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
        font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
    </style>
    <?php
        require_once './backend/dbConnect.php';
        $UID = $_SESSION['UID'];
        $conn = connect();
        $query = $conn ->query('SELECT * FROM `preference` WHERE AccountID = '. $UID .';');
        $row = $query -> fetch_assoc();
        echo '<table class="outputTable">
        <thead>
            <tr>
                <th>Type</th>
                <th>City</th>
                <th>Province</th>
                <th>Minimum Size</th>
                <th>Maximum Size</th>
                <th>Minimum Price</th>
                <th>Maximum Price</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>'.$row['Type'].'</td>
                <td>'.$row['City'].'</td>
                <td>'.$row['Province'].'</td>
                <td>'.$row['SizeMin'].'</td>
                <td>'.$row['SizeMax'].'</td>
                <td>'.$row['PriceMin'].'</td>
                <td>'.$row['PriceMax'].'</td>
            </tr>
        </tbody>
        </table><br>';
    ?>

    <label for="type">Prefered Type:</label>
    <select id="type" name="type">
        <option value="Condo">Condo</option>
        <option value="Commercial">Commercial</option>
        <option value="Townhouse">Townhouse</option>
        <option value="House">House</option>
        <option value="Apartment">Apartment</option>
    </select><br>
    <button onclick='updateValue("type","typeresult", "preference", "Type")'>Adjust Property Type</button><br>
    <div id="typeresult"></div><br>
    City: <input type="text" id="city"><br>
    <button onclick='updateValue("city","cityresult", "preference", "City")'>Adjust City</button><br>
    <div id="cityresult"></div><br>
    Province: <input type="text" id="province"><br>
    <button onclick='updateValue("province","provinceresult", "preference", "Province")'>Adjust Province</button><br>
    <div id="provinceresult"></div><br>
    Size: <input type="text" id="sizemin">sqft - <input type="text" id="sizemax">sqft<br>
    <button onclick='updateValue("sizemin","sizeresult", "preference", "sizemin")'>Adjust Min Size</button><button onclick='updateValue("sizemax","sizeresult", "preference", "sizemax")'>Adjust Max Size</button><br>
    <div id="sizeresult"></div><br>
    Price: $<input type="text" id="pricemin"> - $<input type="text" id="pricemax"><br>
    <button onclick='updateValue("pricemin","priceresult", "preference", "pricemin")'>Adjust Min price</button><button onclick='updateValue("pricemax","priceresult", "preference", "pricemax")'>Adjust Max price</button><br>
    <div id="priceresult"></div><br>
</div>
<style>
    .preference {
        content-visibility: <?php
    if ($_SESSION['AccountType'] == "Customer") {
        echo " visible";
    } else {
        echo "hidden";
    }
?> ;
    }

</style>
<script>
    function updateValue(fieldid, responseid, category, type) {     
        var xml = new XMLHttpRequest();
        var value = document.getElementById(fieldid).value;
        xml.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                result = this.responseText;
                field = document.getElementById(responseid);
                if (result == "Completed") {
                    field.innerHTML = "Operation Completed Successfully, changes will be reflected on a refresh.";
                } else {
                    field.innerHTML = result;
                }
            }
        };
        xml.open("GET","./responses/updatevalue.php?category="+category+"&type="+type+"&value="+value, true);
        xml.send();
    }
</script>
<?php
	require './view/footer.php';
?>