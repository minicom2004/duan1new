<?php $maQuanLy = 1; include VIEWS_URL . "admin/dasboard.php" ?>
<div class="body">
    <div class="directional">
        <a href="?url=admin/loai" class="directional-page">Quản lý loại</a><span class="directional-icon">></span>
        <a href="#" class="directional-page directional-page--active disabled">Thêm</a>
    </div>
    <h1 class="body_title">Thêm Loại</h1>
    <form action="?url=admin/loai/them" method="post" class="form-features">
        <?php if(isset($thongbao)) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $thongbao ?>
            </div>
        <?php endif ?>
        
        <div class="form-features_item">
            <label for="">Tên Loại</label>
            <input type="text" name="tenLoai" value="<?php echo $tenLoai ?? ''?>">
            <div class="form-features_error"><?php echo $errors["loai_ten"] ?? ''?></div>
        </div>
        <button type="submit" class="btn-add" style="margin-top: 42px;">Thêm</button>
    </form>
</div>
<?php include VIEWS_URL . "admin/footer.php" ?>
