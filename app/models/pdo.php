<?php
    require_once "env.php";

    function getConnect() {
        try {
            $connect = new PDO(
                "mysql:host=" . DB_HOST . 
                ";dbname=" . DB_DATABASE . 
                ";charset=" . DB_CHARSET, 
                DB_USERNAME, 
                DB_PASSWORD
            );
            $connect -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connect;
        }
        catch(PDOException $e) {
            echo "Loi ket noi den database " . $e -> getMessage();
        }
        
    }

    function executeCommand($sql) {
        try {
            $connect = getConnect();
            $stmt = $connect -> prepare($sql);
            $stmt -> execute();
            return true;
        }
        catch(PDOException $e) {
            return false;
        }
        finally {
            unset($connect);
        }
    }

    function getData($sql, $getAll = true) {
        try {
            $connect = getConnect();
            $stmt = $connect -> prepare($sql);
            $stmt -> execute();
        }
        catch(PDOException $e) {
            echo "loi cau lenh: $sql";
        }
        finally {
            unset($connect);
        }


        if($getAll) {
            return $stmt -> fetchAll();
        }
        return $stmt -> fetch();
    }

?>