<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<style>
    
</style>
<!-- Products Start -->
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <marquee bgcolor="#29E7EF" behavior="" direction="">  CHÚC BẠN CÓ MỘT KHOẢNG THỜI GIAN VUI VẺ TẠI BOOKSTOWER </marquee>
        <h2 class="section-title px-5"><span class="px-2">Sản Phẩm chính hãng</span></h2>
    </div>
    <div class="row px-xl-5 pb-3">
    <?php 
        $count = 0;
        foreach($sanphams as $sanpham): 
            if($count >= 20) break; // Dừng sau 8 sản phẩm
        ?>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="card product-item border mb-4" style="border: 2px solid #007bff; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); border-radius: 15px; height: 100%;">
                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0" style="border-bottom: 2px solid #007bff; border-top-left-radius: 15px; border-top-right-radius: 15px; height: 200px;">
                    <img class="img-fluid w-100" src="<?php echo $sanpham['image'] ?>" alt="" style="width: 100%; height: 100%; object-fit: cover; border-top-left-radius: 15px; border-top-right-radius: 15px;">
                </div>
                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3" style="border-bottom: 2px solid #007bff;">
                    <h6 class="text-truncate mb-3"><?php echo $sanpham['title'] ?></h6>
                    <div class="d-flex justify-content-center">
                        <h3><?php echo number_format($sanpham['price'] ?? 0, 0, ',', '.') ?> đ</h3><h6 class="text-muted ml-2"><del><?php echo number_format($sanpham['original_price'] ?? 0, 0, ',', '.') ?> đ </del></h6>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between bg-light border" style="border-top: 2px solid #007bff; border-bottom-left-radius: 15px; border-bottom-right-radius: 15px;">
                    <a href="?act=chitietsp&id=<?php echo $sanpham['id'] ?>" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                    <a href="javascript:void(0);" class="btn btn-sm text-dark p-0 add-to-cart-btn"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                    </div>
            </div>
        </div>
        <?php 
        $count++;
        if ($count % 4 == 0): ?>
            <div class="w-100 d-none d-lg-block"></div>
        <?php endif;
        endforeach 
        ?>

<div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="cartModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cartModalLabel">Giỏ hàng của bạn</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="cart-items"></div>
            <span id="total-price">Tổng tiền: 0 đ</span>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tiếp tục mua</button>
                <button type="button" class="btn btn-primary">Thanh toán</button>
            </div>
        </div>
    </div>
</div>

        
</div>
<!-- Products End -->
<!-- Featured Start -->
<div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Quality Product</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">Free Shipping</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">14-Day Return</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
                </div>
            </div>
        </div>
    </div>
</div>
 <div class="" >
    <p> <br><b> <p style="color:black;"> Dịch Vụ Ship, Trả Hàng và Bảo Hành Tại Bookstower </b></p>

Bookstower tự hào mang đến cho khách hàng những dịch vụ hậu mãi hàng đầu nhằm tối đa hóa sự hài lòng và trải nghiệm mua sắm. Với các dịch vụ ship hàng nhanh chóng, chính sách đổi trả linh hoạt và bảo hành đáng tin cậy, Bookstower cam kết đem đến cho bạn sự tiện lợi và an tâm tuyệt đối.

<p style="color:black;"> <br> <b>1. Vận chuyển miễn phí </b></p>
Bookstower cung cấp dịch vụ vận chuyển hoàn toàn miễn phí cho tất cả các đơn hàng. Chúng tôi đảm bảo giao hàng đến tận nơi một cách nhanh chóng và an toàn. Dù bạn ở bất kỳ đâu, đội ngũ vận chuyển chuyên nghiệp của chúng tôi luôn sẵn sàng phục vụ bạn, giúp bạn nhận được sản phẩm trong thời gian ngắn nhất có thể.
 
<p style="color:black;"> <br><b> 2 Chính sách đổi trả trong 14 ngày </b></p>
Hiểu rằng đôi khi sản phẩm không đáp ứng được kỳ vọng của khách hàng, Bookstower triển khai chính sách đổi trả linh hoạt trong vòng 14 ngày kể từ khi bạn nhận hàng. Bạn có thể đổi hoặc trả lại sản phẩm nếu có bất kỳ vấn đề nào về chất lượng hay không phù hợp với nhu cầu sử dụng. Chúng tôi muốn khách hàng có thể yên tâm tuyệt đối trong mỗi giao dịch.
 
<p style="color:black;"> <br> <b >3. Bảo hành sản phẩm </b></p>
Bookstower cam kết bảo hành đầy đủ cho các sản phẩm đã bán. Chúng tôi có quy trình bảo hành nhanh chóng và đơn giản, giúp khách hàng không gặp phải khó khăn trong việc xử lý các vấn đề phát sinh trong quá trình sử dụng. Với đội ngũ hỗ trợ 24/7, mọi thắc mắc và yêu cầu bảo hành của bạn sẽ được giải đáp và xử lý kịp thời.

Bookstower luôn nỗ lực mang đến cho khách hàng trải nghiệm mua sắm hoàn hảo với những dịch vụ hậu mãi tận tâm nhất. Hãy chọn Bookstower, nơi bạn được quan tâm không chỉ trong lúc mua sắm mà còn cả sau khi sản phẩm đã đến tay!</p>
 </div>
   
<script>
   document.addEventListener('DOMContentLoaded', function () {
    const cartItemsContainer = document.getElementById('cart-items'); // Container giỏ hàng
    const totalPriceElement = document.getElementById('total-price'); // Hiển thị tổng tiền
    const cartDataKey = 'cartData'; // Key lưu trữ giỏ hàng trong localStorage
    let cartData = JSON.parse(localStorage.getItem(cartDataKey)) || []; // Lấy dữ liệu từ localStorage

    // Hàm cập nhật giao diện giỏ hàng
    function renderCart() {
        cartItemsContainer.innerHTML = '';
        let totalPrice = 0;

        cartData.forEach((item, index) => {
            const cartItemHTML = `
                <div class="cart-item d-flex justify-content-between align-items-center mb-3" data-index="${index}">
                    <div class="d-flex align-items-center">
                        <img src="${item.image}" class="img-thumbnail mr-3" style="width: 50px; height: 50px; object-fit: cover;">
                        <span>${item.title}</span>
                    </div>
                    <div class="d-flex align-items-center">
                        <button class="btn btn-sm btn-outline-secondary quantity-decrease">-</button>
                        <span class="mx-2">${item.quantity}</span>
                        <button class="btn btn-sm btn-outline-secondary quantity-increase">+</button>
                    </div>
                    <span>${(item.price * item.quantity).toLocaleString()} đ</span>
                    <button class="btn btn-danger btn-sm remove-item-btn">Xóa</button>
                </div>
            `;
            cartItemsContainer.innerHTML += cartItemHTML;
            totalPrice += item.price * item.quantity;
        });

        totalPriceElement.textContent = `Tổng tiền: ${totalPrice.toLocaleString()} đ`;
    }

    // Thêm sản phẩm vào giỏ hàng
    document.querySelectorAll('.add-to-cart-btn').forEach(button => {
        button.addEventListener('click', function () {
            const productCard = this.closest('.product-item');
            if (!productCard) {
                console.error('Không tìm thấy thẻ .product-item');
                return;
            }

            const title = productCard.querySelector('h6')?.textContent || 'Sản phẩm không tên';
            const priceText = productCard.querySelector('h3')?.textContent || '0 đ';
            const price = parseInt(priceText.replace(/\D/g, ''), 10);
            const image = productCard.querySelector('img')?.src || '';

            if (!price || !image) {
                console.error('Thông tin sản phẩm không đầy đủ:', { title, price, image });
                return;
            }

            // Kiểm tra sản phẩm đã tồn tại
            const existingProduct = cartData.find(item => item.title === title);
            if (existingProduct) {
                existingProduct.quantity++;
            } else {
                cartData.push({ title, price, image, quantity: 1 });
            }

            localStorage.setItem(cartDataKey, JSON.stringify(cartData)); // Lưu lại giỏ hàng
            renderCart(); // Cập nhật giao diện
            $('#cartModal').modal('show'); // Mở modal
        });
    });

    // Xử lý sự kiện trong giỏ hàng
    cartItemsContainer.addEventListener('click', function (e) {
        const index = e.target.closest('.cart-item')?.getAttribute('data-index');
        if (e.target.classList.contains('quantity-increase')) {
            cartData[index].quantity++;
        } else if (e.target.classList.contains('quantity-decrease')) {
            if (cartData[index].quantity > 1) {
                cartData[index].quantity--;
            } else {
                cartData.splice(index, 1); // Xóa nếu số lượng về 0
            }
        } else if (e.target.classList.contains('remove-item-btn')) {
            cartData.splice(index, 1); // Xóa sản phẩm
        }
        localStorage.setItem(cartDataKey, JSON.stringify(cartData)); // Cập nhật giỏ hàng
        renderCart(); // Cập nhật giao diện
    });

    // Hiển thị lại giỏ hàng khi tải trang
    renderCart();
});


</script>