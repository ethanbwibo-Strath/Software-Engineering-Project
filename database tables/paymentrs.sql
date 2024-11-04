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