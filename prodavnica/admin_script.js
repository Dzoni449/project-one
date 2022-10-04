let profile=document.querySelector('.header .flex .profile');

document.querySelector('#user-btn').onclick=() =>{
    profile.classList.toggle('active');
}

let navbar=document.querySelector('.header .flex .navbar');

document.querySelector('#menu-btn').onclick=()=>{
    navbar.classList.toggle('active');
}