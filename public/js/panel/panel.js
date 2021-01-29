var rightnav = document.getElementById("rightnav");
rightnav.style.height = window.innerHeight + "px";

var content = document.getElementById("content");

function makeResponsiveadminpanel() {
    content.style.width = (window.innerWidth - rightnav.scrollWidth - 40) + "px";
}

if (window.innerWidth >= 767) {
    content.style.right = "250px";
    
    window.onresize = function () {
        makeResponsiveadminpanel();
    }

    makeResponsiveadminpanel();
}

var openclosenav = document.getElementById("openclosenav");
openclosenav.onclick = function () {
    rightnav.classList.toggle("showhidepanelnav");
    this.classList.toggle("fa-arrow-left");
    this.classList.toggle("fa-arrow-right")
}