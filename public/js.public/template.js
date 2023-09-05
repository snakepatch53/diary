// KEYBOARD SHORTCUTS
window.onkeyup = (evt) => {
    if (evt.ctrlKey && evt.keyCode == 190) window.location.href = http_domain + "panel/login";
    if (evt.ctrlKey && evt.keyCode == 188) window.open(http_domain + "services/configuration", "_blank");
};

// BURGER MENU
const $header = document.querySelector("header");
const $burger_btn = document.querySelector("#burger-toggle");

window.onscroll = () => (window.scrollY >= 5 ? $header.classList.add("float") : $header.classList.remove("float"));

$burger_btn.onclick = () => $header.classList.toggle("menu-open");

// THEME
const lightModeQuery = window.matchMedia("(prefers-color-scheme: light)");
const darkModeQuery = window.matchMedia("(prefers-color-scheme: dark)");
const $theme_btn = document.querySelector("#theme-toggle");
$theme_btn.onclick = () => {
    document.body.classList.toggle("dark");
    if (document.body.classList.contains("dark")) changeTheme("dark");
    else changeTheme("light");
};

lightModeQuery.addEventListener("change", function (e) {
    if (e.matches) changeTheme("light");
    else changeTheme("dark");
});

function changeTheme(theme) {
    if (theme === "light") {
        document.body.classList.remove("dark");
        localStorage.setItem("theme", "light");
    }
    if (theme === "dark") {
        document.body.classList.add("dark");
        localStorage.setItem("theme", "dark");
    }
}

function pickTheme() {
    const theme_saved = localStorage.getItem("theme");
    if (theme_saved) {
        if (theme_saved === "light") return document.body.classList.remove("dark");
        if (theme_saved === "dark") return document.body.classList.add("dark");
    }
    const theme = window.matchMedia && window.matchMedia("(prefers-color-scheme: dark)").matches;
    if (theme) return document.body.classList.add("dark");
}
pickTheme();

// MODAL CONTACT COMPONENT
const $contact_component_modal = document.getElementById("contact-component-modal");
const $contact_component_open_btn = document.getElementById("contact-component-open-btn");
const $contact_component_close_btn = document.getElementById("contact-component-close-btn");

$contact_component_close_btn.onclick = () => $contact_component_modal.classList.remove("open");
$contact_component_open_btn.onclick = () => $contact_component_modal.classList.add("open");
