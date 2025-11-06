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
    <style>
        :root {
            --primary-color: #6366f1;
            --primary-dark: #4f46e5;
            --secondary-color: #9ca3af;
            --success-color: #10b981;
            --danger-color: #ef4444;
            --bg-color: #f8f9fd;
            --card-bg: rgba(255, 255, 255, 0.95);
            --text-color: #1f2937;
            --text-color-light: #6b7280;
            --border-color: rgba(0, 0, 0, 0.05);
            --shadow-color: rgba(79, 70, 229, 0.15);
            --backdrop-filter: blur(16px);
            --font-family: 'Poppins', sans-serif;
        }

        .dark-mode {
            --bg-color: #111827;
            --card-bg: rgba(31, 41, 55, 0.85);
            --text-color: #f3f4f6;
            --text-color-light: #9ca3af;
            --border-color: rgba(255, 255, 255, 0.08);
            --shadow-color: rgba(0, 0, 0, 0.4);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: var(--font-family);
            background-color: var(--bg-color);
            color: var(--text-color);
            line-height: 1.6;
            transition: background-color 0.3s ease, color 0.3s ease;
            overflow-x: hidden;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        section {
            padding: 80px 0;
        }

        /* Header & Navigation */
        header {
            background: var(--card-bg);
            box-shadow: 0 4px 20px var(--shadow-color);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            backdrop-filter: var(--backdrop-filter);
            -webkit-backdrop-filter: var(--backdrop-filter);
        }

        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 0;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary-color);
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            gap: 30px;
        }

        .nav-links a {
            color: var(--text-color);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
            position: relative;
        }

        .nav-links a:hover {
            color: var(--primary-color);
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background-color: var(--primary-color);
            transition: width 0.3s ease;
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .dark-mode-toggle {
            background: rgba(156, 163, 175, 0.15);
            border: 1px solid var(--border-color);
            border-radius: 50px;
            width: 65px;
            height: 32px;
            cursor: pointer;
            display: flex;
            align-items: center;
            padding: 6px;
            transition: background 0.3s ease;
            box-shadow: 0 2px 8px var(--shadow-color);
        }

        .dark-mode-toggle:hover {
            background: rgba(156, 163, 175, 0.25);
        }

        .toggle-slider {
            width: 24px;
            height: 24px;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            border-radius: 50%;
            transition: transform 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94), background 0.3s;
            box-shadow: 0 2px 6px var(--shadow-color);
        }

        .dark-mode .toggle-slider {
            transform: translateX(30px);
            background: linear-gradient(135deg, #f3f4f6, #d1d5db);
        }

        .mobile-menu-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: var(--text-color);
            cursor: pointer;
        }

        /* Hero Section */
        .hero {
            padding-top: 150px;
            display: flex;
            align-items: center;
            min-height: 100vh;
        }

        .hero-content {
            flex: 1;
            padding-right: 50px;
        }

        .hero-image {
            flex: 1;
            text-align: center;
        }

        .hero-image img {
            max-width: 100%;
            border-radius: 20px;
            box-shadow: 0 15px 40px var(--shadow-color);
            transition: transform 0.5s ease;
        }

        .hero-image img:hover {
            transform: translateY(-10px);
        }

        .hero h1 {
            font-size: 3.5rem;
            margin-bottom: 20px;
            line-height: 1.2;
        }

        .hero h2 {
            font-size: 1.8rem;
            color: var(--primary-color);
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            color: var(--text-color-light);
        }

        .btn {
            display: inline-block;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: white;
            padding: 14px 28px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px var(--shadow-color);
            border: none;
            cursor: pointer;
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px var(--shadow-color);
        }

        .btn-secondary {
            background: linear-gradient(135deg, var(--secondary-color), #6b7280);
            margin-left: 15px;
        }

        /* Section Headings */
        .section-heading {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-heading h2 {
            font-size: 2.5rem;
            margin-bottom: 15px;
            color: var(--primary-color);
        }

        .section-heading p {
            color: var(--text-color-light);
            max-width: 600px;
            margin: 0 auto;
        }

        /* About Section */
        .about-content {
            display: flex;
            gap: 50px;
            align-items: center;
        }

        .about-text {
            flex: 1.5;
        }

        .about-image {
            flex: 1;
            text-align: center;
        }

        .about-image img {
            max-width: 100%;
            border-radius: 20px;
            box-shadow: 0 10px 30px var(--shadow-color);
        }

        .about-text h3 {
            font-size: 1.8rem;
            margin-bottom: 20px;
        }

        .about-text p {
            margin-bottom: 20px;
            color: var(--text-color-light);
        }

        /* Skills Section */
        .skills-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .skill-category {
            background: var(--card-bg);
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 30px var(--shadow-color);
            border: 1px solid var(--border-color);
            backdrop-filter: var(--backdrop-filter);
            -webkit-backdrop-filter: var(--backdrop-filter);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .skill-category:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px var(--shadow-color);
        }

        .skill-category h3 {
            font-size: 1.5rem;
            margin-bottom: 20px;
            color: var(--primary-color);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .skill-list {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .skill-item {
            background: var(--bg-color);
            padding: 10px 20px;
            border-radius: 50px;
            font-size: 0.9rem;
            color: var(--text-color);
            border: 1px solid var(--border-color);
            transition: all 0.3s ease;
        }

        .skill-item:hover {
            background: var(--primary-color);
            color: white;
            transform: scale(1.05);
        }

        /* Projects Section */
        .projects-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 30px;
        }

        .project-card {
            background: var(--card-bg);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px var(--shadow-color);
            border: 1px solid var(--border-color);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .project-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px var(--shadow-color);
        }

        .project-image {
            height: 200px;
            overflow: hidden;
        }

        .project-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .project-card:hover .project-image img {
            transform: scale(1.1);
        }

        .project-content {
            padding: 25px;
        }

        .project-content h3 {
            font-size: 1.4rem;
            margin-bottom: 10px;
        }

        .project-content p {
            color: var(--text-color-light);
            margin-bottom: 20px;
        }

        .project-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 20px;
        }

        .project-tag {
            background: var(--bg-color);
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            color: var(--text-color);
            border: 1px solid var(--border-color);
        }

        .project-links {
            display: flex;
            gap: 15px;
        }

        /* Contact Section */
        .contact-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 50px;
        }

        .contact-info {
            display: flex;
            flex-direction: column;
            gap: 25px;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .contact-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
        }

        .contact-details h4 {
            font-size: 1.2rem;
            margin-bottom: 5px;
        }

        .contact-details p {
            color: var(--text-color-light);
        }

        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .social-link {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 45px;
            height: 45px;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: white;
            border-radius: 50%;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px var(--shadow-color);
        }

        .social-link:hover {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-color));
            transform: translateY(-3px) scale(1.1);
            box-shadow: 0 6px 12px var(--shadow-color);
        }

        .contact-form {
            background: var(--card-bg);
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 30px var(--shadow-color);
            border: 1px solid var(--border-color);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 14px 18px;
            border: 1px solid var(--border-color);
            border-radius: 12px;
            font-size: 1rem;
            transition: border 0.3s ease, box-shadow 0.3s ease, background 0.3s ease;
            background: var(--bg-color);
            color: var(--text-color);
            font-family: var(--font-family);
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: var(--primary-color);
            outline: none;
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.15);
            background: white;
        }

        .dark-mode .form-group input:focus,
        .dark-mode .form-group textarea:focus {
            background: #1f2937;
        }

        .form-group textarea {
            min-height: 150px;
            resize: vertical;
        }

        .message, .error {
            padding: 15px 20px;
            margin-bottom: 20px;
            border-radius: 12px;
            border-left: 6px solid;
            box-shadow: 0 4px 12px var(--shadow-color);
        }

        .message {
            background-color: rgba(16, 185, 129, 0.1);
            border-color: var(--success-color);
        }

        .error {
            background-color: rgba(239, 68, 68, 0.1);
            border-color: var(--danger-color);
        }

        /* Footer */
        footer {
            background: var(--card-bg);
            border-top: 1px solid var(--border-color);
            padding: 40px 0 20px;
            margin-top: 50px;
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .footer-logo {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-color);
        }

        .footer-links {
            display: flex;
            gap: 20px;
        }

        .footer-links a {
            color: var(--text-color);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-links a:hover {
            color: var(--primary-color);
        }

        .footer-bottom {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid var(--border-color);
            color: var(--text-color-light);
            font-size: 0.9rem;
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .hero {
                flex-direction: column;
                text-align: center;
                padding-top: 120px;
            }

            .hero-content {
                padding-right: 0;
                margin-bottom: 50px;
            }

            .about-content {
                flex-direction: column;
            }

            .about-text {
                order: 2;
            }

            .about-image {
                order: 1;
                margin-bottom: 30px;
            }

            .footer-content {
                flex-direction: column;
                gap: 20px;
            }
        }

        @media (max-width: 768px) {
            .nav-links {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                width: 100%;
                background: var(--card-bg);
                flex-direction: column;
                padding: 20px;
                box-shadow: 0 10px 20px var(--shadow-color);
                backdrop-filter: var(--backdrop-filter);
                -webkit-backdrop-filter: var(--backdrop-filter);
            }

            .nav-links.active {
                display: flex;
            }

            .mobile-menu-toggle {
                display: block;
            }

            .hero h1 {
                font-size: 2.8rem;
            }

            .hero h2 {
                font-size: 1.5rem;
            }

            .section-heading h2 {
                font-size: 2rem;
            }

            .projects-container {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 576px) {
            .hero h1 {
                font-size: 2.2rem;
            }

            .hero h2 {
                font-size: 1.3rem;
            }

            .btn {
                display: block;
                width: 100%;
                margin-bottom: 15px;
            }

            .btn-secondary {
                margin-left: 0;
            }
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.6s ease-out forwards;
        }
    </style>
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

    <script>
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
    </script>
</body>
</html>