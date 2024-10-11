<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Website Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="graphs.css">
    <link rel="stylesheet" href="TravelAgentStyles.css">
    <?php
// Include the header
$pagetitle = "Travel Agent Dashboard";
$stylesheet = "TravelAgentStyles.css";
include "../layouts/header.php";
?>
</head>
<body>
    <div class="main">
        <div class="sidebar">
            <h2>PANEL</h2>
            <ul>
                <div class="sidebar-link">
                    <li>
                        <a href="#" class="link">Packages</a>
                        <div class="submenu">
                            <div class="submenu-item">
                                <a href="AllAboutPackages/createPackage.php" class="submenu-link">Create Package</a>
                            </div>
                            <div class="submenu-item">
                                <a href="AllAboutPackages/updatePackage.php" class="submenu-link">Update Package</a>
                            </div>
                            <div class="submenu-item">
                                <a href="AllAboutPackages/viewPackages.php" class="submenu-link">View Packages</a>
                            </div>
                        </div>
                    </li>
                    <img src="../img/user.png" alt="User Icon">
                </div>
    
                <div class="sidebar-link">
                    <li><a href="">Booking Management</a></li>
                    <img src="../img/travelpackage.png" alt="Package Icon">
                </div>
    
                <div class="sidebar-link">
                    <li><a href="">Customer Support</a></li>
                    <img src="../img/book.png" alt="Book Icon">
                </div>
    
                <div class="sidebar-link">
                    <li><a href="graphs.html">Reports & Analytics</a></li>
                    <img src="../img/report.png" alt="Report Icon">
                </div>
    
                <div class="sidebar-link">
                    <li><a href="">Reviews and Feedback</a></li>
                    <img src="../img/report.png" alt="Report Icon">
                </div>
            </ul>
        </div>
  <!-- Main Content -->
   <section class="content">
    <div>
       <h3>Bookings Over Time</h3>
       <canvas id="bookingsChart"></canvas>
    </div>

    <div>
        <h3>Popular Travel Packages</h3>
        <canvas id="packagesChart"></canvas>
    </div>
   </section>

<!-- Footer -->

    <script>
        // Bookings Over Time (Line Chart)
        const bookingsCtx = document.getElementById('bookingsChart').getContext('2d');
        const bookingsChart = new Chart(bookingsCtx, {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June'],
                datasets: [{
                    label: 'Bookings',
                    data: [30, 45, 60, 50, 65, 80],
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                aspectRatio: 3,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Number of Bookings'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Month'
                        }
                    }
                }
            }
        });

        // Popular Travel Packages (Doughnut Chart)
        const packagesCtx = document.getElementById('packagesChart').getContext('2d');
        const packagesChart = new Chart(packagesCtx, {
            type: 'doughnut',
            data: {
                labels: ['Beach Getaway', 'Mountain Adventure', 'City Tour', 'Safari'],
                datasets: [{
                    label: 'Travel Packages',
                    data: [150, 100, 75, 50],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                aspectRatio: 3,
            }
        });
    </script>

</body>
</html>
