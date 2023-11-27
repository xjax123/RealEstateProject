<?php
    $subtitle = "Modify Listing";
    require_once './view/header.php';
    require_once './model/propertySearch.php';
    require_once './backend/writevalue.php';
    require_once './view/redirect.php';

    $PID = $_POST['PID'];
    $properties = getPropertyByID($PID);

    $type = $_POST['type'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $price = $_POST['price'];
    $size = $_POST['size'];
    $year = $_POST['year'];
    $status = $_POST['status'];
    
    foreach ($properties as $property) {
        if ($type != $property->type) {
            updateValue('property','Type',$type, $PID);
        }
        if ($city != $property->city) {
            updateValue('property','City',$city, $PID);
        }
        if ($province != $property->province) {
            updateValue('property','Province',$province, $PID);
        }
        if ($price != $property->price) {
            updateValue('property','Price',$price, $PID);
        }
        if ($size != $property->size) {
            updateValue('property','Size',$size, $PID);
        }
        if ($year != $property->yearbuilt) {
            updateValue('property','YearBuilt',$year, $PID);
        }
        if ($status != $property->status) {
            if ($status == 'Sold') {
                updateValue('property','TakenDownDate',date("Y-m-d H:i:s"), $PID);
            } else if ($property->status == "Sold") {
                updateValue('property','TakenDownDate', 'NULL', $PID);
            }
            updateValue('property','Status',$status, $PID);
        }
    }
    redirect("Updated Listing","listingmanager.php",5);
    
    require_once './view/footer.php';
?>
<script>