<link rel="stylesheet" href="<?php echo CSS_URL ?>doimatkhau.css">

<div class="body">
    <div class="grid wide">
        <h1 style="margin-bottom: 28px;">Đổi mật khẩu</h1>
        <?php if(isset($thongbao) && isset($type)) : ?>
            <div class="alert alert-<?php echo $type ?>" role="alert">
                <?php echo $thongbao?>
            </div>
        <?php endif ?>
        <form action="?url=doimatkhau" method="post" class="change-password-wrap" enctype="multipart/form-data">
            <div class="change-password">
                <label for="" class="change-password_heading">Mật Khẩu Hiện Tại</label>
                <input
                    type="password"
                    name="currentPassword"
                    class="change-password_input"
                    value="<?php echo (isset($type) && $type == "success") ? '' : ($currentPassword ?? '')?>"
                >
                <div class="change-password_error"><?php echo $errors["password_current"] ?? ''?></div>
            </div>
            <div class="change-password">
                <label for="" class="change-password_heading">Mật Khẩu Mới</label>
                <input
                    type="password"
                    name="newPassword"
                    class="change-password_input"
                    value="<?php echo (isset($type) && $type == "success") ? '' : ($newPassword ?? '')?>"
                >
                <div class="change-password_error"><?php echo $errors["password_new"] ?? ''?></div>
            </div>
            <div class="change-password">
                <label for="" class="change-password_heading">Nhập Lại Mật Khẩu Mới</label>
                <input
                    type="password"
                    name="reNewPassword"
                    class="change-password_input"
                    value="<?php echo (isset($type) && $type == "success") ? '' : ($reNewPassword ?? '')?>"
                >
                <div class="change-password_error"><?php echo $errors["password_renew"] ?? ''?></div>
            </div>
            <button type="submit" class="btn btn-primary btn-submit">
                Cập Nhật
            </button>
        </form>
    </div>
    
</div>