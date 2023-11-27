<?php
    $subtitle = "Modify Listing";
	require './view/header.php';
    require_once './model/propertySearch.php';
    $PID = $_POST['PID'];
    $properties = getPropertyByID($PID);
    $stringBuilder = "";
    $stringBuilder .= '<table class="outputTable">
    <thead>
        <tr>
            <th>Property ID</th>
            <th>Property Type</th>
            <th>City</th>
            <th>Province</th>
            <th>Price</th>
            <th>Size</th>
            <th>Year Built</th>
            <th>Status</th>
            <th>Listing Date</th>
            <th>Delisting Date</th>
            <th>Accept Modifications</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>';
    foreach ($properties as $property) {
        $RID = $property->realtorID;
        $arr = $property->toArray();
        $conn = connect();
        $result = $conn -> query('SELECT * FROM `accounts` WHERE AccountID = '.$RID.';');
        $conn->close();
        $stat ="";
        $stringBuilder .= '
        <tr>
            <form method="POST" onsubmit="return confirmMod()" action="modify.php">
            <input type="hidden" id="PID" name="PID" value="'.$property->propertyID.'">
            <td>'.$property->propertyID.'</td>
            <td><select id="type" name="type">
                <option value="Condo" '.(($property->type == "Condo") ? 'selected' : '').'>Condo</option>
                <option value="Commercial" '.(($property->type == "Commercial") ? 'selected' : '').'>Commercial</option>
                <option value="Townhouse" '.(($property->type == "Townhouse") ? 'selected' : '').'>Townhouse</option>
                <option value="House" '.(($property->type == "House") ? 'selected' : '').'>House</option>
                <option value="Apartment" '.(($property->type == "Apartment") ? 'selected' : '').'>Apartment</option>
            </select><br></td>
            <td><input type="text" id="city" name="city" value="'.$property->city.'"</td>
            <td><input type="text" id="province" name="province" value="'.$property->province.'"</td>
            <td>$<input type="text" id="price" name="price" value="'.$property->price.'"</td>
            <td><input type="text" id="size" name="size" value="'.$property->size.'"sqft </td>
            <td><input type="text" id="year" name="year" value="'.$property->yearbuilt.'"</td>
            <td><select id="status" name="status" selected="'.$property->status.'">
                <option value="Active" '.(($property->status == "Active") ? 'selected' : '').'>Active</option>
                <option value="Pending" '.(($property->status == "Pending") ? 'selected' : '').'>Pending</option>
                <option value="Sold" '.(($property->status == "Sold") ? 'selected' : '').'>Sold</option>
            </select><br></td>
            <td>'.$property->listingDate.'</td>
            <td>'.(($property->takendowndate == "0000-00-00 00:00:00" || empty($property->takendowndate)) ? 'Active' : $property->takendowndate).'</td>
            <td><input type="submit" value="Accept?"</td>
            </form>
            <td><button class="danger" id="delete" onclick="confirmDel('.$property->propertyID.')">Delete?</button></td>
            </tr>
            </tbody>
            </table>
            
        <div id="return"></div>
        ';
    }
    echo $stringBuilder;
?>
<script>
    function confirmMod() {
        var ret = document.getElementById("return");
        var city = document.getElementById("city").value;
        var province = document.getElementById("province").value;
        var price = document.getElementById("price").value;
        var size = document.getElementById("size").value;
        var year = document.getElementById("year").value;
        if (city == "" || province == "" || price == "" || size == "" || year == "") {
            ret.innerHTML = "Values cannot be blank";
            return false;
        }
        return true;
    }

    function confirmDel(id) {
        var ret = document.getElementById("return");
        var target = "property";
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
            alert('Successfully Deleted!');
            window.location.href = './listingmanager.php';
		};
		xhttp.open("GET", 'delete.php?target='+target+'&id='+id, true);
		xhttp.send();
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