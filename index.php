<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Developer Portfolio</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/maps.css">
    <meta name="description" content="A modern portfolio website showcasing skills, projects, and contact information for a frontend developer.">
    <meta name="keywords" content="portfolio, frontend developer, web developer, UI/UX designer, contact, projects, skills">
    <link rel="shortcut icon" href="assets/images/2.png" type="image/png">
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar">
        <a href="#" class="logo">Keenmat<span> Tech</span></a>
        <ul class="nav-links">
            <li><a href="#home" class="active">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#timeline">Timeline</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#gallery">Gallery</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="https://wa.me/+2349030810180"><i class="fa-brands fa-whatsapp" style="color: lightgreen;"></i></a></li>
        </ul>
        <div class="hamburger">
            <i class="fas fa-bars"></i>
        </div>
    </nav>

    <!-- Header Section -->
    <header class="header" id="home">
        <video autoplay muted loop class="header-video">
            <source src="assets/images/bg.mp4" type="video/mp4">
        </video>
        <div class="header-overlay"></div>
        <div class="header-content">
            <h1>Hello, I am Dada Ayatullah</h1>
            <div class="typewriter-container">
                <span class="typewriter" id="typewriter"></span>
            </div>
            <a href="#contact" class="btn">Get In Touch</a>
        </div>
    </header>

    <!-- About Section -->
    <section id="about">
        <div class="section-title">
            <h2>About Me</h2>
        </div>
        <div class="about-content">
            <div class="card">
                <div class="card-inner">
                    <div class="card-front">
                        <img src="assets/images/profile.png" alt="Profile" class="card-img">
                        <h3>Dada Ayatullah</h3>
                        <p>C.E.O Keenmat Tech</p>
                    </div>
                    <div class="card-back">
                        <h3>About Me</h3>
                        <p>I'm a passionate frontend developer with 5+ years of experience creating beautiful and functional web applications.</p>
                        <a href="#contact" class="btn">Hire Me</a>
                    </div>
                </div>
            </div>
            
            <div class="card">
                <div class="card-inner">
                    <div class="card-front">
                        <img src="https://images.unsplash.com/photo-1555099962-4199c345e5dd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Skills" class="card-img">
                        <h3>My Skills</h3>
                        <p>Technical Expertise</p>
                    </div>
                    <div class="card-back">
                        <h3>Skills</h3>
                        <p>HTML, CSS, JavaScript, React, Vue, UI/UX Design, Responsive Design, PHP, SQL, Laravel, Solidity</p>
                        <a href="#services" class="btn">My Services</a>
                    </div>
                </div>
            </div>
            
            <div class="card">
                <div class="card-inner">
                    <div class="card-front">
                        <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Experience" class="card-img">
                        <h3>Experience</h3>
                        <p>Work History</p>
                    </div>
                    <div class="card-back">
                        <h3>Experience</h3>
                        <p>5+ years working with startups and Fortune 500 companies on web projects.</p>
                        <a href="#timeline" class="btn">My Timeline</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Timeline Section -->
    <section id="timeline">
        <div class="section-title">
            <h2>My Timeline</h2>
        </div>
        <div class="timeline">
            <div class="timeline-item">
                <div class="timeline-content">
                    <h3>2023 - Present</h3>
                    <p>Senior Blockkchain Developer at Keenmat tech</p>
                    <p>Leading a team of developers to create innovative web solutions.</p>
                </div>
            </div>
            <div class="timeline-item">
                <div class="timeline-content">
                    <h3>2021 - 2023</h3>
                    <p>Senior developer at Keenmat Tech.</p>
                    <p>Designed user interfaces for various web and mobile applications.</p>
                </div>
            </div>
            <div class="timeline-item">
                <div class="timeline-content">
                    <h3>2020 - 2021</h3>
                    <p>Frontend Developer at DigitalAgency</p>
                    <p>Worked on several solutions.</p>
                </div>
            </div>
            <div class="timeline-item">
                <div class="timeline-content">
                    <h3>2019 - 2020</h3>
                    <p>Certification</p>
                    <p>Became a certified Web Developer.</p>
                </div>
            </div>
            <div class="timeline-item">
                <div class="timeline-content">
                    <h3>2018 - 2019</h3>
                    <p>Web Developer Intern at JIT Solution</p>
                    <p>Learned industry best practices and worked on real-world projects.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services">
        <div class="section-title">
            <h2>My Services</h2>
        </div>
        <div class="services-container">
            <div class="service-box">
                <div class="service-icon">
                    <i class="fas fa-code"></i>
                </div>
                <h3>Web Development</h3>
                <p>Custom website development with modern technologies and frameworks.</p>
            </div>
            <div class="service-box">
                <div class="service-icon">
                    <i class="fas fa-paint-brush"></i>
                </div>
                <h3>UI/UX Design</h3>
                <p>Creating intuitive and beautiful user interfaces and experiences.</p>
            </div>
            <div class="service-box">
                <div class="service-icon">
                    <i class="fas fa-mobile-alt"></i>
                </div>
                <h3>Responsive Design</h3>
                <p>Building websites that work perfectly on all devices and screen sizes.</p>
            </div>
            <div class="service-box">
                <div class="service-icon">
                    <i class="fas fa-search"></i>
                </div>
                <h3>SEO Optimization</h3>
                <p>Optimizing websites to rank higher in search engine results.</p>
            </div>
            <div class="service-box">
                <div class="service-icon">
                    <i class="fas fa-server"></i>
                </div>
                <h3>Hosting & Maintenance</h3>
                <p>Reliable hosting solutions and ongoing website maintenance.</p>
            </div>
            <div class="service-box">
                <div class="service-icon">
                    <i class="fas fa-rocket"></i>
                </div>
                <h3>Performance Optimization</h3>
                <p>Improving website speed and overall performance.</p>
            </div>
            <div class="service-box">
                <div class="service-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3>Security Solutions</h3>
                <p>Implementing security measures to protect websites from threats.</p>
            </div>
            <div class="service-box">
                <div class="service-icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <h3>E-commerce Solutions</h3>
                <p>Building online stores with secure payment processing.</p>
            </div>
            <div class="service-box">
                <div class="service-icon">
                    <i class="fab fa-ethereum"></i>
                </div>
                <h3>Blockchain Solutions</h3>
                <p>Building of secured smart contracts and UI & UX implementations.</p>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section id="gallery">
        <div class="section-title">
            <h2>My Portfolio</h2>
        </div>
        <div class="gallery-container">
            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1551650975-87deedd944c3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Project 1" class="gallery-img">
                <div class="gallery-overlay">
                    <h3>E-commerce Website</h3>
                    <a href="#" class="btn view-btn">View Project</a>
                </div>
            </div>
            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1467232004584-a241de8bcf5d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Project 2" class="gallery-img">
                <div class="gallery-overlay">
                    <h3>Travel Blog</h3>
                    <a href="#" class="btn view-btn">View Project</a>
                </div>
            </div>
            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Project 3" class="gallery-img">
                <div class="gallery-overlay">
                    <h3>Dashboard UI</h3>
                    <a href="#" class="btn view-btn">View Project</a>
                </div>
            </div>
            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1499951360447-b19be8fe80f5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Project 4" class="gallery-img">
                <div class="gallery-overlay">
                    <h3>Mobile App Design</h3>
                    <a href="#" class="btn view-btn">View Project</a>
                </div>
            </div>
            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Project 5" class="gallery-img">
                <div class="gallery-overlay">
                    <h3>Real Estate Platform</h3>
                    <a href="#" class="btn view-btn">View Project</a>
                </div>
            </div>
            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1593642532842-98d0fd5ebc1a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Project 6" class="gallery-img">
                <div class="gallery-overlay">
                    <h3>Tech Blog</h3>
                    <a href="#" class="btn view-btn">View Project</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact">
        <div class="section-title">
            <h2>Contact Me</h2>
        </div>
        <div class="contact-container">
            <div class="contact-form">
                <form id="contactForm" action="https://formspree.io/f/mqalvbze"
  method="POST">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Your Email" name="email" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Subject" name="subject" required>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" placeholder="Your Message" name="message" required></textarea>
                    </div>
                    <button type="submit" class="btn">Send Message</button>
                </form>
            </div>
            <div class="profile-pics">
                <div class="profile-pics-holder">
                    <img src="assets/images/profile.png" alt="" srcset="" width="80%">
                </div>
            </div>
        </div>
    </section>

    <!--map and location section-->
    
    <div class="demo-content">
        

        <!-- Map Section -->
        <section class="map-section">
            <div class="section-title">
                <h2>Find My Location</h2>
            </div>

            <div class="map-container">
                <!-- Replace with your actual Google Maps embed code -->
                <iframe class="map-embed" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3303.4916415597963!2d5.216205761887365!3d7.240199968067487!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x10478ff9e11e1e43%3A0xe429c6c04b48d551!2sGovernor&#39;s%20Office%20Complex!5e1!3m2!1sen!2sng!4v1755782010097!5m2!1sen!2sng" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                
                <div class="custom-marker">
                    <i class="fas fa-map-marker-alt"></i>
                </div>

                <button class="geolocate-btn" id="geolocate-btn">
                    <i class="fas fa-location-arrow"></i>
                </button>
            </div>

            <div class="map-controls">
                <button class="map-style-btn active" data-filter="grayscale(20%) invert(92%) hue-rotate(180deg) brightness(95%) contrast(90%)">
                    <i class="fas fa-map"></i> Default Style
                </button>
                <button class="map-style-btn" data-filter="grayscale(30%) invert(100%) hue-rotate(180deg) brightness(85%) contrast(90%)">
                    <i class="fas fa-moon"></i> Dark Mode
                </button>
                <button class="map-style-btn" data-filter="grayscale(50%) brightness(105%) contrast(90%)">
                    <i class="fas fa-sun"></i> Light Mode
                </button>
                <button class="map-style-btn" data-filter="grayscale(10%) invert(90%) hue-rotate(160deg) brightness(95%) saturate(120%)">
                    <i class="fas fa-paint-roller"></i> Blue Theme
                </button>
            </div>
        </section>

        <div class="toast" id="toast"></div>
    </div>

    <!-- Social Media Section -->
    <section id="social">
        <div class="section-title">
            <h2>Follow Me</h2>
        </div>
        <div class="social-container">
            <a href="https://web.facebook.com/profile.php?id=61579731420019" class="social-icon"><i class="fab fa-facebook-f"></i></a>
            <a href="https://x.com/KeenmatTech" class="social-icon"><i class="fab fa-twitter"></i></a>
            <a href="https://www.instagram.com/keenmattech/" class="social-icon"><i class="fab fa-instagram"></i></a>
            <a href="https://www.linkedin.com/in/keenmat-tech/" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
            <a href="https://github.com/kryptfundz" class="social-icon"><i class="fab fa-github"></i></a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-links">
            <a href="#home">Home</a>
            <a href="#about">About</a>
            <a href="#services">Services</a>
            <a href="#gallery">Portfolio</a>
            <a href="#contact">Contact</a>
            <a href="https://wa.me/+2349030810180"><i class="fa-brands fa-whatsapp" style="color: lightgreen;"></i></a>
            <a href="https://web.facebook.com/profile.php?id=61579731420019"><i class="fa-brands fa-facebook" style="color: teal;"></i></a>
            <a href="https://x.com/KeenmatTech"><i class="fa-brands fa-x" style="color: lightblue;"></i></a>
            <a href="https://www.instagram.com/keenmattech/"><i class="fa-brands fa-instagram" style="color: pink;"></i></a>
            <a href="https://www.linkedin.com/in/keenmat-tech/"><i class="fa-brands fa-linkedin" style="color: #0077b5;"></i></a>
        </div>
        <p class="copyright">© 2025 Keenmat Tech. All Rights Reserved.</p>
    </footer>

    <!-- Scroll to Top Button -->
    <div class="scroll-to-top">
        <i class="fas fa-arrow-up"></i>
    </div>

    <!-- Gallery Modal -->
    <div class="modal">
        <span class="modal-close"><i class="fas fa-times"></i></span>
        <div class="modal-content">
            <img src="" alt="" class="modal-img">
        </div>
    </div>
    
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="assets/js/maps.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>