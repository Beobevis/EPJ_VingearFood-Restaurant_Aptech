<?php
require_once("dbInfo.php");

class catering {
	public $cateringId;
	public $cateringName;
	public $cateringInfo;
	public $cateringType;
	public $cateringPrice;
	public $descriptions;

	public function addCatering() {
		// Connect to database.
		$options = array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
		$dsn = "mysql:host=" . DatabaseInfo::getServer() . ";dbname=" . DatabaseInfo::getDatabaseName() . ";charset=utf8";
		$conn = new PDO($dsn, DatabaseInfo::getUserName(), DatabaseInfo::getPassword(), $options);

		// Insert query.
		$sql = "INSERT INTO `catering`
				(
					`CateringName`,
					`CateringInfo`,
					`CateringType`,
					`CateringPrice`,
					`Descriptions`
				)
				VALUES
				(
					:cateringName,
					:cateringInfo,
					:cateringType,
					:cateringPrice,
					:descriptions
				);";

		// Prepare statement.
		$stmt = $conn->prepare($sql);

		// Execute the statement.
		$stmt->execute(array(
			":cateringName" => $this->cateringName,
			":cateringInfo" => $this->cateringInfo,
			":cateringType" => $this->cateringType,
			":cateringPrice" => $this->cateringPrice,
			":descriptions" => $this->descriptions));

		// Get value of the auto increment column.
		$newId = $conn->lastInsertId();
		$this->cateringId = $newId;

		// Close the database connection.
		$conn = NULL;

		// Return the id.
		return $newId;
	}

	public function updateCatering() {
		// Connect to database.
		$options = array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
		$dsn = "mysql:host=" . DatabaseInfo::getServer() . ";dbname=" . DatabaseInfo::getDatabaseName() . ";charset=utf8";
		$conn = new PDO($dsn, DatabaseInfo::getUserName(), DatabaseInfo::getPassword(), $options);

		// Update query.
		$sql = "UPDATE	`catering`
				SET		`CateringName` = :cateringName,
						`CateringInfo` = :cateringInfo,
						`CateringType` = :cateringType,
						`CateringPrice` = :cateringPrice,
						`Descriptions` = :descriptions
				WHERE	`CateringId` = :cateringId;";

		// Prepare statement.
		$stmt = $conn->prepare($sql);

		// Execute the statement.
		$stmt->execute(array(
			":cateringId" => $this->cateringId,
			":cateringName" => $this->cateringName,
			":cateringInfo" => $this->cateringInfo,
			":cateringType" => $this->cateringType,
			":cateringPrice" => $this->cateringPrice,
			":descriptions" => $this->descriptions));

		// Close the database connection.
		$conn = NULL;
	}

	public static function deleteCatering($cateringId) {
		// Connect to database.
		$options = array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
		$dsn = "mysql:host=" . DatabaseInfo::getServer() . ";dbname=" . DatabaseInfo::getDatabaseName() . ";charset=utf8";
		$conn = new PDO($dsn, DatabaseInfo::getUserName(), DatabaseInfo::getPassword(), $options);

		// Delete query.
		$sql = "DELETE	FROM `catering`
				WHERE	`CateringId` = :cateringId;";

		// Prepare statement.
		$stmt = $conn->prepare($sql);

		// Execute the statement.
		$stmt->execute(array(":cateringId" => $cateringId));

		// Close the database connection.
		$conn = NULL;
	}

	public static function getCatering($cateringId) {
		// Connect to database.
		$options = array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
		$dsn = "mysql:host=" . DatabaseInfo::getServer() . ";dbname=" . DatabaseInfo::getDatabaseName() . ";charset=utf8";
		$conn = new PDO($dsn, DatabaseInfo::getUserName(), DatabaseInfo::getPassword(), $options);

		// Select query.
		$sql = "SELECT	`CateringId`,
						`CateringName`,
						`CateringInfo`,
						`CateringType`,
						`CateringPrice`,
						`Descriptions`
				FROM	`catering`
				WHERE	`CateringId` = :cateringId;";

		// Prepare statement.
		$stmt = $conn->prepare($sql);

		// Execute the statement.
		$stmt->execute(array(":cateringId" => $cateringId));

		// Fetch record.
		$catering = NULL;
		if($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$catering = new Catering();
			$catering->cateringId = $row["CateringId"];
			$catering->cateringName = $row["CateringName"];
			$catering->cateringInfo = $row["CateringInfo"];
			$catering->cateringType = $row["CateringType"];
			$catering->cateringPrice = $row["CateringPrice"];
			$catering->descriptions = $row["Descriptions"];
		}

		// Close the database connection.
		$conn = NULL;

		return $catering;
	}
}
?>