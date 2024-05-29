const quill = new Quill('#editor', {
    modules: {
        toolbar: [
            [{ header: [2, 3,4, false] }],
            ['bold', 'italic', 'underline'],
            ['blockquote','code-block'],
        ],
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
