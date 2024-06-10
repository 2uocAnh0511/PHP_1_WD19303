<?php

namespace App\Views\Components\Books;

use App\Model\Book;
use App\Views\BaseView;

class DeleteBook extends BaseView {

    public static function render() {
        ?>
        <?php
    }

    public static function handle() {
        $Book = new Book();
        $id = (int)$_POST['id'];
        $result = $Book->delete($id);

        if ($result) {
            // Sử dụng meta refresh để chuyển hướng
            echo '<meta http-equiv="refresh" content="0;url=?act=ListBook">';
            exit();
        } else {
            echo "Xóa thất bại";
        }
    }

}
