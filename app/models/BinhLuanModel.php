<?php
    require_once "pdo.php";

    // LAY TAT CA BINH LUAN THEO MA SAN PHAM
    function getAllCommentsProduct($maSanPham) {
        $sql = "SELECT A.*, B.tenNguoiDung, B.avatar FROM binh_luan A
                JOIN tai_khoan B ON A.maTaiKhoan = B.maTaiKhoan
                WHERE maSanPham = $maSanPham
                ORDER BY A.ngayBinhLuan DESC
                ";
        return getData($sql);
    }

    // LAY TAT CA BINH LUAN THEO MA TAI KHOAN
    function getAllCommentsMaTaiKhoan($maTaiKhoan) {
        $sql = "SELECT * FROM binh_luan A
                JOIN tai_khoan B ON A.maTaiKhoan = B.maTaiKhoan 
                WHERE A.maTaiKhoan = $maTaiKhoan";
        return getData($sql);
    }

    // DEM TAT CA BINH LUAN THEO TEN SAN PHAM VA LAY NGAY BL MOI NHAT, NGAY BL CU NHAT CUA SAN PHAM DO
    function getCountCommentsProduct() {
        $sql = "SELECT A.maSanPham, B.tenSanPham, COUNT(A.maSanPham) as soLuongBinhLuan,
                MAX(A.ngayBinhLuan) as ngayBinhLuanMoiNhat, MIN(A.ngayBinhLuan) AS ngayBinhLuanCuNhat
                FROM binh_luan A
                JOIN san_pham B ON A.maSanPham = B.maSanPham
                GROUP BY A.maSanPham
                ";

        return getData($sql);
    }


    // ----------------------------------------------

    function insertCommentProduct($maTaiKhoan, $noiDung, $maSanPham) {
        $sql = "INSERT INTO binh_luan
                VALUES (NULL, $maTaiKhoan, '$noiDung', DEFAULT, $maSanPham)
                ";
        return executeCommand($sql);
    }

    function deleteComment($maBinhLuan) {
        $sql = "DELETE FROM binh_luan WHERE maBinhLuan = $maBinhLuan";
        return executeCommand($sql);
    }

?>