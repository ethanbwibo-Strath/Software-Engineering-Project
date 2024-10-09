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
/* 

    .TravelPackagesContainer{
        display:flex;
        align-items: center;
        width: 100%;
        border: 3px solid yellow;
        gap: 10px;
    }

    .button2{
        width: 100%;
        padding: 20px;
        background-color: #333;
        color: #fff;
        border: none;
        font-size: 15px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .button2:hover {
        background-color: goldenrod;
    }

    .carousel{
        border: 2px solid green;
        width: 90%;
        overflow: hidden;

    }

    .carousel-container{
        display: flex;
        border: 2px solid red;
        width: 80%;
    } 

    .carousel {
        width: 68%;
        overflow: hidden;
        border:1px solid red;
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
    }   */



        /* Style for the entire carousel section */
    .TravelPackagesContainer {
        display: flex;
        align-items: center;
        justify-content: space-between; /* Keep buttons aligned left and right */
        width: 100%;
        border: 3px solid yellow;
        gap: 10px;
    }

    .button2 {
        padding: 10px;
        background-color: #333;
        color: #fff;
        border: none;
        font-size: 25px; /* Increased for arrow size */
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .button2:hover {
        background-color: goldenrod;
    }

    /* Carousel setup */
    .carousel {
        width: 75%; /* Adjust carousel width to suit your layout */
        overflow: hidden; /* Ensures images don't overflow */
        border: 2px solid red;
        position: relative; /* For the buttons to stay in place */
        padding: 20px;
    }

    /* Carousel container for sliding images */
    .carousel-container {
        display: flex;
        transition: transform 0.5s ease-in-out;
        width: 100%; /* Adjust to fit the carousel's width */
        padding: 0 10px; /* Adds some padding for better spacing */
        border: 2px solid green;
    }

    /* Each individual carousel item */
    .carousel-item {
        flex: 0 0 33.33%; /* Show 3 items at once (1/3 each) */
        cursor: pointer;
        text-align: center;
        padding: 5px;
    }

    .carousel-item img {
        width: 100%;
        height: 300px;
        object-fit: cover;
        border-radius: 8px;
    }

    /* Adjust previous and next buttons */
    #prev, #next {
        position: absolute;
        top: 50%; /* Center vertically */
        transform: translateY(-50%);
        background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
        color: white;
        font-size: 2rem;
        border: none;
        cursor: pointer;
        padding: 10px;
        z-index: 10; /* Ensure they are above other elements */
    }

    #prev {
        left: 10px; /* Position on the left */
    }

    #next {
        right: 10px; /* Position on the right */
    }

    #prev:hover, #next:hover {
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