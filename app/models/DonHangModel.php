<?php
require_once "pdo.php";

function checkout($maKhachHang, $diaChi, $soDienThoai, $tienTrinh, $tongGiaTri) {
    $pdo = getConnect(); 
    $ngayDat = date("Y-m-d"); // Lấy ngày hiện tại

    // Tạo đơn hàng mới và lấy ID của đơn hàng vừa tạo
    $sql_insert_don_hang = "INSERT INTO don_hang (ngayDat, tongGiaTri, trangThai, maKhachHang, diaChi, soDienThoai,tienTrinh) VALUES (:ngayDat, :tongGiaTri, 0, :maKhachHang, :diaChi, :soDienThoai,:tienTrinh)";
    $stmt_insert_don_hang = $pdo->prepare($sql_insert_don_hang);
    $stmt_insert_don_hang->execute(array(':ngayDat' => $ngayDat, ':tongGiaTri' => $tongGiaTri, ':maKhachHang' => $maKhachHang, ':diaChi' => $diaChi, ':soDienThoai' => $soDienThoai,':tienTrinh' => $tienTrinh));
    $maDonHang = $pdo->lastInsertId();

    // Lấy danh sách các sản phẩm trong giỏ hàng của người dùng
    $sql_cart_items = "SELECT maSanPham, soLuong FROM chi_tiet_gio_hang WHERE maGioHang = :maGioHang";
    $stmt_cart_items = $pdo->prepare($sql_cart_items);
    $stmt_cart_items->execute(array(':maGioHang' => getGioHangID($maKhachHang)));
    $cart_items = $stmt_cart_items->fetchAll(PDO::FETCH_ASSOC);

    // Thêm từng sản phẩm trong giỏ hàng vào chi tiết đơn hàng
    foreach ($cart_items as $item) {
        $maSanPham = $item['maSanPham'];
        $soLuong = $item['soLuong'];
        $sql_insert_chi_tiet_don_hang = "INSERT INTO chi_tiet_don_hang (maDonHang, maSanPham, soLuong) VALUES (:maDonHang, :maSanPham, :soLuong)";
        $stmt_insert_chi_tiet_don_hang = $pdo->prepare($sql_insert_chi_tiet_don_hang);
        $stmt_insert_chi_tiet_don_hang->execute(array(':maDonHang' => $maDonHang, ':maSanPham' => $maSanPham, ':soLuong' => $soLuong));
    }

    // Xóa các mục trong giỏ hàng sau khi đã thanh toán
    $sql_delete_cart_items = "DELETE FROM chi_tiet_gio_hang WHERE maGioHang = :maGioHang";
    $stmt_delete_cart_items = $pdo->prepare($sql_delete_cart_items);
    $stmt_delete_cart_items->execute(array(':maGioHang' => getGioHangID($maKhachHang)));

    // Trả về ID của đơn hàng mới được tạo
    return true;
}


function updateOrder($maDonHang, $columnName, $columnValue) {
    $pdo = getConnect(); 
    $sql = "UPDATE don_hang SET $columnName = :columnValue WHERE maDonHang = :maDonHang";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':columnValue' => $columnValue, ':maDonHang' => $maDonHang));
}
function selectAllOrder() {
    $sql = "SELECT * FROM don_hang";
    return getData($sql);
}


function selectOrderByUser($maKhachHang) {
    $pdo = getConnect(); 
    $sql = "SELECT * FROM don_hang WHERE maKhachHang = :maKhachHang";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':maKhachHang' => $maKhachHang));
    $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $orders;
}

function selectOrderDetail($maDonHang) {
    $pdo = getConnect(); 
    $sql = "SELECT san_pham.*, chi_tiet_don_hang.soLuong 
            FROM chi_tiet_don_hang 
            INNER JOIN san_pham ON chi_tiet_don_hang.maSanPham = san_pham.maSanPham 
            WHERE chi_tiet_don_hang.maDonHang = :maDonHang";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':maDonHang' => $maDonHang));
    $orderDetail = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $orderDetail;
}
function deleteOrder($maDonHang) {
    $pdo = getConnect(); 

    $sql_delete_don_hang = "DELETE FROM don_hang WHERE maDonHang = :maDonHang";
    $stmt_delete_don_hang = $pdo->prepare($sql_delete_don_hang);
    $stmt_delete_don_hang->execute(array(':maDonHang' => $maDonHang));


    return true;
}
