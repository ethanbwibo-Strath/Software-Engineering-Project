-- Working payments table
CREATE TABLE transactions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    phone_number VARCHAR(15) NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    checkout_request_id VARCHAR(255) UNIQUE, -- ID returned by M-Pesa to identify the transaction
    transaction_status ENUM('Pending', 'Completed', 'Failed') DEFAULT 'Pending',
    response_code VARCHAR(5), -- e.g., "0" for success or other codes for errors
    response_description VARCHAR(255), -- Description of response, e.g., success or error message
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);




-- Not working payments table
CREATE TABLE `payments` (
   `payment_id` INT AUTO_INCREMENT PRIMARY KEY,
    `UserID` INT NOT NULL,
    `package_id` INT NOT NULL,
    `package_price` decimal(10,2) NOT NULL,
    `paid` decimal(10,2) NOT NULL, BOOLEAN NOT NULL,
    `method_of_pay` decimal(10,2) NOT NULL, ENUM('full', 'installments') NOT NULL,
    FOREIGN KEY (`UserID`) REFERENCES `Users`(`UserID`),  -- Assuming a users table exists
    FOREIGN KEY (`package_id`) REFERENCES `packages`(`package_id`)  -- Assuming a packets table exists
);

CREATE TABLE `instalments` (
   `payment_id` INT AUTO_INCREMENT PRIMARY KEY,
    `UserID` INT NOT NULL,
    `first_instalment`  BOOLEAN NOT NULL,
    `second_instalment`  BOOLEAN NOT NULL,
    `third_instalment`  BOOLEAN NOT NULL,
    FOREIGN KEY (`payment_id`) REFERENCES `payments`(`payment_id`)
);


