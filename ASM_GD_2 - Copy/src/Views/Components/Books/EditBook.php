<?php

namespace App\Views\Components\Books;

use App\Model\Book;
use App\Views\BaseView;

class EditBook extends BaseView
{
    public static function render()
    {
        if (!isset($_GET['id'])) {
            echo "ID không tồn tại.";
            return;
        }

        $Book = new Book();
        $result = $Book->getById((int)$_GET['id'])->fetch_assoc();

        if (!$result) {
            echo "Nhân viên không tồn tại.";
            return;
        }

?>
        <div class="container">
            <div class="card">
                <div class="card-header">Cập nhật thông tin nhân viên</div>
                <div class="card-body">
                    <form method="POST" action="?act=HandleEditBook&id=<?= ($result['id']) ?>">
                        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?? '' ?>">
                        <div class="mb-3">
                            <div>
                                <label for="id">ID</label>
                                <input type="text" name="id" id="id" class="form-control" readonly value="<?= ($result['id']) ?>">
                            </div>
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control" value="<?= ($result['title']) ?>">
                        </div>
                        <div class="mb-3">
                            <label for="author">Author</label>
                            <input type="text" name="author" id="author" class="form-control" value="<?= ($result['author']) ?>">
                        </div>
                        <div class="mb-3">
                            <label for="genre">Genre</label>
                            <input type="text" name="genre" id="genre" class="form-control" value="<?= ($result['genre']) ?>">
                        </div>
                        <div class="mb-3">
                            <label for="publication_year"></label>
                            <input type="text" name="publication_year" id="publication_year" class="form-control" value="<?= ($result['publication_year']) ?>">
                        </div>
                        <div class="mb-3">
                            <label for="quantity"></label>
                            <input type="text" name="quantity" id="quantity" class="form-control" value="<?= ($result['quantity']) ?>">
                        </div>
                        <div class="mb-3">
                            <label for="status">Status</label>
                            <input type="text" name="status" id="status" class="form-control" value="<?= ($result['status']) ?>">
                        </div>
                        <button type="submit" class="btn btn-primary">Lưu lại</button>
                    </form>
                </div>
            </div>
        </div>
<?php
    }

    public static function handle()
    {
        $Book = new Book();
        $id = (int)$_POST['id'];
        $data = [
            'title' => $_POST['title'],
            'author' => $_POST['author'],
            'genre' => $_POST['genre'],
            'publication_year' => (int)$_POST['publication_year'],
            'quantity' => (int)$_POST['quantity'],
            'status' => $_POST['status'],
        ];
        $result = $Book->update($id, $data);
        if ($result) {
            // Sử dụng meta refresh để chuyển hướng
            echo '<meta http-equiv="refresh" content="0;url=?act=ListBook">';
            exit();
        } else {
            echo "Thêm thất bại";
        }
    }
}
