document.addEventListener("DOMContentLoaded", function () {

    const links = document.querySelectorAll("a");

    links.forEach(function (link) {

        link.addEventListener("mouseenter", function () {
            link.style.transition = "0.2s";
        });

    });

});