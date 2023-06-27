<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Teras Malioboro | Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;400;600;900&display=swap"
          rel="stylesheet"/>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet"/>
    @stack('styles')
    @vite(['resources/css/login-style.css'])
</head>

<body>
<div class="box">
    <div class="container">
        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="top-header">
                <header>
                    <img class="Logo1" style="width: 308px; height: 154px" src="{{ asset('icons/Logo.png') }}"/>
                </header>
            </div>
            <div class="input-field">
                <input name='id' type="text" class="input" placeholder="Username" required/>
                <i class="bx bx-user"></i>
            </div>
            <div class="input-field">
                <input name='password' type="password" class="input" placeholder="Password" required/>
                <i class="bx bx-lock"></i>
            </div>
            <div class="input-field">
                <input type="submit" class="submit" value="Login"/>
            </div>
        </form>
    </div>
    @error('id')
    <div class="container">
        <h1>{{ $message }}</h1>
    </div>
    @enderror
</div>

</body>

</html>
