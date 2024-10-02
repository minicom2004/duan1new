<?php $maQuanLy = 4; include VIEWS_URL . "admin/dasboard.php" ?>
<div class="body">
    <div class="directional">
        <a href="?url=admin/nguoidung" class="directional-page">Danh Sách Người Dùng</a><span class="directional-icon">></span>
        <a href="#" class="directional-page directional-page--active disabled">Thêm</a>
    </div>
    <h1 class="body_title">Thêm Người Dùng</h1>
    <form action="?url=admin/nguoidung/them" class="form-features" method="post" enctype="multipart/form-data">
        <?php if(isset($thongbao)) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $thongbao ?>
            </div>
        <?php endif ?>
        <div class="form-features_item">
            <label for="">Tên tài khoản</label>
            <input type="text" name="tenTaiKhoan" value="<?php echo $tenNguoiDung ?? ''?>">
            <div class="form-features_error"><?php echo $errors["nguoidung_ten"] ?? ''?></div>
        </div>
        <div class="form-features_item">
            <label for="">Email</label>
            <input type="text" name="email" value="<?php echo $email ?? ''?>">
            <div class="form-features_error"><?php echo $errors["nguoidung_email"] ?? ''?></div>
        </div>
        <div class="form-features_item">
            <label for="">Mật khẩu</label>
            <input type="text" name="matKhau" value="<?php echo $matKhau ?? ''?>">
            <div class="form-features_error"><?php echo $errors["nguoidung_matkhau"] ?? ''?></div>
        </div>
        <div class="form-features_item">
            <label for="">Quyền</label>
            <select name="quyen">
                <option value="0" <?php echo isset($quyen) ? ($quyen == 0 ? 'selected' : '') : ''?>>khách hàng</option>
                <option value="1" <?php echo isset($quyen) ? ($quyen == 1 ? 'selected' : '') : ''?>>admin</option>
            </select>
        </div>
        <button type="submit" class="btn-add" style="margin-top: 42px;">Thêm</button>
    </form>
</div>
<?php include VIEWS_URL . "admin/footer.php" ?>
