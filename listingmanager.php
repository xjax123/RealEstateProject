<?php
	$subtitle = "My Listings";
	require './view/header.php';
	require_once './model/propertySearch.php';

	if ($_SESSION["AccountType"] == "Admin") {
		require './view/searchbar.php';

	} else if ($_SESSION["AccountType"] == "Realtor") {
		echo "<h3>Current Properties</h3>";
		$properties = getPropertyByRealtor($_SESSION['UID']);
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
				<th>Modify?</th>
			</tr>
		</thead>
		<tbody>
		';
		foreach ($properties as $property) {
			$RID = $property->realtorID;
			$conn = connect();
			$result = $conn -> query('SELECT * FROM `accounts` WHERE AccountID = '.$RID.';');
			$conn->close();
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
				<td><form method="POST" action="modifyproperty.php"><input type="hidden" id="PID" name="PID" value="'.$property->propertyID.'"><input type="submit" id="submit" value="Edit"></form></td>
				</tr>
			';
		}
		echo $stringBuilder;
	} else {
		echo "Insufficient Permissions To View This";
	}
?>
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