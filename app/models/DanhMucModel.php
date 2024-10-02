<?php
    require_once "pdo.php";

    // LAY TAT CA DANH MUC
    function getAllDanhMuc() {
        $sql = "SELECT A.*, B.tenLoai FROM danh_muc A JOIN loai B ON A.maLoai = B.maLoai ORDER BY A.maDanhMuc";
        return getData($sql);
    }

    // LAY 1 DANH MUC THEO MA DANH MUC
    function getDanhMucID($maDanhMuc) {
        $sql = "SELECT * FROM danh_muc WHERE maDanhMuc = $maDanhMuc";
        return getData($sql, false);
    }

    //LAY NHIEU DANH MUC THEO MA LOAI
    function getDanhMucMaLoai($maLoai) {
        $sql = "SELECT * FROM danh_muc WHERE maLoai = $maLoai";
        return getData($sql);
    }

    //LAY 1 DANH MUC THEO TEN DANH MUC VA MA LOAI
    function getDanhMucTenMaLoai($tenDanhMuc, $maLoai) {
        $sql = "SELECT * FROM danh_muc WHERE tenDanhMuc = '$tenDanhMuc' AND maLoai = $maLoai";
        return getData($sql, false);
    }

    // THONG KE DANH MUC 
    function getThongKeDanhMuc() {
        $sql = "SELECT A.tenDanhMuc, C.tenLoai, COUNT(B.maDanhMuc) as soSanPham,
                MIN(B.gia) as giaThapNhat, MAX(B.gia) as giaCaoNhat, AVG(B.gia) as giaTrungBinh
                FROM danh_muc A
                JOIN san_pham B ON A.maDanhMuc = B.maDanhMuc
                JOIN loai C ON A.maLoai = C.maLoai
                GROUP BY B.maDanhMuc
                ";
        return getData($sql);
    }

    // ---------------------------------------------------

    function insertDanhMuc($tenDanhMuc, $maLoai) {
        $sql = "INSERT INTO danh_muc VALUES(NULL, '$tenDanhMuc', $maLoai)";
        return executeCommand($sql);
    }

    function updateDanhMuc($maDanhMuc, $tenDanhMuc, $maLoai) {
        $sql = "UPDATE danh_muc SET tenDanhMuc = '$tenDanhMuc', maLoai = $maLoai WHERE maDanhMuc = $maDanhMuc";
        return executeCommand($sql);
    }

    function deleteDanhMuc($maDanhMuc) {
        $sql = "DELETE FROM danh_muc WHERE maDanhMuc = $maDanhMuc";
        return executeCommand($sql);
    }

?>