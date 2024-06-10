<?php

namespace App\Views\Components\Search;

use App\Views\BaseView;
use App\Model\Book;

class Search extends BaseView
{
    public static function render()
    {
?>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-image: url(/assets/img/background_5.jpg);
                background-size: 100% auto;
            }

            .search-form {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                background-color: rgba(255, 255, 255, 0.8);
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                width: 400px;
                max-width: 80%;
            }

            .search-form input[type="text"],
            .search-form input[type="password"],
            .search-form button[type="submit"] {
                width: 100%;
                padding: 10px;
                margin-bottom: 10px;
                border: 1px solid #ccc;
                border-radius: 5px;
                box-sizing: border-box;
            }

            .search-form button[type="submit"] {
                background-color: #80deea;
                color: white;
                cursor: pointer;
            }

            .search-form button[type="submit"]:hover {
                background-color: #00bcd4;
            }

            .search-form .card-header {
                text-align: center;
                font-size: large;
                font-weight: bolder;
            }
        </style>

        <div class="search-form">
            <form method="POST" action="?act=HandleSearch">
                <div class="card-header">Search-Box</div>
                <label for="title">Title:</label>
                <input type="text" name="title" id="title"><br>

                <label for="author">Author:</label>
                <input type="text" name="author" id="author"><br>

                <label for="genre">Genre:</label>
                <input type="text" name="genre" id="genre"><br>

                <button type="submit">Search</button>
            </form>
        </div>
<?php
    }

    public static function handle()
    {
        $title = $_POST['title'] ?? '';
        $author = $_POST['author'] ?? '';
        $genre = $_POST['genre'] ?? '';

        $bookModel = new Book();
        $results = $bookModel->search($title, $author, $genre);
        //Render search results
        if (!empty($results)) {
            echo "<style>";
            echo "body {";
            echo "background-image: url(/assets/img/background_6.jpg);";
            echo "background-size: cover;"; // Đảm bảo hình nền sẽ phủ toàn bộ kích thước của body
            echo "}";
            echo "</style>";
            
            echo "<div style='display: flex; justify-content: center; align-items: center; height: 100vh; flex-direction: column;'>";
            echo "<h2 style='text-align: center; margin-bottom: 20px;'>RESULTS</h2>"; 
            echo "<table style='width: 80%; border-collapse: collapse; margin-bottom: 20px; background-color: rgba(255, 255, 255, 0.8);'>"; 
            echo "<tr>";
            echo "<th style='border: 1px solid #dddddd; padding: 8px; background-color: #f2f2f2;'>Title</th>";
            echo "<th style='border: 1px solid #dddddd; padding: 8px; background-color: #f2f2f2;'>Author</th>";
            echo "<th style='border: 1px solid #dddddd; padding: 8px; background-color: #f2f2f2;'>Genre</th>";
            echo "<th style='border: 1px solid #dddddd; padding: 8px; background-color: #f2f2f2;'>Publication Year</th>";
            echo "<th style='border: 1px solid #dddddd; padding: 8px; background-color: #f2f2f2;'>Quantity</th>";
            echo "<th style='border: 1px solid #dddddd; padding: 8px; background-color: #f2f2f2;'>Status</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            
            foreach ($results as $book) {
                echo "<tr>";
                echo "<td style='border: 1px solid #dddddd; padding: 8px;'>{$book['title']}</td>";
                echo "<td style='border: 1px solid #dddddd; padding: 8px;'>{$book['author']}</td>";
                echo "<td style='border: 1px solid #dddddd; padding: 8px;'>{$book['genre']}</td>";
                echo "<td style='border: 1px solid #dddddd; padding: 8px;'>{$book['publication_year']}</td>";
                echo "<td style='border: 1px solid #dddddd; padding: 8px;'>{$book['quantity']}</td>";
                echo "<td style='border: 1px solid #dddddd; padding: 8px;'>{$book['status']}</td>";
                echo "</tr>";
            }
            
            echo "</tbody>";
            echo "</table>";
            echo "<a href='?act=Search' class='btn btn-primary'>Back</a>"; // Thêm nút "Tìm kiếm"
            echo "</div>";
            
        } else {
            echo "<p>No results found.</p>";
        }
    }
}
