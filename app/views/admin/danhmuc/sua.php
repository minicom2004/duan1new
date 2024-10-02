<?php $maQuanLy = 2; include VIEWS_URL . "admin/dasboard.php" ?>
<div class="body">
    <div class="directional">
        <a href="?url=admin/danhmuc" class="directional-page">Quản lý danh mục</a><span class="directional-icon">></span>
        <a href="#" class="directional-page directional-page--active disabled">Sửa</a>
    </div>
    <h1 class="body_title">Sửa Danh Mục</h1>
    <form action="?url=admin/danhmuc/sua&maDanhMuc=<?php echo $danhMuc["maDanhMuc"] ?>" method="post" class="form-features">
        <?php if(isset($thongbao)) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $thongbao ?>
            </div>
        <?php endif ?>
        <div class="form-features_item">
            <label for="">Mã Danh Mục</label>
            <input type="text" name="maDanhMuc" value="<?php echo $danhMuc["maDanhMuc"] ?>" readonly>
            <div class="form-features_error"></div>
        </div>
        <div class="form-features_item">
            <label for="">Tên danh mục</label>
            <input type="text" name="tenDanhMuc" value="<?php echo $danhMuc["tenDanhMuc"] ?>">
            <div class="form-features_error"><?php echo $errors["danhmuc_ten"] ?? '' ?></div>
        </div>
        <div class="form-features_item">
            <label for="">Loại</label>
            <select name="maLoai">
                <?php foreach($listLoai as $loai) : ?>
                    <option 
                        value="<?php echo $loai["maLoai"] ?>"
                        <?php echo $danhMuc["maLoai"] == $loai["maLoai"] ? 'selected' : '' ?>
                    >
                        <?php echo $loai["tenLoai"]?>
                    </option>
                <?php endforeach ?>
            </select>
            <div class="form-features_error"><?php echo $errors["danhmuc_loi"] ?? '' ?></div>
        </div>
        <button type="submit" class="btn-change" style="margin-top: 42px;">Sửa</button>
    </form>
</div>
<?php include VIEWS_URL . "admin/footer.php" ?>