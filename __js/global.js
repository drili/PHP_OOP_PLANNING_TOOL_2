document.addEventListener("DOMContentLoaded", function() {
    // *** Sidebar active link checker
    (function sideBarActiveLink() {
        var currentPageUrl = window.location.href;
        var menuLinks = document.querySelectorAll(".link-section a");
        menuLinks.forEach(function(link) {
            if (link.href === currentPageUrl) {
                link.classList.add("link-active");
            }
        })
    })();
})