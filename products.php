<?php require_once __DIR__.'/function/cart.php';
$products = getProduct();
?>
<div class="row mt-5 pb-5">
    <?php foreach ($products as $product):;?>
    <div class="col-lg-3">
        <div class="card-deck">
            <div class="card p-2 border-secondary mb-2">
                <img class="img-fluid card-img-top" src="<?= $product['product_image'];?>">
                <div class="card-body p-1">
                    <h5 class="card-title text-center text-info"><?= $product['product_name']; ?></h5>
                    <h5 class="card-text text-center text-secondary">
                        <i class="fas fa-dollar-sign text-danger"></i>
                        <?= number_format($product['product_price'],2) ;?>
                    </h5>
                </div>
                <div class="card-footer p-2">
                    <form action="" class="form-submit">
                        <input type="hidden" class="productId" value="<?= $product['id'];?>">
                        <input type="hidden" class="productName" value="<?= $product['product_name'];?>">
                        <input type="hidden" class="productPrice" value="<?= $product['product_price'];?>">
                        <input type="hidden" class="productImage" value="<?= $product['product_image'];?>">
                        <input type="hidden" class="productCode" value="<?= $product['product_code'];?>">
                       <button class="btn btn-block btn-info addItemBtn">
                            <i class="fas fa-shopping-basket"> &nbsp; Add To Cart </i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach;?>
</div>

