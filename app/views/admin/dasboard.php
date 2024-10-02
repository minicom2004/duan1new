<?php
    require_once MODELS_URL . "UserModel.php";

    if(isset($_COOKIE["maUser"])) {
        $maUser = $_COOKIE["maUser"];
        $user = getUserID($maUser);
        if($user["quyen"] == 0) {
            echo 
            "<script>
                alert('Bạn Không Có Quyền Truy Cập Trang Quản Trị');
                window.location.href = 'index.php';
            </script>"; 
        }
    }
    
    checkLogin("Bạn Cần Đăng Nhập Để Vào Trang Quản Trị");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />   
    <link rel="stylesheet" href= "<?php echo CSS_URL ?>style.css">
    <link rel="stylesheet" href= "<?php echo CSS_URL ?>admin.css">
</head>
<body>
    <div class="main">
        <div class="dasboard">
            <?php if(isset($user)) :?>
                <div class="account">
                    <div class="account_avatar">
                        <div class="account_avatar-img" style="background-image: url(<?php echo IMAGES_URL . $user["avatar"]?>);"></div>
                    </div>
                    <div class="account_name"><?php echo $user["tenNguoiDung"]?></div>
                </div>
            <?php endif ?>
            <ul class="manage-list">
                <a 
                    href="index.php?url=admin/loai" 
                    class="manage-list_link <?php echo $maQuanLy == 1 ? 'manage-list_link--active disabled' : ''?>">
                    Quản lý loại
                </a>
                <a href="index.php?url=admin/danhmuc"
                    class="manage-list_link <?php echo $maQuanLy == 2 ? 'manage-list_link--active disabled' : ''?>">
                    Quản lý danh mục
                </a>
                <a href="index.php?url=admin/sanpham"
                    class="manage-list_link <?php echo $maQuanLy == 3 ? 'manage-list_link--active disabled' : ''?>">
                    Quản lý sản phẩm
                </a>
                <a href="index.php?url=admin/nguoidung"
                    class="manage-list_link <?php echo $maQuanLy == 4 ? 'manage-list_link--active disabled' : ''?>">
                    Danh Sách Người Dùng
                </a>
                <a href="index.php?url=admin/binhluan"
                    class="manage-list_link <?php echo $maQuanLy == 5 ? 'manage-list_link--active disabled' : ''?>">
                    Quản Lý Bình Luận
                </a>
                <a href="index.php?url=admin/donhang"
                    class="manage-list_link <?php echo $maQuanLy == 7 ? 'manage-list_link--active disabled' : ''?>">
                    Quản Lý Đơn Hàng
                </a>
                <a href="index.php?url=admin/thongke"
                class="manage-list_link <?php echo $maQuanLy == 6 ? 'manage-list_link--active disabled' : ''?>">
                Thống Kê
                </a>
                <a href="index.php?url=dangxuat" class="manage-list_link manage-list_link-end">
                    Đăng xuất 
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                </a>
            </ul>
        </div>