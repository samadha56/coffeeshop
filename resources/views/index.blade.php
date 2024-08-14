<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>01 Brew Bar | Online Menu and Submit Order</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;700&family=Lobster&display=swap" rel="stylesheet">
    <link rel="icon" href="images/favicon.png" type="image/png">
    <style>
        body {
            margin: 0;
            background-color: #fafafa;
            font-family: 'Open Sans', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #000;
        }
        .main-container {
            width: 100%;
            max-width: 500px;
            background-color: #ffffff;
            display: flex;
            flex-direction: column;
            height: 100%;
            box-sizing: border-box;
        }
        .header, .footer {
            width: 100%;
            padding: 20px;
            background-color: #ffffff;
            text-align: center;
            box-sizing: border-box;
            color: #000;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 1000;
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
            font-size: 2.5rem;
            font-family: 'Lobster', cursive;
            color: #000;
            margin: 0;
            cursor: pointer; /* Add cursor pointer for better UX */
        }
        .content-container {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 100%;
            padding: 0 20px 20px;
            box-sizing: border-box;
            background-color: #ffffff;
        }
        .category-card {
            cursor: pointer;
            transition: transform 0.2s;
            margin-bottom: 1rem;
            width: calc(100% - 40px);
            border-bottom: 3px solid #000;
            padding: 5px 0;
            position: relative;
            background-color: #ffffff;
            box-sizing: border-box;
            text-align: left;
        }
        .category-card:hover {
            transform: scale(1.05);
        }
        .card-title {
            font-size: 1.8rem;
            font-weight: 500;
            letter-spacing: 0.1rem;
            text-transform: uppercase;
            margin: 5px 0;
            color: #000;
        }
        .card-body {
            text-align: left;
            padding-left: 10px;
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
            top: 20px; /* Move the line higher */
            left: 80px;
            animation: rotate-line 4s linear infinite;
        }
        @keyframes rotate-line {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        .footer {
            font-size: 0.8rem;
            border: 1px solid #000;
            padding: 5px;
            border-radius: 5px;
            max-width: 300px;
            margin: 20px auto 20PX auto; /* Adjusted for some space from the bottom */
        }
        .footer a {
            color: #000; /* Match the color of the default text */
            text-decoration: none; /* Remove underline */
        }
        .watermark {
            font-size: 0.6rem;
            color: rgba(0, 0, 0, 0.3);
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="main-container">
        <div class="header">
            <button class="back-button" onclick="goBack();">Back</button>
            <div class="title" onclick="redirectToHomePage();">01 Brew Bar</div>
        </div>
        <div class="content-container">
            <div class="loading-icon" id="loading-icon">
                <div class="circle"></div>
                <div class="line"></div>
            </div>
            @foreach($categories as $category)
            <div class="category-card" data-url="{{ route('category.show', $category->slug) }}" onclick="redirectTo(this);">
                <div class="card-body">
                    <h5 class="card-title">{{ $category->title }}</h5>
                </div>
            </div>
            @endforeach
        </div>
        <div class="footer">
            CREATED WITH LOVE IN 01BREWBAR <hr> <a class="watermark" href="mailto:samadha56@gmail.com"> SAMAD-HA </a>
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
            setTimeout(function() {
                history.back();
                hideLoading();
            }, 1000);
        }

        function redirectTo(element) {
            var url = element.getAttribute('data-url');
            showLoading();
            setTimeout(function() {
                window.location.href = url;
                hideLoading();
            }, 1000);
        }

        function redirectToHomePage() {
            showLoading();
            setTimeout(function() {
                window.location.href = 'index.html'; // Replace 'index.html' with your homepage URL
                hideLoading();
            }, 1000);
        }
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
