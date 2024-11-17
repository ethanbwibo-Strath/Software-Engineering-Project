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
});




