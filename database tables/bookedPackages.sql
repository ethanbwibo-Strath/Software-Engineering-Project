CREATE TABLE booked_packages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    UserId INT NOT NULL,
    package_id INT NOT NULL,
    booking_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (UserId) REFERENCES users(UserId)  -- Assuming you have a users table
);
