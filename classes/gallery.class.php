<?php
require_once("dbInfo.php");

class galery {
	public $galeryId;
	public $galeryName;
	public $galeryTitle;
	public $galeryInfo;
	public $galeryType;
	public $description;

	public function addGalery() {
		// Connect to database.
		$options = array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
		$dsn = "mysql:host=" . DatabaseInfo::getServer() . ";dbname=" . DatabaseInfo::getDatabaseName() . ";charset=utf8";
		$conn = new PDO($dsn, DatabaseInfo::getUserName(), DatabaseInfo::getPassword(), $options);

		// Insert query.
		$sql = "INSERT INTO `galery`
				(
					`GaleryId`,
					`GaleryName`,
					`GaleryTitle`,
					`GaleryInfo`,
					`GaleryType`,
					`Description`
				)
				VALUES
				(
					:galeryId,
					:galeryName,
					:galeryTitle,
					:galeryInfo,
					:galeryType,
					:description
				);";

		// Prepare statement.
		$stmt = $conn->prepare($sql);

		// Execute the statement.
		$stmt->execute(array(
			":galeryId" => $this->galeryId,
			":galeryName" => $this->galeryName,
			":galeryTitle" => $this->galeryTitle,
			":galeryInfo" => $this->galeryInfo,
			":galeryType" => $this->galeryType,
			":description" => $this->description));

		// Close the database connection.
		$conn = NULL;
	}

	public function updateGalery() {
		// Connect to database.
		$options = array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
		$dsn = "mysql:host=" . DatabaseInfo::getServer() . ";dbname=" . DatabaseInfo::getDatabaseName() . ";charset=utf8";
		$conn = new PDO($dsn, DatabaseInfo::getUserName(), DatabaseInfo::getPassword(), $options);

		// Update query.
		$sql = "UPDATE	`galery`
				SET		`GaleryName` = :galeryName,
						`GaleryTitle` = :galeryTitle,
						`GaleryInfo` = :galeryInfo,
						`GaleryType` = :galeryType,
						`Description` = :description
				WHERE	`GaleryId` = :galeryId;";

		// Prepare statement.
		$stmt = $conn->prepare($sql);

		// Execute the statement.
		$stmt->execute(array(
			":galeryId" => $this->galeryId,
			":galeryName" => $this->galeryName,
			":galeryTitle" => $this->galeryTitle,
			":galeryInfo" => $this->galeryInfo,
			":galeryType" => $this->galeryType,
			":description" => $this->description));

		// Close the database connection.
		$conn = NULL;
	}

	public static function deleteGalery($galeryId) {
		// Connect to database.
		$options = array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
		$dsn = "mysql:host=" . DatabaseInfo::getServer() . ";dbname=" . DatabaseInfo::getDatabaseName() . ";charset=utf8";
		$conn = new PDO($dsn, DatabaseInfo::getUserName(), DatabaseInfo::getPassword(), $options);

		// Delete query.
		$sql = "DELETE	FROM `galery`
				WHERE	`GaleryId` = :galeryId;";

		// Prepare statement.
		$stmt = $conn->prepare($sql);

		// Execute the statement.
		$stmt->execute(array(":galeryId" => $galeryId));

		// Close the database connection.
		$conn = NULL;
	}

	public static function getGalery($galeryId) {
		// Connect to database.
		$options = array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
		$dsn = "mysql:host=" . DatabaseInfo::getServer() . ";dbname=" . DatabaseInfo::getDatabaseName() . ";charset=utf8";
		$conn = new PDO($dsn, DatabaseInfo::getUserName(), DatabaseInfo::getPassword(), $options);

		// Select query.
		$sql = "SELECT	`GaleryId`,
						`GaleryName`,
						`GaleryTitle`,
						`GaleryInfo`,
						`GaleryType`,
						`Description`
				FROM	`galery`
				WHERE	`GaleryId` = :galeryId;";

		// Prepare statement.
		$stmt = $conn->prepare($sql);

		// Execute the statement.
		$stmt->execute(array(":galeryId" => $galeryId));

		// Fetch record.
		$galery = NULL;
		if($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$galery = new Galery();
			$galery->galeryId = $row["GaleryId"];
			$galery->galeryName = $row["GaleryName"];
			$galery->galeryTitle = $row["GaleryTitle"];
			$galery->galeryInfo = $row["GaleryInfo"];
			$galery->galeryType = $row["GaleryType"];
			$galery->description = $row["Description"];
		}

		// Close the database connection.
		$conn = NULL;

		return $galery;
	}
}
?>