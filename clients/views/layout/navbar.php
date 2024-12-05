<?php
// models trả về dữ liẹu một lần
require_once './models/danhmuc.php';
$modelDanhMuc = new DanhMuc();
$listdm = $modelDanhMuc->getAllDanhMuc();
?>
<!-- Navbar Start -->
<div class="container-fluid mb-5">
    <div class="row border-top px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <div class="category-dropdown">
                <button class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" 
                   onclick="toggleMenu()"
                   style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Danh mục sản phẩm</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </button>
                <nav class="position-absolute navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="category-menu" ">
                    <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                        <?php foreach($listdm as $danhmuc): ?>
                            <a href="#" class="nav-item nav-link">
                                <?php echo $danhmuc['name']; ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </nav>
            </div>
        </div>
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                <a href="" class="text-decoration-none d-block d-lg-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold">
                        <span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper
                    </h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                      

                        <a href="http://localhost/bookstower/clients/" class="nav-item nav-link active">Trang chủ</a>

                        <a href="./views/sanpham.php" class="nav-item nav-link">Sản phẩm</a>
                        <a href="./views/contact.php" class="nav-item nav-link">Liên hệ</a>
                    </div>
                    <div class="navbar-nav ml-auto py-0">
                    <a href="http://localhost/bookstower/clients/views/login.php" class="nav-item nav-link">Đăng nhập</a>
                    <a href="http://localhost/bookstower/clients/views/register.php" class="nav-item nav-link">Đăng ký</a>
                    </div>
                </div>
            </nav>
            <div id="header-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active" style="height: 410px;">
                    <img class="img-fluid" src="https://img6.thuthuatphanmem.vn/uploads/2022/07/05/bo-anh-nen-may-tinh-anime-4k-dep_044858997.jpg" alt="Dark and Cool Character Header">

                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order</h4>
                                <h3 class="display-4 text-white font-weight-semi-bold mb-4">Fashionable Dress</h3>
                                <a href="" class="btn btn-light py-2 px-3">Shop Now</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="carousel-item" style="height: 410px;">
                        <img class="img-fluid" src="https://images.hdqwalls.com/download/japan-city-digital-art-qn-3440x1440.jpg" alt="Reasonable Price">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order</h4>
                                <h3 class="display-4 text-white font-weight-semi-bold mb-4">Reasonable Price</h3>
                                <a href="" class="btn btn-light py-2 px-3">Shop Now</a>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                    <div class="btn btn-dark" style="width: 45px; height: 45px;">
                        <span class="carousel-control-prev-icon mb-n2"></span>
                    </div>
                </a>
                <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                    <div class="btn btn-dark" style="width: 45px; height: 45px;">
                        <span class="carousel-control-next-icon mb-n2"></span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Navbar End -->

<script>
function toggleMenu() {
    var menu = document.getElementById('category-menu');
    if (menu.style.display === 'none') {
        menu.style.display = 'block';
    } else {
        menu.style.display = 'none';
    }
}

// Đóng menu khi click ra ngoài
document.addEventListener('click', function(event) {
    var menu = document.getElementById('category-menu');
    var button = event.target.closest('.category-dropdown button');
    var isClickInside = event.target.closest('.category-dropdown');
    
    if (!isClickInside && menu.style.display === 'block') {
        menu.style.display = 'none';
    }
    if (button) {
        event.stopPropagation();
    }
});
</script>

<style>
.category-dropdown {
    position: relative;
}

#category-menu {
    width: 100%;
    background: white;
    z-index: 999;
    top: 100%;
    left: 0;
}
</style>