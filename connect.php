<?php
class Database
{
    private $_connection;
    private $_instance;
    private $_server = 'localhost';
    private $_username = "root";
    private $_password = "";
    private $_dbname = "blog";

    public static function getInstance()
    {
        if (!self::$_instance) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function __construct()
    {
        if(!$this->_connection) {
            $this->connection = mysqli_connect(
                $this->_server,
                $this->_username,
                $this->_password,
                $this->_dbname
            );
        }

        if ($this->connection->connect_error) {
            echo ("Connection database failed: " . $this->connection->connect_error);
        }
    }

    public function getConnection()
    {
        return $this->connection;
    }

    // public function __destruct()
    // {
    //     if($this->connection){
    //         mysqli_close($this->connection);
    //     }
    // }
}
