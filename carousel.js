const carouselTrack = document.querySelector('.carousel-track');
const prevBtn = document.getElementById('prevBtn');
const nextBtn = document.getElementById('nextBtn');
let currentSlide = 0;
const totalSlides = document.querySelectorAll('.carousel-item').length;

function moveToSlide(slideIndex) {
    const slideWidth = document.querySelector('.carousel-item').clientWidth;
    carouselTrack.style.transform = `translateX(-${slideIndex * slideWidth}px)`;
}

// Move to the next slide
nextBtn.addEventListener('click', () => {
    currentSlide = (currentSlide + 1) % totalSlides;
    moveToSlide(currentSlide);
});

// Move to the previous slide
prevBtn.addEventListener('click', () => {
    currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
    moveToSlide(currentSlide);
});

// Auto loop through the slides every 3 seconds
setInterval(() => {
    currentSlide = (currentSlide + 1) % totalSlides;
    moveToSlide(currentSlide);
}, 5000);
