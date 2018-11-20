<?php
/**
 * Created by PhpStorm.
 * User: WIZZY
 * Date: 3/29/2018
 * Time: 5:23 PM
 */

class Admin
{
    private $dbh;
    protected $username;

    public function __construct(string $username = "")
    {
        $this->dbh = new Database();
        if (!is_string($username)) {
            throw new Exception("Param username must be initialized to type string - Type ". gettype($username).
            " used");
        }
        $this->username = strtolower(checkInput($username));
    }

    public function login($password)
    {
        $data = array(
            "username" => $this->username,
            "username_err" => "",
            "password" => $password,
            "password_err" => ""
        );

        // username validation

        if (empty($data["username"])) {
            $data["username_err"] = "Please enter a username";
        } elseif (!$this->checkIfUserExists()) {
            $data["username_err"] = "Username not found!";
        }

        // password validation

        if (empty($data["password"])) {
            $data["password_err"] = "Please enter a password";
        } elseif (strlen($data["password"]) < 6) {
            $data["password_err"] = "Password must be at least 6 characters long!";
        }

        if (empty($data["username_err"]) && empty($data["password_err"])) {
            if ($this->checkIfPasswordMatches($data["password"])) {
                $this->setUserSession();
                redirect(".");
            } else {
                $data["password_err"] = "Password is incorrect!";
            }
        }
        return $data;
    }

    public function checkIfUserExists ()
    {
        $sql = "SELECT COUNT(*) FROM `admin` WHERE `username` = '{$this->username}'";
        $this->dbh->query($sql);
        $result = $this->dbh->fetchCol();
        return ($result) ? true : false;
    }

    public function createNewAdmin(string $password, int $mid)
    {
        // This method would need to be rewritten to automatically retrieve
        // member id from database.
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `admin`(`mid`,`username`, `password`)
                 VALUES ('$mid', '{$this->username}', '$hashed_password')";
        $this->dbh->query($sql);
        return $this->dbh->execute() ? true : false;
    }

    public function checkIfPasswordMatches ($password)
    {
        $sql = "SELECT `password` FROM `admin` 
              WHERE `username` = '{$this->username}'";
        $this->dbh->query($sql);
        $result = $this->dbh->single();
        $hashed_password = $result->password;
        return password_verify($password, $hashed_password);
    }

    protected  function setUserSession() {
        $_SESSION["username"] = $this->username;
    }
}