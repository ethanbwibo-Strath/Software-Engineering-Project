<?php
$pagetitle = "Home Page";
include 'layouts/header.php';
?>

<style>   
    #background-video {
        width: 100%;
        height: 100vh;
        object-fit: cover;
        /* Make the video cover the entire container */
    }

    .video-container {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100vh;
        z-index: -1;
        /* Set z-index to -1 to put it behind the content */
    }

    .onTopofVideo{
        height: 100vh;
        width:100%;
        position:relative; 
        margin-bottom: auto;
    } 

    .onTopofVideo h1{
        margin: auto;
        padding-top: 100px;
        text-align:center;
        font-size: 65px;
        color: #fff;
        font-weight: 900;
        text-shadow: rgba(0, 0, 0, 0.592) 0px 0px 10px;
    }

    .button1 {
        width: 100%;
        padding: 15px;
        margin-top: 50px;
        background-color: #333;
        color: #fff;
        border: none;
        border-radius: 20px;
        font-size: 20px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .button1:hover {
        background-color: goldenrod;
    }

    .btns{
        width: 30vw;
        margin: 10vh auto 0 auto;
        display: flex;
        justify-content: space-around;
        padding: 10px;
    }
    
        /* Travel Packages Section */
    .travel-packages-section {
        text-align: center;
        padding: 20px;
        background-color: #f4f4f4;
        padding: 20px;
        border: 2px solid #ccc;
        border-radius: 10px;
    }
    
    .travel-packages-section h3 {
        font-size: 2rem;
        margin-bottom: 10px;
    }
    
    .travel-packages-section p {
        font-size: 1.2rem;
        margin-bottom: 20px;
    }
    
    /* Carousel Wrapper */
    .carousel-wrapper {
        position: relative;
        width: 80%;
        margin: 10px auto;
        overflow: hidden;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }
    
    /* Carousel Container */
    .carousel-container {
        display: flex;
        overflow: hidden;
    }
    
    /* Carousel Track - for the sliding effect */
    .carousel-track {
        display: flex;
        transition: transform 0.5s ease-in-out;
    }
    
    /* Individual Carousel Item */
    .carousel-item {
        min-width: 100%; /* Each item takes up the full width */
        box-sizing: border-box;
    }
    
    .carousel-item img {
        width: 100%;
        height: 400px;
        object-fit: cover;
        border-radius: 10px;
    }

    .carousel-title {
        font-size: 1.2rem;
        color: #333;
        margin-top: 10px;
        text-align: center;
        font-weight: bold;
    }
    
    /* Controls - Previous & Next buttons */
    .carousel-control {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background-color: rgba(0, 0, 0, 0.5);
        color: white;
        border: none;
        padding: 10px;
        font-size: 2rem;
        cursor: pointer;
        z-index: 10;
    }
    
    .carousel-control.prev {
        left: 10px;
    }
    
    .carousel-control.next {
        right: 10px;
    }
    
    .carousel-control:hover {
        background-color: goldenrod;
    }
</style>



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

<div class="why-us-section">
    <h2>Why Choose Us?</h2>
    <p>We offer unparalleled travel experiences tailored to your needs. Here are a few reasons to choose us:</p>
    <ul>
        <li><strong>Expert Guidance:</strong> Our travel agents are experienced and knowledgeable.</li>
        <li><strong>Custom Packages:</strong> Tailor-made travel packages to suit your preferences.</li>
        <li><strong>24/7 Support:</strong> We're always here for you, anytime you need assistance.</li>
        <li><strong>Competitive Pricing:</strong> Great value for your money with no hidden costs.</li>
    </ul>
</div>

<div class="contact-us-section">
    <h2>Contact Us</h2>
    <p>If you have any questions or would like to book a package, reach out to us:</p>
    <ul>
        <li><strong>Email:</strong> <a href="mailto:info@yourtravelagency.com">info@yourtravelagency.com</a></li>
        <li><strong>Phone:</strong> <a href="tel:+1234567890">+1 234 567 890</a></li>
        <li><strong>Address:</strong> 123 Travel Lane, Adventure City, ST 12345</li>
    </ul>
    <p>Follow us on social media:</p>
    <ul class="social-media">
        <li><a href="#">Facebook</a></li>
        <li><a href="#">Instagram</a></li>
        <li><a href="#">Twitter</a></li>
    </ul>
</div>


</div>
<?php
include 'layouts/footer.php';
?>
