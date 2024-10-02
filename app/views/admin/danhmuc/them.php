<?php $maQuanLy = 2; include VIEWS_URL . "admin/dasboard.php" ?>
<div class="body">
    <div class="directional">
        <a href="?url=admin/danhmuc" class="directional-page">Quản lý danh mục</a><span class="directional-icon">></span>
        <a href="#" class="directional-page directional-page--active disabled">Thêm</a>
    </div>
    <h1 class="body_title">Thêm Danh Mục</h1>
    <form action="?url=admin/danhmuc/them" method="post" class="form-features">
        <?php if(isset($thongbao)) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $thongbao ?>
            </div>
        <?php endif ?>
        <div class="form-features_item">
            <label for="">Tên danh mục</label>
            <input type="text" name="tenDanhMuc" value="<?php echo $tenDanhMuc ?? '' ?>">
            <div class="form-features_error"><?php echo $errors["danhmuc_ten"] ?? '' ?></div>
        </div>
        <div class="form-features_item">
            <label for="">Loại</label>
            <select name="maLoai">
                <?php foreach($listLoai as $loai ) : ?>
                    <option 
                        value="<?php echo $loai["maLoai"] ?>"
                        <?php echo isset($maLoai) ? ($loai["maLoai"] == $maLoai ? 'selected' : '') : ''?>
                    >
                        <?php echo $loai["tenLoai"]?>
                    </option>
                <?php endforeach ?>
            </select>
            <div class="form-features_error"><?php echo $errors["danhmuc_loi"] ?? '' ?></div>
        </div>
        <button type="submit" class="btn-add" style="margin-top: 42px;">Thêm</button>
    </form>
</div>
<?php include VIEWS_URL . "admin/footer.php" ?>