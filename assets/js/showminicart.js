$(document).ready(function(){
    // bỏ hover ở cart trong style.css
    $(".cart").mouseover(function(){
        $(".cart_mini-main").css({"display": "block", "opacity": 0});
        $(".cart_mini-main").animate({"opacity": 1}, 1000);
        $(".cart").css("background-color", "#F8F0DF");
    })

    $(".cart").mouseout(function(){
        $(".cart_mini-main").css({"display": "none"});
        $(".cart").css("background-color", "#FFFFFF"); 
    })

    $(".cart_mini-main").mouseover(function(){
        $(".cart_mini-main").css({"display": "block"});
        $(".cart").css("background-color", "#F8F0DF");
    })

    $(".cart_mini-main").mouseout(function(){
        $(".cart_mini-main").css({"display": "none"});
        $(".cart").css("background-color", "#FFFFFF"); 
    })
})