window.addEventListener("DOMContentLoaded", function(event) {
    const activeLink = document.querySelector('#mainmenu a[href="' + location.pathname + '"]');

    if (activeLink) {
        activeLink.parentNode.classList.add('active');
    }
});
