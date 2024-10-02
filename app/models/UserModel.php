<?php
    require_once "pdo.php";
    
    function getAllUser() {
        $sql = "SELECT * FROM tai_khoan ORDER BY maTaiKhoan";
        return getData($sql);
    }

    function getUserID($id) {
        $sql = "SELECT A.*, B.hoVaTen FROM tai_khoan A JOIN khach_hang B ON A.maTaiKhoan = B.maTaiKhoan WHERE A.maTaiKhoan = $id";
        return getData($sql,false);
    }

    function getOnlyUserID($id) {
        $sql = "SELECT * FROM tai_khoan WHERE maTaiKhoan = $id";
        return getData($sql,false);
    }

    // -----------------------------------

    function insertUser($email, $tenNguoiDung, $matKhau, $quyen) {
        $sql = "INSERT INTO tai_khoan VALUES (NULL, '$email', '$tenNguoiDung', '$matKhau', $quyen, DEFAULT)";
        return executeCommand($sql);
    }

    function updateUser($maTaiKhoan, $email, $tenNguoiDung, $matKhau, $quyen, $avatar) {
        $sql = "UPDATE tai_khoan 
                SET
                email = '$email',
                tenNguoiDung = '$tenNguoiDung',
                matKhau = '$matKhau',
                quyen = $quyen,
                avatar = '$avatar'
                WHERE 
                maTaiKhoan = $maTaiKhoan
                ";
        return executeCommand($sql);
    }

    function updateAvatarUser($maTaiKhoan, $avatar) {
        $sql = "UPDATE tai_khoan SET avatar = '$avatar' WHERE maTaiKhoan = $maTaiKhoan";
        return executeCommand($sql);
    }

    function updatePassword($maTaiKhoan, $matKhau) {
        $sql = "UPDATE tai_khoan SET matKhau = '$matKhau' WHERE maTaiKhoan = $maTaiKhoan";
        return executeCommand($sql);
    }

    function deleteUser($maTaiKhoan) {
        $sql = "DELETE FROM tai_khoan WHERE maTaiKhoan = $maTaiKhoan";
        return executeCommand($sql);
    }
    function selectIdUser($maTaiKhoan){
        $sql = "SELECT * FROM khach_hang WHERE maTaiKhoan = $maTaiKhoan";
        return getData($sql);
    }

?>