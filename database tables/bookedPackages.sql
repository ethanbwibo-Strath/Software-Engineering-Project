DROP TABLE IF EXISTS booked_packages;

CREATE TABLE booked_packages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,  -- Matches the column name 'UserID' from the 'Users' table
    package_id INT NOT NULL,
    checkin_date DATE NOT NULL,
    checkout_date DATE NOT NULL,
    adults INT NOT NULL,
    children INT NOT NULL,
    booking_date TIMESTAMP DEFAULT DATE,
    FOREIGN KEY (user_id) REFERENCES Users(user_id) ON DELETE CASCADE,  -- References 'UserID' in 'Users'
    FOREIGN KEY (package_id) REFERENCES packages(package_id) ON DELETE CASCADE   -- Ensure 'packages' table exists
);
