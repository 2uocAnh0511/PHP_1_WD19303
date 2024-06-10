<?php

namespace App\Model;

use App\Model\Database;

class Book extends Database implements CrudInterface
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        $query = "SELECT * FROM `pc09326_books`";
        return $this->query($query);
    }

    public function getOne(int $id)
    {
        $query = "SELECT * FROM `pc09326_books` WHERE `id` = $id";
        return $this->query($query);
    }

    public function update(int $id, array $data)
    {
        $_title = $data['title'] ?? '';
        $_author = $data['author'] ?? '';
        $_genre = $data['genre'] ?? '';
        $_publication_year = $data['publication_year'] ?? 0;
        $_quantity = $data['quantity'] ?? 0;
        $_status = $data['status'] ?? '';

        $query = "UPDATE `pc09326_books` 
                  SET `title`='$_title', 
                      `author`='$_author', 
                      `genre`='$_genre', 
                      `publication_year`=$_publication_year, 
                      `quantity`=$_quantity, 
                      `status`='$_status' 
                  WHERE `id`=$id";

        return $this->query($query);
    }

    public function create(array $data)
    {
        $_title = $data['title'] ?? '';
        $_author = $data['author'] ?? '';
        $_genre = $data['genre'] ?? '';
        $_publication_year = $data['publication_year'] ?? 0;
        $_quantity = $data['quantity'] ?? 0;
        $_status = $data['status'] ?? '';

        $query = "INSERT INTO `pc09326_books` (`title`, `author`, `genre`, `publication_year`, `quantity`, `status`) 
                  VALUES ('$_title', '$_author', '$_genre', $_publication_year, $_quantity, '$_status')";

        return $this->query($query);
    }

    public function delete(int $id): bool
    {
        $query = "DELETE FROM `pc09326_books` WHERE `id` = $id";
        return $this->query($query);
    }

    public function getById(int $id)
    {
        $query = "SELECT * FROM `pc09326_books` WHERE `id` = $id";
        return $this->query($query);
    }

    public function search(string $title = '', string $author = '', string $genre = '')
    {
        $query = "SELECT * FROM `pc09326_books` WHERE 1=1";

        if ($title !== '') {
            $query .= " AND `title` LIKE '%$title%'";
        }

        if ($author !== '') {
            $query .= " AND `author` LIKE '%$author%'";
        }

        if ($genre !== '') {
            $query .= " AND `genre` LIKE '%$genre%'";
        }

        return $this->query($query);

    }
}
