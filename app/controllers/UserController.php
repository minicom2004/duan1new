<?php
    require_once MODELS_URL . "UserModel.php";
    require_once MODELS_URL . "KhachHangModel.php";
    require_once MODELS_URL . "GioHangModel.php";
    require_once MODELS_URL . "DonHangModel.php";
    require_once LIBRARIES_URL . "sendmail.php";

    // DANG NHAP
    function login() {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST["username"];
            $password = $_POST["password"];
            
            $listUsers = getAllUser();
            
            $errors = [];
            $checkAccount = false;
    
            foreach($listUsers as $user) {
                if($username == $user["tenNguoiDung"] && $password == $user["matKhau"]) {
                    $checkAccount = true;
                    setcookie('maUser',$user["maTaiKhoan"],time() + 60 * 60 * 24);
                    session_start();
                    $_SESSION["user"] = selectIdUser($user['maTaiKhoan']);
                    if(getKhachHangIDAccount($user["maTaiKhoan"])) {
                        if($user["quyen"] == 1) {
                            echo 
                            "<script>
                                window.location.href = '?url=admin/loai';
                                alert('Chào Mừng Bạn Đến Với Trang Quản Trị !!');
                            </script>";
                        }
                        else if($user["quyen"] == 0) {
                            echo 
                            "<script>
                                window.location.href = 'index.php';
                                alert('Đăng Nhập Thành Công !!');
                            </script>";
                        }
                    }
                    else {
                        if($user["quyen"] == 1) {
                            header("Location: ?url=thongtinadmin");
                        }
                        else if($user["quyen"] == 0) {
                            header("Location: ?url=thongtinkhachhang");
                        }
                    }
                }
            }
    
            if(!$checkAccount) {
                $errors["loi-dang-nhap"] = "Tên đăng nhập hoặc mật khẩu không đúng !";
            }
    
        }
        
        include VIEWS_URL . "user/dangnhap.php";
    }

    // DANG XUAT
    function logout() {
        setcookie("maUser", '', time());
        session_start();
        session_unset();
        session_destroy();
        header("Location: " . $_SERVER["PHP_SELF"]);
        die;
    }

    // DANG KY
    function signUp() {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = trim($_POST["username"]);
            $email = trim($_POST["email"]);
            $password = $_POST["password"];
            $repassword = $_POST["repassword"];

            $regexEmail = "/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/";

            $errors = [];

            if($username == "") { $errors["nguoidung_ten"] = "Tên tài khoản không được để trống"; }
            else {
                $listNguoiDung = getAllUser();
                foreach($listNguoiDung as $nguoiDung ) {
                    if($username == $nguoiDung["tenNguoiDung"]) {
                        $errors["nguoidung_ten"] = "Tên tài khoản đã tồn tại. Vui lòng chọn tên khác";
                        break;
                    }
                }
            }

            if($email == "") { $errors["nguoidung_email"] = "Email không được để trống"; }
            else {
                if(!preg_match($regexEmail,$email)) {
                    $errors["nguoidung_email"] = "Email nhập sai định dạng";
                }
            }

            if($password == "") { $errors["nguoidung_matkhau"] = "Mật khẩu không được để trống"; }
            else {
                if(strlen($password) < 6) {
                    $errors["nguoidung_matkhau"] = "Mật khẩu dài ít nhất 6 kí tự";
                }

                if(empty($errors["nguoidung_matkhau"])) {
                    if($repassword == "") {
                        $errors["nguoidung_nhaplaimk"] = "Vui lòng nhập lại mật khẩu";
                    }
                    else {
                        if($repassword !== $password) {
                            $errors["nguoidung_nhaplaimk"] = "Mật khẩu nhập lại không giống";
                        }
                    }
                }
            }
            
            
            if(empty($errors)) {
                insertUser($email, $username, $password, 0);
                sendMailSignUp($email, $username, $password);
                $thongbao = "Đăng ký thành công, Vui lòng kiểm tra email của bạn<br>
                            (Nếu không thấy, vui lòng vào mục thư rác để kiểm tra)";
                header("Location: ?url=dangnhap&thongbao=$thongbao");
                die;
            }   
            else {
                $thongbao = "Lỗi Đăng Ký";
            }
        }
        include VIEWS_URL . "user/dangky.php";
    }

    // QUEN MAT KHAU
    function forgotPassword() {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST["username"];
            $email = $_POST["email"];

            $errors = [];
            $checkUser = false;

            if($username == "") { $errors["nguoidung_ten"] = "Tên tài khoản không được để trống"; }

            if($email == "") { $errors["nguoidung_email"] = "Email không được để trống"; }

            
            if(empty($errors)) {
                $listNguoiDung = getAllUser();
                foreach($listNguoiDung as $nguoiDung) {
                    if($username == $nguoiDung["tenNguoiDung"] && $email == $nguoiDung["email"]) {
                        $checkUser = true;
                        sendMailForgotPassword($nguoiDung["email"],$nguoiDung["tenNguoiDung"],$nguoiDung["matKhau"]);
                        $thongbao = "Gửi thành công. Vui lòng kiểm tra email của bạn<br>
                                    (Nếu không thấy, vui lòng vào mục thư rác để kiểm tra)";
                        $type = "success";
                        break;
                    }
                }

                if(!$checkUser) {
                    $thongbao = "Lỗi";
                    $type = "danger";
                    $errors["nguoidung_email"] = "Tên tài khoản hoặc email không chính xác";
                }
                
            }   
            else {
                $thongbao = "Lỗi";
                $type = "danger";
            }


        }

        include VIEWS_URL . "user/quenmatkhau.php";
    }

    // DOI MAT KHAU
    function changePassword() {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $maTaiKhoan = $_COOKIE["maUser"];
            $currentPassword = $_POST["currentPassword"];
            $newPassword = $_POST["newPassword"];
            $reNewPassword = $_POST["reNewPassword"];

            $errors = [];
            $checkCurrentPassword = false;
            if($currentPassword == "") {
                $errors["password_current"] = "Vui lòng nhập mật khẩu hiện tại";
            }
            else {
                $user = getUserID($maTaiKhoan);
                if($currentPassword == $user["matKhau"]) {
                    $checkCurrentPassword = true;
                }
                else {
                    $errors["password_current"] = "Mật khẩu không chính xác";
                }
            }

            if($checkCurrentPassword) {
                if($newPassword == "") {
                    $errors["password_new"] = "Vui lòng nhập mật khẩu mới";
                }
                else {
                    if(strlen($newPassword) < 6) {
                        $errors["password_new"] = "Mật khẩu mới phải dài ít nhất 6 kí tự";
                    }
                    else {
                        if($newPassword == $currentPassword) {
                            $errors["password_new"] = "Mật khẩu mới không được giống mật khẩu hiện tại";
                        }
                    }

                    if(empty($errors["password_new"])) {
                        if($reNewPassword == "") {
                            $errors["password_renew"] = "Vui lòng nhập lại mật khẩu mới";
                        }
                        else {
                            if(!($newPassword == $reNewPassword)) {
                                $errors["password_renew"] = "Mật khẩu nhập lại không giống";
                            }
                        }
                    }
                }
            }

            if(empty($errors)) {
                updatePassword($maTaiKhoan,$newPassword);
                $thongbao = "Thay Đổi Mật Khẩu Thành Công";
                $type = "success";
            }
            else {
                $thongbao = "Lỗi";
                $type = "danger";
            }
        }
        include VIEWS_URL . "user/doimatkhau.php";
    }

    // THONG TIN CUA TOI
    function myInfo() {
        $isBtnUpdate = false;

        if(isset($_POST["btn-change"])) {
            $isBtnUpdate = true;
        }

        if(isset($_POST["btn-update"])) {
            $isBtnUpdate = true;
            $maTaiKhoan = $_COOKIE["maUser"];
            $hoVaTen = $_POST["hoVaTen"];
            $gioiTinh = $_POST["gioiTinh"];
            $ngaySinh = $_POST["ngaySinh"];
            $diaChi = $_POST["diaChi"];
            $avatar = $_FILES["avatar"];
            $avatarOld = $_POST["avatarOld"];

            $errors = [];

            if($hoVaTen == "") { $errors["khachhang_ten"] = "Họ và tên không được để trống"; }
            if($ngaySinh == "") { $errors["khachhang_ngaysinh"] = "Ngày sinh không được để trống"; }
            if($diaChi == "") { $errors["khachhang_diachi"] = "Địa chỉ không được để trống"; }

            if(empty($errors)) {
                $isBtnUpdate = false;
                if($avatar["error"] !== 0) {
                    $avatarName = $avatarOld;
                }
                else {
                    $avatarName = uploadFiles($avatar["name"],$avatar["tmp_name"],"users");
                    updateAvatarUser($maTaiKhoan,$avatarName);
                }
                updateKhachHang($hoVaTen, $gioiTinh, $ngaySinh, $diaChi, $maTaiKhoan);
                $thongbao = "Cập Nhật Thông Tin Thành Công";
                $type = "success";
            }
            else {
                $thongbao = "Cập Nhật Thất Bại";
                $type = "danger";
            }
            
        }


        $infoUser = getKhachHangIDAccount($_COOKIE["maUser"]);
        include VIEWS_URL . "user/thongtin.php";
    }

    //THONG TIN ADMIN
    function infoAdmin() {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $maTaiKhoan = $_COOKIE["maUser"];
            $hoVaTen = trim($_POST["hoVaTen"]);
            $ngaySinh = $_POST["ngaySinh"];
            $gioiTinh = $_POST["gioiTinh"];
            $diaChi = trim($_POST["diaChi"]);
            $avatar = $_FILES["avatar"];

            if($avatar["error"] == 0) {
                $avatarName = uploadFiles($avatar["name"],$avatar["tmp_name"],"users");
                updateAvatarUser($maTaiKhoan, $avatarName);
            }

            insertKhachHang($hoVaTen, $gioiTinh, $ngaySinh, $diaChi, $maTaiKhoan);
            echo 
            "<script>
                window.location.href = '?url=admin/loai';
                alert('Chào Mừng Bạn Đến Với Trang Quản Trị !!');
            </script>";
        }

        checkLogin("Bạn không có quyền truy cập trang này");
        $user = getOnlyUserID($_COOKIE["maUser"]);
        include VIEWS_URL . "user/thongtinadmin.php";
    }

    //THONG TIN KHACH HANG
    function infoUser() {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $maTaiKhoan = $_COOKIE["maUser"];
            $hoVaTen = trim($_POST["hoVaTen"]);
            $ngaySinh = $_POST["ngaySinh"];
            $gioiTinh = $_POST["gioiTinh"];
            $diaChi = trim($_POST["diaChi"]);
            $avatar = $_FILES["avatar"];

            if($avatar["error"] == 0) {
                $avatarName = uploadFiles($avatar["name"],$avatar["tmp_name"],"users");
                updateAvatarUser($maTaiKhoan, $avatarName);
            }

            insertKhachHang($hoVaTen, $gioiTinh, $ngaySinh, $diaChi, $maTaiKhoan);
            echo 
            "<script>
                window.location.href = 'index.php';
                alert('Chào Mừng Bạn Đến Với XSHOP. Mua Sắm Thôi Nào !!');
            </script>";
        }

        checkLogin("Bạn không có quyền truy cập trang này");
        $user = getOnlyUserID($_COOKIE["maUser"]);
        include VIEWS_URL . "user/thongtinkhachhang.php";
    }


    /* ----------------------------------- MỚI ---------------------------------- */
    // GIO HANG
    function cart() {
        $maKhachHang = $_SESSION["user"][0]['maKhachHang'];
        $carts = getProductsInCart($maKhachHang);
        include VIEWS_URL . "user/giohang.php";
    }
    function addToCart(){
        $maKhachHang = $_SESSION["user"][0]['maKhachHang'];
        $maSanPham = $_GET["maSanPham"];
        insertGioHang($maKhachHang, $maSanPham, 1);
        header("Location: ?url=giohang");
    }
    function addToCarts(){
        $maKhachHang = $_SESSION["user"][0]['maKhachHang'];
        $maSanPham = $_GET["maSanPham"];
        $soluong = $_POST["quantity"];
        insertGioHang($maKhachHang, $maSanPham, $soluong);
        header("Location: ?url=giohang");
    }
    function updateCart(){
        $action = $_GET["action"];
        $maSanPham = $_GET["maSanPham"];
        $maKhachHang = $_SESSION["user"][0]['maKhachHang'];
        updateGioHang($action, $maKhachHang, $maSanPham);
        header("Location: ?url=giohang");
    }
    function deleteCart(){
        $maSanPham = $_GET["maSanPham"];
        $maKhachHang = $_SESSION["user"][0]['maKhachHang'];
        deleteGioHang($maKhachHang, $maSanPham);
        header("Location: ?url=giohang");
    }
    function thanhtoan(){
        $maKhachHang = $_SESSION["user"][0]['maKhachHang'];
        $carts = getProductsInCart($maKhachHang);
        if(isset($_POST["checkout"])){
            $diaChi = $_POST["diaChi"];
            $soDienThoai = $_POST["soDienThoai"];
            $tongGiaTri = $_POST["tongGiaTri"];
            $tienTrinh = "Đang xử lý";
            if(checkout($maKhachHang, $diaChi, $soDienThoai, $tienTrinh, $tongGiaTri)){
                echo '<script>alert("Thanh toán thành công"); window.location.href="?url=thanhtoan";</script>';
            }else{
                echo '<script>alert("Thanh toán không thành công");</script>';
            }
        }
        include VIEWS_URL . "user/thanhtoan.php";
    }
    function dltO(){
        $maDonHang = $_GET["maDonHang"];
        deleteOrder($maDonHang);
        header("Location: ?url=donhangcuatoi");
    }
    function donHangCuaToi(){
        $maKhachHang = $_SESSION["user"][0]['maKhachHang'];
        $orders = selectOrderByUser($maKhachHang);
        include VIEWS_URL . "user/donhangcuatoi.php";
    }
    function chiTietDonHangUser(){
        $maDonHang = $_GET["maDonHang"];
        $details = selectOrderDetail($maDonHang);
        include VIEWS_URL . "user/chitietdonhang.php";
    }

    /* ----------------------------------- MỚI ---------------------------------- */

?>