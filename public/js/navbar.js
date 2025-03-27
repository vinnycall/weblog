window.onscroll = function() {
    var navbarContainer = document.querySelector('.navbar-container');
    var navbar = document.querySelector('.navbar');
    
    if (window.pageYOffset > 100) {  
        
        navbar.classList.add('sticky-left');
        navbarContainer.classList.add('sticky-left');
    } else {
        
        navbar.classList.remove('sticky-left');
        navbarContainer.classList.remove('sticky-left');
    }
};