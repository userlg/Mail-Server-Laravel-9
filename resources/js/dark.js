const toggle = document.querySelector("#toggle");

const html = document.querySelector("html");

var storage = window.localStorage;

var reload = true;

const sw = document.getElementById("switch");

function reloadStart() {
    if (reload == true) {
        reload == false;
        sw.classList.remove("toggle-active");
        sw.classList.add("toggle-reload");
    }
}


if ((storage.theme === 'dark' || (!('theme' in storage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) && (reload == true)) {
    reloadStart();
    html.classList.add('dark');
    storage.theme = 'dark';
    toggle.checked = true;
} else {
    html.classList.remove('dark');
    storage.theme = 'light';
    toggle.checked = false;
}


const toggleDarkMode = function () {

    if (toggle.checked) {
        html.classList.add("dark");
        storage.theme = 'dark';
    }
    else {
        sw.classList.remove("toggle-reload");
        sw.classList.add("toggle-active");
        html.classList.remove("dark");
        storage.theme = 'light';
        toggle.checked = false;
    }

};


toggle.addEventListener("click", () => {
    toggleDarkMode();
});

