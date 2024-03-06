const scrollBtn = document.getElementById('scroll-btn');
const sections = document.querySelectorAll('.section');
const fadeInElements = document.querySelectorAll('.fade-in');

let currentSectionIndex = 0;

scrollBtn.addEventListener('click', scrollToNextSection);
window.addEventListener('scroll', updateCurrentSectionIndex);

const fadeInOptions = {
    rootMargin: "0px",
    threshold: 0.2
};

const fadeInObserver = new IntersectionObserver(function(entries, fadeInObserver) {
    entries.forEach(entry => {
        if (!entry.isIntersecting) {
            return;
        } else {
            entry.target.classList.add('is-visible');
            fadeInObserver.unobserve(entry.target);
        }
    });
}, fadeInOptions);

fadeInElements.forEach(fadeInElement => {
    fadeInObserver.observe(fadeInElement);
});

function scrollToNextSection() {
    currentSectionIndex++;

    if (currentSectionIndex >= sections.length) {
        currentSectionIndex = 0;
    }

    sections[currentSectionIndex].scrollIntoView({
        behavior: 'smooth'
    });
}

function updateCurrentSectionIndex() {
    checkVisibility();
    sections.forEach((section, index) => {
        const sectionTop = section.offsetTop;
        const sectionHeight = section.clientHeight;

        if (window.pageYOffset >= sectionTop && window.pageYOffset < sectionTop + sectionHeight) {
            currentSectionIndex = index;
        }
    });
}

function checkVisibility() {
    fadeInElements.forEach((element) => {
        const elementTop = element.getBoundingClientRect().top;
        const elementBottom = element.getBoundingClientRect().bottom;
    
        // If the element is in the viewport, add the "is-visible" class
        if (elementTop < window.innerHeight && elementBottom > 0) {
            element.classList.add('is-visible');
        } else {
            element.classList.remove('is-visible');
        }
    });
}