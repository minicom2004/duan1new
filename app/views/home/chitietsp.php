<link rel="stylesheet" href="<?php echo CSS_URL ?>chitietsanpham.css">

<!-- BODY -->
<div class="body">
    <div class="grid wide">
        <div class="directional">
            <a href="?" class="directional-page">Trang chủ</a><span class="directional-icon">></span>
            <a
                href="?url=loc&maLoai=<?php echo $sanPham["maLoai"] ?>"
                class="directional-page"><?php echo $sanPham["tenLoai"] ?>
            </a>
            <span class="directional-icon">></span>
            <a href="#" class="directional-page directional-page--active disabled"><?php echo $sanPham["tenSanPham"]?></a>
        </div>
        <?php include VIEWS_URL . "products/detail.php" ?>
    </div>
    
</div>