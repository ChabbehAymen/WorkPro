
$('document').ready(function () {
    $('document').innerHTML +='<livewire:user-search-box projectId="{{$id}}"></livewire:user-search-box>'
})

const box = $('.searchUsersBox');

$('#invite-btn').click(event =>{
    showCreateProjectPopup()
})
$('#cancel-popup').click(event=>{
    hideCreateProjectPopup()
})


function showCreateProjectPopup() {
    box.animate({'margin-top':'8rem'});
}

function hideCreateProjectPopup() {
    box.animate({'margin-top':'-30rem'}, 'slow');
}
const users = $('.user-row');
const collabors = $('.collabor-row');
for (const user of users) {
    for (const collabor of collabors) {
        console.log(collabor.querySelector('a'));
        if (user.querySelector('h1').innerText.toLowerCase() === collabor.querySelector('h1').innerText.toLowerCase()) {
            user.find('a').css('pointerEvents','none');
            user.find('a').removeClass('bg-black')
            // querySelector('a').style.pointerEvents = 'none';
        }
    }
}
$('.searchUsersBox input').on('input', event =>{

    for (const user of users) {
        let userName = user.querySelector('h1').innerText.toLowerCase();
        if (userName.includes(event.target.value)) user.style.display = ''
        else user.style.display = 'none'

    }
})
