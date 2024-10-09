<?php
// Include the header
$pagetitle = "Travel Agent Dashboard";
$stylesheet = "TravelAgentStyles.css";
include "layouts/header.php";
?>

    <div class="main">
        <div class="sidebar">
            <h2>PANEL</h2>
            <ul>

                <div class="sidebar-link">
                    <li>
                        <form action="" method="get">
                            <label for="packages-dropdown">Packages: </label>
                            <select id="packages-dropdown" name="package-action" onchange="location = this.value;">
                                <option value="">Select Action</option>
                                <option value="createPackage.php">Create a Package</option>
                                <option value="updatePackage.php">Update a Package</option>
                                <option value="viewPackages.php">View Packages</option>
                            </select>
                        </form>
                    </li>
                    <img src="img/user.png" alt="User Icon">
                </div>

                <div class="sidebar-link">
                    <li><a href="">Booking Management </a></li>
                    <img src="img/travelpackage.png" alt="Package Icon">
                </div>
                    
                <div class="sidebar-link">
                    <li><a href="">Customer Support </a></li>   
                    <img src="img/book.png" alt="Book Icon">
                </div>

                <div class="sidebar-link">
                    <li><a href="">Reports & Analytics </a></li>
                    <img src="img/report.png" alt="Report Icon">
                </div>    
                
                <div class="sidebar-link">
                    <li><a href="">Reviews and Feedback </a></li>
                    <img src="img/report.png" alt="Report Icon">
                </div> 
            </ul>
        </div>
    </div>
