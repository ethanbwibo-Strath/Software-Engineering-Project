DROP TABLE IF EXISTS booked_packages;

CREATE TABLE booked_packages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    UserID INT NOT NULL,  -- Matches the column name 'UserID' from the 'Users' table
    package_id INT NOT NULL,
    checkin_date DATE NOT NULL,
    checkout_date DATE NOT NULL,
    adults INT NOT NULL,
    children INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (UserID) REFERENCES Users(UserID) ON DELETE CASCADE,  -- References 'UserID' in 'Users'
    FOREIGN KEY (package_id) REFERENCES packages(package_id) ON DELETE CASCADE   -- Ensure 'packages' table exists
);
