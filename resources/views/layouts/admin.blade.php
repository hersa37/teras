{{--Sidebar and general layout of admin--}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
{{--    @yield('title') allows components to push title values--}}
    <title>Teras Malioboro | @yield('title')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;400;600;900&display=swap"
        rel="stylesheet"
    />
    <link
        href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
        rel="stylesheet"
    />
    @vite(['resources/css/sidebar-style.css', 'resources/css/app.css'])
{{--    Allows components to push their own css--}}
    @stack('styles')
</head>
<body>
<div class="sidebar">
    <div class="logo_content">
        <div class="logo">
            <i><img src="{{ asset('icons/Logo.png') }}" class="logo_img"/></i>
            <div class="logo_name">Teras Malioboro</div>
        </div>
        <i class="bx bx-menu" id="btn"></i>
    </div>
{{--    Menu list--}}
    <div>
        <ul>
            <li>
                <a href="{{ route('tenant.index') }}">
                    <i class="bx bx-home-alt-2"></i>
                    <span class="nav-item">Tenant</span>
                </a>
                <span class="tooltip">Tenant</span>
            </li>
            <li>
                <a href="#">
                    <i class="bx bx-store-alt"></i>
                    <span class="nav-item">Persewaan</span>
                </a>
                <span class="tooltip">Persewaan</span>
            </li>
            <li>
                <a href="#">
                    <i class="bx bx-map-alt"></i>
                    <span class="nav-item">Teras 1</span>
                </a>
                <span class="tooltip">Teras 1</span>
            </li>
            <li>
                <a href="#">
                    <i class="bx bx-map-alt"></i>
                    <span class="nav-item">Teras 2</span>
                </a>
                <span class="tooltip">Teras 2</span>
            </li>
            <li>
                <a href="#">
                    <i class="bx bx-cog"></i>
                    <span class="nav-item">Setting</span>
                </a>
                <span class="tooltip">Setting</span>
            </li>
        </ul>
        <div class="profile_content">
            <div class="profile">
                <div class="profile_detail">
                    <img src="{{ asset('icons/akun.png') }}" alt="akun" class="user-img"/>
                    <div class="name_job">
                        <div class="name">{{ Auth::user()->id_admin }}</div>
                    </div>
                </div>
                <a href="{{ route('logout') }}">
                    <i class="bx bx-log-out"> </i>
                </a>
            </div>
        </div>
    </div>
</div>
{{--Main component put into @yield('content')--}}
<div class="main-content">
    <div class="container-fluid">
        @yield('content')
    </div>
</div>

</body>

<script>
    let btn = document.querySelector("#btn");
    let sidebar = document.querySelector(".sidebar");

    btn.onclick = function () {
        sidebar.classList.toggle("active");
    };
    document.getElementById("kategori").addEventListener("change", function() {
    this.style.backgroundColor = this.options[this.selectedIndex].style.backgroundColor;
    });

</script>
</html>
