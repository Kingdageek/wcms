<?php 
	session_start();

	// Function to display flash messages to user
	// stores the messages in a $_SESSION variable
	// and is written in a way that it can be called
	// with different forms of argument

	function flash ($name="", $message="", $class='alert alert-success') {
		if (!empty($name)) {
			// We want to set the $message to $_SESSION[$name]
			// Basically if there's a message and it's not already stored
			// We want to store it and the $class too in the $_SESSION
			if (!empty($message) && empty($_SESSION[$name])) {
				// Let's check if there's already sth stored in the 
				// $_SESSION variable

				if (!empty($_SESSION[$name. "_class"])) {
					unset($_SESSION[$name. "_class"]);
				}

				// Set the variables
				$_SESSION[$name] = $message;
				$_SESSION[$name. "_class"] = $class;
			} elseif (empty($message) && !empty($_SESSION[$name])) {
				// This is to support another form of function call
				// if there's a message in the $_SESSION[$name] and 
				// the param $message is not passed a value, we want to 
				// display the flash message

				$class = !(empty($_SESSION[$name."_class"])) ? $_SESSION[$name. "_class"] : '';

				echo "<div class='".$class. " alert-dismissible fade show' id=\"msg-flash\">
					<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>".
					 $_SESSION[$name].	"</div>";

				// unset all the $_SESSION variables

				unset($_SESSION[$name]);
				unset($_SESSION[$name. "_class"]);
			}
		}
	}

	function isLoggedIn() {
		return isset($_SESSION["username"]);
	}

	function checkInput($value)
    {
        $value = trim($value);
        $value = stripslashes($value);
        $value = htmlspecialchars($value, ENT_QUOTES, "utf-8");
        return $value;
	}
	
	function create(Database $conn, String $table, Array $fields=array())
	{
		// More generalized than insertUserData
		// Code reuse is made much possible

		$columns = implode(",", array_keys($fields));
		$values = ":".implode(", :", array_keys($fields));
		$sql = "INSERT INTO {$table} ({$columns})
				VALUES ({$values})";

		// To avoid unneccessary errors
		$conn->query($sql);
		// loop to bind Values
		foreach ($fields as $key => $value) {
			$conn->bind(":".$key, $value);
		}
		
		return ($conn->execute()) ? $conn->lastId() : false;
	}

	function update(Database $conn, String $table, int $user_id, Array $fields= [])
	{
		$columns = ""; // to store long sql prepare syntax query for columns
		$i = 1;

		// looping through fields array to generate columns string
		foreach ($fields as $key => $value) {
			$columns .= "{$key} = :{$key}";
			if ($i < count($fields)) {
				$columns .= ", ";
			}
			$i++;
		}
		$sql = "UPDATE {$table} SET {$columns} WHERE user_id = $user_id";
		$conn->query($sql);
		// To Bind Values
		foreach ($fields as $key => $value) {
			$conn->bind(":".$key, $value);
		}
		// Execute 
		$conn->execute();
	// var_dump($sql);
	}

	function returnDuplicate(Database $conn, String $table, String $column, String $value)
	{
		// Returns true if there are duplicates in the db $table OR false otherwise
		$sql = "SELECT `$column` FROM `$table` WHERE `$column`='{$value}'";
		$conn->query($sql);
		return (!empty($conn->single()->phone) ? true : false);
	}

	function redirect ($location)
	{
		header("location:".$location);
	}

	function displayPage($url)
    {
        $url = checkInput($url);
        $routes = require_once "routes.php";
        if (array_key_exists($url, $routes)) {
            include_once $routes[$url];
        } else {
            echo "Page not found! I want to believe you're not messing with my url on purpose Zig!";
        }
    }