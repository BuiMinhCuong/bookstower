<?php
session_start();
require_once '../commons/env.php';
require_once '../commons/core.php';
require_once './views/layout/header.php';
require_once './views/layout/navbar.php';

// Require Controller
require_once './controllers/HomeController.php';

// Require Model
require_once './models/danhmuc.php';
require_once './models/sanpham.php';

$home = new HomeController();

// Route
$action = $_GET['act'] ?? 'home'; 

switch ($action) {
    case '/':
    case 'home':
        $home->views_home();
        break;

    case 'chitietsp':
        $home->views_chitietsp();
        break;

    case 'sanpham':
        $home->views_sanpham();
        break;

    case 'contact':
        $home->views_contact();
        break;


    default:
        echo "404 - Không tìm thấy trang.";
        break;
}

require_once './views/layout/footer.php';
