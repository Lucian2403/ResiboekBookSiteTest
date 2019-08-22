const nation =  document.querySelector('#nation');
const continent =  document.querySelector('#continent');
const natArray = nation.querySelectorAll('ul');

const contArray = continent.querySelectorAll('li');


function initNations() {
    for(let i=0; i<natArray.length; i++) {
        natArray[i].style = 'transform: scaleY(0); opacity: 0';
    }
}
initNations();

function initContinent() {
    contArray[3].classList.add('active');
}
initContinent();

function showNations() {
    for(let i=0; i<contArray.length; i++) {
        if (contArray[i].classList.contains('active')) {
            natArray[i].style = 'transform: scaleY(1); opacity: 1';

        }
    }
}

showNations();

function resetClass() {
    for(let i=0; i<contArray.length; i++) {
        contArray[i].classList.remove('active');
        natArray[i].style = 'transform: scaleY(0); opacity: 0';
    }
}

function clickedOn(x) {
    for(let i=0; i<contArray.length; i++) {
        if (contArray[i].innerHTML === x) {
            resetClass();
            contArray[i].classList.add('active');
            showNations()
        }
    }
}

continent.addEventListener('click', function(e) {
    clickedOn(e.target.innerHTML);
});



//////OWL CAROUSEL/////

$(document).ready(function(){


    $('#home-carousel').owlCarousel({
        loop:true,
        margin:40,
        dots:true,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
                stagePadding: 50,
            },
            450:{
                items:2,
            },
            600:{
                items:2,
                stagePadding: 70,
            },
            720:{
                items:2.,
                stagePadding: 100,
            },
            783:{
                items:3.,
            },
            1024:{
                items:3,
            },
            1200:{
                items:4,
            },
        }
    });
});


//Menu Button Effect on Mobile





