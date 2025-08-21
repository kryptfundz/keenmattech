// Register GSAP plugins
gsap.registerPlugin(ScrollTrigger);

// Initialize animations when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    initScrollAnimations();
    initHeroAnimations();
    initTimelineAnimations();
});

// Scroll-triggered animations
function initScrollAnimations() {
    // Animate sections on scroll
    gsap.utils.toArray('section').forEach(section => {
        gsap.from(section, {
            scrollTrigger: {
                trigger: section,
                start: 'top 80%',
                toggleActions: 'play none none none'
            },
            opacity: 0,
            y: 50,
            duration: 0.8,
            ease: 'power2.out'
        });
    });
    
    // Animate navbar links
    gsap.from('.nav-links li', {
        opacity: 0,
        y: -20,
        duration: 0.5,
        stagger: 0.1,
        delay: 1
    });
    
    // Animate portfolio items
    gsap.utils.toArray('.portfolio-item').forEach((item, i) => {
        gsap.from(item, {
            scrollTrigger: {
                trigger: item,
                start: 'top 80%',
                toggleActions: 'play none none none'
            },
            opacity: 0,
            y: 50,
            duration: 0.5,
            delay: i * 0.1,
            ease: 'power2.out'
        });
    });
    
    // Animate contact form elements
    gsap.utils.toArray('.form-group').forEach((group, i) => {
        gsap.from(group, {
            scrollTrigger: {
                trigger: group,
                start: 'top 80%',
                toggleActions: 'play none none none'
            },
            opacity: 0,
            x: i % 2 === 0 ? -30 : 30,
            duration: 0.5,
            delay: i * 0.1,
            ease: 'power2.out'
        });
    });
}

// Hero section animations
function initHeroAnimations() {
    // Animate hero content
    gsap.from('.hero-content h1', {
        opacity: 0,
        y: 50,
        duration: 1,
        delay: 0.5
    });
    
    // Animate hero buttons
    gsap.from('.hero-btns', {
        opacity: 0,
        y: 20,
        duration: 1,
        delay: 1.5,
        ease: 'power2.out'
    });
    
    // Scroll indicator animation
    gsap.to('.scroll-indicator span', {
        y: -10,
        duration: 0.5,
        repeat: -1,
        yoyo: true,
        stagger: 0.2,
        ease: 'sine.inOut'
    });
}

// Timeline animations
function initTimelineAnimations() {
    gsap.utils.toArray('.timeline-item').forEach((item, i) => {
        gsap.from(item, {
            scrollTrigger: {
                trigger: item,
                start: 'top 80%',
                toggleActions: 'play none none none'
            },
            opacity: 0,
            x: i % 2 === 0 ? -50 : 50,
            duration: 0.8,
            ease: 'power2.out'
        });
    });
}

// Parallax effects
function initParallaxEffects() {
    gsap.utils.toArray('.parallax').forEach(element => {
        const depth = element.dataset.depth || 0.2;
        
        gsap.to(element, {
            y: 100 * depth,
            scrollTrigger: {
                trigger: element,
                start: 'top bottom',
                end: 'bottom top',
                scrub: true
            }
        });
    });
}

// Floating elements animation
function initFloatingElements() {
    gsap.utils.toArray('.float').forEach(element => {
        gsap.to(element, {
            y: 20,
            duration: 2,
            repeat: -1,
            yoyo: true,
            ease: 'sine.inOut'
        });
    });
}