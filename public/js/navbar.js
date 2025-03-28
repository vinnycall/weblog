// window.onscroll = function() {
//     var navbarContainer = document.querySelector('.navbar-container');
//     // var navbar = document.querySelector('.navbar');
    
//     if (window.pageYOffset > 100) {  
        
//         // navbar.classList.add('sticky-left');
//         navbarContainer.classList.add('sticky-left');
//     } else {
        
//         // navbar.classList.remove('sticky-left');
//         navbarContainer.classList.remove('sticky-left');
//     }
// };


// window.onscroll = function() {
//     var navbarContainer = document.querySelector('.navbar-container');
//     var navbar = document.querySelector('.navbar');
//     var loginButton = document.querySelector('.loginButton');

//     if (window.pageYOffset > 50 && !navbarContainer.classList.contains('sidebar')) {  
//         navbarContainer.classList.add('sticky-left');
//         navbar.classList.add('sticky-left');
//         loginButton.classList.add('sticky-left');

//         // Wait for collapse animation to finish, then expand sidebar
//         setTimeout(() => {
//             navbarContainer.classList.add('sidebar');
//         }, 500);

//     } else if (window.pageYOffset <= 50 && navbarContainer.classList.contains('sidebar')) {
//         navbarContainer.classList.remove('sidebar');

//         // Wait for sidebar to shrink, then restore navbar
//         setTimeout(() => {
//             navbarContainer.classList.remove('sticky-left');
//             navbar.classList.remove('sticky-left');
//             loginButton.classList.remove('sticky-left');
//         }, 500);
//     }
// };

// window.onscroll = function() {
//     var navbarContainer = document.querySelector('.navbar-container');
//     var navbar = document.querySelector('.navbar');
//     var loginButton = document.querySelector('.loginButton');

//     if (window.pageYOffset > 50) {  
//         navbarContainer.classList.add('sticky-left', 'sidebar');
//         navbar.classList.add('sticky-left');
//         loginButton.classList.add('sticky-left');
//     } else {
//         navbarContainer.classList.remove('sticky-left', 'sidebar');
//         navbar.classList.remove('sticky-left');
//         loginButton.classList.remove('sticky-left');
//     }
// };
// window.onscroll = function() {
//     var navbarContainer = document.querySelector('.navbar-container');
//     var navbar = document.querySelector('.navbar');
//     var loginButton = document.querySelector('.loginButton');

//     if (window.pageYOffset > 50 && !navbarContainer.classList.contains('sidebar')) {  
//         navbarContainer.classList.add('sticky-left');

//         // Wait for horizontal collapse to finish, then expand vertically
//         setTimeout(() => {
//             navbarContainer.classList.add('sidebar');
//         }, 400);

//     } else if (window.pageYOffset <= 50 && navbarContainer.classList.contains('sidebar')) {
//         navbarContainer.classList.remove('sidebar');

//         // Wait for vertical collapse to finish, then expand horizontally
//         setTimeout(() => {
//             navbarContainer.classList.remove('sticky-left');
//         }, 400);
//     }
// };
// window.onscroll = function() {
//     var navbarContainer = document.querySelector('.navbar-container');
//     var navbar = document.querySelector('.navbar');
//     var loginButton = document.querySelector('.loginButton');

//     if (window.pageYOffset > 50 && !navbarContainer.classList.contains('sidebar')) {  
//         navbarContainer.classList.add('sticky-left');
//         navbar.classList.add('sticky-left');
//         loginButton.classList.add('sticky-left');

//         // Wait for horizontal collapse to finish, then expand downward
//         setTimeout(() => {
//             navbarContainer.classList.add('sidebar');
//         }, 400);

//     } else if (window.pageYOffset <= 50 && navbarContainer.classList.contains('sidebar')) {
//         navbarContainer.classList.remove('sidebar');

//         // Wait for vertical collapse to finish, then expand back
//         setTimeout(() => {
//             navbarContainer.classList.remove('sticky-left');
//             navbar.classList.remove('sticky-left');
//             loginButton.classList.remove('sticky-left');
//         }, 400);
//     }
// };
window.onscroll = function() {
    var navbarContainer = document.querySelector('.navbar-container');
    var navbar = document.querySelector('.navbar');
    var loginButton = document.querySelector('.loginButton');
    var navbarList = document.querySelector('.navbar ul');

    if (window.pageYOffset > 50 && !navbarContainer.classList.contains('sidebar')) {  
        navbarContainer.classList.add('sticky-left');
        navbar.classList.add('sticky-left');
        loginButton.classList.add('sticky-left');

        // Hide text immediately
        navbarList.style.visibility = 'hidden';

        // Wait for horizontal collapse to finish, then expand downward
        setTimeout(() => {
            navbarContainer.classList.add('sidebar');
            navbarList.style.visibility = 'visible'; // Reappear smoothly
        }, 400);

    } else if (window.pageYOffset <= 50 && navbarContainer.classList.contains('sidebar')) {
        navbarContainer.classList.remove('sidebar');

        // Hide text during transition
        navbarList.style.visibility = 'hidden';

        // Wait for vertical collapse to finish, then expand back
        setTimeout(() => {
            navbarContainer.classList.remove('sticky-left');
            navbar.classList.remove('sticky-left');
            loginButton.classList.remove('sticky-left');
            navbarList.style.visibility = 'visible'; // Reappear smoothly
        }, 400);
    }
};