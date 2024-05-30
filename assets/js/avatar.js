$(document).ready(function(){
    var nameUser = localStorage.getItem('nameUser');
    var emailUser = localStorage.getItem('email');

    $(".profile-usertitle-name").html(nameUser);

    $("button").click(function(){
        window.location.href="product.php";
    })
    
    $('.profile_link').on('click', function () {
        $('.profile-content').show();
        $('.bill-content').hide();
        $('.bill_link').parent("li").removeClass('active');
        $(this).parent("li").addClass('active');
        
        $('.tbl-mybill').empty();
        $('.profile-content').empty();


        $.ajax({
            url: "../database/addavatar.php",
            type: "POST",
            data: {
                action: 'myProfile',
                name: nameUser,
                email: emailUser, 
            },
            success: function(respond) {
                $(".profile-content").append(respond);
            },
        });
    });
    // Ham xuat cac hoa don
    $('.bill_link').on('click', function () {
        $('.profile-content').hide();
        $('.bill-content').show();
        $('.profile_link').parent("li").removeClass('active');
        $(this).parent("li").addClass('active');

        $('.tbl-mybill').empty();
        $(".mydetail_Bill").empty();
        $('.profile-content').empty();

        var str=`<tr>
                    <th>STT</th>
                    <th>Ngày mua hàng</th>
                    <th>Số lượng mua</th>
                    <th>Tổng tiền</th>
                    <th></th>
                </tr>`;
        $('.tbl-mybill').prepend(str)

        $.ajax({
            url: "../database/addavatar.php",
            type: "POST",
            data: {
                action: 'myBill',
                name: nameUser,
                email: emailUser,
            },
            success: function(respond) {
                $(".tbl-mybill").append(respond);
            },
        });
    });

    // Ham xuat don chi tiet
    $(document).on("click", ".btn_detailBill",function(){
        var dateBill = $(this).parent().parent().find(".datelBill").text();
        $(".mydetail_Bill").empty();
        var str=`<caption style="text-align: center;">Chi tiết đơn hàng</caption>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng mua</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                </tr>`;

        $('.mydetail_Bill').prepend(str)
        $.ajax({
            url: "../database/addavatar.php",
            type: "POST",
            data: {
                action: 'mydetailBill',
                date: dateBill,
            },
            success: function(respond) {
                $(".mydetail_Bill").append(respond);
            },
        });

        $('tr').removeClass('tbl-mybill_td');
        $(this).parent().parent().closest("tr").addClass('tbl-mybill_td');
        // alert(dateBill);
    })

// Chinh sua
    $(document).on("click", ".profile_change", function(){
        var linkText = $(this).text();
        if (linkText === "Chỉnh sửa") {
            $(this).text("Dừng chỉnh sửa").css("color", "red");
            $('#name').prop('disabled', false);
            $('#email').prop('disabled', false);
            $('#phone').prop('disabled', false);
        // Thực hiện hành động khi chế độ chỉnh sửa được kích hoạt
        } else {
            $(this).text("Chỉnh sửa").css("color", "#4267B2");
            $('#name').prop('disabled', true);
            $('#email').prop('disabled', true);
            $('#phone').prop('disabled', true);
        // Thực hiện hành động khi chế độ chỉnh sửa bị dừng
        }
    })

    // Cap nhap
    $(document).on("click", ".btnUpdate", function(){
        var name = $(this).parent().find("#name").val();
        var email = $(this).parent().find("#email").val();
        var phone = $(this).parent().find("#phone").val();

        var avatar = $(this).parent().find("#avatar").val().substring(12);
        if(avatar == ''){
            var avatar_N = $(".profile-userpic").find("img").attr("src").substring(14);
            localStorage.setItem("avatar", avatar_N);
        }
        else{
            localStorage.setItem("avatar", avatar);
            $(".profile-userpic").find("img").attr("src", `../assets/img/${avatar}`);
        }

        $.ajax({
            url: "../database/addavatar.php",
            type: "POST",
            data: {
                action: 'changeInfo',
                name: name,
                email: email,
                phone: phone,
                name_Old: nameUser,
                email_Old: emailUser,
            },
            success: function() {
                $(".simple-form").append(`<div style="text-align: center; color: #f25f25; margin-top: 10px; font-weight: bold;"><i>Cập nhật thành công!</i></div>`);
            },
        });

        $('#name').prop('disabled', true);
        $('#email').prop('disabled', true);
        $('#phone').prop('disabled', true);
        
        window.location.href = "../database/logout.db.php";
    })

    // Doi mat khau
    $(".change_pwd_container").hide();
    $(document).on("click", ".profile_pass", function(){
        var linkText = $(this).text();
        if (linkText === "Đổi mật khẩu") {
            linkText = $(this).text("Quay lại")
            $(this).css("color", "red");
            $('#name').prop('disabled', true);
            $('#email').prop('disabled', true);
            $('#phone').prop('disabled', true);
            $(".change_pwd_container").show();
        }
        if(linkText === "Quay lại"){
            linkText = $(this).text("Đổi mật khẩu")
            $(this).css("color", "#4267B2");
            $('#name').prop('disabled', true);
            $('#email').prop('disabled', true);
            $('#phone').prop('disabled', true);
            $(".change_pwd_container").hide();
        }
        
    })

    $(".change_pwd").click(function(){
        var name = $(".btnUpdate").parent().find("#name").val();
        var email = $(".btnUpdate").parent().find("#email").val();

        var O_pass = $(this).parent().find("#passO").val();
        var N_pass = $(this).parent().find("#passN").val();
        $.ajax({
            url: "../database/addavatar.php",
            type: "POST",
            data: {
                action: 'changePassord',
                old_password: O_pass,
                change_pwd: N_pass,
                name: name,
                email: email,
            },
            success: function(respond) {
                $(".change_pwd_form").append(respond);
            },
        });
        window.location.href = "../database/logout.db.php";
    })

})