<?php
require_once("dbInfo.php");

class meal
{
    public $mealId;
    public $mealName;
    public $mealInfo;
    public $price;
    public $mealType;
    public $image;

    public function addMeal()
    {
        // Connect to database.
        $options = array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        $dsn = "mysql:host=" . DatabaseInfo::getServer() . ";dbname=" . DatabaseInfo::getDatabaseName() . ";charset=utf8";
        $conn = new PDO($dsn, DatabaseInfo::getUserName(), DatabaseInfo::getPassword(), $options);

        // Insert query.
        $sql = "INSERT INTO `meal`
				(
					`MealName`,
					`MealInfo`,
					`Price`,
					`MealType`,
					`Image`
					
				)
				VALUES
				(
					:mealName,
					:mealInfo,
					:price,
					:mealType,
					:image
					
				);";

        // Prepare statement.
        $stmt = $conn->prepare($sql);

        // Execute the statement.
        $stmt->execute(array(
            ":mealName" => $this->mealName,
            ":mealInfo" => $this->mealInfo,
            ":price" => $this->price,
            ":mealType" => $this->mealType,
            ":image" => $this->image
        ));

        // Get value of the auto increment column.
        $newId = $conn->lastInsertId();
        $this->mealId = $newId;

        // Close the database connection.
        $conn = NULL;

        // Return the id.
        return $newId;
    }

    public function updateMeal()
    {
        // Connect to database.
        $options = array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        $dsn = "mysql:host=" . DatabaseInfo::getServer() . ";dbname=" . DatabaseInfo::getDatabaseName() . ";charset=utf8";
        $conn = new PDO($dsn, DatabaseInfo::getUserName(), DatabaseInfo::getPassword(), $options);

        // Update query.
        $sql = "UPDATE	`meal`
				SET		`MealName` = :mealName,
						`MealInfo` = :mealInfo,
						`Price` = :price,
						`MealType` = :mealType,
						`Image` = :image
						
				WHERE	`MealId` = :mealId;";

        // Prepare statement.
        $stmt = $conn->prepare($sql);

        // Execute the statement.
        $stmt->execute(array(
            ":mealId" => $this->mealId,
            ":mealName" => $this->mealName,
            ":mealInfo" => $this->mealInfo,
            ":price" => $this->price,
            ":mealType" => $this->mealType,
            ":image" => $this->image
        ));


        // Close the database connection.
        $conn = NULL;
    }

    public function updateMealLink()
    {
        // Connect to database.
        $options = array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        $dsn = "mysql:host=" . DatabaseInfo::getServer() . ";dbname=" . DatabaseInfo::getDatabaseName() . ";charset=utf8";
        $conn = new PDO($dsn, DatabaseInfo::getUserName(), DatabaseInfo::getPassword(), $options);

        // Update query.
        $sql = "UPDATE	`meal`
				SET	
						`Image` = :image
						
				WHERE	`MealId`= :mealId;";

        // Prepare statement.
        $stmt = $conn->prepare($sql);

        // Execute the statement.
        $stmt->execute(array(
            ":image" => $this->image,
            ":mealId" => $this->mealId
        ));


        // Close the database connection.
        $conn = NULL;
    }

    public function deleteMeal()
    {
        // Connect to database.
        $options = array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        $dsn = "mysql:host=" . DatabaseInfo::getServer() . ";dbname=" . DatabaseInfo::getDatabaseName() . ";charset=utf8";
        $conn = new PDO($dsn, DatabaseInfo::getUserName(), DatabaseInfo::getPassword(), $options);

        // Delete query.
        $sql = "DELETE	FROM `meal`
				WHERE	`MealId` = :mealId;";

        // Prepare statement.
        $stmt = $conn->prepare($sql);

        // Execute the statement.
        $stmt->execute(array(":mealId" => $this->mealId));

        // Close the database connection.
        $conn = NULL;
    }

    public function getMealId()
    {
        // Connect to database.
        $options = array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        $dsn = "mysql:host=" . DatabaseInfo::getServer() . ";dbname=" . DatabaseInfo::getDatabaseName() . ";charset=utf8";
        $conn = new PDO($dsn, DatabaseInfo::getUserName(), DatabaseInfo::getPassword(), $options);

        // Select query.
        $sql = "SELECT	`MealId`,
						`MealName`,
						`MealInfo`,
						`Price`,
						`MealType`,
						`Image`
						
				FROM	`meal`
				WHERE	`MealId` = :mealId;";

        // Prepare statement.
        $stmt = $conn->prepare($sql);

        // Execute the statement.
        $stmt->execute(array(":mealId" => $this->mealId));

        // Fetch record.
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Close the database connection.
        $conn = NULL;

        return $data;
    }

    public function getMealName()
    {
        // Connect to database.
        $options = array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        $dsn = "mysql:host=" . DatabaseInfo::getServer() . ";dbname=" . DatabaseInfo::getDatabaseName() . ";charset=utf8";
        $conn = new PDO($dsn, DatabaseInfo::getUserName(), DatabaseInfo::getPassword(), $options);

        // Select query.
        $sql = "SELECT	`MealId`,
						`MealName`,
						`MealInfo`,
						`Price`,
						`MealType`,
						`Image`
						
				FROM	`meal`
				WHERE	`MealName` = :MealName;";

        // Prepare statement.
        $stmt = $conn->prepare($sql);

        // Execute the statement.
        $stmt->execute(array(":MealName" => $this->mealName));

        // Fetch record.
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Close the database connection.
        $conn = NULL;

        return $data;
    }

    public function getMealType()
    {
        // Connect to database.
        $options = array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        $dsn = "mysql:host=" . DatabaseInfo::getServer() . ";dbname=" . DatabaseInfo::getDatabaseName() . ";charset=utf8";
        $conn = new PDO($dsn, DatabaseInfo::getUserName(), DatabaseInfo::getPassword(), $options);

        // Select query.
        $sql = "SELECT	`MealId`,
						`MealName`,
						`MealInfo`,
						`Price`,
						`MealType`,
						`Image`
						
				FROM	`meal`
				WHERE	`MealType` = :MealType;";

        // Prepare statement.
        $stmt = $conn->prepare($sql);

        // Execute the statement.
        $stmt->execute(array(":MealType" => $this->mealType));

        // Fetch record.
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Close the database connection.
        $conn = NULL;

        return $data;
    }

    public function getAllMealType()
    {
        // Connect to database.
        $options = array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        $dsn = "mysql:host=" . DatabaseInfo::getServer() . ";dbname=" . DatabaseInfo::getDatabaseName() . ";charset=utf8";
        $conn = new PDO($dsn, DatabaseInfo::getUserName(), DatabaseInfo::getPassword(), $options);

        // Select query.
        $sql = "SELECT `MealType`		
				FROM	`meal`;
			";

        // Prepare statement.
        $stmt = $conn->prepare($sql);

        // Execute the statement.
        $stmt->execute();
        $data = [];
        // Fetch record.
        while($row = $stmt ->fetch(PDO::FETCH_ASSOC)){
            $data[] = $row['MealType'];
        }

        // Close the database connection.
        $conn = NULL;

        return $data;
    }


    public function getMealAll()
    {
        // Connect to database.
        $options = array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        $dsn = "mysql:host=" . DatabaseInfo::getServer() . ";dbname=" . DatabaseInfo::getDatabaseName() . ";charset=utf8";
        $conn = new PDO($dsn, DatabaseInfo::getUserName(), DatabaseInfo::getPassword(), $options);

        // Select query.
        $sql = "SELECT	`MealId`,
						`MealName`,
						`MealInfo`,
						`Price`,
						`MealType`,
						`Image`
						
				FROM	`meal`;
				";

        // Prepare statement.
        $stmt = $conn->prepare($sql);

        // Execute the statement.
        $stmt->execute();

        // Fetch record.
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Close the database connection.
        $conn = NULL;

        return $data;
    }
}

?>