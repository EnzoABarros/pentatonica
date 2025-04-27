let slideIndex = 0;
const slidesContainer = document.querySelector('.slides');
const dots = document.querySelectorAll('.dot');
const totalSlides = dots.length;

function showSlide(index) {
    slidesContainer.style.transform = `translateX(-${index * 100}%)`;

    dots.forEach((dot, i) => {
        dot.classList.toggle('active', i === index);
    });
}

function autoSlide() {
    slideIndex = (slideIndex + 1) % totalSlides;
    showSlide(slideIndex);
}
let interval = setInterval(autoSlide, 3000);

dots.forEach((dot, i) => {
    dot.addEventListener('click', () => {
        slideIndex = i;
        showSlide(slideIndex);

        clearInterval(interval);
        interval = setInterval(autoSlide, 3000);
    });
});

showSlide(slideIndex);
