const toggle = document.getElementById('toggle');
const myNavbar = document.getElementById('primary-menu');

document.onclick = function (e) {
    if (e.target.id !== 'toggle' && e.target.id !== 'primary-menu') {
        toggle.classList.remove('active');
        myNavbar.classList.remove('active')
    }
}

toggle.onclick = function () {
    toggle.classList.toggle('active');
    myNavbar.classList.toggle('active')
}