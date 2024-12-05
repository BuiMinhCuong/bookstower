<?php


if (!empty($sanphamct)): ?>
    <div class="row px-xl-5">
        <div class="col-lg-5 pb-5">
            <div id="product-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner border">
                    <div class="carousel-item active">
                        <img class="w-100 h-100" src="<?= $sanphamct['image'] ?? '' ?>" alt="Image">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-7 pb-5">
            <h3 class="font-weight-semi-bold"><?= $sanphamct['title'] ?? '' ?></h3>
            <div class="d-flex mb-3">
                <div class="text-primary mr-2">
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star-half-alt"></small>
                    <small class="far fa-star"></small>
                </div>
                <small class="pt-1">(50 Reviews)</small>
            </div>
            <h3 class="font-weight-semi-bold mb-4 d-inline"><?= number_format($sanphamct['price'] ?? 0, 0, ',', '.') ?> đ</h3>
            <h5 class="font-weight-semi-bold mb-4 d-inline text-muted" style="text-decoration: line-through;"><?= number_format($sanphamct['original_price'] ?? 0, 0, ',', '.') ?> đ</h5>
            <p class="mb-4"><?= $sanphamct['description'] ?? '' ?></p>
            
            <form action="" method="POST" class="d-flex align-items-center mb-4 pt-2">
                <div class="input-group quantity mr-3" style="width: 130px;">
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-primary btn-minus" onclick="decreaseValue()">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <input type="number" name="quantity" id="quantity" class="form-control bg-secondary text-center" value="1" min="1">
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-primary btn-plus" onclick="increaseValue()">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
                <input type="hidden" name="product_id" value="<?= $sanphamct['id'] ?? '' ?>">
                <button type="submit" name="add_to_cart" class="btn btn-primary px-3">
                    <i class="fa fa-shopping-cart mr-1"></i> Add To Cart
                </button>
            </form>
        </div>
    </div>
<?php else: ?>
    <div class="alert alert-warning">No product details available.</div>
<?php endif; ?>

<div class="d-flex pt-2">
    <p class="text-dark font-weight-medium mb-0 mr-2">Share on:</p>
    <div class="d-inline-flex">
        <a class="text-dark px-2" href="">
            <i class="fab fa-facebook-f"></i>
        </a>
        <a class="text-dark px-2" href="">
            <i class="fab fa-twitter"></i>
        </a>
        <a class="text-dark px-2" href="">
            <i class="fab fa-linkedin-in"></i>
        </a>
        <a class="text-dark px-2" href="">
            <i class="fab fa-pinterest"></i>
        </a>
    </div>
</div>

<div class="row px-xl-5">
    <div class="col">
        <div class="nav nav-tabs justify-content-center border-secondary mb-4">
            <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Description</a>
            <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-2">Information</a>
            <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-3">Reviews</a>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="tab-pane-1">
                <h4 class="mb-3">Product Description</h4>
                <p>Eos no lorem eirmod diam diam, eos elitr et gubergren diam sea. Consetetur vero aliquyam invidunt duo dolores et duo sit. Vero diam ea vero et dolore rebum, dolor rebum eirmod consetetur invidunt sed sed et, lorem duo et eos elitr, sadipscing kasd ipsum rebum diam. Dolore diam stet rebum sed tempor kasd eirmod. Takimata kasd ipsum accusam sadipscing, eos dolores sit no ut diam consetetur duo justo est, sit sanctus diam tempor aliquyam eirmod nonumy rebum dolor accusam, ipsum kasd eos consetetur at sit rebum, diam kasd invidunt tempor lorem, ipsum lorem elitr sanctus eirmod takimata dolor ea invidunt.</p>
                <p>Dolore magna est eirmod sanctus dolor, amet diam et eirmod et ipsum. Amet dolore tempor consetetur sed lorem dolor sit lorem tempor. Gubergren amet amet labore sadipscing clita clita diam clita. Sea amet et sed ipsum lorem elitr et, amet et labore voluptua sit rebum. Ea erat sed et diam takimata sed justo. Magna takimata justo et amet magna et.</p>
            </div>
            <div class="tab-pane fade" id="tab-pane-2">
                <h4 class="mb-3">Additional Information</h4>
                <p>Eos no lorem eirmod diam diam, eos elitr et gubergren diam sea. Consetetur vero aliquyam invidunt duo dolores et duo sit. Vero diam ea vero et dolore rebum, dolor rebum eirmod consetetur invidunt sed sed et, lorem duo et eos elitr, sadipscing kasd ipsum rebum diam. Dolore diam stet rebum sed tempor kasd eirmod. Takimata kasd ipsum accusam sadipscing, eos dolores sit no ut diam consetetur duo justo est, sit sanctus diam tempor aliquyam eirmod nonumy rebum dolor accusam, ipsum kasd eos consetetur at sit rebum, diam kasd invidunt tempor lorem, ipsum lorem elitr sanctus eirmod takimata dolor ea invidunt.</p>
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item px-0">
                                Sit erat duo lorem duo ea consetetur, et eirmod takimata.
                            </li>
                            <li class="list-group-item px-0">
                                Amet kasd gubergren sit sanctus et lorem eos sadipscing at.
                            </li>
                            <li class="list-group-item px-0">
                                Duo amet accusam eirmod nonumy stet et et stet eirmod.
                            </li>
                            <li class="list-group-item px-0">
                                Takimata ea clita labore amet ipsum erat justo voluptua. Nonumy.
                            </li>
                          </ul> 
                    </div>
                    <div class="col-md-6">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item px-0">
                                Sit erat duo lorem duo ea consetetur, et eirmod takimata.
                            </li>
                            <li class="list-group-item px-0">
                                Amet kasd gubergren sit sanctus et lorem eos sadipscing at.
                            </li>
                            <li class="list-group-item px-0">
                                Duo amet accusam eirmod nonumy stet et et stet eirmod.
                            </li>
                            <li class="list-group-item px-0">
                                Takimata ea clita labore amet ipsum erat justo voluptua. Nonumy.
                            </li>
                          </ul> 
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="tab-pane-3">
                <div class="row">
                    
               <style>
#commentForm .form-group {
    margin-bottom: 1rem;
}

#commentForm .form-control {
    width: 100%;
}

#commentForm .col-md-6, .col-md-3 {
    display: flex;
    flex-direction: column;
}
/* Thu nhỏ nút Delete */
.delete-btn {
    font-size: 15px; 
    border-radius: 3px; 
    background-color: #e74c3c; 
    border: none; 
}
</style> 
  
<div class="col-md-12">
    <h4 class="mb-4">Leave a Review</h4>
    <p class="text-muted">Your email address will not be published. Required fields are marked <span class="text-danger">*</span>.</p>
    
    <!-- Rating Section -->
    <div class="d-flex align-items-center mb-3">
        <p class="mb-0 mr-2 font-weight-bold">Your Rating <span class="text-danger">*</span>:</p>
        <div class="text-warning" id="rating">
            <i class="far fa-star rating-star" data-value="1"></i>
            <i class="far fa-star rating-star" data-value="2"></i>
            <i class="far fa-star rating-star" data-value="3"></i>
            <i class="far fa-star rating-star" data-value="4"></i>
            <i class="far fa-star rating-star" data-value="5"></i>
        </div>
    </div>

    <!-- Review Form -->
    <form id="commentForm" class="p-4 rounded shadow-sm border bg-light">
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="message">Your Review <span class="text-danger">*</span></label>
                <textarea id="message" name="Content" cols="30" rows="4" class="form-control" placeholder="Write your review..." required></textarea>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="name">Your Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="name" name="user_name" placeholder="Enter your name" required>
            </div>
            <div class="form-group col-md-6">
                <label for="email">Your Email <span class="text-danger">*</span></label>
                <input type="email" class="form-control" id="email" name="user_email" placeholder="Enter your email" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Submit Review</button>
    </form>
</div>

<!-- Comment Section -->
<div id="commentSection" class="mt-5">
    <h4>Comments</h4>
    <ul id="commentsList" class="list-unstyled p-3 bg-white rounded shadow-sm border">
        <!-- Comments will be dynamically added here -->
    </ul>
    <button id="seeMoreBtn" class="btn btn-outline-primary btn-sm d-block mx-auto mt-3" style="display:none;">See More</button>
</div>

<script>

function increaseValue() {
    let value = parseInt(document.getElementById('quantity').value) || 0;
    document.getElementById('quantity').value = Math.max(value + 1, 1);
}


// function submitForm() {
//     const form = document.getElementById('commentForm');
//     form.checkValidity() ? window.location.href = 'http://localhost/bookstower/clients/?act=chitietsp&id=70' : form.reportValidity();
// }

// Lắng nghe sự kiện submit của form
document.getElementById('commentForm').addEventListener('submit', function(e) {
    e.preventDefault(); 

    const name = document.getElementById('name').value, 
          email = document.getElementById('email').value, 
          content = document.getElementById('message').value;

    if (!name || !email || !content) return alert('Please fill out all required fields.');

    const newComment = { name, email, content, timestamp: new Date().toLocaleString() };
    let comments = JSON.parse(localStorage.getItem('comments')) || [];
    comments.push(newComment);
    localStorage.setItem('comments', JSON.stringify(comments));

    displayComments(); 
    document.getElementById('commentForm').reset();
});

// Hàm hiển thị bình luận
function displayComments() {
    const commentsList = document.getElementById('commentsList');
    const comments = JSON.parse(localStorage.getItem('comments')) || [];

    // Hiển thị 3 bình luận gần nhất
    const recentComments = comments.slice(-3); 
    commentsList.innerHTML = recentComments.map((comment, index) => `
        <li class="mb-3 justify-content-between align-items-center d-flex" id="comment-${index}">
    <div>
        <strong>${comment.name}</strong> (${comment.email}) 
        <small class="text-muted">on ${comment.timestamp}</small>
        <p>${comment.content}</p>
    </div>
    <button class="btn btn-danger btn-sm delete-btn" onclick="deleteComment(${index})">Delete</button>
</li>

    `).join('');

    // Hiển thị nút "See More" nếu có thêm bình luận
    const seeMoreBtn = document.getElementById('seeMoreBtn');
    if (comments.length > 3) {
        seeMoreBtn.style.display = 'inline-block';
        seeMoreBtn.onclick = function() {
            displayAllComments();
            seeMoreBtn.style.display = 'none';
        };
    } else {
        seeMoreBtn.style.display = 'none';
    }
}

// Hàm hiển thị tất cả bình luận
function displayAllComments() {
    const commentsList = document.getElementById('commentsList');
    const comments = JSON.parse(localStorage.getItem('comments')) || [];
    commentsList.innerHTML = comments.map((comment, index) => `
        <li class="mb-3 d-flex justify-content-between align-items-center" id="comment-${index}">
            <div><strong>${comment.name}</strong> (${comment.email}) <small class="text-muted">on ${comment.timestamp}</small>
            <p>${comment.content}</p></div>
            <button class="btn btn-danger btn-sm" onclick="deleteComment(${index})">Delete</button>
        </li>
    `).join('');
}

// Hàm xóa bình luận
function deleteComment(index) {
    let comments = JSON.parse(localStorage.getItem('comments')) || [];
    comments.splice(index, 1);
    localStorage.setItem('comments', JSON.stringify(comments));
    displayComments();
}

// Hiển thị bình luận khi trang được tải
window.onload = displayComments;
</script>
