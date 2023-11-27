<?php
	require_once './backend/dbConnect.php';
	require_once 'propertyClass.php';

	function getPropertyByType($name) {
		$productList = array();
		$conn = connect();
		$results = $conn->query('SELECT * FROM properties WHERE Type = "'.$name.'";');
		$conn->close();
		foreach($results as $r) {
			array_push($productList, Property::generateNewPropertyFromQuery($r));
		}
		return $productList;
	}

	function getPropertyByPrice($name) {
		$productList = array();
		$conn = connect();
		$results = $conn->query('SELECT * FROM properties WHERE Price < "'.$name.'";');
		$conn->close();
		foreach($results as $r) {
			array_push($productList, Property::generateNewPropertyFromQuery($r));
		}
		return $productList;
	}
	function getPropertyByLocation($name) {
		$productList = array();
		$conn = connect();
		$results = $conn->query('SELECT * FROM properties WHERE City = "'.$name.'";');
		$conn->close();
		foreach($results as $r) {
			array_push($productList, Property::generateNewPropertyFromQuery($r));
		}
		return $productList;
	}	
	function getPropertyByID($ID) {
		$productList = array();
		$conn = connect();
		$results = $conn->query('SELECT * FROM properties WHERE PropertyID = "'.$ID.'";');
		$conn->close();
		foreach($results as $r) {
			array_push($productList, Property::generateNewPropertyFromQuery($r));
		}
		return $productList;
	}
	function getPropertyByYear($name) {
		$productList = array();
		$conn = connect();
		$results = $conn->query('SELECT * FROM properties WHERE YearBuilt = "'.$name.'";');
		$conn->close();
		foreach($results as $r) {
			array_push($productList, Property::generateNewPropertyFromQuery($r));
		}
		return $productList;
	}
	function getPropertyByRealtor($RID) {
		$productList = array();
		$conn = connect();
		$results = $conn->query('SELECT * FROM properties WHERE RealtorID = "'.$RID.'";');
		$conn->close();
		foreach($results as $r) {
			array_push($productList, Property::generateNewPropertyFromQuery($r));
		}
		return $productList;
	}
?>