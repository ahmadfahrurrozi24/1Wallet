let btn = document.querySelectorAll(".hamburger-button");
let sidebar = document.querySelector(".sidebar");

btn.forEach((element) => {
    element.onclick = function () {
        sidebar.classList.toggle("active");
    };
});

sidebar.addEventListener("mouseover", (e) => {
    if (window.innerWidth > 518) sidebar.classList.add("active");
});

sidebar.addEventListener("mouseleave", (e) => {
    if (window.innerWidth > 518) sidebar.classList.remove("active");
});

// document.querySelector(".wallet").onclick = function () {
//     sidebar.classList.toggle("active");
// };
