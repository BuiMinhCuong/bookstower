<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cảm ơn quý khách đã góp ý</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        .container {
            text-align: center;
            background-color: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }

        h1 {
            color: #007bff;
            font-size: 24px;
            margin-bottom: 20px;
        }

        marquee {
            background-color: #6699FF;
            color: white;
            height: 70px;
            line-height: 70px;
            font-size: 20px;
            margin-bottom: 20px;
            padding: 0 10px;
        }

        img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            margin-top: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-back {
            background-color: #007bff;
            border: none;
            padding: 12px 30px;
            color: white;
            font-size: 18px;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 20px;
            transition: background-color 0.3s;
        }

        .btn-back:hover {
            background-color: #0056b3;
        }

        .footer {
            margin-top: 30px;
            font-size: 14px;
            color: #777;
        }

    </style>
</head>

<body>

    <div class="container">
        <marquee behavior="" direction="">
            <h1>Cảm ơn quý khách, chúng tôi sẽ phản hồi ngay</h1>
        </marquee>

        <img src="https://th.bing.com/th?id=OIP.63BRUOK3lEGkG052peiT5gHaFi&w=289&h=216&c=8&rs=1&qlt=90&o=6&pid=3.1&rm=2"
            alt="Cảm ơn quý khách">

        <a href="http://localhost/bookstower/clients/">
            <button class="btn-back">Click để quay lại trang chủ</button>
        </a>

        <div class="footer">
            <p>Chúc bạn có một ngày tuyệt vời!</p>
        </div>
    </div>

</body>

</html>
