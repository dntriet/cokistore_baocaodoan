// Hàm hiện sản phẩm theo danh mục
$(document).on("click",".head_cate*", function(){
    $(".product-list-product").empty();
        var idCate = $(this).find("p").attr("id_cate");
        
        $.ajax({
        url: "../database/addProduct.php",
        type: "POST",
        data: {
            category: idCate,
            action: 'showP',
        },
        success: function (respond) {
            $(".product-list-product").append(respond);
        },
    });
    $(".loadmore").remove();
})

// ---------------------------------------------------------------------------------------------------
// Hàm hiện tất cả sản phẩm và load sản phẩm
var flag_load = 0;
if (flag_load == 0) loadMore_AllP(flag_load);

function loadMore_AllP(start) {
    // $(".product-list-product").empty();
    $.ajax({
        url: "../database/addProduct.php",
        type: "POST",
        data: {
            action: 'showAllP',
            start: start // thêm
        },
        success: function (respond) {
            $(".product-list-product").append(respond);
            // flag_load += 6; //thêm
        },
    });
}

$(document).ready(function(){
    // $(window).scroll(function(){
    //     if($(window).scrollTop() >= $(document).height() - $(window).height()){
    //         loadMore_AllP(flag_load);
    //     }
        
    // });
    $(".loadmore").click(function(){
        flag_load += 6;
        loadMore_AllP(flag_load);
    });
});

// ----------------------------------------------------------------------------------------------------
// Hàm tìm kiếm sản phẩm
$(document).on("click", ".btn_search", function(){
    $(".product-list-product").empty();
    var search = $(".header-my-input").val();
    
    $.ajax({
    url: "../database/addProduct.php",
    type: "POST",
    data: {
        value: search,
        action: 'search'
    },
    success: function (respond) {
        $(".product-list-product").append(respond);
    },
    });
    $(".loadmore").remove();
})

// Hàm chọn sản phẩm để thêm product_detail
$(document).on("click", ".product-item img*", function(){
    var nameP = $(this).parent().parent().find(".product-name").text();
    localStorage.setItem("nameProductDetail", nameP);
    window.location.href="../include/product_detail.php";
})
