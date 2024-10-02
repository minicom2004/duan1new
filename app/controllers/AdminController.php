<?php
    require_once MODELS_URL . "LoaiModel.php";
    require_once MODELS_URL . "DanhMucModel.php";
    require_once MODELS_URL . "ProductsModel.php";
    require_once MODELS_URL . "UserModel.php";
    require_once MODELS_URL . "KhachHangModel.php";
    require_once MODELS_URL . "BinhLuanModel.php";

    // QUAN LY LOAI
    function loai() {
        $listLoai = getAllLoai();
        include VIEWS_URL . "admin/loai/index.php";
    }

    function themLoai() {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $tenLoai = trim($_POST["tenLoai"]);

            $errors = [];
            $isError = false;

            if(empty($tenLoai)) { $errors["loai_ten"] = "Tên loại không được để trống"; }; 

            if(empty($errors)) {
                if(insertLoai($tenLoai)) {
                    $thongbao = "Thêm loại thành công";
                    header("Location: ?url=admin/loai&type=success&thongbao=$thongbao");
                }
                else {
                    $isError = true;
                    $errors["loai_ten"] = "Tên loại đã tồn tại";
                }
            }
            else {
                $isError = true;
            }

            if($isError) {
                $thongbao = "Lỗi";
            }
        }

        include VIEWS_URL . "admin/loai/them.php";
    }

    function suaLoai() {

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $maLoai = $_POST["maLoai"];
            $tenLoai = trim($_POST["tenLoai"]);

            $errors = [];

            if(empty($tenLoai)) { $errors["loai_ten"] = "Tên loại không được để trống"; }; 

            if(empty($errors)) {
                if(updateLoai($tenLoai,$maLoai)) {
                    $thongbao = "Sửa loại thành công";
                    header("Location: ?url=admin/loai&type=warning&thongbao=$thongbao");
                }
                else {
                    $errors["loai_ten"] = "Tên loại đã tồn tại";
                    $thongbao = "Lỗi";
                }
            }
            else {
                $thongbao = "Lỗi";
            }
        }



        $loai = getLoaiID($_GET["maLoai"]);
        include VIEWS_URL . "admin/loai/sua.php";
    }

    function xoaLoai() {
        $maLoai = $_GET["maLoai"];
        if(deleteLoai($maLoai)) {
            $thongbao = "Xóa loại thành công";
            header("Location: ?url=admin/loai&type=success&thongbao=$thongbao");
        }
        else {
            $thongbao = "Xóa loại không thành công (lỗi vi phạm ràng buộc toàn vẹn dữ liệu)";
            header("Location: ?url=admin/loai&type=danger&thongbao=$thongbao");
        }
    }


    // QUAN LY DANH MUC
    function danhMuc() {
        $listDanhMuc = getAllDanhMuc();
        include VIEWS_URL . "admin/danhmuc/index.php";
    }

    function themDanhMuc() {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $tenDanhMuc = trim($_POST["tenDanhMuc"]);
            $maLoai = $_POST["maLoai"];

            $errors = [];
            $isError = false;
            if(empty($tenDanhMuc)) { $errors["danhmuc_ten"] = "Tên danh mục không được để trống"; }

            if(empty($errors)) {
                if(!getDanhMucTenMaLoai($tenDanhMuc, $maLoai)) {
                    // Thực hiện logic cho thêm
                    insertDanhMuc($tenDanhMuc, $maLoai);
                    $thongbao = "Thêm danh mục thành công";
                    header("Location: ?url=admin/danhmuc&type=success&thongbao=$thongbao");
                }
                else {
                    // Lỗi: đã tồn tại tên danh mục và tên loại.
                    $isError = true;
                    $errors["danhmuc_loi"] = "Tên danh mục và tên loại đã tồn tại";
                };
            }
            else {
                $isError = true;
            }

            if($isError) {
                $thongbao = "Lỗi";
            }

        }

        $listLoai = getAllLoai();
        include VIEWS_URL . "admin/danhmuc/them.php";
    }

    function suaDanhMuc() {
        $maDanhMuc = $_GET["maDanhMuc"];

        $danhMuc = getDanhMucID($maDanhMuc);
        $listLoai = getAllLoai();

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $maDanhMuc = $_POST["maDanhMuc"];
            $tenDanhMuc = trim($_POST["tenDanhMuc"]);
            $maLoai = $_POST["maLoai"];


            $errors = [];
            $isError = false;
            
            if(empty($tenDanhMuc)) { $errors["danhmuc_ten"] = "Tên danh mục không được để trống"; }

            if(empty($errors)) {
                if(!getDanhMucTenMaLoai($tenDanhMuc, $maLoai)) {
                    // Thực hiện logic update
                    updateDanhMuc($maDanhMuc, $tenDanhMuc, $maLoai);
                    $thongbao = "Sửa danh mục thành công";
                    header("Location: ?url=admin/danhmuc&type=warning&thongbao=$thongbao");
                }
                else {
                    if($tenDanhMuc == $danhMuc["tenDanhMuc"] && $maLoai == $danhMuc["maLoai"]) {
                        updateDanhMuc($maDanhMuc, $tenDanhMuc, $maLoai);
                        $thongbao = "Sửa danh mục thành công";
                        header("Location: ?url=admin/danhmuc&type=warning&thongbao=$thongbao");
                    }
                    else {
                        // Lỗi: đã tồn tại tên danh mục và tên loại.
                        $isError = true;
                        $errors["danhmuc_loi"] = "Tên danh mục và tên loại đã tồn tại";
                    }  
                };
            }
            else {
                $isError = true;
            }

            if($isError) {
                $thongbao = "Lỗi";
            }

        }

        include VIEWS_URL . "admin/danhmuc/sua.php";
    }

    function xoaDanhMuc() {
        $maDanhMuc = $_GET["maDanhMuc"];
        if(deleteDanhMuc($maDanhMuc)) {
            $thongbao = "Xóa danh mục thành công";
            header("Location: ?url=admin/danhmuc&type=success&thongbao=$thongbao");
        }
        else {
            $thongbao = "Xóa danh mục không thành công (lỗi vi phạm ràng buộc toàn vẹn dữ liệu)";
            header("Location: ?url=admin/danhmuc&type=danger&thongbao=$thongbao");
        }
    }


    // QUAN LY SAN PHAM
    function sanPham() {
        $listSanPham = getAllProducts();
        include VIEWS_URL . "admin/sanpham/index.php";
    }

    function themSanPham() {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $tenSanPham = trim($_POST["tenSanPham"]);
            $maDanhMuc = $_POST["maDanhMuc"];
            $gia = ($_POST["gia"]);
            $soLuong = ($_POST["soLuong"]);
            $moTa = trim($_POST["moTa"]);
            $trangThai = $_POST["trangThai"];
            $anh = $_FILES["anh"];
            if(isset($_POST["anhCu"])) {
                $anhCu = $_POST["anhCu"];
            }

            $errors = [];
            $isError = false;

            // CHECK ERROR
            if(empty($tenSanPham)) { $errors["sanpham_ten"] = "Tên sản phẩm không được để trống"; }
            if(empty($moTa)) { $errors["sanpham_mota"] = "Mô tả sản phẩm không được để trống"; }
            if($anh["error"] !== 0) {
                if(isset($anhCu)) {
                    $imageName = $anhCu;
                }
                else {
                    $errors["sanpham_anh"] = "Ảnh sản phẩm không được để trống";
                }
            }
            else {
                $imageName = uploadFiles($anh["name"],$anh["tmp_name"],"products");
            }

            if($gia == "") { $errors["sanpham_gia"] = "Giá sản phẩm không được để trống"; }
            else {
                if($gia <= 0) { $errors["sanpham_gia"] = "Giá phải là số lớn hơn 0"; }
            }

            if($soLuong == "") { $errors["sanpham_soluong"] = "Số lượng sản phẩm không được để trống"; }
            else { 
                if($soLuong < 0) { $errors["sanpham_soluong"] = "Số lượng phải là số lớn hơn hoặc bằng 0"; }
            }

            $listSanPham = getAllProducts();
            foreach($listSanPham as $sanPham) {
                if($sanPham["tenSanPham"] == $tenSanPham && $sanPham["maDanhMuc"] == $maDanhMuc) {
                    $errors["sanpham_danhmuc"] = "Tên sản phẩm và tên danh mục đã tồn tại";
                    break;
                }
            }

            // NOT ERROR
            if(empty($errors)) {
                insertProduct($tenSanPham, $gia, $soLuong, $imageName, $moTa, $trangThai, $maDanhMuc);
                
                $thongbao = "Thêm sản phẩm thành công";
                header("Location: ?url=admin/sanpham&type=success&thongbao=$thongbao");
            }
            else {
                $isError = true;
            }

            if($isError) {
                $thongbao = "Lỗi";
            }
        }

        $listDanhMuc = getAllDanhMuc();
        include VIEWS_URL . "admin/sanpham/them.php";
    }

    function suaSanPham() {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $maSanPham = $_POST["maSanPham"];
            $tenSanPham = trim($_POST["tenSanPham"]);
            $maDanhMuc = $_POST["maDanhMuc"];
            $gia = ($_POST["gia"]);
            $soLuong = ($_POST["soLuong"]);
            $moTa = trim($_POST["moTa"]);
            $trangThai = $_POST["trangThai"];
            $anh = $_FILES["anh"];
            $anhCu = $_POST["anhCu"];

            $errors = [];
            $isError = false;

            // CHECK ERROR
            if(empty($tenSanPham)) { $errors["sanpham_ten"] = "Tên sản phẩm không được để trống"; }
            if(empty($moTa)) { $errors["sanpham_mota"] = "Mô tả sản phẩm không được để trống"; }
            if($anh["error"] !== 0) {
                $imageName = $anhCu;
            }
            else {
                $imageName = uploadFiles($anh["name"],$anh["tmp_name"],"products");
                updateImageProduct($maSanPham, $imageName);
            }

            if($gia == "") { $errors["sanpham_gia"] = "Giá sản phẩm không được để trống"; }
            else {
                if($gia <= 0) { $errors["sanpham_gia"] = "Giá phải là số lớn hơn 0"; }
            }

            if($soLuong == "") { $errors["sanpham_soluong"] = "Số lượng sản phẩm không được để trống"; }
            else { 
                if($soLuong < 0) { $errors["sanpham_soluong"] = "Số lượng phải là số lớn hơn hoặc bằng 0"; }
            }

            $listSanPham = getAllProducts();
            foreach($listSanPham as $sanPham) {
                if($sanPham["tenSanPham"] == $tenSanPham && $sanPham["maDanhMuc"] == $maDanhMuc) {
                    $errors["sanpham_danhmuc"] = "Tên sản phẩm và tên danh mục đã tồn tại";
                    break;
                }
            }

            $sanPham = getProductID($_GET["maSanPham"]);
           
            if($sanPham["tenSanPham"] == $tenSanPham && $sanPham["maDanhMuc"] == $maDanhMuc) {
                unset($errors["sanpham_danhmuc"]);
            }

            // NOT ERROR
            if(empty($errors)) {
                updateProduct($maSanPham, $tenSanPham, $gia, $soLuong, $imageName, $moTa, $trangThai, $maDanhMuc);
                
                $thongbao = "Sửa sản phẩm thành công";
                header("Location: ?url=admin/sanpham&type=warning&thongbao=$thongbao");
            }
            else {
                $isError = true;
            }

            if($isError) {
                $thongbao = "Lỗi";
            }
        }

        $maSanPham = $_GET["maSanPham"];

        $listDanhMuc = getAllDanhMuc();
        $sanPham = getProductID($maSanPham);

        include VIEWS_URL . "admin/sanpham/sua.php";
    }

    function xoaSanPham() {
        $maSanPham = $_GET["maSanPham"];
        if(deleteProduct($maSanPham)) {
            $thongbao = "Xóa sản phẩm thành công";
            header("Location: ?url=admin/sanpham&type=success&thongbao=$thongbao");
        }
        else {
            $thongbao = "Xóa sản phẩm không thành công (lỗi vi phạm ràng buộc toàn vẹn dữ liệu)";
            header("Location: ?url=admin/sanpham&type=danger&thongbao=$thongbao");
        }

    }


    // QUAN LY NGUOI DUNG
    function nguoiDung() {
        $listUser = getAllUser();
        include VIEWS_URL . "admin/nguoidung/index.php";
    }

    function themNguoiDung() {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $tenNguoiDung = trim($_POST["tenTaiKhoan"]);
            $email = trim($_POST["email"]);
            $matKhau = $_POST["matKhau"];
            $quyen = $_POST["quyen"];

            $regexEmail = "/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/";

            $errors = [];

            if($tenNguoiDung == "") { $errors["nguoidung_ten"] = "Tên tài khoản không được để trống"; }
            else {
                $listNguoiDung = getAllUser();
                foreach($listNguoiDung as $nguoiDung ) {
                    if($tenNguoiDung == $nguoiDung["tenNguoiDung"]) {
                        $errors["nguoidung_ten"] = "Tên tài khoản đã tồn tại";
                        break;
                    }
                }
            }

            if($matKhau == "") { $errors["nguoidung_matkhau"] = "Mật khẩu không được để trống"; }
            else {
                if(strlen($matKhau) < 6) {
                    $errors["nguoidung_matkhau"] = "Mật khẩu dài ít nhất 6 kí tự";
                }
            }

            if($email == "") { $errors["nguoidung_email"] = "Email không được để trống"; }
            else {
                if(!preg_match($regexEmail,$email)) {
                    $errors["nguoidung_email"] = "Email nhập sai định dạng";
                }
            }
            
            
            if(empty($errors)) {
                insertUser($email, $tenNguoiDung, $matKhau, $quyen);
                $thongbao = "Thêm người dùng thành công";
                header("Location: ?url=admin/nguoidung&type=success&thongbao=$thongbao");
            }   
            else {
                $thongbao = "Lỗi";
            }
        }

        include VIEWS_URL . "admin/nguoidung/them.php";
    }

    function suaNguoiDung() {
        $maTaiKhoan = $_GET["maTaiKhoan"];
        $userChange = getOnlyUserID($maTaiKhoan);

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $maTaiKhoan = $_POST["maTaiKhoan"];
            $tenNguoiDung = trim($_POST["tenTaiKhoan"]);
            $email = trim($_POST["email"]);
            $matKhau = trim($_POST["matKhau"]);
            $quyen = $_POST["quyen"];
            $avatar = $_FILES["avatar"];
            $avatarOld = $_POST["avatarOld"];
            $regexEmail = "/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/";

            $errors = [];

            if($tenNguoiDung == "") { $errors["nguoidung_ten"] = "Tên tài khoản không được để trống"; }
            else {
                $listNguoiDung = getAllUser();
                foreach($listNguoiDung as $nguoiDung ) {
                    if($tenNguoiDung == $nguoiDung["tenNguoiDung"]) {
                        $errors["nguoidung_ten"] = "Tên tài khoản đã tồn tại";
                        break;
                    }
                }
            }

            if($tenNguoiDung == $userChange["tenNguoiDung"]) {
                unset($errors["nguoidung_ten"]);
            }

            if($matKhau == "") { $errors["nguoidung_matkhau"] = "Mật khẩu không được để trống"; }
            else {
                if(strlen($matKhau) < 6) {
                    $errors["nguoidung_matkhau"] = "Mật khẩu dài ít nhất 6 kí tự";
                }
            }

            if($email == "") { $errors["nguoidung_email"] = "Email không được để trống"; }
            else {
                if(!preg_match($regexEmail,$email)) {
                    $errors["nguoidung_email"] = "Email nhập sai định dạng";
                }
            }

            if($avatar["error"] !== 0) {
                $avatarName = $avatarOld;
            }
            else {
                $avatarName = uploadFiles($avatar["name"],$avatar["tmp_name"],"users");
                updateAvatarUser($maTaiKhoan,$avatarName);
                $userChange = getOnlyUserID($maTaiKhoan);
            }
            

            if(empty($errors)) {
                updateUser($maTaiKhoan, $email, $tenNguoiDung, $matKhau, $quyen, $avatarName);
                $thongbao = "Sửa người dùng thành công";
                header("Location: ?url=admin/nguoidung&type=warning&thongbao=$thongbao");
            }   
            else {
                $thongbao = "Lỗi";
            }
        }

        include VIEWS_URL . "admin/nguoidung/sua.php";
    }

    function xoaNguoiDung() {
        $maTaiKhoan = $_GET["maTaiKhoan"];
        if($maTaiKhoan == $_COOKIE["maUser"]) {
            $thongbao = "Xóa người dùng thất bại (bạn không được xóa chính mình khi đang quản trị)";
            header("Location: ?url=admin/nguoidung&type=danger&thongbao=$thongbao");
            die;
        }
        
        $comments = getAllCommentsMaTaiKhoan($maTaiKhoan);
        if(!$comments) {
            $khachHang = getKhachHangIDAccount($maTaiKhoan);
            if($khachHang) {
                deleteKhachHang($khachHang["maKhachHang"]);
            }
        }

        if(deleteUser($maTaiKhoan)) {
            $thongbao = "Xóa người dùng thành công";
            header("Location: ?url=admin/nguoidung&type=success&thongbao=$thongbao");
            die;
        }
        else {
            $thongbao = "Xóa người dùng thất bại (lỗi vi phạm ràng buộc toàn vẹn dữ liệu)";
            header("Location: ?url=admin/nguoidung&type=danger&thongbao=$thongbao");
            die;
        }
    }


    // QUAN LY BINH LUAN
    function binhLuan() {
        $listCommentsProducts = getCountCommentsProduct();
        include VIEWS_URL . "admin/binhluan/index.php";
    }

    function chiTietBinhLuan() {
        $maSanPham = $_GET["maSanPham"];
        $sanPham = getProductID($_GET["maSanPham"]);
        $listComments = getAllCommentsProduct($maSanPham);
        include VIEWS_URL . "admin/binhluan/detail.php";
    }

    function xoaBinhLuan() {
        $maSanPham = $_GET["maSanPham"];
        $maBinhLuan = $_GET["maBinhLuan"];
        if(deleteComment($maBinhLuan)) {
            $thongbao = "Xóa bình luận thành công";
            header("Location: ?url=admin/binhluan/chitiet&maSanPham=$maSanPham&type=success&thongbao=$thongbao");
        }
        else {
            $thongbao = "Xóa bình luận không thành công (lỗi vi phạm ràng buộc toàn vẹn dữ liệu)";
            header("Location: ?url=admin/binhluan/chitiet&maSanPham=$maSanPham&type=danger&thongbao=$thongbao");
        }
        die;
    }


    // THONG KE
    function thongKe() {
        $listThongKeDanhMuc = getThongKeDanhMuc();
        include VIEWS_URL . "admin/thongke/index.php";
    }

    function bieuDo() {
        $listThongKeDanhMuc = getThongKeDanhMuc();
        include VIEWS_URL . "admin/thongke/chart.php";
    }

    /* ---------------------------------- MỚI --------------------------------- */
    function quanLyDonHang(){
        $orders = selectAllOrder();
        include VIEWS_URL . "admin/donhang/index.php";
    }
    function chiTietDonHang(){
        $maDonHang = $_GET["maDonHang"];
        $details = selectOrderDetail($maDonHang);
        include VIEWS_URL . "admin/donhang/detail.php";
    }
    function capNhatDonHang(){
        $maDonHang = $_GET["maDonHang"];
        $column = $_GET["col"];
        $value = $_GET["value"];
        updateOrder($maDonHang, $column, $value);
        header("Location: ?url=admin/donhang");
    }
    function xoaDonHang(){
        $maDonHang = $_GET["maDonHang"];
        deleteOrder($maDonHang);
        header("Location: ?url=admin/donhang");
    }
    /* ---------------------------------- MỚI --------------------------------- */