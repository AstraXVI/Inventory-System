const menuBtn = document.querySelector("#menuBtn")
const nav_wrapper = document.querySelector(".nav_wrapper")
const close_nav_wrapper = document.querySelector(".close_nav_wrapper")

const nav = function(){
    nav_wrapper.classList.toggle("nav_wrapper_move");
    // console.log("h")
}

menuBtn.addEventListener('click',nav)

close_nav_wrapper.addEventListener('click',nav)