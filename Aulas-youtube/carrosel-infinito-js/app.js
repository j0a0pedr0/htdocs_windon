"use strict";


function carrosel(){
    let carroselSlider = document.querySelector(".carrosel_slider");
    let list = document.querySelector(".carrosel_list");
    let item = document.querySelectorAll(".carrosel_item");
    let list2;

    const speed = 1;

    const width = list.offsetWidth;
    let x = 0;
    let x2 = width;

    function clone(){
        list2 = list.cloneNode(true);
        carroselSlider.appendChild(list2);
        list2.style.left = `${width}px`;
    }

    function moveFirst() {
        x -= speed;

        if(width >= Math.abs(x)){
            list.style.left = `${x}px`;
        }else {
            x = width;
        }
    }

    function moveSecond(){
        x2 -= speed;

        if(list2.offsetWidth >= Math.abs(x2)){
            list2.style.left = `${x2}px`;
        }else{
            x2 = width;
        }
    }
    function hover(){
        clearInterval(a);
        clearInterval(b);
    }

    function unhover(){
        a = setInterval(moveFirst, 10);
        b = setInterval(moveSecond, 10);
    }

    clone();

    let a = setInterval(moveFirst, 10);
    let b = setInterval(moveSecond, 10);

    carroselSlider.addEventListener("mouseenter",hover);
    carroselSlider.addEventListener("mouseleave",unhover);
}


carrosel();