<?php

class user{

public $id;
public $username;
public $email;
public $password;
public $reg_date; 


public static $errorMsg = "";

public static $successMsg="";


public function __construct($username,$email,$password){

    //initialize the attributs of the class with the parameters, and hash the password
    $this->username = $username;
    $this->email = $email;
    $this->password = password_hash($password,PASSWORD_DEFAULT);

}

public function insertClient($tableName,$conn){

//insert a client in the database, and give a message to $successMsg and $errorMsg
$sql = "INSERT INTO $tableName (username, email, password)
VALUES ('$this->username', '$this->email', '$this->password')";
if (mysqli_query($conn, $sql)) {
self::$successMsg= "New record created successfully";
} else {
    self::$errorMsg ="Error: " . $sql . "<br>" . mysqli_error($conn);
}
$lastInsertedId = $conn->insert_id;
return $lastInsertedId;
}

public static function  selectAllClients($tableName,$conn){

//select all the client from database, and inset the rows results in an array $data[]
$sql = "SELECT id,username, email ,reg_date FROM $tableName ";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
        // output data of each row
        $data=[];
        while($row = mysqli_fetch_assoc($result)) {
        
            $data[]=$row;
        }
        return $data;
    }
}
public static function deleteClient($userId, $mysqli) {
    // Start transaction
    $mysqli->begin_transaction();

    try {
        // Delete related data from other tables
        $queries = [
            "DELETE FROM CartItems WHERE cart_id IN (SELECT cart_id FROM Cart WHERE user_id = ?)",
            "DELETE FROM Cart WHERE user_id = ?",
            "DELETE FROM Cards WHERE user_id = ?",
        ];

        foreach ($queries as $query) {
            $stmt = $mysqli->prepare($query);
            $stmt->bind_param("i", $userId);
            $stmt->execute();
        }

        // Finally, delete the user
        $stmt = $mysqli->prepare("DELETE FROM Users WHERE id = ?");
        $stmt->bind_param("i", $userId);
        $stmt->execute();

        // Commit transaction
        $mysqli->commit();
    } catch (Exception $e) {
        // There was an error, roll back transaction
        $mysqli->rollback();

        // You can log the error message: $e->getMessage();
        return false;
    }

    return true;
}
    public static function updateClientInfo($client, $tableName, $mysqli,$id) {
        // Prepare SQL statement to prevent SQL injection
        if (!$mysqli instanceof mysqli) {
            self::$errorMsg = "Invalid database connection";
            return;
        }
        $sql = "UPDATE $tableName SET username='$client->username',email='$client->email' WHERE id='$id'";
        if (mysqli_query($mysqli, $sql)) {
        self::$successMsg= "New record updated successfully";
        
        } else {
            self::$errorMsg= "Error updating record: " . mysqli_error($mysqli);
        }
    }
}