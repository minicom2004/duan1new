<?php
session_start();
require "global.php";
require "app/controllers/HomeController.php";
require "app/controllers/UserController.php";
require "app/controllers/AdminController.php";

$url = isset($_GET["url"]) ? $_GET["url"] : "/";


$routes = [
    "/" => function() {
        require_once "includes/header.php";
    },
    "loc" => function() {
        require_once "includes/header.php";
        loc();
        require_once "includes/footer.php";
    },
    "search" => function() {
        require_once "includes/header.php";
        search();
        require_once "includes/footer.php";
    },
   
    "dangnhap" => "login",
    "dangky" => "signUp",
    "dangxuat" => "logout",
    "quenmatkhau" => "forgotPassword",
    "doimatkhau" => function() {
        require_once "includes/header.php";
        changePassword();
        require_once "includes/footer.php";
    },
    
    "thongtinkhachhang" => "infoUser",
    "thongtinadmin" => "infoAdmin",
    "giohang" => function() {
        checkLogin("dang nhap de dung");
        require_once "includes/header.php";
        cart();
        require_once "includes/footer.php";
    },
    "themvaogiohang" => "addToCart",
    "themvaogiohangs" => "addToCarts",
    "updategiohang" => "updateCart",
    "deletegiohang" => "deleteCart",
    "thanhtoan" => function() {
        require_once "includes/header.php";
        thanhtoan();
        require_once "includes/footer.php";
    },
    "donhangcuatoi" => function() {
        require_once "includes/header.php";
        donHangCuaToi();
        require_once "includes/footer.php";
    },
    "xoadonhanguser" => "dltO",
    "chitietdonhanguser" => function() {
        require_once "includes/header.php";
        chiTietDonHangUser();
        require_once "includes/footer.php";
    },
   
    "admin/loai" => "loai","admin/loai/them" => "themLoai",
    "admin/loai/sua" => "suaLoai","admin/loai/xoa" => "xoaLoai",
    "admin/danhmuc" => "danhMuc","admin/danhmuc/them" => "themDanhMuc",
    "admin/danhmuc/sua" => "suaDanhMuc","admin/danhmuc/xoa" => "xoaDanhMuc",
    "admin/sanpham" => "sanPham","admin/sanpham/them" => "themSanPham",
    "admin/sanpham/sua" => "suaSanPham","admin/sanpham/xoa" => "xoaSanPham",
    "admin/nguoidung" => "nguoiDung","admin/nguoidung/them" => "themNguoiDung",
    "admin/nguoidung/sua" => "suaNguoiDung","admin/nguoidung/xoa" => "xoaNguoiDung",
    "admin/binhluan" => "binhLuan","admin/binhluan/chitiet" => "chiTietBinhLuan",
    "admin/binhluan/xoa" => "xoaBinhLuan","admin/donhang" => "quanLyDonHang",
    "admin/donhang/chitiet" => "chiTietDonHang","admin/donhang/capnhat" => "capNhatDonHang",
    "admin/donhang/xoa" => "xoaDonHang","admin/thongke" => "thongKe",
    "admin/thongke/bieudo" => "bieuDo",
];


if (array_key_exists($url, $routes)) {
    $action = $routes[$url];
    if (is_callable($action)) {
        $action(); 
    } else {
        $action(); 
    }
} else {
    
    require_once "includes/header.php";
    echo "404 Not Found";
    require_once "includes/footer.php";
}
?>
