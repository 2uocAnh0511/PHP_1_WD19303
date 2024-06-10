<?php


use App\Views\Components\Charts;
use App\Views\Components\Header;
use App\Views\Components\Footer;
use App\Views\Components\Home;
use App\Views\Components\Notfound;
use App\Views\Components\Sidebars;


use App\Model\Database;

use App\Views\Components\Account\Account;
use App\Views\Components\Account\Login;
use App\Views\Components\Account\Register;

use App\Views\Components\Employees\ListEmployee;
use App\Views\Components\Employees\AddEmployee;
use App\Views\Components\Employees\EditEmployee;
use App\Views\Components\Employees\DeleteEmployee;


use App\Views\Components\Department\AddDepartment;
use App\Views\Components\Department\ListDepartment;
use App\Views\Components\Department\EditDepartment;
use App\Views\Components\Department\DeleteDepartment;



use App\Route;
use App\Views\Components\Books\AddBook;
use App\Views\Components\Books\DeleteBook;
use App\Views\Components\Books\ListBook;
use App\Views\Components\Books\EditBook;
use App\Views\Components\Error401;
use App\Views\Components\Error404;
use App\Views\Components\Error500;
use App\Views\Components\Search\Search;
use App\Views\Components\Search\SearchResult;

// Route::get('/products', 'App\Controller\HomeController@index');
// Route::dispatch($_SERVER['REQUEST_URI']);
// echo $_SERVER['REQUEST_URI'];

Header::render();


$action = $_GET['act'] ?? "Home";

switch ($action) {
    case "Home":
        Home::render();
        break;
    case "ListEmployee":
        ListEmployee::render();
        break;
    case "ListBook":
        ListBook::render();
        break;
    case "HandleAddBook":
        AddBook::handle();
        break;
    case "EditBook":
        EditBook::render();
        break;
    case "HandleEditBook":
        EditBook::handle();
        break;
    case "DeleteBook":
        DeleteBook::render();
        break;
    case "HandleDeleteBook":
        DeleteBook::handle();
        break;

        // case "AddEmployee":
        //     AddEmployee::render();
        //     break;
        // case "HandleEditEmployee":
        //     EditEmployee::handle();
        //     break;
        // case "EditEmployee":
        //     EditEmployee::render();
        //     break;
        // case "HandleAddEmployee":
        //     AddEmployee::handle();
        //     break;
        // case "AddDepartment":
        //     AddDepartment::render();
        //     break;
        // case "HandleAddDepartment":
        //     AddDepartment::handle();
        //     break;
        // case "ListDepartment":
        //     ListDepartment::render();
        //     break;
        // case "EditDepartment":
        //     EditDepartment::render();
        //     break;
        // case "HandleEditDepartment":
        //     EditDepartment::handle();
        //     break;
        // case "DeleteDepartment":
        //     DeleteDepartment::render();
        // case "HandleDeleteDepartment":
        //     DeleteDepartment::handle();
        //     break;
        // case "DeleteEmployee":
        //     DeleteEmployee::render();
        //     break;
        // case "HandleDeleteEmployee":
        //     DeleteEmployee::handle();
        //     break;
    case "Search":
        Search::render();
        break;
    case "HandleSearch":
        Search::handle();
        break;
    case "Error401":
        Error401::render();
    case "Error500":
        Error500::render();
        break;
    case "Error404":
        Error404::render();
        break;
    case "Charts":
        Charts::render();
        break;
    case "Login":
        Login::render();
        break;
    case "HandleLogin":
        Login::login();
        break;
    case "Register":
        Register::render();
        break;
    case "HandleRegister":
        Register::register();
        break;
        // case "Register":
        //     Account::register();
        //     break;
        // case "Login":
        //     Account::login();
        //     break;
    case "Account":
        Account::render();
        break;
    case "updatePassword":
        Account::updatePassword();
        break;
    case "updateAccount":
        Account::updateInfo();
        break;
    case "logout":
        // Hành động đăng xuất
        session_unset();
        session_destroy();
        echo '<meta http-equiv="refresh" content="0;url=?act=Home">'; // Chuyển hướng đến trang chủ hoặc trang đăng nhập
        exit();
    default:
        Notfound::render();
        break;
}

// $footer->render();
// Footer::render();
