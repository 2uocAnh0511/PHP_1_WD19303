<?php

namespace App\Views\Components\Books;

use App\Views\BaseView;
use App\Model\Book;

class ListBook extends BaseView
{
    public static function render()
    {
        $_listBook = new Book();
        $Books = $_listBook->getAll();
?>
        <style>
            .container {
                width: 80%;
                margin: 0 auto;
                padding: 20px;
                background-color: #f9f9f9;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            h2 {
                text-align: center;
                color: #333;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
            }

            table,
            th,
            td {
                border: 1px solid #ddd;
            }

            th,
            td {
                padding: 12px;
                text-align: left;
            }

            th {
                background-color: #f2f2f2;
                color: #333;
            }

            tr:nth-child(even) {
                background-color: #f9f9f9;
            }

            tr:hover {
                background-color: #f1f1f1;
            }

            .form-container {
                margin-top: 20px;
                padding: 20px;
                background-color: #fff;
                border: 1px solid #ddd;
                border-radius: 8px;
            }

            .form-group {
                margin-bottom: 15px;
            }

            .form-group label {
                display: block;
                margin-bottom: 5px;
                font-weight: bold;
            }

            .form-group input {
                width: 100%;
                padding: 8px;
                border: 1px solid #ddd;
                border-radius: 4px;
            }

            .form-group button {
                padding: 10px 20px;
                background-color: #007bff;
                color: #fff;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }

            .form-group button:hover {
                background-color: #0056b3;
            }

            .action-buttons {
                display: flex;
                gap: 10px;
            }

            .action-buttons button {
                padding: 5px 10px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }

            .edit-btn {
                background-color: #ffc107;
                color: #fff;
            }

            .edit-btn>a {
                color: white;
                text-decoration: none;
            }


            .edit-btn:hover {
                background-color: #e0a800;
            }

            .delete-btn {
                background-color: #dc3545;
                color: #fff;
            }

            .delete-btn:hover {
                background-color: #c82333;
            }
        </style>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="?act=Home">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
                                Account
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <?php if (!empty($_SESSION['user'])) : ?>
                                        <a class="nav-link" href="?act=Account">Account</a>

                                    <?php else : ?>
                                        <a class="nav-link" href="?act=Login">Login</a>
                                        <a class="nav-link" href="?act=Register">Sign-up</a>
                                    <?php endif; ?>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="?act=Login">Login</a>
                                            <a class="nav-link" href="?act=Register">Register</a>
                                            <a class="nav-link" href="?act=Search">Search</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="?act=Error401">401 Page</a>
                                            <a class="nav-link" href="?act=Error404">404 Page</a>
                                            <a class="nav-link" href="?act=Error500">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="?act=Charts">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="?act=ListBook">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Book List
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Admin
                    </div>
                </nav>
            </div>
            <div class="container">
                <h2>BookList</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Genre</th>
                            <th>Publication Year</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($result = $Books->fetch_assoc()) : ?>
                            <tr>
                                <td><?= ($result['title']) ?></td>
                                <td><?= ($result['author']) ?></td>
                                <td><?= ($result['genre']) ?></td>
                                <td><?= ($result['publication_year']) ?></td>
                                <td><?= ($result['quantity']) ?></td>
                                <td><?= ($result['status']) ?></td>
                                <td class="action-buttons">
                                    <button class="edit-btn text-de" type="submit">
                                        <a href="?act=EditBook&id=<?= $result['id'] ?>">Edit</a>
                                    </button>
                                    <form action="?act=HandleDeleteBook" method="POST">
                                        <input type="hidden" name="id" id="id" value="<?= $result['id'] ?>">
                                        <button class="delete-btn" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
                <div class="form-container">
                    <h3>Add Books</h3>
                    <form id="BookForm" method="POST" action="?act=HandleAddBook">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" id="title" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="author">Author</label>
                            <input type="text" id="author" name="author" required>
                        </div>
                        <div class="form-group">
                            <label for="genre">Genre</label>
                            <input type="text" id="genre" name="genre" required>
                        </div>
                        <div class="form-group">
                            <label for="publication_year">Publication Year</label>
                            <input type="text" id="publication_year" name="publication_year" required>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="text" id="quantity" name="quantity" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <input type="text" id="status" name="status" required>
                        </div>
                        <div class="form-group">
                            <button type="submit">ADD</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
<?php
    }

    public static function handle()
    {
    }
}
