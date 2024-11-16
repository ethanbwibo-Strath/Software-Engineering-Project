

CREATE TABLE feedback (
    id INT AUTO_INCREMENT PRIMARY KEY,
    type ENUM('Complaint', 'Suggestion', 'Request') NOT NULL,  -- Type of feedback
    name VARCHAR(100) NOT NULL,                                -- User's name
    email VARCHAR(100) NOT NULL,                               -- User's email
    message TEXT NOT NULL,                                     -- Feedback content
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP           -- Submission date/time
);
