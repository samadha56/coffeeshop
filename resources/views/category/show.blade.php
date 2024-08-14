<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>01 Brew Bar | Online Menu and Submit Order</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;700&family=Lobster&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazir-font@v26.0.2/dist/font-face.css" rel="stylesheet">
    <link rel="icon" href="images/favicon.png" type="image/png">
    <style>
        body {
            margin: 0;
            background-color: #fafafa;
            font-family: 'Open Sans', sans-serif;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            height: 100vh;
            color: #000;
        }

        .main-container {
            width: 100%;
            max-width: 500px;
            background-color: #ffffff;
            display: flex;
            flex-direction: column;
            box-sizing: border-box;
            overflow: hidden;
        }

        .header,
        .footer {
            width: 100%;
            padding: 10px 20px;
            background-color: #ffffff;
            text-align: center;
            box-sizing: border-box;
            color: #000;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            top: 0;
            z-index: 1000;
            background-color: #ffffff;
            max-width: 500px;
        }

        .back-button {
            font-size: 0.9rem;
            font-weight: 700;
            background-color: #000;
            color: #ffffff;
            border: none;
            padding: 8px 16px;
            cursor: pointer;
            text-transform: uppercase;
            border-radius: 0;
        }

        .title {
            font-size: 2rem;
            font-family: 'Lobster', cursive;
            color: #000;
            margin: 0;
            cursor: pointer;
        }

        .content-container {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            width: 100%;
            padding: 60px 20px 20px;
            box-sizing: border-box;
            background-color: #ffffff;
            overflow-y: auto;
        }

        .item {
            width: 100%;
            text-align: left;
            margin-bottom: 20px;
        }

        .item img {
            width: 100%;
            height: auto;
            aspect-ratio: 16/9;
            object-fit: cover;
        }

        .item .item-title-en {
            text-align: left;
            direction: ltr;
            margin: 5px 0;
            font-weight: 300;
            font-size: 2rem;
            letter-spacing: 0.1em;
        }

        .item .item-title-fa {
            text-align: right;
            direction: rtl;
            margin: 5px 0;
            font-family: 'Vazir', sans-serif;
            color: #000;
            font-size: 1.5rem;
        }

        .item .item-description {
            text-align: right;
            direction: rtl;
            margin: 5px 0;
            font-family: 'Vazir', sans-serif;
            color: #a0a0a0;
        }

        .item .item-price {
            text-align: left;
            margin: 5px 0;
            font-weight: 300;
            font-size: 2rem;
            color: #a0a0a0;
        }

        .separator {
            width: 100%;
            height: 2px;
            background-color: #dedede;
            margin: 0 0 40px 0;
        }

        .footer {
            font-size: 0.8rem;
            border: 1px solid #000;
            padding: 5px;
            border-radius: 5px;
            max-width: 300px;
            margin: 20px auto;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .footer a {
            color: #000;
            text-decoration: none;
        }

        .loading-icon {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 240px;
            height: 200px;
            z-index: 1000;
        }

        .circle {
            width: 100px;
            height: 100px;
            background-color: #000;
            border-radius: 50%;
            position: absolute;
            top: 0;
            left: 0;
        }

        .circle::before {
            content: '';
            width: 20px;
            height: 20px;
            background-color: #fff;
            border-radius: 50%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .line {
            width: 30px;
            height: 140px;
            background-color: #000;
            position: absolute;
            top: 20px;
            left: 80px;
            animation: rotate-line 4s linear infinite;
        }

        @keyframes rotate-line {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .watermark {
            font-size: 0.6rem;
            color: rgba(0, 0, 0, 0.3);
            text-align: center;
            margin-top: 20px;
        }

        .styled-category-title {
            background-color: #000;
            color: #fff;
            font-weight: 300;
            font-size: 2rem;
            padding: 0px 0px;
            border: 1px solid #000;
            text-align: center;
            box-sizing: border-box;
            width: 100%;
            margin: 10px 0;
            text-transform: uppercase;
        }
    </style>
</head>

<body>
    <div class="header">
        <button class="back-button" onclick="goBack();" aria-label="Go back to the previous page">Back</button>
        <div class="title" onclick="redirectToHomePage();" aria-label="Go to the home page">01 Brew Bar</div>
    </div>
    <div class="main-container">
        <div class="content-container">
            <div class="loading-icon" id="loading-icon">
                <div class="circle"></div>
                <div class="line"></div>
            </div>
            <div class="styled-category-title">{{ $category->title }}</div>
            <!-- Items -->
            @foreach($items as $item)
            <div class="item">
                <div class="item-title-en">{{ $item->english_name }}</div>
                <div class="item-title-fa">{{ $item->persian_name }}</div>
                <div class="item-description">{{ $item->description }}</div>
                <div class="item-price">{{ $item->price }}</div>
            </div>
            <div class="separator"></div>
            @endforeach
            <div class="footer">
                CREATED WITH LOVE IN 01BREWBAR <hr> <a class="watermark" href="mailto:samadha56@gmail.com"> SAMAD-HA
                </a>
            </div>
        </div>
    </div>
    <script>
        function showLoading() {
            document.getElementById('loading-icon').style.display = 'block';
        }

        function hideLoading() {
            document.getElementById('loading-icon').style.display = 'none';
        }

        function goBack() {
            showLoading();
            setTimeout(function () {
                history.back();
                hideLoading();
            }, 1000);
        }

        function redirectToHomePage() {
            showLoading();
            setTimeout(function () {
                window.location.href = 'index.html';
                hideLoading();
            }, 1000);
        }
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>