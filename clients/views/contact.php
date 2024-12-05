<style>
    .loader {
        --duration: 3s;
        width: 44px;
        height: 44;
        display: inline-block;
        position: relative;
        margin: 0 16px;

    }

    .loader:before {
        content: "";
        position: absolute;
        width: 6px;
        height: 6px;
        background: #5628EE;
        border-radius: 50%;
        display: block;
        top: 37px;
        left: 19px;
        transform: translate(-18px), 18px;
        animation: dotRect var(--duration) cubic-bezier(0.785, 0.135, 0.15, 0.86) infinite;
    }

    svg {
        display: block;
        width: 100%;
        height: 100%;

    }

    svg rect,
    svg polygon,
    svg circle {
        fill: none;
        stroke: #2f3545;
        stroke-width: 10px;
        stroke-linejoin: round;
        stroke-linecap: round;
    }

    svg polygon {
        stroke-dasharray: 145 76 145 76;
        stroke-dashoffset: 0;
        animation: pathTriangle var(--duration) cubic-bezier(0.785, 0.135, 0.15, 0.86) infinite;
    }

    svg rect {
        stroke-dasharray: 192 64 192 64;
        stroke-dashoffset: 0;
        animation: pathRect 3s cubic-bezier(0.785, 0.135, 0.15, 0.86) infinite;
    }

    svg circle {

        stroke-dasharray: 150 50 150 50;
        stroke-dashoffset: 75;
        animation: pathCircle var(--duration) cubic-bezier(0.785, 0.135, 0.15, 0.86) infinite;
    }

    .triangle {
        width: 48px;
    }

    .triangle:before {
        left: 21px;
        transform: translate(-10px, -10px);
        animation: dotTriangle var(--duration) cubic-bezier(0.785, 0.135, 0.15, 0.86) infinite;
    }

    @keyframes pathTriangle {
        33% {
            stroke-dashoffset: 74;

        }

        66% {
            stroke-dashoffset: 147;

        }

        100% {
            stroke-dashoffset: 221;
        }
    }

    @keyframes dotTriangle {
        33% {
            transform: translate(0, 0);
        }

        66% {
            transform: translate(10px, -18px);
        }

        100% {
            transform: translate(-10px, -18px);
        }
    }

    @keyframes pathRect {
        25% {
            stroke-dashoffset: 64;
        }

        50% {
            stroke-dashoffset: 128;
        }

        75% {
            stroke-dashoffset: 192;
        }

        100% {
            stroke-dashoffset: 256;
        }
    }

    @keyframes dotRect {
        25% {
            transform: translate(0, 0);
        }

        50% {
            transform: translate(18px, -18px);
        }

        75% {
            transform: translate(-18px, -18px);
        }

        100% {
            transform: translate(-18px, -18px);
        }

    }

    @keyframes pathCircle {
        25% {
            stroke-dashoffset: 125;
        }

        50% {
            stroke-dashoffset: 175;
        }

        75% {
            stroke-dashoffset: 225;
        }

        100% {
            stroke-dashoffset: 275;
        }
    }
</style>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookstower - Contact Us</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .contact-form {
            background: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #007bff;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>

<body>


    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="contact-form">

                    <h2 class="text-center mb-4">Bảng thông tin hỗ trợ <div class="loader">
                            <svg viewBox="0 0 80 80">
                                <circle id="test" cx="40" cy="40" r="32"></circle>
                            </svg>
                        </div>
                        <div class="loader triangle">
                            <svg viewBox="0 0 86 86">
                                <polygon points="43 8 79 72 7 72"></polygon>
                            </svg>
                        </div>

                        <div class="loader">
                            <svg viewBox="0 0 80 80">
                                <rect x="8" y="8" width="64" height="64">
                                </rect>
                            </svg>
                        </div>
                        <marquee bgcolor="##6699FF" behavior="" direction="">Cảm ơn bạn đã liên hệ đến chúng tôi
                             ❤️❤️❤️❤️❤️
                            Chúng tôi sẽ liên hệ ngay khi tìm ra cách giải quyết
                        </marquee>
                    </h2>
                    <form action="#" method="post">
                        <div class="form-group">
                            <label for="username">Your Name</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Enter your name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                        </div>
                        <div class="form-group">
                            <label for="tel">Phone Number</label>
                            <input type="tel" class="form-control" id="tel" name="tel" placeholder="Enter your phone number" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Enter your address" required>
                        </div>
                        <div class="form-group">
                            <label for="question">Your Question</label>
                            <textarea class="form-control" id="question" name="question" rows="5" placeholder="Enter your question here" required></textarea>
                        </div>
                        <a class="btn btn-primary btn-block" href="http://localhost/bookstower/clients/views/thanks.php">Submit</a>
                        </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>