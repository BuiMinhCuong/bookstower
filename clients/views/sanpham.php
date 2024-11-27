<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sản phẩm</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container-fluid.bg-secondary {
            background-color: #f8f9fa;
            color: #333;
        }
        .container-fluid.bg-secondary h1 {
            color: #343a40;
        }
        .breadcrumb {
            background: transparent;
        }
        .product-item {
            transition: all 0.3s ease-in-out;
            border: 1px solid #ddd;
            height: 450px;
        }
        .product-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .product-img img {
            transition: all 0.3s;
            width: 100%;
            height: 300px;
            object-fit: cover;
        }
        .product-img img:hover {
            transform: scale(1.05);
        }
        .dropdown-menu {
            border-radius: 0;
        }
        .btn {
            transition: background 0.3s;
        }
        .btn:hover {
            background-color: #343a40;
            color: #fff;
        }
        .custom-control-label {
            font-weight: 500;
        }
        .card-body {
            transition: background-color 0.3s;
        }
        .card-body:hover {
            background-color: #f0f0f0;
        }
        .pagination .page-item.active .page-link {
            background-color: #343a40;
            border-color: #343a40;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
   // Khởi tạo giỏ hàng
let cart = JSON.parse(localStorage.getItem('cart')) || [];  // Kiểm tra xem có dữ liệu giỏ hàng trong localStorage không, nếu không sẽ khởi tạo giỏ hàng rỗng

$(document).ready(function() {
    function updateCart() {
        let cartHtml = '';
        let total = 0;

        $("#cart-items").empty();

        // Duyệt qua các sản phẩm trong giỏ hàng
        cart.forEach(function(item, index) {
            cartHtml += `
                <div class="cart-item d-flex align-items-center justify-content-between mb-2">
                    <img src="${item.image}" alt="${item.name}" style="width: 50px; height: 50px; object-fit: cover;">
                    <span>${item.name}</span>
                    <span>$${item.price.toFixed(2)}</span>
                    <div class="d-flex align-items-center">
                        <button class="btn btn-sm btn-secondary change-quantity" data-index="${index}" data-action="decrease">-</button>
                        <span class="mx-2">${item.quantity}</span>
                        <button class="btn btn-sm btn-secondary change-quantity" data-index="${index}" data-action="increase">+</button>
                    </div>
                    <button class="btn btn-sm btn-danger remove-item" data-index="${index}">Xóa</button>
                </div>
            `;
            total += item.price * item.quantity;
        });

        // Hiển thị tổng tiền
        cartHtml += `
            <div class="d-flex justify-content-between mt-3">
                <strong>Tổng tiền:</strong>
                <strong>$${total.toFixed(2)}</strong>
            </div>
        `;

        // Cập nhật nội dung giỏ hàng trong modal
        $("#cart-items").html(cartHtml);
        $("#totalAmount").text(`$${total.toFixed(2)}`);
    }

    // Tìm kiếm sản phẩm theo tên
    $("#searchProduct").on("keyup", function() {
        const value = $(this).val().toLowerCase();
        $(".product-item").each(function() {
            const productName = $(this).find("h6").text().toLowerCase();
            $(this).toggle(productName.includes(value));
        });
    });

    // Thêm sản phẩm vào giỏ hàng
    $(".add-to-cart").on("click", function() {
        const productName = $(this).data("name");
        const productPrice = parseFloat($(this).data("price"));
        const productImage = $(this).data("image");

        // Kiểm tra xem sản phẩm đã tồn tại trong giỏ chưa
        const existingProduct = cart.find(product => product.name === productName);
        if (existingProduct) {
            existingProduct.quantity += 1;
        } else {
            cart.push({
                name: productName,
                price: productPrice,
                image: productImage,
                quantity: 1 
            });
        }

        // Lưu giỏ hàng vào localStorage
        localStorage.setItem('cart', JSON.stringify(cart));

        updateCart();
        $("#cartModal").modal("show");
    });

    // Thay đổi số lượng sản phẩm trong giỏ
    $(document).on("click", ".change-quantity", function() {
        const index = $(this).data("index");
        const action = $(this).data("action");

        if (action === "increase") {
            cart[index].quantity += 1;
        } else if (action === "decrease") {
            cart[index].quantity -= 1;
            if (cart[index].quantity <= 0) {
                cart.splice(index, 1); 
            }
        }

        // Lưu giỏ hàng vào localStorage
        localStorage.setItem('cart', JSON.stringify(cart));

        updateCart();
    });

    // Xóa sản phẩm khỏi giỏ hàng
    $(document).on("click", ".remove-item", function() {
        const index = $(this).data("index");
        cart.splice(index, 1);

        // Lưu giỏ hàng vào localStorage
        localStorage.setItem('cart', JSON.stringify(cart));

        updateCart();
    });

    // Cập nhật giỏ hàng khi tải lại trang
    updateCart();
});

</script>


</head>
<body>
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Bookstower</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="http://localhost/bookstower/clients/">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Danh sách sản phẩm hiện có</p>
            </div>
        </div>
    </div>

    <!-- Shop Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-12">
                <!-- Price Start -->
                <div class="border-bottom mb-4 pb-4">
                    <h5 class="font-weight-semi-bold mb-4"> Mức giá</h5>
                    <form>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" checked id="price-all">
                            <label class="custom-control-label" for="price-all">All Price</label>
                            <span class="badge border font-weight-normal">1000</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-1">
                            <label class="custom-control-label" for="price-1">$0 - $100</label>
                            <span class="badge border font-weight-normal">5</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-2">
                            <label class="custom-control-label" for="price-2">$100 - $200</label>
                            <span class="badge border font-weight-normal">3</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-3">
                            <label class="custom-control-label" for="price-3">$200 - $300</label>
                            <span class="badge border font-weight-normal">4</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-4">
                            <label class="custom-control-label" for="price-4">$300 - $400</label>
                            <span class="badge border font-weight-normal">3</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                            <input type="checkbox" class="custom-control-input" id="price-5">
                            <label class="custom-control-label" for="price-5">$400 - $500</label>
                            <span class="badge border font-weight-normal">3</span>
                        </div>
                    </form>
                </div>
                <!-- Price End -->
            </div>
            <!-- Shop Sidebar End -->

            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-12">
                <div class="row pb-3">
                    <!-- Search and Sort -->
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                        <form action="">
                                <div class="input-group">
                                    <input type="text" id="searchProduct" class="form-control" placeholder="Search by name">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-transparent text-primary">
                                            <i class="fa fa-search"></i>
                                        </span>
                                    </div>
                                </div>
                            </form>
                            <!-- <div class="dropdown ml-4">
                                <button class="btn border dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                            Sort by
                                        </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                                    <a class="dropdown-item" href="#">Latest</a>
                                    <a class="dropdown-item" href="#">Popularity</a>
                                    <a class="dropdown-item" href="#">Best Rating</a>
                                </div>
                            </div> -->
                            <div class="col-lg-3 col-6 text-right">
                                  <a href="http://localhost/bookstower/clients/views/order_history.php" class="btn border">
                                 <i class="fas fa-shopping-cart text-primary"></i>
                                  </a>
                             </div>
                        </div>
                    </div>
                    <!-- Products Display -->
                    <!-- Products List -->
                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid" src="https://images.hdqwalls.com/wallpapers/gundam-versus-4k-hd.jpg" alt="Truyện 11">
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3">Gundam 1</h6>
                                <div class="d-flex justify-content-center">
                                    <h6>$200.00</h6><h6 class="text-muted ml-2"><del>$220.00</del></h6>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                                <a href="#" class="btn btn-sm text-dark p-0 add-to-cart" data-name="Gundam 1" data-price="200" data-image="https://images.hdqwalls.com/wallpapers/gundam-versus-4k-hd.jpg"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid" src="https://wallpapers.com/images/hd/gundam-4k-ydnk09a74q6pu46l.jpg" alt="Truyện 12">
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3">Gundam 2</h6>
                                <div class="d-flex justify-content-center">
                                    <h6>$350.00</h6><h6 class="text-muted ml-2"><del>$220.00</del></h6>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                                <a href="#" class="btn btn-sm text-dark p-0 add-to-cart" data-name="Gundam 2" data-price="350" data-image="https://wallpapers.com/images/hd/gundam-4k-ydnk09a74q6pu46l.jpg"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid" src="https://wallpapercave.com/wp/wp5294549.jpg" alt="Truyện 13">
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3">Gundam 3</h6>
                                <div class="d-flex justify-content-center">
                                    <h6>$400.00</h6><h6 class="text-muted ml-2"><del>$220.00</del></h6>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                                <a href="#" class="btn btn-sm text-dark p-0 add-to-cart" data-name="Gundam 3" data-price="400" data-image="https://wallpapercave.com/wp/wp5294549.jpg"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid" src="https://d.wattpad.com/story_parts/657024869/images/1568fcab6be43a7a679612971545.jpg" alt="Truyện 1">
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3">Truyện 1</h6>
                                <div class="d-flex justify-content-center">
                                    <h6>$80.00</h6><h6 class="text-muted ml-2"><del>$100.00</del></h6>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                                <a href="#" class="btn btn-sm text-dark p-0 add-to-cart" data-name="Truyen 1" data-price="80" data-image="https://d.wattpad.com/story_parts/657024869/images/1568fcab6be43a7a679612971545.jpg"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid" src="https://genk.mediacdn.vn/2019/11/27/photo-1-15748243687411891563142.jpg" alt="Truyện 2">
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3">Truyện 2</h6>
                                <div class="d-flex justify-content-center">
                                    <h6>$90.00</h6><h6 class="text-muted ml-2"><del>$110.00</del></h6>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                                <a href="#" class="btn btn-sm text-dark p-0 add-to-cart" data-name="Truyện 2" data-price="90" data-image="https://genk.mediacdn.vn/2019/11/27/photo-1-15748243687411891563142.jpg"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid" src="https://cdn-4.ohay.tv/imgs/7372adc6f8a342239395/728.jpg" alt="Truyện 3">
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3">Truyện 3</h6>
                                <div class="d-flex justify-content-center">
                                    <h6>$95.00</h6><h6 class="text-muted ml-2"><del>$120.00</del></h6>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                                <a href="#" class="btn btn-sm text-dark p-0 add-to-cart" data-name="Truyện 3" data-price="95" data-image="https://cdn-4.ohay.tv/imgs/7372adc6f8a342239395/728.jpg"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          
        </div>
    </div>
<div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cartModalLabel">Giỏ hàng của bạn</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="order_history.php" method="POST">
                <div class="modal-body" id="cart-items">
                    <!-- Các sản phẩm sẽ được thêm vào đây bằng JavaScript -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Thêm sản phẩm khác</button>
                    <form id="checkoutForm" method="POST" action="path_to_your_checkout_page">
                        <input type="hidden" id="cartData" name="cartData" value="">
                        <button type="submit" id="checkoutBtn" class="btn btn-primary">Giỏ hàng thanh toán</button>
                    </form>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

<!-- Footer -->
<div class="container-fluid bg-dark text-white mt-5 py-5">
    <div class="row px-xl-5">
        <div class="col-lg-6 col-md-6 mb-5">
            <h5 class="font-weight-bold text-white mb-4">Về chúng tôi</h5>
            <p>Chào mừng đến với Bookstower - nơi bạn tìm thấy những cuốn truyện yêu thích.</p>
        </div>
        <div class="col-lg-6 col-md-6 mb-5">
            <h5 class="font-weight-bold text-white mb-4">Liên hệ</h5>
            <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-2"></i>123 Đường ABC, Nam Định</p>
            <p class="mb-2"><i class="fa fa-envelope text-primary mr-2"></i>info@bookstower.com</p>
            <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-2"></i>+84 123 456 789</p>
        </div>
    </div>
</div>
<!-- Footer End -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

</body>
</html>
