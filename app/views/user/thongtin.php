<link rel="stylesheet" href="<?php echo CSS_URL ?>thongtincuatoi.css">

<div class="body">
    <div class="grid wide">
        <h1 style="margin-bottom: 28px;">Thông tin của tôi</h1>
        <?php if(isset($thongbao) && isset($type)) : ?>
            <div class="alert alert-<?php echo $type ?>" role="alert">
                <?php echo $thongbao?>
            </div>
        <?php endif ?>
        <form action="?url=thongtincuatoi" method="post" class="my-info-wrap" enctype="multipart/form-data">
            <div class="my-info">
                <div class="my-info_left">
                    <div class="my-info_info">
                        <label for="" class="my-info_info-heading">Họ Và Tên</label>
                        <input
                            type="text"
                            name="hoVaTen"
                            value="<?php echo $infoUser["hoVaTen"] ?? '' ?>"
                            class="my-info_info-input"
                            <?php echo $isBtnUpdate ? '' : 'disabled'?>
                        >
                        <div class="my-info_error"><?php echo $errors["khachhang_ten"] ?? ''?></div>
                    </div>
                    <div class="my-info_info">
                        <label for="" class="my-info_info-heading">Giới Tính</label>
                        <select name="gioiTinh" style="width: 20%" <?php echo $isBtnUpdate ? '' : 'disabled'?>>
                            <option value="Nam" <?php echo $infoUser["gioiTinh"] == 'Nam' ? 'selected' : ''?>>Nam</option>
                            <option value="Nữ" <?php echo $infoUser["gioiTinh"] == 'Nữ' ? 'selected' : ''?>>Nữ</option>
                        </select>
                        <div class="my-info_error"></div>
                    </div>
                    <div class="my-info_info">
                        <label for="" class="my-info_info-heading">Ngày Sinh</label>
                        <input
                            type="date"
                            name="ngaySinh"
                            value="<?php echo $infoUser["ngaySinh"] ?? ''?>"
                            class="my-info_info-input"
                            <?php echo $isBtnUpdate ? '' : 'disabled'?>
                        >
                        <div class="my-info_error"><?php echo $errors["khachhang_ngaysinh"] ?? ''?></div>
                    </div>
                    <div class="my-info_info">
                        <label for="" class="my-info_info-heading">Địa Chỉ</label>
                        <input
                            type="text"
                            name="diaChi"
                            value="<?php echo $infoUser["diaChi"] ?? '' ?>"
                            class="my-info_info-input"
                            <?php echo $isBtnUpdate ? '' : 'disabled'?>
                        >
                        <div class="my-info_error"><?php echo $errors["khachhang_diachi"] ?? ''?></div>
                    </div>
                </div>
                <div class="my-info_right">
                    <div class="my-info_info">
                        <label for="" class="my-info_info-heading">Avatar</label>
                        <img src="<?php echo IMAGES_URL . $infoUser["avatar"] ?>" alt="" class="my-info_info-img">
                        <input type="hidden" name="avatarOld" value="<?php echo $infoUser["avatar"] ?>">
                        <?php if($isBtnUpdate) : ?>
                            <input type="file" name="avatar" class="my-info_info-file">
                        <?php endif ?>
                    </div>
                </div>
            </div>
            <button
                type="submit"
                class="btn btn-primary btn-submit"
                name="btn-<?php echo $isBtnUpdate ? 'update' : 'change'?>"
            >
                <?php echo $isBtnUpdate ? 'Cập Nhật' : 'Chỉnh Sửa'?>
            </button>
        </form>
    </div>
    
</div>