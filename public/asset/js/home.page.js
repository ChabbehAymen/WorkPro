const imgs = [
    'https://plus.unsplash.com/premium_photo-1661952337889-92146d184459?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8Y29sb3JzfGVufDB8fDB8fHww',
    'https://images.unsplash.com/photo-1506792006437-256b665541e2?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTJ8fGNvbG9yc3xlbnwwfHwwfHx8MA%3D%3D',
    'https://images.unsplash.com/photo-1572040917409-60ca0cfcc2df?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTF8fGNvbG9yc3xlbnwwfHwwfHx8MA%3D%3D',
    'https://images.unsplash.com/photo-1508898578281-774ac4893c0c?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTh8fGNvbG9yc3xlbnwwfHwwfHx8MA%3D%3D',
    'https://images.unsplash.com/photo-1680703672498-9dcb76812132?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxjb2xsZWN0aW9uLXBhZ2V8MXw3ZzRtVzMtQm9ab3x8ZW58MHx8fHx8',
    'https://images.unsplash.com/photo-1673511779093-ac44fdd25a9f?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxjb2xsZWN0aW9uLXBhZ2V8Mnw3ZzRtVzMtQm9ab3x8ZW58MHx8fHx8',
    'https://images.unsplash.com/photo-1673501040719-6cad2ab79c2e?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxjb2xsZWN0aW9uLXBhZ2V8NHw3ZzRtVzMtQm9ab3x8ZW58MHx8fHx8',
    'https://plus.unsplash.com/premium_photo-1674168840647-f2000b1aeedd?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHx0b3BpYy1mZWVkfDI4fGlVSXNuVnRqQjBZfHxlbnwwfHx8fHw%3D',
    'https://images.unsplash.com/photo-1613843873231-1447db182f97?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHx0b3BpYy1mZWVkfDM1fGlVSXNuVnRqQjBZfHxlbnwwfHx8fHw%3D',
    'https://images.unsplash.com/photo-1685158174480-56e283f51ab3?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxjb2xsZWN0aW9uLXBhZ2V8NXw3ZzRtVzMtQm9ab3x8ZW58MHx8fHx8'
];
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
$('.project-card > :first-child').each((index, element) =>{
    $(element).css('background-image', `url(${imgs[Math.floor(Math.random()*imgs.length)]})`);
});
