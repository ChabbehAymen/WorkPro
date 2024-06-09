const quill = new Quill('#editor', {
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
        ]
    },
    placeholder: 'Compose an epic...',
    theme: 'snow', // or 'bubble'
});

$('form .submit-btn').on( 'click',function (event) {
    $('input[name=description]').val(quill.getSemanticHTML())
    $('form').submit()
})

$('input[type="file"]').on('change', event =>{
    let reader = new FileReader();
  reader.onload = function (e) {
    document.querySelector(
      ".img-placeholder"
    ).style.backgroundImage = `url(${e.target.result})`;
  };
  reader.readAsDataURL(event.target.files[0])
})
