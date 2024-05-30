// Thêm vào session giỏ hàng
$(document).on("click", "#btnATC", function(){
    var idsp = $(this).parent().find("#productID").val();
    var qntsp = $(this).parent().find("#productQnt").val();
    var namesp = $(this).parent().find("#productName").val();

    if(qntsp <=0 ){
        $(this).parent().find("#productQnt").val(1);
    }
    else{
        $.ajax({
            url: "../database/addsession_myCart.php",
            type: "POST",
            data: {
                idsp: idsp,
                qntsp: qntsp,
                namesp: namesp,
                action: 'addSession',
            },
            success: function (respond) {
                $(".cart-number").html(respond);
            },
        })
    }
})