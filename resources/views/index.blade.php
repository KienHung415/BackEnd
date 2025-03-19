<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="container">
        <div class="form-container">
            <h2>Chào mừng đến trang nghe nhạc</h2>
            <p>Đăng nhập thành công!</p>
            <a class="logout-button" href="{{ route('logout') }}">Logout</a>
        </div>
    </div>
</body>

</html>