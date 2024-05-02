const popup = $('#createProjectPopup');

$('#create-btn').click(event =>{
    showCreateProjectPopup()
})
$('#create-icon').click(event=>{
    showCreateProjectPopup()
})
$('#cancel-popup').click(event=>{
    hideCreateProjectPopup()
})


function showCreateProjectPopup() {
    popup.animate({'margin-top':'8rem'});
}

function hideCreateProjectPopup() {
    popup.animate({'margin-top':'-30rem'}, 'slow');
}
