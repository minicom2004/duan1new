<?php 
    require_once "pdo.php";

    function getKhachHangIDAccount($maTaiKhoan) {
        $sql = "SELECT A.*, B.avatar FROM khach_hang A
                JOIN tai_khoan B ON A.maTaiKhoan = B.maTaiKhoan
                WHERE A.maTaiKhoan = $maTaiKhoan";
        return getData($sql, false);
    }

    // ---------------------------------------------

    function insertKhachHang($hoVaTen, $gioiTinh, $ngaySinh, $diaChi, $maTaiKhoan) {
        $sql = "INSERT INTO khach_hang 
                VALUES
                (NULL, '$hoVaTen', '$gioiTinh', '$ngaySinh', '$diaChi', $maTaiKhoan)
                ";
        return executeCommand($sql);
    }

    function updateKhachHang($hoVaTen, $gioiTinh, $ngaySinh, $diaChi, $maTaiKhoan) {
        $sql = "UPDATE khach_hang
                SET
                hoVaTen = '$hoVaTen',
                gioiTinh = '$gioiTinh',
                ngaySinh = '$ngaySinh',
                diaChi = '$diaChi'
                WHERE
                maTaiKhoan = $maTaiKhoan
                ";
        return executeCommand($sql);
    }

    function deleteKhachHang($maKhachHang) {
        $sql = "DELETE FROM khach_hang WHERE maKhachHang = $maKhachHang";
        return executeCommand($sql);
    }

?>