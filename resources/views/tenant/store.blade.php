<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/login-style.css'])
</head>
<body>
<form action="{{ route('tenant-manager.store') }}" method="POST">
    @csrf
    <div class="input-field">
        <input name="nama_tenant" type="text" class="input" placeholder="Username" required/>
        <i class="bx bx-user"></i>
    </div>
    <div class="input-field">
        <input name='password' type="password" class="input" placeholder="Password" required/>
        <i class="bx bx-lock"></i>
    </div>
    <div class="input-field">
        <input name="kategori_tenant" type="text" class="input" placeholder="kategori_tenant" required>
    </div>
    <div class="input-field">
        <input name="no_telp" type="text" class="input" placeholder="no_telp" required>
    </div>
    <div class="input-field">
        <input type="submit" class="submit" value="Create"/>
    </div>
</form>
</body>
</html>
