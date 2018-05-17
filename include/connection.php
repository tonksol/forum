 <?php
require(__DIR__ . "/../include/constants.php");    
    $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
    if(!$connection){
        return die("could not connect");
    }
    // Note: always need the connection link functions whitout i is the other way around first DB_NAME, $connection
    $db_select = mysqli_select_db($connection, DB_NAME);
    if (!$db_select){
        return die("Database error: ". mysqli_error($connection));
    } 
    // Note: Always close the connection mysqli_close($connection);. Otherwise other people can acces your data and change it
    


/*
Use this one if you start using PDO, read more about PDO first

function connectToDB() {
	$link = new \PDO(
		'mysql:host=localhost;dbname=boardgames_db;charset=utf8mb4',
		'root',
		'',
		array(
			\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
			\PDO::ATTR_PERSISTENT => false
		)
	);
	return $link;
}
*/ 