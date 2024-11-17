<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit a Suggestion</title>
    <link rel="stylesheet" href="style.css"> <!-- Link to your external CSS -->
</head>
<style>
    /* Form container */
form {
    max-width: 500px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    font-family: Arial, sans-serif;
}

/* Heading styling */
h2 {
    text-align: center;
    color: black;
    font-size: 24px;
    margin-bottom: 20px;
}

/* Label styling */
label {
    font-weight: bold;
    color: #333;
    font-size: 16px;
}

/* Input and textarea styling */
input[type="text"], input[type="email"], textarea {
    width: 100%;
    padding: 10px;
    margin: 8px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    box-sizing: border-box; /* Ensures padding doesn't affect width */
}

/* Input focus effect */
input[type="text"]:focus, input[type="email"]:focus, textarea:focus {
    border-color: #4CAF50;
    outline: none;
}

/* Button styling */
button {
    background-color: goldenrod;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
    width: 100%;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

/* Button hover effect */
button:hover {
    background-color: #45a049;
    transform: scale(1.05);
}

/* Button active effect */
button:active {
    background-color: #388e3c;
    transform: scale(1);
}

/* Responsive adjustments for small screens */
@media (max-width: 600px) {
    form {
        padding: 15px;
    }
    button {
        width: 100%;
    }
}

    </style>
<body>
    <h2>Submit a Suggestion</h2>
    <form action="submit_feedback.php" method="POST">
        <input type="hidden" name="type" value="Suggestion">
        
        <label for="name">Your Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="email">Your Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="message">Your Suggestion:</label><br>
        <textarea id="message" name="message" rows="5" required></textarea><br><br>

        <button type="submit">Submit Suggestion</button>
    </form>
</body>
</html>
