<?php

// namespace App\Model;

// use mysqli;

// class Database
// {   
//     private $_connection;

//     public function __construct()
//     {
//         $server = "localhost";
//         $db_username = "root";
//         //Ampp = mysql, Xampp = , Mamp = "root" , laragon = tự đặt
//         $db_password = "mysql";

//         $database = "php1_wd19303";

//         $this->_connection = new mysqli($server, $db_username, $db_password, $database);
//     }

//     public function query(string $query){
//         return $this->_connection->query($query);
//     }

// }

namespace App\Model;

use mysqli;

class Database
{
    private $_connection;

    public function __construct()
    {
        $server = "localhost";
        $db_username = "root";
        $db_password = "mysql"; // Thay đổi mật khẩu phù hợp
        $database = "php1_wd19303";

        $this->_connection = new mysqli($server, $db_username, $db_password, $database);

        if ($this->_connection->connect_error) {
            die("Connection failed: " . $this->_connection->connect_error);
        }
    }

    public function query(string $query)
    {
        return $this->_connection->query($query);
    }

    public function prepare(string $query)
    {
        return $this->_connection->prepare($query);
    }
}
