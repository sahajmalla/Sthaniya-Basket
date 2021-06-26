//show usericon details
const userIcon = document.querySelector('.user-icon');
const showIconDetails = document.querySelector('.show-icon-details');

userIcon.addEventListener('click', () => {
    showIconDetails.classList.toggle('hidden');
});
const userIcon2 = document.querySelector('.user-icon2');
const showIconDetails2 = document.querySelector('.show-icon-details2');

userIcon2.addEventListener('click', () => {
    showIconDetails2.classList.toggle('hidden');
});