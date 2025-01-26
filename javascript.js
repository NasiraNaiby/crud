// if (!sessionStorage.getItem('preloaderShown')) { 
//     const spinnerElement = document.querySelector('.spinner-container'); 
//     setTimeout(()=>{ spinnerElement.style.display = 'none'; 
//         sessionStorage.setItem('preloaderShown', 'true'); 
//     }, 3000); } 
   // else { // Hide the preloader immediately if it has been shown before 
        //document.querySelector('.spinner-container').style.display = 'none'; 
    //}


    // Data from PHP (converted to JSON)
  // External JavaScript file (external.js)

window.onload = function() {
    const ctx = document.getElementById('dishesChart').getContext('2d');
    
    const dishesChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels, // Use the passed labels
            datasets: [{
                label: 'Sold Count',
                data: data, // Use the passed data
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(50, 205, 50, 0.2)',
                    'rgba(255, 69, 0, 0.2)',
                    'rgba(138, 43, 226, 0.2)',
                    'rgba(255, 20, 147, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(50, 205, 50, 1)',
                    'rgba(255, 69, 0, 1)',
                    'rgba(138, 43, 226, 1)',
                    'rgba(255, 20, 147, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
};


$('.carousel-one').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    navText: ['<span class="owl-prev">‹</span>', '<span class="owl-next">›</span>'],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:5
        }
    }
});
$('.carousel-two').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    navText: ['<span class="owl-prev">‹</span>', '<span class="owl-next">›</span>'],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:6
        }
    }
});
$('.carousel-three').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    navText: ['<span class="owl-prev">‹</span>', '<span class="owl-next">›</span>'],
    responsive:{
        0:{
            items:1
        },
        810:{
            items:2
        },
        1000:{
            items:6
        }
    }
});

let cartCount = 0;
document.querySelectorAll('.add-to-cart').forEach(button => {
    button.addEventListener('click', function() {
        cartCount++;
        let cartCountElement = document.getElementById('cart-count');
        cartCountElement.textContent = cartCount;
        cartCountElement.classList.add('bounce');
        // Remove the animation
        cartCountElement.addEventListener('animationend', () => {
            cartCountElement.classList.remove('bounce');
        });
    });
});

document.getElementById('contactForm').addEventListener('submit', function(event){
    event.preventDefault();

    const name = document.getElementById('name').value.trim();
    const phone = document.getElementById('téléphone').value.trim();
    const email = document.getElementById('emailAddress').value.trim();
    const message = document.getElementById('message').value.trim();

    if(name === '' || phone === '' || email === '' || message === ''){
        alert('Tous les champs sont obligatoires');
        return;
    }
    if (!validateName(name)) {
        alert('Veuillez entrer un nom valide.');
        return;
    }
    if(!validateEmail(email)){
        alert('Veuillez entrer une adresse email valide.');
        return;
    }
    if (!validatePhone(phone)) {
        alert('Veuillez entrer un numéro de téléphone valide.');
        return;
    }
    if (!validateMessage(message)) {
        alert('Veuillez entrer un message valide.');
        return;
    }

    document.getElementById('contactForm').submit();
});

function validateName(name) {
    const re = /^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžæÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/;
    return re.test(name);
}

function validateEmail(email) {
    const re = /^[a-z0-9.-]+@[a-z0-9.-]{2,}\.[a-z]{2,4}$/;
    return re.test(email);
}

function validatePhone(phone) {
    const re =  /^0[1-9]([-. ]?[0-9]{2}){4}$/;
    return re.test(phone);
}

function validateMessage(message) {
    const re = /^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžæÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/;
    return re.test(message);
}
