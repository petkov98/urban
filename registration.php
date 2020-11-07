<?php



function insertIntoDB(){
	$servername = "localhost";
	$db = "example";
	$db_username = "root";
	$db_password = "";
    $db_email = "";
	$connection;

	try {
        $connection = new PDO(
            "mysql:host=$servername;dbname=$db",
            $db_username,
            $db_password,
            $db_email
        );
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
 
    $sql = "INSERT INTO 
                user_credentials(`id`, `username`, `password`, `email`) 
            VALUES 
                (NULL, '".$_POST["username"]."', '".$_POST["password"]."', '".$_POST["email"]."')";
    $connection->exec($sql);
    return true;
}
 
function register() {
    if (!empty($_POST) &&
        !empty($_POST["username"]) &&
        !empty($_POST["password"]) &&
        !empty($_POST["email"])
    ){
        if (insertIntoDb()) {
            header("Location: Login.html");
        } else {
            header ("Location: registration.html");
        }
    } else {
        header("Location: registration.html");
    }
}
register();