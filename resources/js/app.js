//menu button close open
const btn = document.querySelector('.menu-button');
const menuOpen = document.querySelector('.menu-open');

btn.addEventListener('click', () => {
    if (menuOpen.classList.contains('hidden')) {
        menuOpen.classList.remove('hidden');
        menuOpen.classList.add('block');
    } else {
        menuOpen.classList.remove('block');
        menuOpen.classList.add('hidden');
    }
});

//write comment open close
const writeBtn = document.querySelector('.write-review');
const writeCancel = document.querySelector('.write-cancel');
const comntForm = document.querySelector('.comment-form');

writeBtn.addEventListener('click', () => {
    comntForm.classList.remove('hidden');
});

writeCancel.addEventListener('click', () => {
    comntForm.classList.add('hidden');
});