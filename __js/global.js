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

    // *** jQuery Toast Msgs
    function toastMessageSuccess(heading, text) {
        $.toast({
            heading: heading,
            text: text,
            position: 'top-center',
            stack: false,
            bgColor: '#2ecc71',
            textColor: '#fff',
            hideAfter: 3500
        })
    }
    
    function toastMessageError(heading, text) {
        $.toast({
            heading: heading,
            text: text,
            position: 'top-center',
            stack: false,
            bgColor: '#c0392b',
            textColor: '#fff',
            hideAfter: 3500
        })
    }

    // *** Global function: accordionTitle
    window.accordionTitle = function() {
        const accordionTitles = document.querySelectorAll(".title-accordion");
    
        accordionTitles.forEach(function(title) {
            title.addEventListener("click", function() {
                const accordionItem = this.nextElementSibling;
                accordionItem.classList.toggle("active");
            });
        });
    };
    accordionTitle();

    // *** Global event dispatches
    // *** Click task modal
    function eventDispatchClickTask() {
        document.addEventListener("click", function(event) {
            const clickedElement = event.target.closest(".task-single");
            
            if (clickedElement) {
                event.preventDefault();
                
                const dataTaskId = clickedElement.getAttribute("data-task-id");
                var taskModalEventData = new CustomEvent("TaskModal", {
                    "detail": {
                        "dataTaskId": dataTaskId
                    }
                });
                document.dispatchEvent(taskModalEventData);
            }
        });
    }
    eventDispatchClickTask();
})