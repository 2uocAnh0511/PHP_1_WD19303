<?php

namespace App\Views\Components;

use App\Views\BaseView;

class Header extends BaseView
{
    public static function render()
    { ?>
        <!-- <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        #header {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #ccc;
             width: 100%;
            background: linear-gradient(to bottom, #00ffff 31%, #ccffcc 84%);
            padding: 0 20px;
            box-sizing: border-box;
        }

        .nav {
            list-style: none;
            display: flex;
            padding: 0;
            margin: 0;
        }

        .nav li {
            margin-right: 20px;
        }

        .nav-link {
            text-decoration: none;
            color: #333;
            padding: 8px 16px;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .nav-link:hover {
            background-color: #f2f2f2;
        }

        .btn {
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-outline-primary {
            background-color: transparent;
            color: #007bff;
            border: 1px solid #007bff;
        }

        .btn-outline-primary:hover {
            background-color: #007bff;
            color: #fff;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style> -->

        <!-- <header class="d-flex flex-wrap align-items-center justify-content-between py-3 border-bottom">
                <div class="col-md-3 mb-2 mb-md-0">
                    <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
                        <svg class="bi" width="40" height="32" role="img" aria-label="Bootstrap">
                            <use xlink:href="#bootstrap" />
                        </svg>
                    </a>
                </div>

                <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="#" class="nav-link px-2 link-secondary">Home</a></li>
                    <li><a href="#" class="nav-link px-2">Features</a></li>
                    <li><a href="#" class="nav-link px-2">Pricing</a></li>
                    <li><a href="#" class="nav-link px-2">FAQs</a></li>
                    <li><a href="#" class="nav-link px-2">About</a></li>
                </ul>

                <div class="col-md-3 text-end">
                    <button type="button" class="btn btn-outline-primary me-2">Login</button>
                    <button type="button" class="btn btn-primary">Sign-up</button>
                </div>
            </header>
     -->
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="?act=Home">PC09326 - 2uocAnh</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch"/>
                    <button  class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"> </i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <?php if (!empty($_SESSION['user'])) : ?>
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Hi, <?= $_SESSION['user']['name'] ?>
                        <i class="fas fa-user fa-fw"></i>
                    </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#!   ">Settings</a></li>
                            <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <a class="dropdown-item" href="?act=logout">Logout</a>
                            </li>
                        </ul>
                    <?php else : ?>
                        <a class="nav-link" href="?act=Account">Account</a>
                    <?php endif; ?>
                </li>
            </ul>
        </nav>
<?php }

    public static function handle()
    {
    }
}
?>