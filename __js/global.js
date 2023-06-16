document.addEventListener("DOMContentLoaded", function() {
    // *** INIT Quill
    var quill = new Quill('.quill-text-area', {
        theme: 'snow'
    });

    // *** Init select2
    $('.js-example-basic-multiple').select2({
        width: "100%"
    });
    
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