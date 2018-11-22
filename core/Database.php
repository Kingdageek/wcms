<?php
/*
* Connect to Database
* Creates prepared statements
* Binds values
* Returns rows and results
*/
class Database {
    // properties
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASSWORD;
    private $dbname = DB_NAME;

    // some properties without default values
    private $dbh; // db handler
    private $stmt;
    private $error;

    public function __construct() {
        // set DSN
        $dsn = "mysql:host=$this->host;dbname=$this->dbname";
        // Some DB PDO connection openssl_get_cert_locations
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        // Connect to Database
        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    public function query($sql) {
        /*
        * Creates Prepared Statements
        */
        $this->stmt = $this->dbh->prepare($sql);
    }
    
    public function bind($param, $value, $type = null) {
        // method to bind the named parameters to values
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
                    break;
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }

    public function execute() {
        // method to execute the query
        $this->stmt->execute();
    }

    public function resultSet() {
        // method to return a result set
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function fetchCol($offset=0)
    {
        $this->execute();
        return $this->stmt->fetchColumn($offset);
    }

    public function single() {
        // method to return a single row/record
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }
    
    public function rowCount() {
        // method to return the row count of returned result
        return $this->stmt->rowCount();
    }

    public function lastId() {
        /*
        * Returns the last Inserted Id in database table
        */
        return $this->dbh->lastInsertId();
    }
}

