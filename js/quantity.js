$(document).ready(function() {
    $(".itemQuantity").on('change', function() {
        var $element = $(this).closest('tr');
        var product_id = $element.find('.product_id').val();
        var product_price = $element.find('.product_price').val();
        var itemQuantity = $element.find('.itemQuantity').val();
        location.reload(true);
        $.ajax({ url: 'action/action.php', method: 'post', catch: false,
            data: {product_id:product_id,product_price:product_price,itemQuantity:itemQuantity},
            success: function (response){
                console.log(response)
            }
        })
    })
})