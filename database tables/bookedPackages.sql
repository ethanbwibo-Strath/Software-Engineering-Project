-- Alter the booked_packages table to replace 'adults' and 'children' with 'num_people'
ALTER TABLE `booked_packages` DROP COLUMN `adults`, DROP COLUMN `children`;
ALTER TABLE `booked_packages` ADD `num_people` int NOT NULL;

-- You may also need to update the price calculation in the database, but for now we’ll handle that in the form.


-- Modified Table Structure for `booked_packages`
ALTER TABLE booked_packages
  ADD COLUMN phone VARCHAR(15) NOT NULL AFTER UserID,
  ADD COLUMN email VARCHAR(255) NOT NULL AFTER phone,
  ADD COLUMN total_price DECIMAL(10,2) NOT NULL AFTER checkout_date,
--   ADD COLUMN payment_status ENUM('Pending', 'Failed', 'Completed') DEFAULT 'Pending' AFTER total_price,
--   CHANGE COLUMN adults num_adults INT NOT NULL,
--   CHANGE COLUMN children num_children INT NOT NULL;

-- Optional: Remove redundant timestamp if not necessary
ALTER TABLE booked_packages
  DROP COLUMN booking_date;

-- Add Indexes for performance (optional but recommended for commonly queried columns)
ALTER TABLE booked_packages
  ADD INDEX (phone),
  ADD INDEX (email),
  ADD INDEX (payment_status);

ALTER TABLE booked_packages
ADD COLUMN total_price DECIMAL(10, 2) NOT NULL;

DESCRIBE booked_packages;
ALTER TABLE transactions
ADD COLUMN total_price DECIMAL(10, 2) NOT NULL;

ALTER TABLE transactions
ADD COLUMN amount DECIMAL(10, 2) NOT NULL;

DESCRIBE transactions;

ALTER TABLE transactions
DROP COLUMN amount;

ALTER TABLE booked_packages
ADD COLUMN user_id INT NOT NULL;

ALTER TABLE booked_packages
ADD COLUMN full_name VARCHAR(255) NOT NULL;


ALTER TABLE booked_packages
ADD COLUMN email VARCHAR(255) NOT NULL,
ADD COLUMN phone VARCHAR(15) NOT NULL;
