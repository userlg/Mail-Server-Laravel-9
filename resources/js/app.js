import './bootstrap';

import './dark';

import '../scss/app.scss';

console.log('Welcome To This laravel mail server');

const status = document.getElementById("status");

setTimeout(() => {
    status.classList.add("hidden");
}, 10000);