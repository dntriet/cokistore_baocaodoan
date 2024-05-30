 const options = {
            Toolbar: {
                display: {
                    left: ["infobar"],
                    middle: [
                        "zoomIn",
                        "zoomOut",
                        "toggle1to1",
                        "rotateCCW",
                        "rotateCW",
                        "flipX",
                        "flipY",
                    ],
                    right: ["slideshow", "thumbs", "close"],
                },
            },
        };

    Fancybox.bind('[data-fancybox]', options, {
        l10n:{
            close:"Đóng",
            NEXT:"Đăng đẹp trai",
            PREV:"Đăng đẹp trai"
        },
        infinite:false,
        keyboard:{
            Escape: "close",
            Delete: "close",
            Backspace: "close",
            PageUp: "next",
            PageDown: "prev",
            ArrowUp: "prev",
            ArrowDown: "next",
            ArrowRight: "next",
            ArrowLeft: "prev",
        },
        // on:{
        //     ready:(fancybox)=>{
        //         console.log(`fancybox #${fancybox.id} is ready!`);
        //     }
        // },
        // caption:function(fancybox,carousel,slide){

        // },
        

    });    