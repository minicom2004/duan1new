    <!-- PRODUCTS  -->
    <?php if(isset($products)) : ?>
        <?php foreach($products as $product) : ?>
            <div class="col <?php echo $soCot ?>">
                <div class="product">
                    <div class="product-img_wrap">
                        <div class="product-img" style="background-image: url('<?php echo IMAGES_URL . $product["anh"] ?>');"></div>
                    </div>
                    <div class="product-bottom">
                        <div class="product-features">
                            <p class="product-feature"><?php echo $product["tenLoai"]?></p>
                            <p class="product-feature">LƯỢT MUA: <?php echo $product["luotMua"]?></p>
                        </div>
                        <div class="product-title"><?php echo $product["tenSanPham"]?></div>
                        <div class="product-price"><?php echo $product["gia"]?> vnđ</div>
                        <div class="product-buttons">
                            <!-- product-button_add--disable: vo hieu hoa nut add -->
                            <a href="?url=themvaogiohang&maSanPham=<?= $product['maSanPham'] ?>" class="product-button product-button_add">Thêm Vào Giỏ Hàng</a>
                            <a href="?url=chitietsp&maSanPham=<?php echo $product["maSanPham"]?>" class="product-button">Xem Sản Phẩm</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    <?php endif ?>