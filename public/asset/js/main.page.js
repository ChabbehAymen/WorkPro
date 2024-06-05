$('document').ready(function () {
    $('document').innerHTML +='<livewire:user-search-box projectId="{{$id}}"></livewire:user-search-box>'
})

const box = $('.searchUsersBox');
$('#invite-btn').click(event =>{
    showPopup()
})
$('#cancel-search-popup').click(event=>{
    hidPopup()
})


function showPopup() {
    box.animate({'margin-top':'8rem'});
}

function hidPopup() {
    box.animate({'margin-top':'-30rem'}, 'slow');
}
const users = $('.user-row');
const collaborators = $('.collabor-row');
users.each(function (user) {
    const userName = $(this).find('h1').text().toLowerCase();
    collaborators.each(function (collaborator) {
        const collaboratorName = $(this).find('h1').text().toLowerCase();
        if (userName === collaboratorName) $(users[user]).find('a').css('display', 'none')
    })
})

$('.searchUsersBox input').on('input', event =>{

    for (const user of users) {
        let userName = user.querySelector('h1').innerText.toLowerCase();
        if (userName.includes(event.target.value)) user.style.display = ''
        else user.style.display = 'none'

    }
})

$('.tasks-search-input').on('input', function (e) { 
    const tasks = $("div #card")
    tasks.each((index, card) => {
        const cardTitle = $(card).find('h1').text().toLowerCase();
        if (cardTitle.includes(e.target.value.toLowerCase())) {
            $(card).css('display', 'block');
        } else $(card).css('display', 'none')
    })
 })
