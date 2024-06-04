let endabled = false;
const titleInput = $('input[name=title]');
const defaultTitle = titleInput.val().replace(/ /g,'')
const defultDescription = $('input[name=description]').val().replace(/ /g,'')
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

quill.on('text-change', (delta)=>{
    if(quill.getSemanticHTML().replace(/ /g,'') !== defultDescription )
        $('button').css('display', 'block')
    else $('button').css('display', 'none')
    $('input[name=description]').val(quill.getSemanticHTML())
})
titleInput.on('input', function(){
    if($(this).val() !== defaultTitle) 
        $('button').css('display', 'block');
    else 
        $('button').css('display', 'none');
});


$('i').click(event =>{
    if (endabled) disableEditor()
    else endablEditor()
    endabled = !endabled
})

function endablEditor(){
    titleInput.prop('disabled', false)
    $('.ql-toolbar').css('display', 'block')
    quill.enable()
}

function disableEditor(){
    titleInput.prop('disabled', true)
    $('.ql-toolbar').css('display', 'none')
    quill.enable(false)
}