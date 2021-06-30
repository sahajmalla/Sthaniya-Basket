//menu button close open
const btn = document.querySelector('.menu-button');
const menuOpen = document.querySelector('.menu-open');

btn.addEventListener('click', () => {
   menuOpen.classList.toggle('hidden');
});

//user icon 
const userIconbtn1 = document.querySelector('.user-icon');
const showIconDetails1 = document.querySelector('.show-icon-details');

userIconbtn1.addEventListener('click', () => {
    showIconDetails1.classList.toggle('hidden');
});

//user icon 2
const userIconbtn2 = document.querySelector('.user-icon2');
const showIconDetails2 = document.querySelector('.show-icon-details2');

userIconbtn2.addEventListener('click', () => {
    showIconDetails2.classList.toggle('hidden');
});