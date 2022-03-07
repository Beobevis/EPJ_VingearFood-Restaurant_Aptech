<?php
require_once("dbInfo.php");

class feedback {
	public $feedbackId;
	public $mealId;
	public $feedBackDetail;
	public $dayFeedBack;
	public $nameFeedBack;
	public $description;

	public function addFeedback() {
		// Connect to database.
		$options = array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
		$dsn = "mysql:host=" . DatabaseInfo::getServer() . ";dbname=" . DatabaseInfo::getDatabaseName() . ";charset=utf8";
		$conn = new PDO($dsn, DatabaseInfo::getUserName(), DatabaseInfo::getPassword(), $options);

		// Insert query.
		$sql = "INSERT INTO `feedback`
				(
					`MealId`,
					`FeedBackDetail`,
					`DayFeedBack`,
					`NameFeedBack`,
					`Description`
				)
				VALUES
				(
					:mealId,
					:feedBackDetail,
					STR_TO_DATE(:dayFeedBack, '%m/%d/%Y'),
					:nameFeedBack,
					:description
				);";

		// Prepare statement.
		$stmt = $conn->prepare($sql);

		// Execute the statement.
		$stmt->execute(array(
			":mealId" => $this->mealId,
			":feedBackDetail" => $this->feedBackDetail,
			":dayFeedBack" => $this->dayFeedBack,
			":nameFeedBack" => $this->nameFeedBack,
			":description" => $this->description));

		// Get value of the auto increment column.
		$newId = $conn->lastInsertId();
		$this->feedbackId = $newId;

		// Close the database connection.
		$conn = NULL;

		// Return the id.
		return $newId;
	}

	public function updateFeedback() {
		// Connect to database.
		$options = array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
		$dsn = "mysql:host=" . DatabaseInfo::getServer() . ";dbname=" . DatabaseInfo::getDatabaseName() . ";charset=utf8";
		$conn = new PDO($dsn, DatabaseInfo::getUserName(), DatabaseInfo::getPassword(), $options);

		// Update query.
		$sql = "UPDATE	`feedback`
				SET		`MealId` = :mealId,
						`FeedBackDetail` = :feedBackDetail,
						`DayFeedBack` = STR_TO_DATE(:dayFeedBack, '%m/%d/%Y'),
						`NameFeedBack` = :nameFeedBack,
						`Description` = :description
				WHERE	`FeedbackId` = :feedbackId;";

		// Prepare statement.
		$stmt = $conn->prepare($sql);

		// Execute the statement.
		$stmt->execute(array(
			":feedbackId" => $this->feedbackId,
			":mealId" => $this->mealId,
			":feedBackDetail" => $this->feedBackDetail,
			":dayFeedBack" => $this->dayFeedBack,
			":nameFeedBack" => $this->nameFeedBack,
			":description" => $this->description));

		// Close the database connection.
		$conn = NULL;
	}

	public static function deleteFeedback($feedbackId) {
		// Connect to database.
		$options = array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
		$dsn = "mysql:host=" . DatabaseInfo::getServer() . ";dbname=" . DatabaseInfo::getDatabaseName() . ";charset=utf8";
		$conn = new PDO($dsn, DatabaseInfo::getUserName(), DatabaseInfo::getPassword(), $options);

		// Delete query.
		$sql = "DELETE	FROM `feedback`
				WHERE	`FeedbackId` = :feedbackId;";

		// Prepare statement.
		$stmt = $conn->prepare($sql);

		// Execute the statement.
		$stmt->execute(array(":feedbackId" => $feedbackId));

		// Close the database connection.
		$conn = NULL;
	}

	public static function getFeedback($feedbackId) {
		// Connect to database.
		$options = array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
		$dsn = "mysql:host=" . DatabaseInfo::getServer() . ";dbname=" . DatabaseInfo::getDatabaseName() . ";charset=utf8";
		$conn = new PDO($dsn, DatabaseInfo::getUserName(), DatabaseInfo::getPassword(), $options);

		// Select query.
		$sql = "SELECT	`FeedbackId`,
						`MealId`,
						`FeedBackDetail`,
						DATE_FORMAT(`DayFeedBack`, '%m/%d/%Y') AS DayFeedBack,
						`NameFeedBack`,
						`Description`
				FROM	`feedback`
				WHERE	`FeedbackId` = :feedbackId;";

		// Prepare statement.
		$stmt = $conn->prepare($sql);

		// Execute the statement.
		$stmt->execute(array(":feedbackId" => $feedbackId));

		// Fetch record.
		$feedback = NULL;
		if($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$feedback = new Feedback();
			$feedback->feedbackId = $row["FeedbackId"];
			$feedback->mealId = $row["MealId"];
			$feedback->feedBackDetail = $row["FeedBackDetail"];
			$feedback->dayFeedBack = $row["DayFeedBack"];
			$feedback->nameFeedBack = $row["NameFeedBack"];
			$feedback->description = $row["Description"];
		}

		// Close the database connection.
		$conn = NULL;

		return $feedback;
	}
}
?>