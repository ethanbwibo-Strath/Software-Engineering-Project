<?php
// Include the header
$pagetitle = "View All Packages";
$stylesheet = "TravelAgentStyles.css";
include "layouts/header.php";


?>

<div class="main-content">
    <h1>Available Travel Packages</h1>
    <table class="package-table">
        <thead>
            <tr>
                <th>Package Name</th>
                <th>Price (USD)</th>
                <th>Duration (days)</th>
                <th>Hotel</th>
                <th>Amenities</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($packages as $package) : ?>
                <tr>
                    <td><a href="viewPackageDetails.php?id=<?= $package['id'] ?>"><?= $package['name'] ?></a></td>
                    <td><?= $package['price'] ?></td>
                    <td><?= $package['duration'] ?></td>
                    <td><?= $package['hotel'] ?></td>
                    <td><?= $package['amenities'] ?></td>
                    <td><img src="<?= $package['image_path'] ?>" alt="<?= $package['name'] ?>" width="100"></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
