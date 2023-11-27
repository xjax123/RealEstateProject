<?php
	class Property {
		public $propertyID;
		public $realtorID;
		public $type;
		public $city;
		public $province;
		public $price;
		public $size;
		public $yearbuilt;
		public $status;
		public $listingDate;
		public $takendowndate;
		public function __construct($propertyID, $realtorID, $type, $city, $province, $price, $size, $yearbuilt, $status, $listingDate, $takendowndate) {
			$this->propertyID = $propertyID;
			$this->realtorID = $realtorID;
			$this->type = $type;
			$this->city = $city;
			$this->province = $province;
			$this->price = $price;
			$this->size = $size;
			$this-> yearbuilt = $yearbuilt;
			$this->status = $status;
			$this->listingDate = $listingDate;
			$this->takendowndate = $takendowndate;
		}

		public static function generateNewPropertyFromQuery($query) {
			return new Property($query['PropertyID'],$query['RealtorID'],$query['Type'],$query['City'],$query['Province'],$query['Price'],$query['Size'],$query['YearBuilt'],$query['Status'],$query['ListingDate'],$query['TakenDownDate']);
		}

		public function buildTable() {
			return $this -> propertyID.'<br>';
		}

		public function toArray() {
			return array('PID' => $this -> propertyID, 'RID' => $this -> realtorID, 'City' => $this -> city, 'Province' => $this->province, 'Price' => $this->price, 'Size' => $this->size, 'YearBuilt' => $this-> yearbuilt, 'Status' => $this->status, 'ListingDate' => $this->listingDate, 'TakenDownDate' => $this->takendowndate);
		}
	}
?>