<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>xShop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />   
    <link rel="stylesheet" href="<?php echo CSS_URL ?>grid.css">
    <link rel="stylesheet" href="<?php echo CSS_URL ?>style.css">
    <link rel="stylesheet" href="<?php echo CSS_URL ?>taikhoan.css">
</head>
<body>
    <div class="main">
        <!-- Đăng nhập -->
        <div class="form-account">
            <?php if(isset($_GET["thongbao"])) : ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $_GET["thongbao"] ?>
                </div>
            <?php endif ?>
            <h1 class="form-account_heading">
                Đăng Nhập 
                <a href="index.php" class="form-account_home"><i class="fa-solid fa-house"></i></a>
            </h1>
            <form action="?url=dangnhap" method="post" class="form-account_body">
                <div class="form-account_content">
                    <div class="form-account_input">
                        <label for="">Tên Đăng Nhập</label>
                        <input
                            type="text"
                            name="username"
                            placeholder="Nhập tên đăng nhập" 
                            value="<?php echo isset($username) ? $username : ''?>"
                            required
                        >
                    </div>
                    <div class="form-account_error">
                        <div class="form-account_error-emty"></div>
                        <!-- Lỗi nhập vào form-account_error-text-->
                        <div class="form-account_error-text"></div>
                    </div>
                </div>
                <div class="form-account_content">
                    <div class="form-account_input">
                        <label for="">Mật Khẩu</label>
                        <input type="password" name="password" placeholder="Nhập mật khẩu" required>
                    </div>
                    <div class="form-account_error">
                        <div class="form-account_error-emty"></div>
                        <!-- Lỗi nhập vào form-account_error-text-->
                        <div class="form-account_error-text"><?php echo $errors["loi-dang-nhap"] ?? ''?></div>
                    </div>
                </div>
                <div class="form-account_features">
                    <a href="?url=dangky" class="form-account_feature">Bạn chưa có tài khoản? Đăng ký</a>
                    <a href="?url=quenmatkhau" class="form-account_feature">Quên mật khẩu?</a>
                </div>
                <button type="submit" class="btn-submit">Đăng Nhập</button> 
            </form>
        </div>
    </div>

    <script src="<?php echo JS_URL ?>main.js"></script>
</body>

</html>