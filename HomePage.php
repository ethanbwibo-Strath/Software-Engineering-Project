<?php
$pagetitle = "Home Page";
// Include the header
include('layouts/header.php');
?> 
<head>
    <link rel="stylesheet" href="style.css">
    <!-- <link rel="stylesheet" href="adminStyle.css"> -->
     <style>
        /* *********Styles za kueka video************************ */
#background-video {
    width: 100%;
    height: 100vh;
    object-fit: cover;
    /* Make the video cover the entire container */
}

.video-container {
    position: absolute;
    /* Add absolute positioning to the video container */
    top: 0;
    left: 0;
    width: 100%;
    height: 100vh;
    z-index: -1;
    /* Set z-index to -1 to put it behind the content */
}


.travel_packages_carousel{
    display:flex;
    align-items: center;
    width: 90vw;
    border: 2px solid yellow;
    gap: 10px;
    padding: 10px;
}

/* Carousel Styles */
  .carousel {
    width: 80%;
    overflow: hidden;
}

.carousel-container {
    display: flex;
    transition: transform 0.5s ease-in-out;
    margin: 20px;
    padding: 20px;
    width:90%;
}

.carousel-item {
    flex: 0 0 33.33%;
    cursor: pointer;
    text-align: center;
    padding: 5px;
}

.carousel-item img {
    width: 300px;
    height: 300px;
    object-fit: cover;
    border-radius: 8px;
    gap: 20px;
}

.carousel-item p {
    margin-top: 10px;
    font-size: 1.2rem;
} 

/* Carousel navigation */
 .prev, .next {
    
    top: 50%;
    transform: translateY(-50%);
    background-color: rgba(0,0,0,0.5);
    color: black;
    font-size: 2rem;
    border: none;
    cursor: pointer;
    padding: 10px;
    z-index: 1;
}

/* .prev {
    left: 500px;
}

.next {
    right: 10px;
}   */
     </style>
</head>
<!-- ********************************************************** -->
 <!-- Added a video as the above the fold's background  -->
<div class="video-container">
        <video autoplay muted loop id="background-video">
    <source src="img\Rediscover The Magic.mp4" type="video/mp4">
</video>
</div>
<!-- ****************************************** -->
    <div class="home" >
        <div class="top">
            <h1>Discover the World's Hidden <br> Gems.</h1>
            <div class="btns">
                <div class="book-btn">
                    <button type ="button">Book Now</button>
                </div>

                <div class="explore-btn">
                    <button type ="button">Explore</button>
                </div>
            </div>
        </div>
        <div class="below-the-fold">
            <div class="packages">
                <h3>Travel Packages</h3>

                <p>Embark on Extraordinary Adventures with Our Travel Packages.</p>

                <p>Explore the globe's captivating destinations with our cerated travel packages.</p>
<!-- 
                <div class="carousel">
                   
                    <div class="carousel-img">
                     <div class="left">
                        <img src="img/carousel1.jpeg" alt="Travel Package 1">
                     </div>
                     <div class="main">
                        <img src="img/carousel2.jpeg" alt="Travel Package 2">
                     </div>
                     <div class="right">
                        <img src="img/carousel3.jpeg" alt="Travel Package 3">
                     </div>
                    </div>
                   

                </div>  -->
                <!-- ***********************Tried implementing a Carousel Feature*************************************** -->
 
                
   <div class = "travel_packages_carousel">
        

        <div><button class="prev" onclick="moveCarousel(-1)">❮</button></div>

        <div>
        <section class="carousel" style="border:1px solid red;">
            <div class="carousel-container">
                <div class="carousel-item" onclick="window.location.href=''">
                    <img src="img/carousel1.jpeg" alt="Loki">
                </div>
                
                <div class="carousel-item" onclick="window.location.href=''">
                    <img src="img/carousel2.jpeg" alt="Stranger Things">
                </div>
            
                <div class="carousel-item" onclick="window.location.href=''">
                    <img src="img/carousel3.jpeg" alt="The Mandalorian">
                </div>

                <div class="carousel-item" onclick="window.location.href=''">
                    <img src="img/Img2.jpg" alt="Stranger Things">
                </div>
            
                <div class="carousel-item" onclick="window.location.href=''">
                    <img src="img/Img1.jpg" alt="The Mandalorian">
                </div>
            </div>
        </section>
        </div>

        <div><button class="next" onclick="moveCarousel(1)">❯</button></div>        
   </div>

    

    <script src="app.js"></script>  

            </div>

            <div class="holiday-type">
                <h3>Holiday Types</h3>
                <p>From serene mountainsgetaways to vibrant culltural hubs, we'll help you craft the ultimate journey tailours to your passions</p>

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
                <h3>Why Us?</h3>
                <div class="whyUs-box">
                    <p>Personalized Reccomentations</p>
                    <p>Victor & Bwibo say so</p>
                    <p>Customizable Travel Packages</p>
                </div>
            </div>
            
        </div>

    </div>

    <?php
    // Include the footer
    include('layouts/footer.php');
    ?>
    
</body>
</html>