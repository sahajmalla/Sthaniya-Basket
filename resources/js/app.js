//user icon 
const userIconbtn1 = document.querySelector('.user-icon');
const showIconDetails1 = document.querySelector('.show-icon-details');

userIconbtn1.addEventListener('click', () => {
    showIconDetails1.classList.toggle('hidden');
});
