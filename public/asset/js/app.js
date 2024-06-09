let navOn = false;

$(".nav-bar-menu").click(function (e) {
    if (!navOn) showNavBar();
    else hideNavBar();
    navOn = !navOn;
});

function showNavBar() {
    $(".nav-bar-menu").animate({ "margin-left": "50vw" });
    $(".nav-bar-menu i").animate(
        { rotation: "180" },
        {
            duration: 500,
            step: function (now) {
                $(this).css({ transform: "rotate(" + now + "deg)" });
            },
        }
    );
    $("nav").animate({ "margin-left": "0" });
}
function hideNavBar() {
    $(".nav-bar-menu").animate({ "margin-left": "0" });
    $(".nav-bar-menu i").animate(
        { rotation: "0" },
        {
            duration: 500,
            step: function (now) {
                $(this).css({ transform: "rotate(" + now + "deg)" });
            },
        }
    );
    $("nav").animate({ "margin-left": "-70vw" });
}
