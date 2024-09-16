<?php
$pagetitle = "Home Page";
// Include the header
include('layouts/header.php');
?>
<head>
    <link rel="stylesheet" href="HomePage.css">
    <link rel="stylesheet" href="adminStyle.css">
</head>

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

                <div class="carousel">
                    <!-- elements for the carousel -->
                </div>

            </div>

            <div class="holiday-type">
                <h3>Holiday Types</h3>
                <p>From serene mountainsgetaways to vibrant culltural hubs, we'll help you craft the ultimate journey tailours to your passions</p>

                <div class="img-type">
                    <!-- images for the packages -->
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