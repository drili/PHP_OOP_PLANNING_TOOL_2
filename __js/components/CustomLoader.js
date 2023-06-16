document.addEventListener("DOMContentLoaded", function(event) {
    function CustomLoader() {
        var componentElement = "<div class='custom-loader'><i class='gg-spinner'></i></div>";
        
        return componentElement;
    }
    
    var ajaxFetchedSection = document.querySelectorAll(".ajax-fetched-content");
    ajaxFetchedSection.forEach((loader) => {
        loader.innerHTML = CustomLoader();
    })
})