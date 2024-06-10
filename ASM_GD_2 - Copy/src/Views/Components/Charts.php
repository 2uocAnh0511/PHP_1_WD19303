<?php

namespace App\Views\Components;

use App\Views\BaseView;

class Charts extends BaseView
{

    public static function render()
    { ?>

        <body class="sb-nav-fixed">
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
                <div id="layoutSidenav_content">
                    <main>
                        <div class="container-fluid px-4">
                            <h1 class="mt-4">Charts</h1>
                            <ol class="breadcrumb mb-4">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item active">Charts</li>
                            </ol>
                            <div class="card mb-4">
                                <div class="card-body">
                                    Chart.js is a third party plugin that is used to generate the charts in this template. The charts below have been customized - for further customization options, please visit the official
                                    <a target="_blank" href="https://www.chartjs.org/docs/latest/">Chart.js documentation</a><br>
                                    Chart.js là một plugin bên thứ ba được sử dụng để tạo ra biểu đồ trong mẫu này. Các biểu đồ dưới đây đã được tùy chỉnh - để biết thêm tùy chọn tùy chỉnh, vui lòng truy cập vào tài liệu chính thức của
                                    <a target="_blank" href="https://www.chartjs.org/docs/latest/">Chart.js</a>
                                </div>
                            </div>
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-area me-1"></i>
                                    Area Chart
                                </div>
                                <div class="card-body"><canvas id="myAreaChart" width="100%" height="30"></canvas></div>
                                <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            <i class="fas fa-chart-bar me-1"></i>
                                            Bar Chart
                                        </div>
                                        <div class="card-body"><canvas id="myBarChart" width="100%" height="50"></canvas></div>
                                        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            <i class="fas fa-chart-pie me-1"></i>
                                            Pie Chart
                                        </div>
                                        <div class="card-body"><canvas id="myPieChart" width="100%" height="50"></canvas></div>
                                        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>
                    <footer class="py-4 bg-light mt-auto">
                        <div class="container-fluid px-4">
                            <div class="d-flex align-items-center justify-content-between small">
                                <div class="text-muted">PC09326 Nguyen2uocAnh- &copy; Your Website 2023</div>
                                <div>
                                    <a href="#">Privacy Policy</a>
                                    &middot;
                                    <a href="#">Terms &amp; Conditions</a>
                                </div>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
            <script src="js/scripts.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
            <script src="assets/demo/chart-area-demo.js"></script>
            <script src="assets/demo/chart-bar-demo.js"></script>
            <script src="assets/demo/chart-pie-demo.js"></script>
        </body>

<?php }
    public static function handle()
    {
    }
}
