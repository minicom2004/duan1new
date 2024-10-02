<div class="container">
    <div class="left-product">
        <div class="left-product_top">
            <div class="left-product_left-img">
                <div class="left-product_img-small-wrap">
                    <div class="left-product_img-small" style="background-image: url('<?php echo IMAGES_URL . $sanPham["anh"] ?>');"></div>
                </div>
            </div>
            <div class="left-product_right-img" style="background-image: url('<?php echo IMAGES_URL . $sanPham["anh"]?>');"></div>
        </div>
        <div class="left-product_bottom">
            <h1 class="left-product_bottom-title">Mô Tả</h1>
            <p class="left-product_bottom-description">
                <?php echo $sanPham["moTa"] ?>
            </p>
        </div>
    </div>
    <div class="right-product">
        <h1 class="product-title"><?php echo $sanPham["tenSanPham"] ?></h1>
        <div class="product-price-wrap">
            <h1 class="product-price"><?php echo $sanPham["gia"] ?> vnđ</h1>
            <p class="product-buyed">Đã Bán: <?php echo $sanPham["luotMua"] ?></p>
        </div>
        <div class="product-feature">
            <p class="product-feature_text">Số Lượng Tồn Kho:</p>
            <span class="product-feature_quantity"><?php echo $sanPham["soLuong"] ?></span>
        </div>
        <form action="?url=themvaogiohangs&maSanPham=<?= $sanPham['maSanPham'] ?>" method="POST">
            <div class="product-feature">
                <p class="product-feature_text">Số Lượng Muốn Mua:</p>
                <input type="number" class="product-feature_buy" name="quantity" required min=1>
            </div>
            <div class="product-feature_error"></div>
            <button type="submit" class="btn-buy">Mua Ngay</button>
        </form>
        <div class="product-comments">
            <h1 class="product-comments_title">Bình Luận</h1>
            <?php foreach($listBinhLuan as $binhLuan ) : ?>
                <div class="product-comment">
                    <div class="product-comment_info">
                        <div class="product-comment_avatar" style="background-image: url('<?php echo IMAGES_URL . $binhLuan["avatar"]?>');"></div>
                        <div class="product-comment_name">
                            <?php echo isset($_COOKIE["maUser"]) ? ($_COOKIE["maUser"] == $binhLuan["maTaiKhoan"] ? "Bạn" : $binhLuan["tenNguoiDung"]) : $binhLuan["tenNguoiDung"] ?>
                        </div>
                    </div>
                    <div class="product-comment_content">
                        <?php echo $binhLuan["noiDung"] ?>
                    </div>
                    <div class="product-comment_day">Gửi lúc: <?php echo $binhLuan["ngayBinhLuan"] ?></div>
                </div>
            <?php endforeach ?>
            <?php if(isset($_COOKIE["maUser"])) : ?>
                <form action="?url=chitietsp&maSanPham=<?php echo $maSanPham ?>" method="post" class="product-write-comment">
                    <div class="product-comment_info">
                        <div class="product-comment_avatar" style="background-image: url('<?php echo IMAGES_URL . $user["avatar"] ?>');"></div>
                    </div>
                    <input type="text" name="comment" class="product-write-comment_input" placeholder="Viết Bình Luận Của Bạn" required>
                    <button type="submit" class="product-write-comment_submit">Gửi Bình Luận</button>
                </form>
            <?php endif ?>
            <?php if(!isset($_COOKIE["maUser"])) : ?>
                <div style="margin-top: 32px; padding-top: 24px; border-top: 1px solid #ccc;">
                    <p>Bạn Cần Đăng Nhập Để Thực Hiện Chức Năng Bình Luận</p>
                </div>
            <?php endif ?>
        </div>
    </div>
</div>