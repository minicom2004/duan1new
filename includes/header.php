<?php
    require_once MODELS_URL . "LoaiModel.php";
    require_once MODELS_URL . "UserModel.php";

    $listLoai = getAllLoai();

    if(isset($_COOKIE["maUser"])) {
        $maUser = $_COOKIE["maUser"];
        $user = getUserID($maUser);
        if($user["quyen"] !== 0) {
            setcookie("maUser", "", time());
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SBAR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />   
    <link rel="stylesheet" href="<?php echo CSS_URL ?>grid.css">
    <link rel="stylesheet" href="<?php echo CSS_URL ?>style.css">
</head>
<body>
    <div class="main">
        <!-- HEADER -->
        <div class="header">
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid grid wide">
                    <a class="navbar-brand header-logo" href="?">SBAR</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <?php foreach($listLoai as $loai) : ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="?url=loc&maLoai=<?php echo $loai["maLoai"] ?>"><?php echo $loai["tenLoai"]?></a>
                                </li>
                            <?php endforeach ?>
                            <!-- <li class="nav-item">
                                <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                            </li> -->
                        </ul>
                        <div class="d-flex">
                            <form action="" method="get" class="d-flex" role="search">
                                <input type="hidden" name="url" value="search">
                                <input
                                    class="form-control-custom form-control me-2"
                                    type="search"
                                    placeholder="Tìm kiếm..."
                                    aria-label="Search"
                                    name="keyword"
                                >
                                <button class="btn btn-outline-success" type="submit">Tìm Kiếm</button>
                            </form>

                            <form action="?url=giohang" method="post">
                                <button type="submit" class="btn btn-primary position-relative header-cart-btn nav-item">
                                    Giỏ hàng
                                    <i class="fa-solid fa-cart-shopping"></i>
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    0
                                    <span class="visually-hidden">unread messages</span>
                                    </span>
                                </button>
                            </form>

                            <ul class="header-navbar-nav-custom navbar-nav me-auto mb-2 mb-lg-0">
                                <?php if(isset($_COOKIE["maUser"]) && $user["quyen"] == 0) :?>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <?php echo isset($user["tenNguoiDung"]) ? $user["tenNguoiDung"] : ''?>
                                        </a>
                                        <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="?url=thongtincuatoi">Thông Tin Của Tôi</a></li>
                                        <li><a class="dropdown-item" href="?url=donhangcuatoi">Đơn Hàng Của Tôi</a></li>
                                        <li><a class="dropdown-item" href="?url=doimatkhau">Đổi Mật Khẩu</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="index.php?url=dangxuat">Đăng Xuất</a></li>
                                        </ul>
                                    </li>
                                <?php endif ?>
                                <?php if(!isset($_COOKIE["maUser"]) || $user["quyen"] !== 0) :?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="?url=dangnhap">Đăng Nhập</a>
                                    </li>
                                <?php endif ?>
                            </ul>
                            
                        </div>
                    </div>
                </div>
            </nav>
        </div>