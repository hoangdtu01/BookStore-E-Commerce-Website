<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('backend/css/login.css') }}">
</head>
<body>
    <div class="login-card">
        <h2 class="mb-4 font-weight-bold">ĐĂNG NHẬP</h2>
        <form>
            <div class="form-group">
                <input type="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Mật khẩu" required>
            </div>
            <div class="form-group form-check d-flex justify-content-between">
                <label class="form-check-label text-light">
                    <input type="checkbox" class="form-check-input"> Nhớ đăng nhập
                </label>
                <a href="#">Quên mật khẩu</a>
            </div>
            <button type="submit" class="btn btn-login">SIGN IN</button>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
