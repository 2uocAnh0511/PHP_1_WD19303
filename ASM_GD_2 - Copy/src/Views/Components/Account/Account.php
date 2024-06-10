<?php

namespace App\Views\Components\Account;

use App\Model\User;
use App\Views\BaseView;

class Account extends BaseView
{

    public static function render()
    {
        if (!empty($_SESSION['user'])) {
            self::updateAccount();
        } else {
            self::form();
        }
    }

    public static function handle()
    {
    }

    public static function login()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $account = new User();
        $data = $account->login($email, $password);
        if (!empty($data)) {
            //Lưu session
            $_SESSION['user'] = $data;
        }
    }

    public static function register()
    {
        $name = $_POST["name"];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $avatar = !empty($_FILES['avatar']['name']) ? $_FILES['avatar']['name'] : 'default_avatar.png';

        // Upload avatar file
        if (!empty($_FILES['avatar']['name'])) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["avatar"]["name"]);
            move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file);
        }

        $account = new User();
        $result = $account->register($name, $email, $password, $avatar);
    }


    public static function form()
    {
?>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-image: url(/assets/img/background_7.jpg);
                background-size: 100% auto;
            }

            .container {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            }

            .card {
                margin-bottom: 20px;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                background-color: rgba(255, 255, 255, 0.8);

            }

            .card-header {
                text-align: center;
                font-size: large;
                font-weight: bold;

            }

            .card-body {
                padding: 20px;
            }

            .form-group {
                margin-bottom: 20px;

            }

            .btn-primary {
                background-color: #80deea;
                color: white;
                cursor: pointer;
            }

            .btn-primary:hover {
                background-color: #00bcd4;
            }

            @-webkit-keyframes snowflakes-fall {
                0% {
                    top: -10%
                }

                100% {
                    top: 100%
                }
            }

            @-webkit-keyframes snowflakes-shake {

                0%,
                100% {
                    -webkit-transform: translateX(0);
                    transform: translateX(0)
                }

                50% {
                    -webkit-transform: translateX(80px);
                    transform: translateX(80px)
                }
            }

            @keyframes snowflakes-fall {
                0% {
                    top: -10%
                }

                100% {
                    top: 100%
                }
            }

            @keyframes snowflakes-shake {

                0%,
                100% {
                    transform: translateX(0)
                }

                50% {
                    transform: translateX(80px)
                }
            }

            .snowflake {
                color: #fff;
                font-size: 1em;
                font-family: Arial, sans-serif;
                text-shadow: 0 0 5px #000;
                position: fixed;
                top: -10%;
                z-index: 9999;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
                cursor: default;
                -webkit-animation-name: snowflakes-fall, snowflakes-shake;
                -webkit-animation-duration: 10s, 3s;
                -webkit-animation-timing-function: linear, ease-in-out;
                -webkit-animation-iteration-count: infinite, infinite;
                -webkit-animation-play-state: running, running;
                animation-name: snowflakes-fall, snowflakes-shake;
                animation-duration: 10s, 3s;
                animation-timing-function: linear, ease-in-out;
                animation-iteration-count: infinite, infinite;
                animation-play-state: running, running;
            }

            .snowflake:nth-of-type(0) {
                left: 1%;
                -webkit-animation-delay: 0s, 0s;
                animation-delay: 0s, 0s
            }

            .snowflake:nth-of-type(1) {
                left: 10%;
                -webkit-animation-delay: 1s, 1s;
                animation-delay: 1s, 1s
            }

            .snowflake:nth-of-type(2) {
                left: 20%;
                -webkit-animation-delay: 6s, .5s;
                animation-delay: 6s, .5s
            }

            .snowflake:nth-of-type(3) {
                left: 30%;
                -webkit-animation-delay: 4s, 2s;
                animation-delay: 4s, 2s
            }

            .snowflake:nth-of-type(4) {
                left: 40%;
                -webkit-animation-delay: 2s, 2s;
                animation-delay: 2s, 2s
            }

            .snowflake:nth-of-type(5) {
                left: 50%;
                -webkit-animation-delay: 8s, 3s;
                animation-delay: 8s, 3s
            }

            .snowflake:nth-of-type(6) {
                left: 60%;
                -webkit-animation-delay: 6s, 2s;
                animation-delay: 6s, 2s
            }

            .snowflake:nth-of-type(7) {
                left: 70%;
                -webkit-animation-delay: 2.5s, 1s;
                animation-delay: 2.5s, 1s
            }

            .snowflake:nth-of-type(8) {
                left: 80%;
                -webkit-animation-delay: 1s, 0s;
                animation-delay: 1s, 0s
            }

            .snowflake:nth-of-type(9) {
                left: 90%;
                -webkit-animation-delay: 3s, 1.5s;
                animation-delay: 3s, 1.5s
            }

            .snowflake:nth-of-type(10) {
                left: 25%;
                -webkit-animation-delay: 2s, 0s;
                animation-delay: 2s, 0s
            }

            .snowflake:nth-of-type(11) {
                left: 65%;
                -webkit-animation-delay: 4s, 2.5s;
                animation-delay: 4s, 2.5s
            }
        </style>
        <div class="snowflakes" aria-hidden="true">
            <div class="snowflake">❅</div>
            <div class="snowflake">❆</div>
            <div class="snowflake">❅</div>
            <div class="snowflake">❆</div>
            <div class="snowflake">❅</div>
            <div class="snowflake">❆</div>
            <div class="snowflake">❅</div>
            <div class="snowflake">❆</div>
            <div class="snowflake">❅</div>
            <div class="snowflake">❆</div>
            <div class="snowflake">❅</div>
            <div class="snowflake">❆</div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">Login</div>
                        <div class="card-body">
                            <form method="POST" action="?act=Login">
                                <div class="mb-3">
                                    <label for="login_email">Email</label>
                                    <input type="text" id="login_email" name="email" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="login_password">Password</label>
                                    <input type="password" id="login_password" name="password" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary" name="login">
                                        Login
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">Sign-up</div>
                        <div class="card-body">
                            <form method="POST" action="?act=Register" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="register_email">Email</label>
                                    <input type="text" id="register_email" name="email" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="register_password">Password</label>
                                    <input type="password" id="register_password" name="password" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="register_name">Name</label>
                                    <input type="text" id="register_name" name="name" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="register_avatar">Avatar</label>
                                    <input type="file" id="register_avatar" name="avatar" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Sign-up</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php }

    public static function updatePassword()
    {
        $old_password = $_POST['old_password'];
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];
        // var_dump($_POST);
        // die();

        if ($new_password !== $confirm_password) {
            //Bước 1, Lưu lại mật khẩu cũ, và mật khẩu mới
            $_SESSION['password']['old_password'] = $old_password;
            $_SESSION['password']['new_password'] = $new_password;
            $_SESSION['password']['confirm_password'] = $confirm_password;
            //Bước 2, in ra thông báo, lưu thông báovafaof session

            //Bước 3, submit lại
            //Bước 4, xóa session thông báo vừa in

            $_SESSION['password']['notify_confirm_password'] = "Xác nhận mật khẩu chưa đúng";

            header('Location:?act=Account');
        } else {
            //trry cập vào db
            //kiểm tra email hiện tại ở đâu 
            //email hiện tại đang ở Session

            $email = $_SESSION['user']['email'];
            $password = $new_password;

            $account = new User();
            $data = $account->login($email, $password);
            if (!empty($data)) {
            } else {

                $_SESSION['password']['notify_old_password'] = "Mật khẩu cũ chưa đúng";

                header("Location: ?act=Account");
            }
        }
    }

    public static function updateInfo()
    {
    }


    public static function updateAccount()
    {
    ?>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-image: url(/assets/img/background_8.jpg);
                background-size: 100% auto;
            }

            .custom-container {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            }

            .card {
                background-color: rgba(255, 255, 255, 0.8);

            }
        </style>
        <div class="container custom-container d-flex justify-content-center align-items-center">
            <div class="row">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">Đổi mật khẩu</div>
                        <div class="card-body">
                            <form action="?act=updatePassword" method="POST">
                                <div class="mb-3">
                                    <label for="update_password_old">Mật khẩu cũ</label>
                                    <input type="password" value="<?= $_SESSION['password']['old_password'] ?? '' ?>" name="old_password" id="update_password" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="update_password">Mật khẩu mới</label>
                                    <input type="password" value="<?= $_SESSION['password']['new_password'] ?? '' ?>" name="new_password" id="update_password" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="update_password">Xác nhận mật khẩu</label>
                                    <input type="password" value="<?= $_SESSION['password']['confirm_password'] ?? '' ?>" name="confirm_password" id="update_password" class="form-control">
                                    <small class="text-danger"><?= $_SESSION['password']['notify_confirm_password'] ?? '' ?></small>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary" href="#">
                                        Đổi mật khẩu
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">Cập nhật tài khoản</div>
                        <div class="card-body">
                            <form action="?act=updateAccount" method="POST">
                                <div class="mb-3">
                                    <label for="email">Email</label>
                                    <input type="text" value="<?= $_SESSION['user']['email'] ?>" readonly id="email" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="">Họ và Tên</label>
                                    <input type="text" value="<?= $_SESSION['user']['name'] ?>" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="">Ảnh đại diện</label>
                                    <input type="file" value="<?= $_SESSION['user']['avatar'] ?>" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">
                                        Cập nhật
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php }
}
