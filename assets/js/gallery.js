$(function () {
    //Ambrosia Landscape
    $("#slides1").slidesjs({
        width: 450,
        height: 300,
        pagination: {
            active: false
        },
        play: {
            effect: "fade",
            // [string] Can be either "slide" or "fade".
            interval: 5000,
            // [number] Time spent on each slide in milliseconds.
            auto: true,
            // [boolean] Start playing the slideshow on load.
            pauseOnHover: true,
            // [boolean] pause a playing slideshow on hover
        },
        effect: {
            fade: {
                speed: 3000,
                // [number] Speed in milliseconds of the fade animation.
                crossfade: true
                // [boolean] Cross-fade the transition.
            }
        }
    });
});