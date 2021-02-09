<?php
require_once __DIR__.'/includes.php';
require_once __DIR__.'/function/cart.php';
$allItems = '';
$total_price = calculateAllProductsInCart();
$allItems = implode(' - ', $total_price['item']);?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 px-4 pb-4" id="order">
            <h4 class="text-center text-info p-2">Order</h4>
            <div class="jumbotron p-3 mb-2 text-center">
                <h6 class="lead"><b>Product : </b><?= $allItems;?></h6>
                <h6 class="lead"><b>Delivery : </b>Free</h6>
                <h5><b>Amount : </b><?= number_format($total_price['price'],2);?></h5>
            </div>
            <form action="" type="post" id="placeOrder">
                <input type="hidden" name="product" value="<?= $allItems;?>">
                <input type="hidden" name="total_price" value="<?= $total_price['price'];?>">
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Your Name" required>
               </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Your Email" required>
                </div>
                <div class="form-group">
                    <input type="tel" name="phone" class="form-control" placeholder="Your Phone" required>
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="address" rows="3" cols="10" placeholder="Your Address"></textarea>
                </div>
                <h6>Select the Payment</h6>
                <div class="form-group">
                    <select name="payment" class="form-control">
                        <option value="" selected disabled>Payment Options</option>
                        <option value="cod">Cash</option>
                        <option value="bank" selected>Bank</option>
                        <option value="card" selected>Credit Card</option>
                    </select>
                </div>
                <div class="form-group">
                    <input class="btn btn-danger btn-block" type="submit" name="submit" value="Order">
                </div>
            </form>
        </div>
    </div>
</div>
<?php require_once __DIR__.'/template/footer.php';?>