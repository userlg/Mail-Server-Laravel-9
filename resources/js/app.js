import './bootstrap';

import './dark';

import '../scss/app.scss';

console.log('Welcome To This laravel mail server');

//*************Session Flash Messages
if (document.getElementById("status") !== null) {
    const status = document.getElementById("status");
    setTimeout(() => {
        status.classList.add("hidden");
    }, 10000);
}

//****************Window Loader
const father = document.getElementById('container-loader');

window.onload = function () {
    let container = document.getElementById('loading_container');
    let loader = document.getElementById('loading');
    loader.style.animationPlayState = 'paused';
    container.style.visibility = 'hidden';
    father.removeChild(container);
}