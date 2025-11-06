<?php
// Portfolio Backend - Contact Form Handler
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['contact_submit'])) {
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
   
    // Simple validation
    if (!empty($name) && !empty($email) && !empty($message) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // In a real implementation, you would send an email here
        $contact_success = "Thank you for your message, $name! I'll get back to you soon.";
    } else {
        $contact_error = "Please fill in all fields correctly.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jagdish Love L. Berondo | Web Developer Portfolio</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- Header & Navigation -->
    <header>
        <div class="container">
            <div class="nav-container">
                <a href="#" class="logo">Jagdish<span style="color: var(--primary-dark);">.</span></a>
               
                <div class="nav-links" id="navLinks">
                    <a href="#home">Home</a>
                    <a href="#about">About</a>
                    <a href="#skills">Skills</a>
                    <a href="#projects">Projects</a>
                    <a href="#contact">Contact</a>
                </div>
               
                <div style="display: flex; align-items: center; gap: 20px;">
                    <div class="dark-mode-toggle" id="darkModeToggle">
                        <div class="toggle-slider"></div>
                    </div>
                   
                    <button class="mobile-menu-toggle" id="mobileMenuToggle">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>
    </header>
    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="container">
            <div class="hero-content animate-fade-in-up">
                <h1>Jagdish Love L. Berondo</h1>
                <h2>Full Stack Web Developer</h2>
                <p>I create modern, responsive web applications with clean code and intuitive user experiences. Passionate about bringing ideas to life through technology.</p>
                <div>
                    <a href="#projects" class="btn">View My Work</a>
                    <a href="#contact" class="btn btn-secondary">Get In Touch</a>
                </div>
            </div>
            <div class="hero-image animate-fade-in-up">
                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=774&q=80" alt="Jagdish Love L. Berondo">
            </div>
        </div>
    </section>
    <!-- About Section -->
    <section id="about">
        <div class="container">
            <div class="section-heading animate-fade-in-up">
                <h2>About Me</h2>
                <p>Learn more about my background, experience, and passion for web development</p>
            </div>
           
            <div class="about-content">
                <div class="about-text animate-fade-in-up">
                    <h3>Building Digital Solutions That Make a Difference</h3>
                    <p>I'm a passionate web developer with expertise in both frontend and backend technologies. I enjoy creating seamless user experiences and robust server-side solutions.</p>
                    <p>With a strong foundation in modern web technologies, I specialize in building responsive, accessible, and performant web applications. I'm constantly learning and adapting to new technologies to stay at the forefront of web development.</p>
                    <p>When I'm not coding, you can find me exploring new frameworks, contributing to open-source projects, or sharing knowledge with the developer community.</p>
                    <a href="#contact" class="btn">Let's Work Together</a>
                </div>
                <div class="about-image animate-fade-in-up">
                    <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1171&q=80" alt="About Me">
                </div>
            </div>
        </div>
    </section>
    <!-- Skills Section -->
    <section id="skills">
        <div class="container">
            <div class="section-heading animate-fade-in-up">
                <h2>My Skills</h2>
                <p>Technologies and tools I work with to bring ideas to life</p>
            </div>
           
            <div class="skills-container">
                <div class="skill-category animate-fade-in-up">
                    <h3><i class="fas fa-code"></i> Frontend Development</h3>
                    <div class="skill-list">
                        <div class="skill-item">HTML5</div>
                        <div class="skill-item">CSS3</div>
                        <div class="skill-item">JavaScript</div>
                        <div class="skill-item">React</div>
                        <div class="skill-item">Vue.js</div>
                        <div class="skill-item">Bootstrap</div>
                        <div class="skill-item">Tailwind CSS</div>
                        <div class="skill-item">SASS/SCSS</div>
                    </div>
                </div>
               
                <div class="skill-category animate-fade-in-up">
                    <h3><i class="fas fa-server"></i> Backend Development</h3>
                    <div class="skill-list">
                        <div class="skill-item">PHP</div>
                        <div class="skill-item">Node.js</div>
                        <div class="skill-item">Express.js</div>
                        <div class="skill-item">MySQL</div>
                        <div class="skill-item">MongoDB</div>
                        <div class="skill-item">REST APIs</div>
                        <div class="skill-item">GraphQL</div>
                        <div class="skill-item">Firebase</div>
                    </div>
                </div>
               
                <div class="skill-category animate-fade-in-up">
                    <h3><i class="fas fa-tools"></i> Tools & Others</h3>
                    <div class="skill-list">
                        <div class="skill-item">Git</div>
                        <div class="skill-item">GitHub</div>
                        <div class="skill-item">Docker</div>
                        <div class="skill-item">Webpack</div>
                        <div class="skill-item">Figma</div>
                        <div class="skill-item">Adobe XD</div>
                        <div class="skill-item">AWS</div>
                        <div class="skill-item">Agile/Scrum</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Projects Section -->
    <section id="projects">
        <div class="container">
            <div class="section-heading animate-fade-in-up">
                <h2>My Projects</h2>
                <p>A selection of my recent work and personal projects</p>
            </div>
           
            <div class="projects-container">
                <div class="project-card animate-fade-in-up">
                    <div class="project-image">
                        <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="E-commerce Platform">
                    </div>
                    <div class="project-content">
                        <h3>E-commerce Platform</h3>
                        <p>A full-featured online store with product catalog, shopping cart, and secure checkout.</p>
                        <div class="project-tags">
                            <div class="project-tag">React</div>
                            <div class="project-tag">Node.js</div>
                            <div class="project-tag">MongoDB</div>
                            <div class="project-tag">Stripe API</div>
                        </div>
                        <div class="project-links">
                            <a href="#" class="btn">Live Demo</a>
                            <a href="#" class="btn btn-secondary">GitHub</a>
                        </div>
                    </div>
                </div>
               
                <div class="project-card animate-fade-in-up">
                    <div class="project-image">
                        <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Task Management App">
                    </div>
                    <div class="project-content">
                        <h3>Task Management App</h3>
                        <p>A productivity application for organizing tasks, setting deadlines, and tracking progress.</p>
                        <div class="project-tags">
                            <div class="project-tag">Vue.js</div>
                            <div class="project-tag">Firebase</div>
                            <div class="project-tag">PWA</div>
                            <div class="project-tag">Material UI</div>
                        </div>
                        <div class="project-links">
                            <a href="#" class="btn">Live Demo</a>
                            <a href="#" class="btn btn-secondary">GitHub</a>
                        </div>
                    </div>
                </div>
               
                <div class="project-card animate-fade-in-up">
                    <div class="project-image">
                        <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Weather Dashboard">
                    </div>
                    <div class="project-content">
                        <h3>Weather Dashboard</h3>
                        <p>A responsive web application that displays current weather and forecasts for multiple cities.</p>
                        <div class="project-tags">
                            <div class="project-tag">JavaScript</div>
                            <div class="project-tag">API Integration</div>
                            <div class="project-tag">Chart.js</div>
                            <div class="project-tag">Local Storage</div>
                        </div>
                        <div class="project-links">
                            <a href="#" class="btn">Live Demo</a>
                            <a href="#" class="btn btn-secondary">GitHub</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <div class="section-heading animate-fade-in-up">
                <h2>Get In Touch</h2>
                <p>Have a project in mind or want to collaborate? I'd love to hear from you</p>
            </div>
           
            <div class="contact-container">
                <div class="contact-info animate-fade-in-up">
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Email</h4>
                            <p>jagdishberondo@gmail.com</p>
                        </div>
                    </div>
                   
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Phone</h4>
                            <p>+63 906 120 6043</p>
                        </div>
                    </div>
                   
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Location</h4>
                            <p>Philippines</p>
                        </div>
                    </div>
                   
                    <div class="social-links">
                        <a href="https://www.facebook.com/share/1GBkQWxisy/" class="social-link" target="_blank">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://github.com/jagdishberondo" class="social-link" target="_blank">
                            <i class="fab fa-github"></i>
                        </a>
                        <a href="https://www.linkedin.com/in/jagdishberondo" class="social-link" target="_blank">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="mailto:jagdishberondo@gmail.com" class="social-link">
                            <i class="fas fa-envelope"></i>
                        </a>
                    </div>
                </div>
               
                <div class="contact-form animate-fade-in-up">
                    <h3 style="margin-bottom: 20px;">Send Me a Message</h3>
                   
                    <?php if (isset($contact_success)): ?>
                        <div class="message"><?php echo $contact_success; ?></div>
                    <?php elseif (isset($contact_error)): ?>
                        <div class="error"><?php echo $contact_error; ?></div>
                    <?php endif; ?>
                   
                    <form method="POST" action="">
                        <div class="form-group">
                            <label for="name">Your Name</label>
                            <input type="text" id="name" name="name" required>
                        </div>
                       
                        <div class="form-group">
                            <label for="email">Your Email</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                       
                        <div class="form-group">
                            <label for="message">Your Message</label>
                            <textarea id="message" name="message" required></textarea>
                        </div>
                       
                        <button type="submit" name="contact_submit" class="btn">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-logo">Jagdish<span style="color: var(--primary-dark);">.</span></div>
               
                <div class="footer-links">
                    <a href="#home">Home</a>
                    <a href="#about">About</a>
                    <a href="#skills">Skills</a>
                    <a href="#projects">Projects</a>
                    <a href="#contact">Contact</a>
                </div>
            </div>
           
            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> Jagdish Love L. Berondo. All rights reserved.</p>
            </div>
        </div>
    </footer>
    <script src="scripts.js"></script>
</body>
</html>
