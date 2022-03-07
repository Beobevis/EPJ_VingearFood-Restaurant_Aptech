<?php
require_once("dbInfo.php");

class admin
{
    public $adminId;
    public $username;
    public $password;

    public function addAdmin()
    {
        // Connect to database.
        $options = array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        $dsn = "mysql:host=" . DatabaseInfo::getServer() . ";dbname=" . DatabaseInfo::getDatabaseName() . ";charset=utf8";
        $conn = new PDO($dsn, DatabaseInfo::getUserName(), DatabaseInfo::getPassword(), $options);

        // Insert query.
        $sql = "INSERT INTO `admin`
				(
					`Username`,
					`Password`
				)
				VALUES
				(
					:username,
					:password
				);";

        // Prepare statement.
        $stmt = $conn->prepare($sql);

        // Execute the statement.
        $stmt->execute(array(":username" => $this->username, ":password" => $this->password));

        // Get value of the auto increment column.
        $newId = $conn->lastInsertId();
        $this->adminId = $newId;

        // Close the database connection.
        $conn = NULL;

        // Return the id.
        return $newId;
    }

    public function updateAdmin()
    {
        // Connect to database.
        $options = array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        $dsn = "mysql:host=" . DatabaseInfo::getServer() . ";dbname=" . DatabaseInfo::getDatabaseName() . ";charset=utf8";
        $conn = new PDO($dsn, DatabaseInfo::getUserName(), DatabaseInfo::getPassword(), $options);

        // Update query.
        $sql = "UPDATE	`admin`
				SET		`Username` = :username,
						`Password` = :password
				WHERE	`AdminId` = :adminId;";

        // Prepare statement.
        $stmt = $conn->prepare($sql);

        // Execute the statement.
        $stmt->execute(array(
            ":adminId" => $this->adminId,
            ":username" => $this->username,
            ":password" => $this->password));

        // Close the database connection.
        $conn = NULL;
    }

    public function deleteAdmin($adminId)
    {
        // Connect to database.
        $options = array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        $dsn = "mysql:host=" . DatabaseInfo::getServer() . ";dbname=" . DatabaseInfo::getDatabaseName() . ";charset=utf8";
        $conn = new PDO($dsn, DatabaseInfo::getUserName(), DatabaseInfo::getPassword(), $options);

        // Delete query.
        $sql = "DELETE	FROM `admin`
				WHERE	`AdminId` = :adminId;";

        // Prepare statement.
        $stmt = $conn->prepare($sql);

        // Execute the statement.
        $stmt->execute(array(":adminId" => $adminId));

        // Close the database connection.
        $conn = NULL;
    }

    public function getAdmin()
    {
        // Connect to database.
        $options = array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        $dsn = "mysql:host=" . DatabaseInfo::getServer() . ";dbname=" . DatabaseInfo::getDatabaseName() . ";charset=utf8";
        $conn = new PDO($dsn, DatabaseInfo::getUserName(), DatabaseInfo::getPassword(), $options);

        // Select query.
        $sql = "SELECT	`AdminId`,
						`Username`,
						`Password`
				FROM	`admin`
				WHERE	`AdminId` = :adminId;";

        // Prepare statement.
        $stmt = $conn->prepare($sql);

        // Execute the statement.
        $stmt->execute(array(":adminId" => $this->adminId));

        // Fetch record.
        $admin = NULL;
        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $admin = new Admin();
            $admin->adminId = $row["AdminId"];
            $admin->username = $row["Username"];
            $admin->password = $row["Password"];
        }

        // Close the database connection.
        $conn = NULL;

        return $admin;
    }

    public function getAdminUserName()
    {
        // Connect to database.
        $options = array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        $dsn = "mysql:host=" . DatabaseInfo::getServer() . ";dbname=" . DatabaseInfo::getDatabaseName() . ";charset=utf8";
        $conn = new PDO($dsn, DatabaseInfo::getUserName(), DatabaseInfo::getPassword(), $options);

        // Select query.
        $sql = "SELECT	`AdminId`,
						`Username`,
                        `Password`
				FROM	`admin`
				WHERE	`Username` = :Username;";

        // Prepare statement.
        $stmt = $conn->prepare($sql);

        // Execute the statement.
        $stmt->execute(array(":Username" => $this->username));

        // Fetch record.
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);


        // Close the database connection.
        $conn = NULL;

        return $data;
    }
}

?>