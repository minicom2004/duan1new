<!-- BODY -->
<div class="body">
    <div class="grid wide">
        <h1>Tất cả sản phẩm <span class="badge bg-danger"><?php echo count($products)?></span></h1>
        <div class="products grid">
            <div class="row">
                <?php 
                    $soCot = "l-2-4"; 
                    include VIEWS_URL . "products/index.php"
                ?>                        
            </div>
        </div>
    </div>
    
</div>