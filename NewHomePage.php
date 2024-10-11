<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width = device-width, initial-scale = 1.0">

    <title> NewHomePage</title>
    <link rel = "icon" href="../img/logo2.png" type = "image/png">
    <link rel="stylesheet" href= "NewHomePage.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>
    <div class="nav">
        <div class="logo">
            <img src="../img/logo.png" alt="Logo">
            <h1>CheapThrills</h1>
        </div>

        <div class="links">
            <ul>
                <a href="../NewHomePage.php"><li>Home</li></a>
                <a href=""><li>Book</li></a>
                <a href=""><li>About Us</li></a>
                <a href=""><li>Contact</li></a>
                <a href="https://layla.ai/chat?ask=create-a-new-trip"><li>Plan your Trip</li></a>
            </ul>
        </div>

        <div class="search">
            <img src="../img/search.png" alt="Search">
            <input type="search" name="search" id="navSearch" placeholder="Search...">
        </div>

        <div class="account">
            <img src="../img/user.png" alt="user">
            <p>Account</p>
        </div>
    </div>


<div class="video-container">
        <video autoplay muted loop id="background-video">
            <source src="img\Rediscover The Magic.mp4" type="video/mp4">
        </video>
</div>

<div class="onTopofVideo">
    <h1>Discover the World's Hidden <br> Gems.</h1>
    <div class="btns">
        <div class="book-btn">
            <button type ="button" class="button1">Book Now</button>
        </div>

        <div class="explore-btn">
            <button type ="button" class="button1">Explore</button>
        </div>
    </div>
</div>


    <div class="travel-packages-section">
        <h3>Travel Packages</h3>
        <p>Embark on Extraordinary Adventures with Our Travel Packages.</p>

        <div class="carousel-wrapper">
            <!-- Previous button -->
            <button class="carousel-control prev" id="prevBtn">❮</button>

            <!-- Carousel Container -->
            <div class="carousel-container">
                <div class="carousel-track">
                    <!-- Carousel Items -->
                    <div class="carousel-item">
                        <a href="package1.html">
                            <img src="img/BeachEscape.png" alt="Luxury Beach Escape">
                        </a>
                        <p class="carousel-title">Luxury Beach Escape</p>
                    </div>
                    <div class="carousel-item">
                        <a href="package2.html">
                            <img src="img/MountainTrek.png" alt="Adventurous Mountain Trek">
                        </a>
                        <p class="carousel-title">Adventurous Mountain Trek</p>
                    </div>
                    <div class="carousel-item">
                        <a href="package3.html">
                            <img src="img/CityTour.png" alt="Cultural City Tour">
                        </a>
                        <p class="carousel-title">Cultural City Tour</p>
                    </div>
                    <div class="carousel-item">
                        <a href="package4.html">
                            <img src="img/DesertSafari.jpg" alt="Exotic Desert Safari">
                        </a>
                        <p class="carousel-title">Exotic Desert Safari</p>
                    </div>
                </div>
            </div>

            <!-- Next button -->
            <button class="carousel-control next" id="nextBtn">❯</button>
        </div>
        <script src="carousel.js"></script>
    </div>
    </div>
    
    <div class="holiday-type">
        <h3>Holiday Types</h3>
        <p>From serene mountain getaways to vibrant culltural hubs, we'll help you craft the ultimate journey tailored to your passions</p>

        <div class="img-type">
            <div class="holiday-card">
                <img src="img/mountainsType.jpeg" alt="Holiday 1">
                <p>Mountains</p>
            </div>

            <div class="holiday-card">
                <img src="img/beachType.jpeg" alt="Holiday 2">
                <p>Beaches</p>
            </div>

            <div class="holiday-card">
                <img src="img/type3.jpeg" alt="Holiday 3">
                <p>Culture</p>
            </div>

            <div class="holiday-card">
                <img src="img/wildlifeType.jpeg" alt="Holiday 4">
                <p>Wildlife</p>
            </div>
        </div>
    </div>

    <div class="why-us">
        <h3>Why Choose Us?</h3>
        <div class="whyUs-box">
            <p><strong>Expert Guidance: <br> </strong> Our travel agents are experienced and knowledgeable.</p>
            <p><strong>Custom Packages: <br> </strong> Tailor-made travel packages to suit your preferences.</p>
            <p><strong>24/7 Support: <br> </strong> We're always here for you, anytime you need assistance.</p>
        </div>
    </div>

    <div class="contact-us">
        <h3>Contact Us</h3>
        <p>If you have any questions or would like to book a package, reach out to us:</p>
        <ul>
            <li><strong>Phone:</strong> <a href="tel:+254 (7)14 516 129">+254 (7)14 516 129</a></li>
            <li><strong>Email:</strong> <a href="mailto:info@cheapthrills.com">info@cheapthrills.com</a></li>
            <li><strong>Address:</strong> First Floor opposite Afya Corner,Student Center(STC), Stathmore University, Karen Ole Sangale Rd, off Langata Road, in Madaraka Estate, Nairobi</li>
        </ul>
        
    </div>


    <div class="footer">
        <div class="socials">
            <img src="../img/twitter.png" alt="Twitter">
            <img src="../img/instagram.png" alt="Instagram">
            <img src="../img/linkedin.png" alt="linkedin">
        </div>

        <div class="copyright">
            <p>Copyright &copy; 2024 <span>CheapThrills.</span> All rights reserved.</p>
        </div>
    </div>
</body>
</html>
