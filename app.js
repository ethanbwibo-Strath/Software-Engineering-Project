let currentIndex = 0;
const items = document.querySelectorAll('.carousel-item');
const totalItems = items.length;

function moveCarousel(direction) {
    currentIndex += direction;
    if (currentIndex < 0) {
        currentIndex = totalItems - 1;
    } else if (currentIndex >= totalItems) {
        currentIndex = 0;
    }

    document.querySelector('.carousel-container').style.transform = `translateX(-${currentIndex * 33.33}%)`;
}

// Auto-slide the carousel every 5 seconds
setInterval(() => {
    moveCarousel(0.5);
}, 5000);
