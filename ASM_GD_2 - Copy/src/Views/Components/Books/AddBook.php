<?php

namespace App\Views\Components\Books;

use App\Model\Book;
use App\Views\BaseView;

class AddBook extends BaseView{

    
    public static function render(){
        ?>
       
<?php }

public static function handle(){
    $data = $_POST;
    $Book = new Book();
    $result = $Book->create($data);

    if ($result) {
        // Sử dụng meta refresh để chuyển hướng
        echo '<meta http-equiv="refresh" content="0;url=?act=ListBook">';
        exit();
    } else {
        echo "Thêm thất bại";
    }
}

}
