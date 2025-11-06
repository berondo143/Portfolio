// app.js
// Mobile Navigation Toggle
const hamburger = document.querySelector('.hamburger');
const navList = document.querySelector('.nav-list ul');

hamburger.addEventListener('click', () => {
  hamburger.classList.toggle('active');
  navList.classList.toggle('active');
});

// Close mobile menu when clicking on a link
document.querySelectorAll('.nav-list ul li a').forEach(n => n.addEventListener('click', () => {
  hamburger.classList.remove('active');
  navList.classList.remove('active');
}));

// Header background change on scroll
window.addEventListener('scroll', () => {
  const header = document.getElementById('header');
  if (window.scrollY > 50) {
    header.style.backgroundColor = 'rgba(255, 255, 255, 0.95)';
    header.style.backdropFilter = 'blur(10px)';
  } else {
    header.style.backgroundColor = 'var(--white)';
    header.style.backdropFilter = 'none';
  }
});

// Scroll animations
const observerOptions = {
  threshold: 0.1,
  rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('animate');
    }
  });
}, observerOptions);

// Observe elements for animation
document.addEventListener('DOMContentLoaded', () => {
  const elementsToAnimate = document.querySelectorAll('.service-item, .project-item, .about-img, .col-right, .contact-item');
  
  elementsToAnimate.forEach(el => {
    observer.observe(el);
  });
});

// Add animation classes to CSS
const style = document.createElement('style');
style.textContent = `
  .service-item, .project-item, .about-img, .col-right, .contact-item {
    opacity: 0;
    transform: translateY(30px);
    transition: opacity 0.6s ease, transform 0.6s ease;
  }
  
  .service-item.animate, .project-item.animate, .about-img.animate, .col-right.animate, .contact-item.animate {
    opacity: 1;
    transform: translateY(0);
  }
  
  .project-item:nth-child(odd) {
    transition-delay: 0.2s;
  }
  
  .project-item:nth-child(even) {
    transition-delay: 0.4s;
  }
`;
document.head.appendChild(style);
