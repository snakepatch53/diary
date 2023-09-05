const $formLogin = document.getElementById("element-loginform");
const $toggleButton = document.getElementById("togglePassword");
const $msgLogin = document.getElementById("element-msg-login");

("use strict");
$formLogin.onsubmit = function (event) {
    if (!$formLogin.checkValidity()) {
        event.stopPropagation();
        event.preventDefault();
    }
    // if ($formLogin.checkValidity()) {
    //     event.preventDefault();
    // }
    handleSubmit(event);
    $formLogin.classList.add("was-validated");
};

$toggleButton.onclick = function () {
    const $input = $toggleButton.parentNode.querySelector("input");
    const type = $input.getAttribute("type") === "password" ? "text" : "password";
    $input.setAttribute("type", type);
    // $toggleButton.innerHTML = type === "password" ? "<i class='fa fa-eye'></i>" : "<i class='fa fa-eye-slash'></i>";
    $toggleButton.classList.toggle("show");
};

function handleSubmit(event) {
    event.preventDefault();
    const user_user = $formLogin.user_user.value;
    const user_pass = $formLogin.user_pass.value;
    if (!user_user) return showMsg("Ingrese su usuario!");
    if (!user_pass) return showMsg("Ingrese su contraseña!");
    const formData = new FormData($formLogin);
    try {
        fetch_query(formData, "user", "login").then((res) => {
            try {
                console.log(res);
                showMsg(res.message);
                if (res.response) return (location.href = http_domain);
            } catch (error) {
                showMsg("Error al conectar con el servidor!");
            }
        });
    } catch (err) {
        console.log(err);
    }
}

function showMsg(text) {
    $msgLogin.innerText = text;
    setTimeout(() => {
        $msgLogin.innerText = "";
    }, 2000);
}

window.onkeyup = (evt) => {
    if (evt.ctrlKey && evt.keyCode == 190) {
        // redireccionar
        window.location.href = http_domain;
    }
};

//  THEME
const lightModeQuery = window.matchMedia("(prefers-color-scheme: light)");
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

// RAIN EFFECT
function run() {
    var image = document.getElementById("imgrain");
    image.onload = function () {
        var engine = new RainyDay({
            image: this,
        });
        engine.rain([[1, 2, 8000]]);
        engine.rain(
            [
                [3, 3, 0.88],
                [5, 5, 0.9],
                [6, 2, 1],
            ],
            100
        );
    };
    image.crossOrigin = "anonymous";
}
window.onload = () => {
    run();
    setTimeout(() => {
        document.body.classList.remove("loading");
    }, 200);
};
