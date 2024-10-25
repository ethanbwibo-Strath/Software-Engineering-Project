-- Create the User-type table first because it's referenced by Users
CREATE TABLE `User-type` (
    `User-typeID` INT AUTO_INCREMENT PRIMARY KEY,
    `User-type` VARCHAR(50) NOT NULL
);

-- Create the Users table
CREATE TABLE `Users` (
    `UserID` INT AUTO_INCREMENT PRIMARY KEY,
    `Username` VARCHAR(50) NOT NULL UNIQUE,
    `Fname` VARCHAR(50) NOT NULL,
    `Lname` VARCHAR(50) NOT NULL,
    `Gmail` VARCHAR(100) NOT NULL UNIQUE,
    `Phone-number` VARCHAR(15) NOT NULL,
    `Password` VARCHAR(255) NOT NULL,
    `User-typeID` INT,  -- Foreign key to User-type table
    `Date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`User-typeID`) REFERENCES `User-type`(`User-typeID`)
    ON DELETE SET NULL  -- Ensures that deleting a user type won't delete the user
);
