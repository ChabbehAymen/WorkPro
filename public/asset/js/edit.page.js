let endabled = false;
const titleInput = $("input[name=title]");
const defaultTitle = titleInput.val().replace(/ /g, "");
const defultDescription = $("input[name=description]").val().replace(/ /g, "");
const quill = new Quill("#editor", {
    modules: {
        toolbar: [
            ["bold", "italic", "underline", "strike"], // toggled buttons
            ["blockquote", "code-block"],
            ["link", "image", "formula"],

            [{ header: 1 }, { header: 2 }], // custom button values
            [{ list: "ordered" }, { list: "bullet" }, { list: "check" }],
            [{ script: "sub" }, { script: "super" }], // superscript/subscript
            [{ indent: "-1" }, { indent: "+1" }], // outdent/indent
            [{ direction: "rtl" }], // text direction

            [{ size: ["small", false, "large", "huge"] }], // custom dropdown
            [{ header: [1, 2, 3, 4, 5, 6, false] }],

            [{ color: [] }, { background: [] }], // dropdown with defaults from theme
            [{ font: [] }],
            [{ align: [] }],

            ["clean"],
        ],
    },
    theme: "snow", // or 'bubble'
});
quill.clipboard.dangerouslyPasteHTML($("input[name=description]").val())
quill.disable();

quill.on("text-change", (delta) => {
    $("input[name=description]").val(quill.getSemanticHTML());
});
titleInput.on("input", function () {
    if ($(this).val() !== defaultTitle) $("button").css("display", "block");
    else $("button").css("display", "none");
});

$(".edit-pen").click((event) => {
    if (endabled) disableEditor();
    else endablEditor();
    endabled = !endabled;
});

function endablEditor() {
    titleInput.prop("disabled", false);
    $(".ql-toolbar").css("pointer-events", "all");
    quill.enable();
    $("button").css("display", "block");
    $('.edit-pen').addClass('fa-x').removeClass('fa-pen');
}

function disableEditor() {
    titleInput.prop("disabled", true);
    $(".ql-toolbar").css("pointer-events", "none");
    quill.disable();
    $("button").css("display", "none");
    $('.edit-pen').addClass('fa-pen').removeClass('fa-x');
}
