<?php $maQuanLy = 1; include VIEWS_URL . "admin/dasboard.php" ?>
<div class="body">
    <div class="directional">
        <a href="?url=admin/loai" class="directional-page">Quản lý loại</a><span class="directional-icon">></span>
        <a href="#" class="directional-page directional-page--active disabled">Sửa</a>
    </div>
    <h1 class="body_title">Sửa Loại</h1>
    <?php if(isset($thongbao)) : ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $thongbao ?>
        </div>
    <?php endif ?>
    <form action="?url=admin/loai/sua&maLoai=<?php echo $loai["maLoai"] ?>" method="post" class="form-features">
        <div class="form-features_item">
            <label for="">Mã Loại</label>
            <input type="text" name="maLoai" value="<?php echo $loai["maLoai"] ?>" readonly>
            <div class="form-features_error"></div>
        </div>
        <div class="form-features_item">
            <label for="">Tên Loại</label>
            <input type="text" name="tenLoai" value="<?php echo $loai["tenLoai"] ?>">
            <div class="form-features_error"><?php echo $errors["loai_ten"] ?? '' ?></div>
        </div>
        <button type="submit" class="btn-change" style="margin-top: 42px;">Sửa</button>
    </form>
</div>
<?php include VIEWS_URL . "admin/footer.php" ?>