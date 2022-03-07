<?php
require_once("dbInfo.php");

class reservation {
	public $reservationId;
	public $reservationName;
	public $reservationEmail;
	public $reservationPhone;
	public $reservationDate;
	public $reservationTime;
	public $reservationPerson;

	public function addReservation() {
		// Connect to database.
		$options = array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
		$dsn = "mysql:host=" . DatabaseInfo::getServer() . ";dbname=" . DatabaseInfo::getDatabaseName() . ";charset=utf8";
		$conn = new PDO($dsn, DatabaseInfo::getUserName(), DatabaseInfo::getPassword(), $options);

		// Insert query.
		$sql = "INSERT INTO `reservation`
				(
					`ReservationName`,
					`ReservationEmail`,
					`ReservationPhone`,
					`ReservationDate`,
					`ReservationTime`,
					`ReservationPerson`,
					
				)
				VALUES
				(
					:resName,
					:resEmail,
					:resPhone,
					STR_TO_DATE(:resBook_date, '%m/%d/%Y'),
					:resBook_time,
					:resPerson
				);";

		// Prepare statement.
		$stmt = $conn->prepare($sql);

		// Execute the statement.
		$stmt->execute(array(
			":resName" => $this->reservationName,
			":resEmail" => $this->ReservationEmail,
			":resPhone" => $this->ReservationPhone,
			":resBook_date" => $this->ReservationDate,
			":resBook_time" => $this->ReservationTime,
			":resPerson" => $this->ReservationPerson));

		// Get value of the auto increment column.
		$newId = $conn->lastInsertId();
		$this->ReservartionId = $newId;

		// Close the database connection.
		$conn = NULL;

		// Return the id.
		return $newId;
	}

	public static function deleteReservation($ReservartionId) {
		// Connect to database.
		$options = array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
		$dsn = "mysql:host=" . DatabaseInfo::getServer() . ";dbname=" . DatabaseInfo::getDatabaseName() . ";charset=utf8";
		$conn = new PDO($dsn, DatabaseInfo::getUserName(), DatabaseInfo::getPassword(), $options);

		// Delete query.
		$sql = "DELETE	FROM `reservation`
				WHERE	`ReservartionId` = :ReservartionId;";

		// Prepare statement.
		$stmt = $conn->prepare($sql);

		// Execute the statement.
		$stmt->execute(array(":ReservartionId" => $feedbackId));

		// Close the database connection.
		$conn = NULL;
	}

	public static function getReservation($ReservartionId) {
		// Connect to database.
		$options = array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
		$dsn = "mysql:host=" . DatabaseInfo::getServer() . ";dbname=" . DatabaseInfo::getDatabaseName() . ";charset=utf8";
		$conn = new PDO($dsn, DatabaseInfo::getUserName(), DatabaseInfo::getPassword(), $options);

		// Select query.
		$sql = "SELECT	`reservationId`,
						`reservationName`,
						`reservationEmail`,
						DATE_FORMAT(`reservationDate`, '%m/%d/%Y') AS DayFeedBack,
						`reservationPhone`,
						`reservationTime`,
						`reservationPerson`
				FROM	`reservation`
				WHERE	`reservationId` = :reservationId;";

		// Prepare statement.
		$stmt = $conn->prepare($sql);

		// Execute the statement.
		$stmt->execute(array(":reservationId" => $reservationId));

		// Fetch record.
		$reservation = NULL;
		if($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$reservation = new reservationId();
			$reservation->reservationId = $row["ReservationId"];
			$reservation->reservationName = $row["ReservationName"];
			$reservation->reservationEmail = $row["ReservationEmail"];
			$reservation->reservationDate = $row["ReservationDate"];
			$reservation->reservationPhone = $row["ReservationPhone"];
			$reservation->reservationTime = $row["ReservationTime"];
			$reservation->reservationPerson = $row["ReservationPerson"];
		}

		// Close the database connection.
		$conn = NULL;

		return $reservation;
	}
}
?>