<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script>
    function validateForm() {
        var password = document.getElementById('password').value;
        var confirmPassword = document.getElementById('confirm_password').value;
        var regex = /^(?=.*[A-Z])(?=.*\d).{6,}$/;

        if (!regex.test(password)) {
            alert('Mật khẩu phải có ít nhất 6 ký tự, bao gồm chữ in hoa và số.');
            return false;
        }

        if (password !== confirmPassword) {
            alert('Mật khẩu không khớp.');
            return false;
        }

        return true;
    }
    </script>
</head>

<body>
    <div class="container">
        <div class="form-container">
            <h2>Đăng ký</h2>
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="{{ route('register') }}" method="POST" onsubmit="return validateForm()">
                @csrf
                <label for="username">Tên đăng nhập:</label>
                <input type="text" id="username" name="username" required>

                <label for="password">Mật khẩu:</label>
                <input type="password" id="password" name="password" required>

                <label for="confirm_password">Nhập lại mật khẩu:</label>
                <input type="password" id="confirm_password" name="password_confirmation" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <button type="submit">Đăng ký</button>
            </form>
            <p class="login-link">Đã có tài khoản? <a href="{{ route('login') }}">Đăng nhập</a></p>
        </div>
    </div>
</body>

</html>