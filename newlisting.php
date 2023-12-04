<?php
$subtitle = "Modify Listing";
require './view/header.php';
require_once './model/propertySearch.php';
?>

<style>
    body {
        font-family: 'Montserrat', sans-serif;
    }

    .outputTable {
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
    }

    .outputTable td,
    .outputTable th {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    .outputTable th {
        background-color: #f2f2f2;
    }

    .form-input {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        margin-top: 10px;
        box-sizing: border-box;
    }

    .btn-confirm,
    .btn-cancel {
        padding: 10px;
        background-color: #3498db;
        color: white;
        border: none;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        cursor: pointer;
        border-radius: 4px;
    }

    .btn-cancel {
        background-color: #e74c3c;
    }

    .btn-confirm:hover,
    .btn-cancel:hover {
        background-color: #2980b9;
    }

    #return {
        margin-top: 10px;
        color: #e74c3c;
    }
</style>

<?php
$stringBuilder = '<table class="outputTable">
        <thead>
            <tr>
            ' . (($_SESSION['AccountType'] == 'Admin') ? '<th>RealtorID</th>' : '') . '
                <th>Property Type</th>
                <th>City</th>
                <th>Province</th>
                <th>Price</th>
                <th>Size (sqft)</th>
                <th>Year Built</th>
                <th>Create</th>
                <th>Cancel</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <form method="POST" onsubmit="return confirmMod()" action="createlisting.php">
                ' . (($_SESSION['AccountType'] == 'Admin') ? '<td><input type="text" id="RID" name="RID" class="form-input" value=""></td>' : '<input type="hidden" id="RID" name ="RID" value="' . $_SESSION['UID'] . '">') . '
                <td><select id="type" name="type" class="form-input">
                    <option value="Condo">Condo</option>
                    <option value="Commercial">Commercial</option>
                    <option value="Townhouse">Townhouse</option>
                    <option value="House">House</option>
                    <option value="Apartment">Apartment</option>
                </select></td>
                <td><input type="text" id="city" name="city" class="form-input" value=""></td>
                <td><input type="text" id="province" name="province" class="form-input" value=""></td>
                <td><input type="text" id="price" name="price" class="form-input" value=""></td>
                <td><input type="text" id="size" name="size" class="form-input" value=""></td>
                <td><input type="text" id="year" name="year" class="form-input" value=""></td>
                <td><input type="submit" class="btn-confirm" name="Confirm" value="Confirm"></form></td>
                <td><button onclick="cancel()" class="btn-cancel" name="year">Cancel</button></td>
            </tr>
        </tbody>
    </table>';

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

        if (RID === "" || city === "" || province === "" || price === "" || size === "" || year === "") {
            ret.innerHTML = "Values cannot be blank";
            return false;
        }
        return true;
    }

    function cancel() {
        window.location.href = 'listingmanager.php';
    }
</script>

<?php
require './view/footer.php';
?>