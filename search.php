<?php
require_once './model/propertySearch.php';
require_once './model/propertyClass.php';
require_once './backend/inputscrub.php';
    mail("catstrophecatalyst@gmail.com","Testing","123","From: webmaster@realestatesite.com");
    $type = $_GET['filter'];
    $name = $_GET['search'];
    $name = scrub($name);
    $properties;
    if ($type == "type") {
        $properties = getPropertyByType($name);
    } elseif ($type == "price") {
        $properties = getPropertyByPrice($name);
    } elseif ($type == "location") {
        $properties = getPropertyByLocation($name);
    } elseif ($type == "year") {
        $properties = getPropertyByYear($name);
    } else {
        throw new Exception("Unknown Search Typing");
    }
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
            <th>Realtor Name</th>
            <th>Contact Realtor Name</th>
        </tr>
    </thead>
    <tbody>
    ';
    foreach ($properties as $property) {
        $stringBuilder .= '
        <tr>
            <td>'.$property->propertyID.'</td>
            <td>'.$property->type.'</td>
            <td>'.$property->city.'</td>
            <td>'.$property->province.'</td>
            <td>$'.$property->price.'</td>
            <td>'.$property->size.' sq ft </td>
            <td>'.$property->yearbuilt.'</td>
            <td>'.$property->status.'</td>
            <td>'.$property->listingDate.'</td>
            <td>'.$property->takendowndate.'</td>
        </tr>
        ';
    }
    $stringBuilder .= '</tbody></table>';
    $stringBuilder .= '
    <style type="text/css">
    .outputTable  {border-collapse:collapse;border-spacing:0;}
    .outputTable td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
      overflow:hidden;padding:10px 5px;word-break:normal;}
    .outputTable th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
      font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
    </style>';
    echo $stringBuilder;
?>