$(document).ready(function (){
    $("#placeOrder").submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: 'action/action.php',
            method: 'post',
            data: $('form').serialize() + "&action=order",
            success: function(response) {
                $("#order").html(response);
            }
        });
    });
})