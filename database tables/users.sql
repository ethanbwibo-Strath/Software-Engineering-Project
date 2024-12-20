DROP TABLE IF EXISTS `Users`;
CREATE TABLE `Users` (
    `UserID` INT AUTO_INCREMENT PRIMARY KEY,
    `username` VARCHAR(50) NOT NULL UNIQUE,
    `fname` VARCHAR(50) NOT NULL,
    `lname` VARCHAR(50) NOT NULL,
    `email` VARCHAR(100) NOT NULL UNIQUE,
    `profile_picture` VARCHAR(255), 
    `phone` VARCHAR(15) NOT NULL,          
    `password` VARCHAR(255) NOT NULL,
    `account_type` VARCHAR(50) NOT NULL
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

