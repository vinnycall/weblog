window.onscroll = function () {
    var navbar = document.querySelector(".navbar-container");

    if (window.pageYOffset > 100) {
        navbar.classList.add("sticky-right");
    } else {
        navbar.classList.remove("sticky-right");
    }
};
