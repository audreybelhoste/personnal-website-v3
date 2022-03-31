document.addEventListener("DOMContentLoaded", function() {
    const sections = document.querySelectorAll('.section');

    console.log(sections)

    sections.forEach(element => {
        element.addEventListener('click', event => {

            document.querySelector('.active').classList.remove('active');
            let arrow = 'left';
            let currentSection = element.id;

            sections.forEach(element => {
                element.classList.remove('left', 'right');
                if(element.id == currentSection){
                    element.classList.add('active');
                    arrow = 'right';
                } else {
                    element.classList.add(arrow);
                }
            })
        })
    });

    if(window.location.hash == "#projects"){
        document.querySelector('#projects').classList.add('active');
        document.querySelector('#presentation').classList.remove('active');
    }
})