document.addEventListener('DOMContentLoaded', function() {
            // Enhanced Typewriter Effect
            const typewriterElement = document.getElementById('typewriter');
            const roles = [
                "Frontend Developer",
                "UI/UX Designer", 
                "Full Stack Web Developer",
                "Blockchain Developer",
                "Smart Contract Developer"
            ];
            
            let roleIndex = 0;
            let charIndex = 0;
            let isDeleting = false;
            let typingSpeed = 100;
            
            function type() {
                const currentRole = roles[roleIndex];
                
                if (isDeleting) {
                    // Remove characters
                    typewriterElement.textContent = currentRole.substring(0, charIndex - 1);
                    charIndex--;
                    typingSpeed = 50; // Faster when deleting
                } else {
                    // Add characters
                    typewriterElement.textContent = currentRole.substring(0, charIndex + 1);
                    charIndex++;
                    typingSpeed = 100; // Normal typing speed
                }
                
                // Determine next action
                if (!isDeleting && charIndex === currentRole.length) {
                    // Pause at end of word
                    isDeleting = true;
                    typingSpeed = 1500; // Longer pause before deleting
                } else if (isDeleting && charIndex === 0) {
                    // Move to next word
                    isDeleting = false;
                    roleIndex = (roleIndex + 1) % roles.length;
                    typingSpeed = 500; // Pause before starting next word
                }
                
                setTimeout(type, typingSpeed);
            }
            
            // Start the typewriter effect
            type();
            
            // Navbar scroll effect
            const navbar = document.querySelector('.navbar');
            window.addEventListener('scroll', function() {
                if (window.scrollY > 100) {
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                }
            });
            
            // Mobile menu toggle
            const hamburger = document.querySelector('.hamburger');
            const navLinks = document.querySelector('.nav-links');
            
            hamburger.addEventListener('click', function() {
                navLinks.classList.toggle('active');
                hamburger.innerHTML = navLinks.classList.contains('active') ? 
                    '<i class="fas fa-times"></i>' : '<i class="fas fa-bars"></i>';
            });
            
            // Smooth scrolling for navigation links
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
                        if (navLinks.classList.contains('active')) {
                            navLinks.classList.remove('active');
                            hamburger.innerHTML = '<i class="fas fa-bars"></i>';
                        }
                    }
                });
            });
            
            // Scroll to top button
            const scrollBtn = document.querySelector('.scroll-to-top');
            window.addEventListener('scroll', function() {
                if (window.scrollY > 500) {
                    scrollBtn.classList.add('active');
                } else {
                    scrollBtn.classList.remove('active');
                }
            });
            
            scrollBtn.addEventListener('click', function() {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
            
            // Gallery modal functionality
            const galleryItems = document.querySelectorAll('.gallery-item');
            const modal = document.querySelector('.modal');
            const modalImg = document.querySelector('.modal-img');
            const modalClose = document.querySelector('.modal-close');
            
            galleryItems.forEach(item => {
                item.addEventListener('click', function() {
                    const imgSrc = this.querySelector('.gallery-img').getAttribute('src');
                    modalImg.setAttribute('src', imgSrc);
                    modal.classList.add('open');
                });
            });
            
            modalClose.addEventListener('click', function() {
                modal.classList.remove('open');
            });
            
            // Close modal when clicking outside
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    modal.classList.remove('open');
                }
            });
            
            // Animate elements on scroll
            const animateOnScroll = function() {
                const elements = document.querySelectorAll('.service-box, .card, .timeline-item');
                
                elements.forEach(element => {
                    const elementTop = element.getBoundingClientRect().top;
                    const windowHeight = window.innerHeight;
                    
                    if (elementTop < windowHeight - 100) {
                        element.style.animation = 'fadeIn 1s forwards';
                    }
                });
            };
            
            window.addEventListener('scroll', animateOnScroll);
            // Trigger once on load
            animateOnScroll();
        });