function handleResize() {
    if (window.innerWidth <= "768") {
        document.body.classList.add("sidebar-minimize");
    } else {
        document.body.classList.remove("sidebar-minimize");
    }
}
const handleBurgerSidebar = () => document.body.classList.toggle("sidebar-minimize");
handleResize();
window.onresize = () => {
    handleResize();
    if (typeof handleHeightTableGift != "undefined") {
        handleHeightTableGift();
    }
};

/**
 * If the user is logged in, log them out and redirect them to the login page.
 */
function logout() {
    fetch_query(null, "user", "logout")
        .then((res) => {
            console.log(res);
            if (res) return (location.href = http_domain);
        })
        .catch((err) => {
            console.log(err);
        });
}

window.onkeyup = (evt) => {
    if (evt.ctrlKey && evt.keyCode == 190) logout();
    if (evt.ctrlKey && evt.keyCode == 188)
        window.open(http_domain + "services/configuration", "_blank");
};

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
