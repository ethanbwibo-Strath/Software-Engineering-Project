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
    
    .why-us {
        padding: 40px 20px;
        text-align: center;
        background-color: #fff; /* White background for contrast */
    }
    
    .why-us h3 {
        font-size: 30px;
        margin-bottom: 20px;
        font-weight: bold; /* Make the heading bold */
        color: #333; /* Dark color for the heading */
    }
    
    .whyUs-box {
        display: flex;
        justify-content: space-around; /* Distribute items evenly */
        align-items: center;
        gap: 10px; /* Space between boxes */
    }
    
    .whyUs-box p {
        background-color: #fff; /* White background for each box */
        border: 1px solid #ddd; /* Light gray border */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
        padding: 20px; /* Inner padding for text */
        border-radius: 10px; /* Rounded corners */
        width: 250px; /* Fixed width for uniformity */
        height: 150px; /* Fixed height for uniformity */
        font-weight: bold; /* Make text bold */
        transition: transform 0.2s; /* Transition for hover effect */
    }
    
    .whyUs-box p:hover {
        transform: translateY(-5px); /* Lift effect on hover */
    }
    
    .contact-us {
        padding: 40px 20px; /* Add padding for the contact section */
        text-align: center; /* Center the text */
        background-color: #f9f9f9; /* Light background for contact section */
        margin-top: 20px; /* Space above the contact section */
        border-radius: 10px; /* Rounded corners */
    }
    
    .contact-us h3 {
        font-size: 30px;
        margin-bottom: 20px;
        font-weight: bold;
        color: #333; /* Dark color for heading */
    }
    
    .contact-us ul {
        list-style-type: none; /* Remove bullet points */
        padding-left: 0; /* Remove default padding */
        margin-bottom: 20px; /* Space below the list */
    }
    
    .contact-us ul li {
        margin-bottom: 10px; /* Space between items */
    }
    
    .contact-us a {
        color: #007BFF; /* Primary color for links */
        text-decoration: none; /* Remove underline */
    }
    
    .contact-us a:hover {
        text-decoration: underline; /* Underline on hover */
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


<?php
include 'layouts/footer.php';
?>
