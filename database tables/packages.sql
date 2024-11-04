
CREATE TABLE `packages` (
  `package_id` int NOT NULL,
  `package_name` varchar(255) NOT NULL,
  `package_description` text NOT NULL,
  `package_price` decimal(10,2) NOT NULL,
  `package_duration` int NOT NULL,
  `package_hotel` varchar(255) NOT NULL,
  `package_amenities` text NOT NULL,
  `package_image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;



