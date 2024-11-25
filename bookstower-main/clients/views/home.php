
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
                    <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
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
   

    