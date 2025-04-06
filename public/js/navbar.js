let lastScrollTop = 0;
let isTransitioning = false;

window.onscroll = function () {
    var navbarContainer = document.querySelector(".navbar-container");
    var navbar = document.querySelector(".navbar");
    var loginButton = document.querySelector(".loginButton");
    var registerButton = document.querySelector(".registerButton");
    var navbarList = document.querySelector(".navbar ul");
    var topButton = document.querySelector(".top-button");

    var currentScrollTop = window.pageYOffset;

    if (
        currentScrollTop > lastScrollTop &&
        !isTransitioning &&
        window.pageYOffset > 50 &&
        !navbarContainer.classList.contains("sidebar")
    ) {
        isTransitioning = true;

        navbarContainer.classList.add("sticky-left");
        navbar.classList.add("sticky-left");
        loginButton.classList.add("sticky-left");
        registerButton.classList.add("sticky-left");

        navbarList.style.visibility = "hidden";

        setTimeout(() => {
            navbarContainer.classList.add("sidebar");
            navbarList.style.visibility = "visible";
            topButton.style.display = "flex";
            isTransitioning = false;
        }, 400);
    } else if (
        currentScrollTop <= 50 &&
        navbarContainer.classList.contains("sidebar") &&
        !isTransitioning
    ) {
        isTransitioning = true;

        navbarContainer.classList.remove("sidebar");

        navbarList.style.visibility = "hidden";
        topButton.style.display = "none";

        setTimeout(() => {
            navbarContainer.classList.remove("sticky-left");
            navbar.classList.remove("sticky-left");
            loginButton.classList.remove("sticky-left");
            registerButton.classList.remove("sticky-left");
            navbarList.style.visibility = "visible";
            isTransitioning = false;
        }, 400);
    }
    lastScrollTop = currentScrollTop <= 0 ? 0 : currentScrollTop;
};

document.addEventListener("DOMContentLoaded", function () {
    var topButton = document.querySelector(".top-button");

    topButton.addEventListener("click", function () {
        window.scrollTo({ top: 0, behavior: "smooth" });
    });

    topButton.style.display = "none";
});

document.querySelectorAll(".clickable-post").forEach((item) => {
    item.addEventListener("click", function () {
        window.location.href = this.getAttribute("data-url");
    });
});
