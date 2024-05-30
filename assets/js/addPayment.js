
$(document).ready(function(){
    function showPaymentSuccess() {
       var  notification = $('.notification');
            notification.html("<h3>Thanh toán thành công!</h3>");
            notification.addClass("slide-in");     
            notification.css("slide","0");
            setTimeout(function() {
                notification.fadeOut().slow(1000);
                }, 3000);
    }
    $(".payment_body-detai--Product").empty();
    $.ajax({
        url: "../database/addPayment.php",
        method: 'POST',
        data: {
            action: 'showProduct',
        },
        success: function (respond) {
            $(".payment_body-detai--Product").html(respond);
        },
    })

    $("#btn-payment_info").click(function(){
        var namekh = $("#kh_ten").val();
        var sdtkh = $("#kh_dienthoai").val();
        var emailkh = $("#kh_email").val();
        var addresskh = $("#kh_diachi").val();
        var notekh = $("#kh_note").val();
        var methodkh = $("input[name='method']:checked").val();
        var qntP = $(".payment_body-cart-qnt").text();
        var totalMoneyP = $(".payment__detail-total").text(); 
        
        $.ajax({
            url: "../database/addPayment.php",
            method: 'POST',
            data: {
                namekh: namekh,
                sdtkh: sdtkh,
                emailkh: emailkh,
                addresskh: addresskh,
                notekh: notekh,
                methodkh: methodkh,
                qntP: qntP,
                totalMoneyP: totalMoneyP,
                action: 'addProduct',
            },
            success: function (respond) {
                showPaymentSuccess(respond);
                setTimeout(function(){
                    window.location.href="../include/product.php";
                },3000)
            },
        })
    })
})

