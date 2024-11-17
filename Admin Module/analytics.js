document.addEventListener("DOMContentLoaded", function() {
    // User Growth Over Time - Line Chart
    const userGrowthCtx = document.getElementById('userGrowthChart').getContext('2d');
    const userGrowthChart = new Chart(userGrowthCtx, {
        type: 'line',
        data: {
            labels: [], // Populate with dates from database
            datasets: [{
                label: 'New Users',
                data: [], // Populate with user count from database
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderWidth: 2,
                fill: true,
            }]
        },
        options: {
            responsive: true,
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Date'
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Number of New Users'
                    }
                }
            }
        }
    });
    
        // Fetch the user growth data from GetUserGrowth.php
    fetch('getUserGrowth.php')
    .then(response => response.json())
    .then(data => {
        const dates = data.map(item => item.signup_date);
        const newUsers = data.map(item => item.new_users);

        userGrowthChart.data.labels = dates;
        userGrowthChart.data.datasets[0].data = newUsers;
        userGrowthChart.update();
    }).catch(error => console.error('Error fetching data:', error));

    // Revenue Over Time - Line Chart
    const revenueOverTimeCtx = document.getElementById('revenueChart').getContext('2d');
    const revenueOverTimeChart = new Chart(revenueOverTimeCtx, {
        type: 'line',
        data: {
            labels: [], // Populate with dates from database
            datasets: [{
                label: 'Revenue',
                data: [], // Populate with revenue data from database
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderWidth: 2,
                fill: true,
            }]
        },
        options: {
            responsive: true,
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Date'
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Revenue (Kshs.)'
                    }
                }    
            }
        }
    });
    
        // Fetch the revenue data from GetRevenue.php
    fetch('getRevenue.php')
    .then(response => response.json())
    .then(data => {
        const dates = data.map(item => item.created_at);
        const revenue = data.map(item => item.amount);

        revenueOverTimeChart.data.labels = dates;
        revenueOverTimeChart.data.datasets[0].data = revenue;
        revenueOverTimeChart.update();
    }).catch(error => console.error('Error fetching data:', error));


    // Popular Packages
const popularPackagesCtx = document.getElementById('popularPackagesChart').getContext('2d');
const popularPackagesChart = new Chart(popularPackagesCtx, {
    type: 'pie',
    data: {
        labels: [], // Populate with package names from database
        datasets: [{
            data: [], // Populate with package counts from database
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true
    }
});

// Fetch the popular packages data from GetPopularPackages.php
fetch('GetPopularPackages.php')
    .then(response => response.json())
    .then(data => {
        // Extract package names and counts
        const packageNames = data.map(item => item.package_name);
        const packageCounts = data.map(item => item.package_count);

        // Update the chart data
        popularPackagesChart.data.labels = packageNames;
        popularPackagesChart.data.datasets[0].data = packageCounts;
        popularPackagesChart.update();
    })
    .catch(error => console.error('Error fetching data:', error));


    // 4. Most Active Users
    const mostActiveUsersCtx = document.getElementById('activeTravellersChart').getContext('2d');
    const mostActiveUsersChart = new Chart(mostActiveUsersCtx, {
        type: 'bar',
        data: {
            labels: [], // Usernames will be populated here
            datasets: [{
                label: 'Bookings Count',
                data: [], // Booking counts will be populated here
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Fetch data for most active users
    fetch('getMostActiveUsers.php')
        .then(response => response.json())
        .then(data => {
            const usernames = data.map(user => user.username);
            const bookingCounts = data.map(user => user.booking_count);

            mostActiveUsersChart.data.labels = usernames;
            mostActiveUsersChart.data.datasets[0].data = bookingCounts;
            mostActiveUsersChart.update();
        })
        .catch(error => console.error('Error fetching data:', error));


});


