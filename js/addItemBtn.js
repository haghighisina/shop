$(document).ready(function() {
$(".addItemBtn").click(function(e) {
    e.preventDefault();
    var $form = $(this).closest(".form-submit");
    var productId = $form.find(".productId").val();
    var productName = $form.find(".productName").val();
    var productPrice = $form.find(".productPrice").val();
    var productImage = $form.find(".productImage").val();
    var productCode = $form.find(".productCode").val();
    $.ajax({
        url: 'action/action.php',
        method: 'post',
        data: {productId: productId, productName: productName, productPrice: productPrice, productImage: productImage, productCode: productCode},
        success:function(result) {
            $("#message").html(result);
            cartItems();
        }
    });
});
    cartItems();

    function cartItems() {
        $.ajax({
            url: 'action/action.php',
            method: 'get',
            data: {cartItem: "cart_item"},
            success: function(response) {
                $("#cart-item").html(response);
            }
        });
    }
});