
let lastScrollTop = 0; // Variable to track last scroll position
let isTransitioning = false; // To prevent multiple transitions at once

window.onscroll = function() {
    var navbarContainer = document.querySelector('.navbar-container');
    var navbar = document.querySelector('.navbar');
    var loginButton = document.querySelector('.loginButton');
    var registerButton = document.querySelector('.registerButton');
    var navbarList = document.querySelector('.navbar ul');
    var topButton = document.querySelector('.top-button');
    
    var currentScrollTop = window.pageYOffset;

    // Check if scrolling down or up
    if (currentScrollTop > lastScrollTop && !isTransitioning && window.pageYOffset > 50 && !navbarContainer.classList.contains('sidebar')) {
        // Scroll down
        isTransitioning = true; // Start transition

        navbarContainer.classList.add('sticky-left');
        navbar.classList.add('sticky-left');
        loginButton.classList.add('sticky-left');
        registerButton.classList.add('sticky-left');

        // Hide text immediately
        navbarList.style.visibility = 'hidden';

        // Wait for horizontal collapse to finish, then expand downward
        setTimeout(() => {
            navbarContainer.classList.add('sidebar');
            navbarList.style.visibility = 'visible'; // Reappear smoothly
            topButton.style.display = 'flex';
            isTransitioning = false; // Allow further transitions
        }, 400);
    } else if (currentScrollTop <= 50 && navbarContainer.classList.contains('sidebar') && !isTransitioning) {
        // Scroll up (and not in transition)
        isTransitioning = true; // Start transition

        navbarContainer.classList.remove('sidebar');

        // Hide text during transition
        navbarList.style.visibility = 'hidden';
        topButton.style.display = 'none';

        // Wait for vertical collapse to finish, then expand back
        setTimeout(() => {
            navbarContainer.classList.remove('sticky-left');
            navbar.classList.remove('sticky-left');
            loginButton.classList.remove('sticky-left');
            registerButton.classList.remove('sticky-left');
            navbarList.style.visibility = 'visible'; // Reappear smoothly
            isTransitioning = false; // Allow further transitions
        }, 400);
    }

    // Update the last scroll position
    lastScrollTop = currentScrollTop <= 0 ? 0 : currentScrollTop; // Prevent negative scroll values
};

// Scroll to top when clicking the button
document.addEventListener("DOMContentLoaded", function () {
    var topButton = document.querySelector('.top-button');
    
    topButton.addEventListener('click', function () {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    // Ensure the button is hidden initially
    topButton.style.display = 'none';
});

document.querySelectorAll(".clickable-post").forEach(item => {
    item.addEventListener("click", function() {
        window.location.href = this.getAttribute("data-url");
    });
});
