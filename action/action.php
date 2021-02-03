<?php
require_once __DIR__.'/../function/database.php';
require_once __DIR__.'/../function/cart.php';
if (isset($_POST['productId'])){
    $productId = filter_input(INPUT_POST,'productId',FILTER_SANITIZE_SPECIAL_CHARS);
    $productName = filter_input(INPUT_POST,'productName',FILTER_SANITIZE_SPECIAL_CHARS);
    $productPrice = filter_input(INPUT_POST,'productPrice',FILTER_SANITIZE_SPECIAL_CHARS);
    $productImage = filter_input(INPUT_POST,'productImage',FILTER_SANITIZE_SPECIAL_CHARS);
    $productCode = filter_input(INPUT_POST,'productCode',FILTER_SANITIZE_SPECIAL_CHARS);
    $productQuantity = 1;
    $totalPrice = $productPrice * $productQuantity;

    $cartItems = ifProductExist($productCode);

    if (!$cartItems){
        insertDataIntoCart($productName,$productPrice,$productImage,$productQuantity,$totalPrice,$productCode);
        echo '<div class="alert alert-success alert-dismissible mt-2">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>Item added to your cart!</strong>
			 </div>';
    }else{
        echo '<div class="alert alert-danger alert-dismissible mt-2">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>Item already added to your cart!</strong>
              </div>';
    }
}
?>
