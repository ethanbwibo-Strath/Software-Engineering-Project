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
        margin: 0 auto;
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


<div class="Packages">
    <h3>Travel Packages</h3>
    <p>Embark on Extraordinary Adventures with Our Travel Packages.</p>

    <div class="TravelPackagesContainer">
        <div>
            <button class="button2" id="prev" onclick="moveCarousel(1)">❮</button>
        </div>

        <div>
            <section class="carousel">
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
                <script src="app.js"></script> 
            </section>
        </div>

        <div>
            <button class="button2" id="next" onclick="moveCarousel(-1)">❯</button>
        </div>
    </div>


</div>
<?php
include 'layouts/footer.php';
?>
