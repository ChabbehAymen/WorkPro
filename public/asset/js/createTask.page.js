const quill = new Quill('#editor', {
    modules: {
        toolbar: [
            [{ header: [1, 2, false] }],
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
