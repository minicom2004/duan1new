<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>xShop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />   
    <link rel="stylesheet" href="<?php echo CSS_URL ?>grid.css">
    <link rel="stylesheet" href="<?php echo CSS_URL ?>style.css">
    <link rel="stylesheet" href="<?php echo CSS_URL ?>thongtin.css">
</head>
<body>
    <div class="main">
      <form action="?url=thongtinkhachhang" method="post" enctype="multipart/form-data" class="row g-3 needs-validation form-info" novalidate>
        <div class="heading">Xin chào, <?php echo $user["tenNguoiDung"] ?></div>
        <div class="alert alert-primary alert-form" role="alert">
          Vui lòng điền thông tin của bạn để tiếp tục
        </div>
        <h1 class="form-info_heading">Thông Tin Khách Hàng</h1>
        <div class="col-md-5">
          <label for="validationCustomUsername" class="form-label">Họ Và Tên</label>
          <div class="input-group has-validation">
            <input 
              name="hoVaTen" 
              type="text" 
              class="form-control" 
              id="validationCustomUsername" 
              aria-describedby="inputGroupPrepend" 
              required
            >
            <div class="invalid-feedback">
              Vui lòng nhập họ và tên
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <label for="validationCustom05" class="form-label">Ngày Sinh</label>
          <input name="ngaySinh" type="date" class="form-control" id="validationCustom05" required>
          <div class="invalid-feedback">
            Vui lòng chọn ngày sinh
          </div>
        </div>
        <div class="col-md-3">
          <label for="validationCustom04" class="form-label">Giới Tính</label>
          <select name="gioiTinh" class="form-select" id="validationCustom04" required>
            <option selected disabled value="">-- Chọn giới tính --</option>
            <option value="Nam">Nam</option>
            <option value="Nữ">Nữ</option>
          </select>
          <div class="invalid-feedback">
            Vui lòng chọn giới tính
          </div>
        </div>
        
        <div class="col-md-8">
          <label for="validationCustom03" class="form-label">Địa Chỉ</label>
          <input name="diaChi" type="text" class="form-control" id="validationCustom03" required>
          <div class="invalid-feedback">
            Vui lòng nhập địa chỉ của bạn
          </div>
        </div>
        <div class="col-md-4">
          <label for="formFile" class="form-label">Avatar Của Bạn</label>
          <input name="avatar" class="form-control" type="file" id="formFile">
        </div>
        <div class="col-12">
          <button class="btn btn-primary" type="submit">Xác Nhận Thông Tin</button>
        </div>
        <div class="col-12">
          <a href="?url=dangnhap" class="btn btn-secondary">Quay Lại Trang Đăng Nhập</a>
        </div>
      </form>
    </div>

    <script src="<?php echo JS_URL ?>main.js"></script>
    <script src="<?php echo JS_URL ?>thongtindangky.js"></script>
</body>

</html>