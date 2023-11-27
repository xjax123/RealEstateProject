<?php
    $subtitle = "Modify Listing";
	require './view/header.php';
    require_once './model/propertySearch.php';
    $stringBuilder = "";
    $stringBuilder .= '<table class="outputTable">
    <thead>
        <tr>
        '.(($_SESSION['AccountType'] == 'Admin') ? '<th>RealtorID</th>':'').'
            <th>Property Type</th>
            <th>City</th>
            <th>Province</th>
            <th>Price</th>
            <th>Size</th>
            <th>Year Built</th>
            <th>Create</th>
            <th>Cancel</th>
        </tr>
    </thead>
    <tbody>';
    $stat ="";
    $stringBuilder .= '
    <tr>
        <form method="POST" onsubmit="return confirmMod()" action="createlisting.php">
        '.(($_SESSION['AccountType'] == 'Admin') ? '<input type="text" id="RID" name="RID" value="">':'<input type="hidden" id="RID" name ="RID" value="'.$_SESSION['UID'].'">').'
        <td><select id="type" name="type">
            <option value="Condo">Condo</option>
            <option value="Commercial">Commercial</option>
            <option value="Townhouse">Townhouse</option>
            <option value="House">House</option>
            <option value="Apartment">Apartment</option>
        </select><br></td>
        <td><input type="text" id="city" name="city" value=""></td>
        <td><input type="text" id="province" name="province" value=""></td>
        <td>$<input type="text" id="price" name="price" value=""></td>
        <td><input type="text" id="size" name="size" value=""sqft> </td>
        <td><input type="text" id="year" name="year" value=""></td>
        <td><input type="submit" id="Confirm" name="Confirm" value="Confirm"></form></td>
        <td><button onclick="cancel()" id="Confirm" name="year">Cancel</button></td>
        </tr>
        </tbody>
        </table>
    ';
    echo $stringBuilder;
?>
<div id="return"></div>
<script>
    function confirmMod() {
        var ret = document.getElementById("return");
        var RID = document.getElementById("RID").value;
        var city = document.getElementById("city").value;
        var province = document.getElementById("province").value;
        var price = document.getElementById("price").value;
        var size = document.getElementById("size").value;
        var year = document.getElementById("year").value;
        if (RID =="" || city == "" || province == "" || price == "" || size == "" || year == "") {
            ret.innerHTML = "Values cannot be blank";
            return false;
        }
        return true;
    }

    function cancel() {
        window.location.href = 'listingmanager.php';
    }
</script>

<style type="text/css">
	.outputTable  {
		border-collapse:collapse;
		border-spacing:0;
	}
	.outputTable td {
		border-color:black;
		border-style:solid;
		border-width:1px;
		font-family:Arial, sans-serif;
		font-size:14px;
		overflow:hidden;
		padding:10px 5px;
		word-break:normal;
	}
	.outputTable th {
		border-color:black;
		border-style:solid;
		border-width:1px;
		font-family:Arial, sans-serif;
		font-size:14px;
		font-weight:normal;
		overflow:hidden;
		padding:10px 5px;
		word-break:normal;
	}
</style>