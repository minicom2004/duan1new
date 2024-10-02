<?php
    require_once MODELS_URL . "LoaiModel.php";
    require_once MODELS_URL . "ProductsModel.php";
    require_once MODELS_URL . "DanhMucModel.php";
    require_once MODELS_URL . "BinhLuanModel.php";

 
    function home() {
        $products = getShowAllProducts();
        include VIEWS_URL . "home/index.php";
    }

  
    function loc() {
        $maLoai = $_GET["maLoai"];
        $loai = getLoaiID($maLoai);
        
        if(getDanhMucMaLoai($maLoai)) {
            $listDanhMuc = getDanhMucMaLoai($maLoai);

            $maDanhMuc = $listDanhMuc[0]["maDanhMuc"];

            if(isset($_GET["maDanhMuc"])) {
                $maDanhMuc = $_GET["maDanhMuc"];
            }

            $products = getShowProductsDanhMuc($maDanhMuc);

            $filter = 1;
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $filter = $_POST["filter-type"];

                switch($filter) {
                    case 1:
                    $products = getShowProductsDanhMuc($maDanhMuc);
                    break;
                    case 2:
                    $products = getShowProductsPriceAscDanhMuc($maDanhMuc);
                    break;
                    case 3:
                    $products = getShowProductsPriceDescDanhMuc($maDanhMuc);
                    break;
                    case 4:
                    $products = getShowProductsBestSellDanhMuc($maDanhMuc);
                    break;
                }
            }
        }

        include VIEWS_URL . "home/loc.php";
    }


    function search() {
        if(isset($_GET["keyword"])) {
            $keyWord = $_GET["keyword"];
            $products = getProductKeyword($keyWord);
            include VIEWS_URL . "home/search.php";
        }
    }

      function chitietsp() {
        $maSanPham = $_GET["maSanPham"];
        
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $comment = $_POST["comment"];
            insertCommentProduct($_COOKIE["maUser"],$comment,$maSanPham);
        }

        if(isset($_COOKIE["maUser"])) {
            $user = getUserID($_COOKIE["maUser"]);
        }
        
        $sanPham = getProductID($maSanPham);
        $listBinhLuan = getAllCommentsProduct($maSanPham);
        include VIEWS_URL . "home/chitietsp.php";
    }

?>