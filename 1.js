let container = document.querySelector('.s_container');
let slider = document.querySelector('.s_slide');

let images = document.querySelectorAll('.img');

let prevBtn = document.getElementById('prev');
let nextBtn = document.getElementById('next');

let width = images[0].clientWidth;
var counter = 1;
container.style.width = width;
nextBtn.addEventListener('click', ()=>{
    counter++;
    slider.style.transition = 'transform 0.8s ease-in-out';
    slider.style.transform = 'translateX('+(-counter*width)+'px)';
})
prevBtn.addEventListener('click', ()=>{
    counter--;
    slider.style.transition = 'transform 0.8s ease-in-out';
    slider.style.transform = 'translateX('+(-counter*width)+'px)';
})
slider.addEventListener('transitionend', ()=>{
    if(images[counter].id == 'lastclone'){
        slider.style.transition = 'none';
        counter = images.length - 2;
        slider.style.transform = 'translateX('+(-counter*width)+'px)';
    }
    if(images[counter].id == 'firstclone'){
        slider.style.transition = 'none';
        counter = 1;
        slider.style.transform = 'translateX('+(-counter*width)+'px)';
    }
})

