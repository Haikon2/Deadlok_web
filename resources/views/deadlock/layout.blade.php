<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deadlock</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body, html {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            font-family: Arial, sans-serif;
        }

        .app-container {
            width: 100%;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background-color: #1a1a1a;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 40px;
            background-color: #1a1a1a;
            border-bottom: 2px solid #ff6600;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            height: 70px;
        }

        .logo img {
            height: 50px;
            width: auto;
        }

        .nav {
            display: flex;
            gap: 2px;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropbtn {
            color: #ffffff;
            background-color: #ff6600;
            padding: 12px 16px;
            font-size: 16px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s;
            font-weight: 600;
        }

        .dropbtn:hover {
            background-color: #e55a00;
        }

        .dropdown-content {
            position: absolute;
            right: 0;
            background-color: #333333;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            padding: 12px 16px;
            z-index: 1001;
            border-radius: 4px;
            top: 100%;
            margin-top: 5px;
            display: none;
        }

        .dropdown-content a {
            color: #ffffff;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            border-radius: 4px;
            transition: background-color 0.3s;
            cursor: pointer;
        }

        .dropdown-content a:hover {
            background-color: #ff6600;
        }

        .dropdown-content.show {
            display: block !important;
        }

        @media (max-width: 768px) {
            .header {
                padding: 15px 20px;
                height: 60px;
            }

            .nav {
                display: none;
            }
        }
    </style>
    @yield('extra-styles')
</head>
<body>
    <div class="app-container">
        <!-- Header with Navigation -->
        <header class="header">
            <div class="logo">
                <img src="{{ asset('images/logo.png') }}" alt="Deadlock Logo">
            </div>

            <nav class="nav">
                <div class="dropdown">
                    <button class="dropbtn" id="menuBtn">Menu</button>
                    <div class="dropdown-content" id="dropdownContent">
                        <a href="{{ route('deadlock.home') }}">Home</a>
                        <a href="{{ route('deadlock.info', ['category' => 'heroes']) }}">Info</a>
                        <a href="{{ route('deadlock.news') }}">News</a>
                    </div>
                </div>
            </nav>
        </header>

        <!-- Content -->
        @yield('content')
    </div>

    <script>
        // Меню открывается/закрывается по клику на кнопку Menu
        const menuBtn = document.getElementById('menuBtn');
        const dropdownContent = document.getElementById('dropdownContent');

        menuBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            dropdownContent.classList.toggle('show');
        });

        // Закрывается при клике на пункт меню
        const menuLinks = dropdownContent.querySelectorAll('a');
        menuLinks.forEach(link => {
            link.addEventListener('click', function() {
                dropdownContent.classList.remove('show');
            });
        });

        // Закрывается при клике вне меню
        document.addEventListener('click', function(e) {
            if (!menuBtn.contains(e.target) && !dropdownContent.contains(e.target)) {
                dropdownContent.classList.remove('show');
            }
        });
    </script>
    @yield('extra-scripts')
</body>
</html>
