<?php session_start();
require_once __DIR__ .'/includes.php';
require_once __DIR__ .'/function/cart.php';
$products = getProductInCart();
$total_price = 0;
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div style="display:<?php if (isset($_SESSION['showAlert'])){
                echo $_SESSION['showAlert'];}else{echo 'none';} unset($_SESSION['showAlert']); ?>"
                 class="alert alert-success alert-dismissible mt-3">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong><?php if (isset($_SESSION['message'])){echo $_SESSION['message'];} unset($_SESSION['showAlert']); ?></strong>
            </div>
            <div class="table-responsive mt-5">
                <table class="table table-bordered table-striped text-center">
                   <thead>
                   <tr>
                       <td colspan="7">
                           <h5 class="text-center text-info m-0">All The Products In Cart</h5>
                       </td>
                   </tr>
                   <tr>
                       <th>Id</th><th>Name</th><th>Image</th><th>Price</th><th>Quantity</th><th>Price</th>
                       <th>
                           <a href="action/action.php?clear=all" class="badge badge-danger p-1"
                              onclick="return confirm('Are you sure?')">
                               <i class="fas fa-trash"></i>&nbsp; Clear The Cart
                           </a>
                       </th>
                   </tr>
                   </thead>
                    <tbody>
                    <?php foreach ($products as $product):;?>
                        <tr>
                            <td><?= $product['id'];?></td>
                            <td><?= $product['product_name'];?></td>
                            <td><img src="<?= $product['product_image'];?>" width="50"></td>
                            <td><i class="fas fa-dollar-sign"></i> <?= $product['product_price'];?></td>
                            <td style="width: 75px;">
                                <input type="number" class="form-control w-100 itemQuantity"
                                value="<?= $product['quantity'];?>">
                            </td>
                            <td><i class="fas fa-dollar-sign"></i> <?= number_format($product['total_price'],2);?></td>
                            <td>
                                <a href="action/action.php?remove=<?= $product['id'];?>"
                                   class="text-danger lead" onclick="return confirm('Are you sure')">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    <?php $total_price += $product['total_price'];?>
                    <?php endforeach;?>
                    <tr>
                        <td colspan="3">
                            <a href="index.php" class="btn btn-success">
                                <i class="fas fa-cart-plus"></i> Go To Home
                            </a>
                        </td>
                        <td colspan="2"><b>Total Price</b></td>
                        <td><i class="fas fa-dollar-sign"></i>
                            <b><?= number_format($total_price,2);?></b>
                        </td>
                        <td>
                            <a href="chekcout.php" class="btn btn-info <?= ($total_price)>1 ? '' : 'disabled';?>">
                                <i class="far fa-credit-card"></i> Credit
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__.'/template/footer.php'; ?>
