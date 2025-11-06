// Mobile Menu Toggle
document.getElementById('mobileMenuToggle').addEventListener('click', function() {
    document.getElementById('navLinks').classList.toggle('active');
});
// Dark Mode Toggle
document.getElementById('darkModeToggle').addEventListener('click', function() {
    document.body.classList.toggle('dark-mode');
    localStorage.setItem('darkMode', document.body.classList.contains('dark-mode') ? 'enabled' : 'disabled');
});
// Check for saved dark mode preference
if (localStorage.getItem('darkMode') === 'enabled') {
    document.body.classList.add('dark-mode');
}
// Smooth scrolling for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();
       
        const targetId = this.getAttribute('href');
        if (targetId === '#') return;
       
        const targetElement = document.querySelector(targetId);
        if (targetElement) {
            window.scrollTo({
                top: targetElement.offsetTop - 80,
                behavior: 'smooth'
            });
           
            // Close mobile menu if open
            document.getElementById('navLinks').classList.remove('active');
        }
    });
});
// Add animation on scroll
const observerOptions = {
    root: null,
    rootMargin: '0px',
    threshold: 0.1
};
const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('animate-fade-in-up');
        }
    });
}, observerOptions);
// Observe elements for animation
document.querySelectorAll('.section-heading, .skill-category, .project-card, .contact-info, .contact-form').forEach(el => {
    observer.observe(el);
});
