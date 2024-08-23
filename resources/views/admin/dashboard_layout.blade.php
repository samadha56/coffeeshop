<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            width: 250px;
            background-color: #1a1a1a;
            color: #fff;
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            padding-top: 20px;
            transition: all 0.3s ease;
        }
        .sidebar h2 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 20px;
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
        }
        .sidebar ul li {
            padding: 15px;
            text-align: center;
        }
        .sidebar ul li a {
            color: #fff;
            text-decoration: none;
            display: block;
            font-size: 18px;
            transition: background-color 0.3s;
        }
        .sidebar ul li a:hover {
            background-color: #333;
        }
        .main-content {
            margin-left: 250px;
            padding: 20px;
            flex: 1;
            transition: margin-left 0.3s ease;
        }
        .header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
            border-radius: 5px;
        }
        .cards {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-top: 20px;
        }
        .card {
            background-color: #fff;
            width: 32%;
            margin-bottom: 20px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }
        .card h3 {
            margin-top: 0;
            color: #000;
            font-size: 20px;
        }
        .card p {
            color: #666;
            font-size: 16px;
        }
        .toggle-sidebar {
            display: none;
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px;
            cursor: pointer;
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1000;
            border-radius: 5px;
        }
        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
                left: -200px;
            }
            .main-content {
                margin-left: 0;
            }
            .toggle-sidebar {
                display: block;
            }
            .sidebar.active {
                left: 0;
            }
            .main-content.active {
                margin-left: 200px;
            }
            .card {
                width: 100%;
            }
        }
    </style>
</head>
<body>

<button class="toggle-sidebar">☰</button>

<div class="sidebar">
    <h2>Admin Dashboard</h2>
    <ul>
        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li><a href="{{ route('admin.category.index') }}">Categories</a></li>
        <li><a href="{{ route('admin.item.index') }}">Items</a></li>
        <li>
            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" style="background: none; border: none; color: #fff; font-size: 18px; cursor: pointer;">
                    Logout
                </button>
            </form>
        </li>
    </ul>
</div>


<div class="main-content">
    <div class="header">
        <h1>Welcome to Admin Dashboard</h1>
    </div>
    @yield('content')
</div>

<script>
    const toggleSidebarBtn = document.querySelector('.toggle-sidebar');
    const sidebar = document.querySelector('.sidebar');
    const mainContent = document.querySelector('.main-content');

    toggleSidebarBtn.addEventListener('click', function() {
        sidebar.classList.toggle('active');
        mainContent.classList.toggle('active');
    });
</script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
