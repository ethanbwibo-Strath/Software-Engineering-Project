-- Active: 1717600291923@@127.0.0.1@3306@cheapthrills
-- Create a databas
-- Use the database

-- Create the `events` table
CREATE TABLE events (
    id INT AUTO_INCREMENT PRIMARY KEY,    -- Unique identifier for each event
    event_date DATE NOT NULL,             -- Date of the event
    title VARCHAR(100) NOT NULL,          -- Event title (e.g., "Music Festival")
    description TEXT NOT NULL,            -- Brief event description
    color VARCHAR(20) DEFAULT 'blue'      -- Color theme for the card (e.g., orange, red)
);

-- Insert sample data into the `events` table
INSERT INTO events (event_date, title, description, color)
VALUES
('2024-07-03', 'Music Festival', 'Join us for a fun-filled music experience!', 'orange'),
('2024-07-12', 'Park Retreat', 'Relax and enjoy nature with us at the park.', 'red'),
('2024-07-18', 'Bake Sale', 'Delicious baked goods available for a great cause!', 'teal'),
('2024-07-24', 'Group Meeting', 'Collaborate and share ideas at our group meeting.', 'blue');
