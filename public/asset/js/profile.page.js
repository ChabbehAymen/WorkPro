const imgs = [
    "https://plus.unsplash.com/premium_photo-1661952337889-92146d184459?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8Y29sb3JzfGVufDB8fDB8fHww",
    "https://images.unsplash.com/photo-1506792006437-256b665541e2?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTJ8fGNvbG9yc3xlbnwwfHwwfHx8MA%3D%3D",
    "https://images.unsplash.com/photo-1572040917409-60ca0cfcc2df?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTF8fGNvbG9yc3xlbnwwfHwwfHx8MA%3D%3D",
    "https://images.unsplash.com/photo-1508898578281-774ac4893c0c?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTh8fGNvbG9yc3xlbnwwfHwwfHx8MA%3D%3D",
    "https://images.unsplash.com/photo-1680703672498-9dcb76812132?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxjb2xsZWN0aW9uLXBhZ2V8MXw3ZzRtVzMtQm9ab3x8ZW58MHx8fHx8",
    "https://images.unsplash.com/photo-1673511779093-ac44fdd25a9f?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxjb2xsZWN0aW9uLXBhZ2V8Mnw3ZzRtVzMtQm9ab3x8ZW58MHx8fHx8",
    "https://images.unsplash.com/photo-1673501040719-6cad2ab79c2e?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxjb2xsZWN0aW9uLXBhZ2V8NHw3ZzRtVzMtQm9ab3x8ZW58MHx8fHx8",
    "https://plus.unsplash.com/premium_photo-1674168840647-f2000b1aeedd?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHx0b3BpYy1mZWVkfDI4fGlVSXNuVnRqQjBZfHxlbnwwfHx8fHw%3D",
    "https://images.unsplash.com/photo-1613843873231-1447db182f97?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHx0b3BpYy1mZWVkfDM1fGlVSXNuVnRqQjBZfHxlbnwwfHx8fHw%3D",
    "https://images.unsplash.com/photo-1685158174480-56e283f51ab3?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxjb2xsZWN0aW9uLXBhZ2V8NXw3ZzRtVzMtQm9ab3x8ZW58MHx8fHx8",
];
const editForm = $("form");
const initUserName = $("input[name=user_name]")
    .val()
    .toLocaleLowerCase()
    .replace(/ /g, "");
let isUserNameValid = false;
let onEditPassword = false;
$(".profile-bg").css(
    "background-image",
    `url(${imgs[Math.floor(Math.random() * imgs.length)]})`
);
$(".profile-bg button").click(function (e) {
    $(editForm).animate({ top: "20vh" });
});
$("#cancel-btn").click(function (e) {
    $(editForm).animate({ top: "-100vh" });
});
$(".edit-password").click(function (e) {
    if (!onEditPassword) {
        $("input[name=password]").val('');
        $(".edit-password-input").css("display", "block");
        $(".edit-password").text("cancel");
        onEditPassword = !onEditPassword;
    } else {
        $("input[name=password]").val('******');
        $(".edit-password-input").css("display", "none");
        $(".edit-password").text("edit password");
        onEditPassword = !onEditPassword;
    }
});

$("input[name=old_password]").on("input", function (e) {
    if ($(this).val().length > 0) {
        $("form button").attr("disabled", false);
    } else if (
        onEditPassword &&
        $(this).val().length > 0 &&
        $("input[name=password]").val().length > 0
    ) {
        $("form button").attr("disabled", false);
    } else {
        $("form button").attr("disabled", true);
    }
});

$("input[name=password]").on("input", function (e) {
    if (
        onEditPassword &&
        $(this).val().length > 0 &&
        $("input[name=old_password]").val().length > 0
    ) {
        $("form button").attr("disabled", false);
    } else {
        $("form button").attr("disabled", true);
    }
});

$('input[type="file"]').on('change', event =>{
    let reader = new FileReader();
  reader.onload = function (e) {
    document.querySelector(
      ".img-placeholder"
    ).style.backgroundImage = `url(${e.target.result})`;
  };
  reader.readAsDataURL(event.target.files[0])
})
