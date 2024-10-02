<?php
    require_once "pdo.php";
    
    // LAY TAT CA LOAI
    function getAllLoai() {
        $sql = "SELECT * FROM loai ORDER BY maLoai";
        return getData($sql);
    }

    // LAY 1 LOAI THEO MA LOAI
    function getLoaiID($maLoai) {
        $sql = "SELECT * FROM loai WHERE maLoai = $maLoai";
        return getData($sql,false);
    }

    // --------------------------------------------------------

    function insertLoai($tenLoai) {
        $sql = "INSERT INTO loai VALUES (NULL,'$tenLoai')";
        return executeCommand($sql);
    }

    function updateLoai($tenLoai,$maLoai) {
        $sql = "UPDATE loai SET tenLoai = '$tenLoai' WHERE maLoai = $maLoai";
        return executeCommand($sql);
    }

    function deleteLoai($maLoai) {
        $sql = "DELETE FROM loai WHERE maLoai = $maLoai";
        return executeCommand($sql);
    }

?>