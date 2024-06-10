<?php

namespace App\Model;

class User extends Database
{
    protected $table = 'pc09326_users';

    public function __construct()
    {
        parent::__construct();
    }

    //spl ịnjection
    public function login($email, $password)
    {
        $sql = "SELECT * FROM $this->table WHERE `email` = ?";

        $stmt = $this->prepare($sql);

        $stmt->bind_param('s', $email);

        $stmt->execute();

        $result = $stmt->get_result();

        $data = $result->fetch_assoc();
        

        if ($data !== NULL && password_verify($password, $data['password'])) {
            // // Lưu thông tin tài khoản vào session
            // session_start();
            // $_SESSION['user_email'] = $data['email'];
            // $_SESSION['user_name'] = $data['name'];

            echo "<div><h2>Login successful</h2></div>";
            echo "<a href='?act=Home' class='btn btn-primary'>Quay lại Home</a>";
            return $data;
        } else {
            echo "<h2>Login failed</h2>";
            echo "<a href='?act=Home' class='btn btn-primary'>Home</a>";
            return  [];
        }
    }

    public function updateUser($id, $name, $avatar = null)
    {
        $sql = "UPDATE `$this->table` SET `name` = ?";

        if ($avatar) {
            $sql .= ", `avatar` = ?";
        }

        $sql .= " WHERE `id` = ?";

        $stmt = $this->prepare($sql);

        if ($avatar) {
            $stmt->bind_param("ssi", $name, $avatar, $id);
        } else {
            $stmt->bind_param("si", $name, $id);
        }

        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "<div><h2>Update successful</h2></div>";
            echo "<a href='?act=Account' class='btn btn-primary'>Quay lại Account</a>";
        } else {
            echo "Update failed";
        }
    }

    public function register($name, $email, $password, $avatar = 'default_avatar.png')
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO `pc09326_users`(`name`, `password`, `email`, `avatar`) VALUES (?, ?, ?, ?)";

        $stmt = $this->prepare($sql);
        $stmt->bind_param("ssss", $name, $hashedPassword, $email, $avatar);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "<div><h2>Register successful</h2></div>";
            echo "<a href='?act=Home' class='btn btn-primary'>Quay lại Account</a>";
            // header("Refresh:2; url=?act=Account");
        } else {
            echo "Register failed";
        }
    }

    public function getUserByEmail(string $email)
    {
        $sql = "SELECT * FROM $this->table WHERE `email` = ?";

        $stmt = $this->prepare($sql);
        $stmt->bind_param('s', $email);
        $stmt->execute();

        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}
