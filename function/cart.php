<?php
/** @noinspection ALL */
function getProduct():array{
    $sql = "SELECT * FROM product";
    $result = getDb()->prepare($sql);
    if (!$result){
        return [];
    }
    $result->execute();
    $products = [];
    while ($row = $result->fetch()){
        $products[] = $row;
    }
   return $products;
}
function getProductInCart():array{
    $sql = "SELECT * FROM cart";
    $result = getDb()->prepare($sql);
    if (!$result){
        return [];
    }
    $result->execute();
    $products = [];
    while ($row = $result->fetch()){
        $products[] = $row;
    }
    return $products;
}
function countProductsInCart():int{
    $sql = "SELECT COUNT(id) FROM cart";
    $cartResult = getDb()->prepare($sql);
    if (false === $cartResult){
        return 0;
    }
    $cartResult->execute();
    $cartItems = $cartResult->fetchColumn();
    return $cartItems;
}
function ifProductExist(string $productCode):string{
    $sql = "SELECT product_code FROM cart WHERE product_code= :productCode";
    $cartResult = getDb()->prepare($sql);
    if (false === $cartResult) {
        return 0;
    }
    $data = [':productCode' => $productCode];
    $cartResult->execute($data);
    $cartItems = $cartResult->fetchColumn();
    return $cartItems;
}

function insertDataIntoCart(string $productName,string $productPrice,string $productImage,int $productQuantity,string $totalPrice,string $productCode){
    $sql = "INSERT INTO cart SET
            product_name= :productName,
            product_price= :productPrice,
            product_image= :productImage,
            quantity= :productQuantity,
            total_price= :totalPrice,
            product_code= :productCode";

    $statement = getDb()->prepare($sql);
    $data = [
        ':productName' => $productName,
        ':productPrice' => $productPrice,
        ':productImage' => $productImage,
        ':productQuantity' => $productQuantity,
        ':totalPrice' => $productPrice,
        ':productCode' => $productCode
    ];
    $statement->execute($data);
}
function deleteItemFromCart(int $product):int{
    $sql = "DELETE FROM cart WHERE id= :ProductId";
    $statement = getDb()->prepare($sql);
    if ($statement === false){return 0;}
    return (int)$statement->execute([':ProductId' => $product]);
}
function clearAllItemInCart(){
    $sql = "DELETE FROM cart";
    $statement = getDb()->prepare($sql);
    $statement->execute();
}
function updateCartItemQuantity(int $quantity, int $total_price, int $product_id):int{
    $sql = "UPDATE cart SET quantity= :Quantity, total_price= :totalPrice WHERE id= :ID";
    $statement = getDb()->prepare($sql);
    $data = [
        ':Quantity'=>$quantity,
        ':totalPrice'=>$total_price,
        ':ID'=>$product_id
    ];
   return $statement->execute($data);
}
function calculateAllProductsInCart(){
    $grand_total = 0;
    $sql = "SELECT CONCAT(product_name, '(',quantity,')') AS item_quantity, total_price FROM cart";
    $statement = getDb()->prepare($sql);
    $statement->execute();
    while ($row = $statement->fetch()){
        $grand_total += $row['total_price'];
        $item[] = $row['item_quantity'];
    }
    return array('price'=>$grand_total,'item'=>$item);
}
function orderPayment(string $name,string $email, string $phone,string $address,string $payment,string $products, string $totalPrice){
    $sql = "INSERT INTO orders SET
            name= :Name,
            email= :Email,
            phone= :Phone,
            address= :Address,
            payment_mode= :Payment,
            products= :Products,
            amount_paid= :Amount";
    $statement = getDb()->prepare($sql);
    $data = [
        ':Name' => $name,
        ':Email' => $email,
        ':Phone' => $phone,
        ':Address' => $address,
        ':Payment' => $payment,
        ':Products' => $products,
        ':Amount' => $totalPrice
    ];
    $statement->execute($data);
}













