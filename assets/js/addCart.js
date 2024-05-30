// Hàm cập nhập tiền
function calTotal(){
    var inf = $(".cart_container-detail").find(".cart-detail_item")
    var total = 0;
    inf.each(function(){
        total += Number($(this).find("#cart__price-total span").text());
    })
    $(".cart_container-payment").find("#subtotal_money").html(total);
}

// Hàm cập nhập số lượng
function qntTotal(){
    var inf = $(".cart_container-detail").find(".cart-detail_item")
    var total = 0;
    inf.each(function(){
        total += Number($(this).find("#qnt_Product-cart").val());
    })
    $(".cart-number").html(total);
}

$(document).ready(function(){
    $(".cart_container-detail").empty();
    $.ajax({
        url: "../database/addsession_myCart.php",
        type: "POST",
        data: {
        action: 'showCart',
        },
        success: function (respond) {
            $(".cart_container").html(respond);
        },
    })
})

// nút cập nhập
$(document).on("click", ".fa-solid", function(){
    var idsp = $(this).parent().parent().find("#productID").val();
    var qntsp = $(this).parent().parent().find("#qnt_Product-cart").val();
    var namesp = $(this).parent().parent().parent().find("#cart-content__title").text();
    if(qntsp <=0 ){
        $(this).parent().parent().find("#qnt_Product-cart").val(1);
    }else{
        $.ajax({
            url: "../database/Up_De_myCart.php",
            type: "POST",
            data: {
                idsp: idsp,
                qntsp: qntsp,
                namesp: namesp,
                action: 'UpdateQnt',
            },
        })
        var price = $(this).parent().parent().parent().find(".price_sales").text();
        $(this).parent().parent().parent().find("#cart__price-total").find("#totalMoney").html(Number(price)*qntsp);
        calTotal();
        qntTotal();
        location.reload();
    }
})

// tự cập nhập
$(document).on("change","#qnt_Product-cart", function(){
    var idsp = $(this).parent().parent().find("#productID").val();
    var qntsp = $(this).val();
    var namesp = $(this).parent().parent().find("#cart-content__title").text();
    if(qntsp <= 0){
        $(this).val(1);
    }else{
        $.ajax({
            url: "../database/Up_De_myCart.php",
            type: "POST",
            data: {
                idsp: idsp,
                qntsp: qntsp,
                namesp: namesp,
                action: 'UpdateQnt',
            },
        })
        var price = $(this).parent().parent().find(".price_sales").text();
        $(this).parent().parent().find("#cart__price-total").find("#totalMoney").html(Number(price)*qntsp);
        calTotal();
        qntTotal();
        // location.reload();
    }
})

// nút xóa
$(document).on("click", ".cart-detail_del", function(){
    var idsp = $(this).parent().parent().find("#productID").val();
    $.ajax({
        url: "../database/Up_De_myCart.php",
        type: "POST",
        data: {
            productId: idsp,
            action: 'DeleteCart',
        },
    })

    $(this).parent().parent().remove();
    calTotal();
    qntTotal();
    // location.reload();
})

// Thanh toán
$(document).on("click", ".cart-btn_checkout", function(){
    window.location.href = "../include/payment.php";
})


