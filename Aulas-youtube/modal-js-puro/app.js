const button = document.querySelector('button');
const popup = document.querySelector('.popup-wrapper');

button.addEventListener('click', () => {
    popup.style.display = 'block'
})

popup.addEventListener('click', event => {
    const classNameOfClikedElement = event.target.classList['value']
    if(classNameOfClikedElement == 'pop-link' || classNameOfClikedElement == 'popup-close' || classNameOfClikedElement == 'popup-wrapper'){
        popup.style.display = "none";
    }
    
})