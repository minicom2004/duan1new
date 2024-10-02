<?php
require_once "pdo.php";

function getGioHangID($maKhachHang) {
    $sql = "SELECT maGioHang FROM gio_hang WHERE maKhachHang = :maKhachHang";
    $stmt = getConnect()->prepare($sql);
    $stmt->execute(array(':maKhachHang' => $maKhachHang));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row) {
        return $row['maGioHang'];
    } else {
        return null;
    }
}

function insertGioHang($maKhachHang, $maSanPham, $soluong) {
    $pdo = getConnect(); // Lấy đối tượng PDO
    // Kiểm tra nếu giỏ hàng của khách hàng đã tồn tại
    $sql_check = "SELECT maGioHang FROM gio_hang WHERE maKhachHang = :maKhachHang";
    $stmt_check = $pdo->prepare($sql_check);
    $stmt_check->execute(array(':maKhachHang' => $maKhachHang));
    $row = $stmt_check->fetch(PDO::FETCH_ASSOC);
    if ($row) {
        // Nếu giỏ hàng đã tồn tại, thêm sản phẩm vào giỏ hàng
        $maGioHang = $row['maGioHang'];
        $sql_insert = "INSERT INTO chi_tiet_gio_hang (maGioHang, maSanPham, soLuong) VALUES (:maGioHang, :maSanPham, :soluong)";
        $stmt_insert = $pdo->prepare($sql_insert);
        $stmt_insert->execute(array(':maGioHang' => $maGioHang, ':maSanPham' => $maSanPham, ':soluong' => $soluong));
    } else {
        // Nếu giỏ hàng chưa tồn tại, tạo giỏ hàng mới và thêm sản phẩm vào giỏ hàng
        $sql_insert_giohang = "INSERT INTO gio_hang (maKhachHang) VALUES (:maKhachHang)";
        $stmt_insert_giohang = $pdo->prepare($sql_insert_giohang);
        $stmt_insert_giohang->execute(array(':maKhachHang' => $maKhachHang));
        $maGioHang = $pdo->lastInsertId(); // Lấy mã giỏ hàng mới được tạo
        $sql_insert = "INSERT INTO chi_tiet_gio_hang (maGioHang, maSanPham, soLuong) VALUES (:maGioHang, :maSanPham, :soluong)";
        $stmt_insert = $pdo->prepare($sql_insert);
        $stmt_insert->execute(array(':maGioHang' => $maGioHang, ':maSanPham' => $maSanPham, ':soluong' => $soluong));
    }
}
function getProductsInCart($maKhachHang) {
    $pdo = getConnect(); // Lấy đối tượng PDO
    // Lấy mã giỏ hàng của người dùng
    $maGioHang = getGioHangID($maKhachHang);
    if ($maGioHang) {
        // Truy vấn để lấy thông tin sản phẩm trong giỏ hàng
        $sql = "SELECT san_pham.maSanPham, san_pham.tenSanPham, san_pham.gia, san_pham.anh, chi_tiet_gio_hang.soLuong 
                FROM chi_tiet_gio_hang 
                INNER JOIN san_pham ON chi_tiet_gio_hang.maSanPham = san_pham.maSanPham 
                WHERE chi_tiet_gio_hang.maGioHang = :maGioHang";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(':maGioHang' => $maGioHang));
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    } else {
        return array(); // Trả về mảng rỗng nếu không tìm thấy giỏ hàng
    }
}


function updateGioHang($action, $maKhachHang, $maSanPham) {
    $maGioHang = getGioHangID($maKhachHang);
    if ($maGioHang) {
        $sql = "";
        if ($action === 'tang') {
            $sql = "UPDATE chi_tiet_gio_hang SET soLuong = soLuong + 1 WHERE maGioHang = :maGioHang AND maSanPham = :maSanPham";
        } elseif ($action === 'giam') {
            $sql = "UPDATE chi_tiet_gio_hang SET soLuong = soLuong - 1 WHERE maGioHang = :maGioHang AND maSanPham = :maSanPham AND soLuong > 0";
        }
        if ($sql != "") {
            $stmt = getConnect()->prepare($sql);
            $stmt->execute(array(':maGioHang' => $maGioHang, ':maSanPham' => $maSanPham));
        }
    }
}


function deleteGioHang($maKhachHang, $maSanPham) {
    $maGioHang = getGioHangID($maKhachHang);
    if ($maGioHang) {
        $sql = "DELETE FROM chi_tiet_gio_hang WHERE maGioHang = :maGioHang AND maSanPham = :maSanPham";
        $stmt = getConnect()->prepare($sql);
        $stmt->execute(array(':maGioHang' => $maGioHang, ':maSanPham' => $maSanPham));
    }
}
