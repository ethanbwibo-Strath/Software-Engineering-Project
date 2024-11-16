<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width = device-width, initial-scale = 1.0">

    <title>Help Center</title>
    <link rel="icon" href="../img/logo2.png" type="image/png">
    <link rel="stylesheet" href="userdash.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>
<style>
    /* General button styling */
.btn {
    display: inline-block;
    padding: 10px 20px;
    margin: 10px;
    background-color: goldenrod; /* Green background */
    color: white;
    text-align: center;
    text-decoration: none;
    font-size: 16px;
    border-radius: 5px;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

/* Hover effect */
.btn:hover {
    background-color: #45a049; /* Darker green on hover */
    transform: scale(1.05); /* Slight scale-up effect */
}

/* Active button effect */
.btn:active {
    background-color: #388e3c; /* Even darker green when clicked */
    transform: scale(1);
}

/* Focus effect (optional) */
.btn:focus {
    outline: none;
    box-shadow: 0 0 5px 2px rgba(72, 239, 72, 0.7);
}

/* Responsive adjustments (optional) */
@media (max-width: 768px) {
    .btn {
        width: 100%; /* Full width on smaller screens */
        margin: 5px 0;
    }
}

    </style>

<body>
    <div class="nav">
        <div class="logo">
            <img src="../img/logo.png" alt="Logo">
            <h1>CheapThrills</h1>
        </div>

        <div class="links">
            <ul>
                <a href="../NewHomePage.php"><li>Home</li></a>
                <a href=""><li>Book</li></a>
                <a href=""><li>About Us</li></a>
                <a href=""><li>Contact</li></a>
            </ul>
        </div>

        <div class="search">
            <img src="../img/search.png" alt="Search">
            <input type="search" name="search" id="navSearch" placeholder="Search...">
        </div>

        <div class="account">
            <img src="../img/user.png" alt="user">
            <p>Account</p>
        </div>
    </div>

    <?php include "sidebar.php" ?>

    <div class="main-content">
        <h2>Help Center</h2>
        <p>Let us know how we can assist you. Select one of the options below:</p>

        <!-- Buttons for Complaints, Suggestions, and Requests -->
        <div class="help-options">
            <a href="complaint_form.php" class="btn">File a Complaint</a>
            <a href="suggestion_form.php" class="btn">Submit a Suggestion</a>
            <a href="request_form.php" class="btn">Make a Request</a>
        </div>

        <h4>Contact Your Assigned Agent</h4>
        <table>
            <thead>
                <tr>
                    <th>Agent Name</th>
                    <th>Call Agent</th>
                    <th>Email Agent</th>
                    <th>Chat on WhatsApp</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Travelocity</td>
                    <td>08012345678</td>
                    <td>W9N3a@example.com</td>
                    <td><a href="https://wa.me/08012345678" target="_blank">08012345678</a></td>
                </tr>
            </tbody>
        </table>

        <h4>Commonly Asked Questions</h4>
        <p>How do I change my travel dates?</p>
        <p>How do I cancel my booking?</p>
    </div>
    <br>
    <br>
    <br>
    

    <div class="footer">
        <div class="socials">
            <img src="../img/twitter.png" alt="Twitter">
            <img src="../img/instagram.png" alt="Instagram">
            <img src="../img/linkedin.png" alt="LinkedIn">
        </div>

        <div class="copyright">
            <p>Copyright &copy; 2024 <span>CheapThrills.</span> All rights reserved.</p>
        </div>
    </div>
</body>
</html>
