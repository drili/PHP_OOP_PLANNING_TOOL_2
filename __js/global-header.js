// function includeJs(jsFilePath) {
//     var js = document.createElement("script");

//     js.type = "text/javascript";
//     js.src = jsFilePath;
//     js.onload = function() {
//         const ajaxFetchedSection = document.querySelectorAll(".ajax-fetched-content");
//         ajaxFetchedSection.forEach((loader) => {
//             loader.innerHTML = CustomLoader();
//         })
//     };
//     document.body.appendChild(js);
// }
// includeJs("../__js/components/CustomLoader.js");