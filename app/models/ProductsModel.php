<?php
    require_once "pdo.php";

    // LẤY TẤT CẢ SẢN PHẨM
    function getAllProducts() {
        $sql = "SELECT A.*, B.tenDanhMuc, C.tenLoai FROM san_pham A
                JOIN danh_muc B ON A.maDanhMuc = B.maDanhMuc
                JOIN loai C ON B.maLoai = C.maLoai
                ORDER BY A.maSanPham
                ";
        
        return getData($sql);
    }

    // LẤY 1 SẢN PHẨM THEO ID
    function getProductID($maSanPham) {
        $sql = "SELECT A.*, B.tenDanhMuc, C.maLoai, C.tenLoai FROM san_pham A
                JOIN danh_muc B ON A.maDanhMuc = B.maDanhMuc
                JOIN loai C ON B.maLoai = C.maLoai
                WHERE maSanPham = $maSanPham;
                ";

        return getData($sql, false);
    }

    // LẤY TẤT CẢ SẢN PHẨM TRẠNG THÁI = 1 (được hiện)
    function getShowAllProducts() {
        $sql = "SELECT A.*, B.tenDanhMuc, C.tenLoai FROM san_pham A 
                JOIN danh_muc B ON A.maDanhMuc = B.maDanhMuc 
                JOIN loai C ON B.maLoai = C.maLoai 
                WHERE A.trangThai = 1";

        return getData($sql);
    }

    // LẤY TẤT CẢ SẢN PHẨM TRẠNG THÁI = 1 (được hiện) THEO MÃ DANH MỤC
    function getShowProductsDanhMuc($maDanhMuc) {
        $sql = "SELECT A.*, B.tenDanhMuc, C.tenLoai FROM san_pham A
                JOIN danh_muc B ON A.maDanhMuc = B.maDanhMuc  
                JOIN loai C ON B.maLoai = C.maLoai
                WHERE A.maDanhMuc = $maDanhMuc AND A.trangThai = 1";
        return getData($sql);
    }

    // LẤY TẤT CẢ SẢN PHẨM GIÁ TĂNG DẦN TRẠNG THÁI = 1 (được hiện) THEO MÃ DANH MỤC
    function getShowProductsPriceAscDanhMuc($maDanhMuc) {
            $sql = "SELECT A.*, B.tenDanhMuc, C.tenLoai FROM san_pham A
                    JOIN danh_muc B ON A.maDanhMuc = B.maDanhMuc  
                    JOIN loai C ON B.maLoai = C.maLoai
                    WHERE A.maDanhMuc = $maDanhMuc AND A.trangThai = 1
                    ORDER BY A.gia ASC";
            return getData($sql);
    }

    // LẤY TẤT CẢ SẢN PHẨM GIÁ GIẢM DẦN TRẠNG THÁI = 1 (được hiện) THEO MÃ DANH MỤC
    function getShowProductsPriceDescDanhMuc($maDanhMuc) {
        $sql = "SELECT A.*, B.tenDanhMuc, C.tenLoai FROM san_pham A
                JOIN danh_muc B ON A.maDanhMuc = B.maDanhMuc  
                JOIN loai C ON B.maLoai = C.maLoai
                WHERE A.maDanhMuc = $maDanhMuc AND A.trangThai = 1
                ORDER BY A.gia DESC
                ";
        return getData($sql);
    }

    // LẤY TẤT CẢ SẢN PHẨM ĐƯỢC MUA NHIỀU NHẤT TRẠNG THÁI = 1 (được hiện) THEO MÃ DANH MỤC
    function getShowProductsBestSellDanhMuc($maDanhMuc) {
        $sql = "SELECT A.*, B.tenDanhMuc, C.tenLoai FROM san_pham A
                JOIN danh_muc B ON A.maDanhMuc = B.maDanhMuc  
                JOIN loai C ON B.maLoai = C.maLoai
                WHERE A.maDanhMuc = $maDanhMuc AND A.trangThai = 1
                ORDER BY A.luotMua DESC
                ";
        return getData($sql);
    }

    //LẤY TẤT CẢ SẢN PHẨM THEO LOẠI
    function getShowAllProductsLoai($maLoai) {
        $sql = "SELECT A.*, B.tenDanhMuc, C.tenLoai FROM san_pham A
                JOIN danh_muc B ON A.maDanhMuc = B.maDanhMuc
                JOIN loai C ON B.maLoai = C.maLoai
                WHERE C.maLoai = $maLoai AND A.trangThai = 1";

        return getData($sql);
    }

    // LAY SAN PHAM THEO KEYWORD TRẠNG THÁI = 1 (được hiện)
    function getProductKeyword($keyword) {
        $sql = "SELECT A.*, C.tenLoai FROM san_pham A
                JOIN danh_muc B ON A.maDanhMuc = B.maDanhMuc
                JOIN loai C ON B.maLoai = C.maLoai
                WHERE A.trangThai = 1 AND
                (A.tenSanPham LIKE '%$keyword%'
                OR B.tenDanhMuc LIKE '%$keyword%'
                OR C.tenLoai LIKE '%$keyword%')";

        return getData($sql);
    }

    // -------------------------------------------

    function insertProduct($tenSanPham, $gia, $soLuong, $anh, $moTa, $trangThai, $maDanhMuc) {
        $sql = "INSERT INTO san_pham 
                VALUES 
                (NULL, '$tenSanPham', $gia, $soLuong, '$anh', '$moTa', DEFAULT, $trangThai, $maDanhMuc)";
        return executeCommand($sql);
    }

    function updateProduct($maSanPham, $tenSanPham, $gia, $soLuong, $anh, $moTa, $trangThai, $maDanhMuc) {
        $sql = "UPDATE san_pham
                SET 
                tenSanPham = '$tenSanPham',
                gia = $gia,
                soLuong = $soLuong,
                anh = '$anh',
                moTa = '$moTa',
                trangThai = $trangThai,
                maDanhMuc = $maDanhMuc
                WHERE 
                maSanPham = $maSanPham
                ";

        return executeCommand($sql);
    }

    function updateImageProduct($maSanPham, $imgName) {
        $sql = "UPDATE san_pham SET anh = '$imgName' WHERE maSanPham = $maSanPham";
        return executeCommand($sql);
    }

    function deleteProduct($maSanPham) {
        $sql = "DELETE FROM san_pham WHERE maSanPham = $maSanPham";
        return executeCommand($sql);
    }

?>