let endabled = false;
const quill = new Quill('#editor', {
    modules: {
        toolbar: [
            [{ header: [2, 3,4, false] }],
            ['bold', 'italic', 'underline'],
            ['blockquote','code-block'],
        ],
    },
    theme: 'snow', // or 'bubble'
});
quill.root.innerHTML =  $('input[name=description]').val()
quill.disable()

$('i').click(event =>{
    if (endabled) disableEditor()
    else endablEditor()
    endabled = !endabled
})

function endablEditor(){
    $('input[name=title]').prop('disabled', false)
    $('.ql-toolbar').css('display', 'block')
    quill.enable()
}

function disableEditor(){
    $('input[name=title]').prop('disabled', true)
    $('.ql-toolbar').css('display', 'none')
    quill.enable(false)
}