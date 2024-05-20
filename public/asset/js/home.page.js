const popup = $('#createProjectPopup');
$('#create-icon').click(event=>{
    showCreateProjectPopup()
})

$('#create-btn').click(event=>{
    showCreateProjectPopup()
})
$('#cancel-popup').click(event=>{
    hideCreateProjectPopup()
})

$('input').on('input', event =>{
    const projectsCards = $('.project-card');
    const inputValue = event.target.value.toLowerCase();
    projectsCards.each(function() {
        const cardTitle = $(this).find('h1').text().toLowerCase();
        if (cardTitle.includes(inputValue)) {
            $(this).css('display', 'block');
        } else {
            $(this).css('display', 'none');
        }
    });
});

function showCreateProjectPopup() {
    popup.animate({'margin-top':'8rem'});
}

function hideCreateProjectPopup() {
    popup.animate({'margin-top':'-30rem'}, 'slow');
}
