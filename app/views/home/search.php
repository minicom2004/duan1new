<link rel="stylesheet" href="<?php echo CSS_URL ?>search.css">
<!-- BODY -->
<div class="body">
    <div class="grid wide">
        <!-- Điều hướng -->
        <div class="directional" style="margin-bottom: 24px;">
            <a href="?" class="directional-page">Trang chủ</a><span class="directional-icon">></span>
            <a href="#" class="directional-page directional-page--active disabled">Tìm kiếm sản phẩm</a>
        </div>
        <h1>
            Tìm kiếm kết quả cho "<?php echo $keyWord ?>"
            <?php if($products) : ?>
                <span class="badge bg-danger">
                    <?php echo count($products)?>
                </span>
            <?php endif ?>
        </h1>
        <div class="products grid">
            <div class="row">
                <?php 
                    $soCot = "l-2-4"; 
                    include VIEWS_URL . "products/index.php"
                ?>                        
            </div>
        </div>
        <div class="search-emty">
            <?php if(!$products) : ?>
                <img src="<?php echo IMAGES_URL ?>empty/search.svg" alt="" class="search-emty_icon">
                <p class="search-emty_heading">Xin lỗi, chúng tôi không tìm thấy kết quả nào cho "<?php echo $keyWord?>".</p>
                <p>Vui lòng kiểm tra lỗi chính tả hoặc thử tìm kiếm kết quả khác.</p>
            <?php endif ?>
        </div>
    </div>
    
</div>