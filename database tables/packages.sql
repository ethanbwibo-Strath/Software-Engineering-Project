-- Kindly use this SQL script to create the 'packages' table in your database:
DROP TABLE IF EXISTS packages;


CREATE TABLE packages (
    package_id INT AUTO_INCREMENT PRIMARY KEY,
    package_name VARCHAR(255) NOT NULL,
    package_description TEXT NOT NULL,
    package_price INT(10) NOT NULL,
    package_duration INT NOT NULL,
    package_hotel VARCHAR(255),
    package_amenities TEXT,
    package_image VARCHAR(255), -- stores the file path to the image
    package_created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Step 4: Insert sample data into the 'packages' table
INSERT INTO packages (package_name, package_description, package_price, package_duration, package_hotel, package_amenities, package_image) 
VALUES 
('Adventure Package', 'A thrilling package for adventure lovers', 1500, 5, 'Mountain Resort', 'Hiking, Rafting, Ziplining', '../uploads/mtKenya.webp'),
('Relaxation Package', 'A relaxing experience for everyone', 1200, 7, 'Beachside Hotel', 'Spa, Pool, Gourmet Meals', '../uploads/Diani.jpeg'),
('Family Package', 'Perfect for families', 1800, 10, 'Family Resort', 'Kids Club, Pool, Sightseeing', '../uploads/Beach.jpg'),
('Luxury Escape', 'Experience ultimate luxury in a 5-star resort', 5000, 7, 'Oceanview Suites', 'Private beach, Personal butler, All-inclusive meals', '../uploads/hemingways.jpg'),
('Cultural Tour', 'Explore the rich cultural heritage of historical sites', 2200, 10, 'Heritage Inn', 'Guided tours, Traditional meals, Museum visits', '../uploads/lamu.jpeg'),
('Wildlife Safari', 'Witness exotic wildlife in their natural habitat', 3000, 6, 'Savannah Lodge', 'Game drives, Nature walks, Bird watching', '../uploads/amboseli.jpg'),
('City Explorer', 'Discover the top sights and attractions of the city', 1500, 4, 'Downtown Hotel', 'City tours, Local cuisine, Shopping experiences', '../uploads/A Greeny Night _✧･ﾟ__.jpeg'),
('Romantic Getaway', 'Perfect for couples looking for a romantic retreat', 3500, 5, 'Secluded Villa', 'Private dinners, Spa sessions, Sunset cruise', '../uploads/Victor.png');

-- Old SQL Query


-- CREATE TABLE `packages` (
--   `package_id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
--   `package_name` varchar(255) NOT NULL,
--   `package_description` text NOT NULL,
--   `package_price` decimal(10,2) NOT NULL,
--   `package_duration` int NOT NULL,
--   `package_hotel` varchar(255) NOT NULL,
--   `package_amenities` text NOT NULL,
--   `package_image` varchar(255) NOT NULL,
--   `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
-- );
