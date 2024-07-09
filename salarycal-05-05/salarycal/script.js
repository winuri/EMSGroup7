
let currentSlide = 0;
const slides = document.querySelectorAll('.slide');

function showSlide(index) {
    slides.forEach((slide, i) => {
        slide.classList.remove('active');
        if (i === index) {
            slide.classList.add('active');
        }
    });
}

function nextSlide() {
    currentSlide = (currentSlide + 1) % slides.length;
    showSlide(currentSlide);
}

setInterval(nextSlide, 3000); // Change slide every 3 seconds

// Initial display
showSlide(currentSlide);

function saveData( emp_id) {
    // Store data in sessionStorage
    sessionStorage.setItem('EMP_ID', emp_id);

    // Provide feedback to the user
    document.getElementById('output').innerText = 'Data saved successfully!';
    console.log("Data saved successfully!");	

    console.log(sessionStorage.getItem('EMP_ID'));
}

