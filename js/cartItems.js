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