

CREATE TABLE feedback (
    id INT AUTO_INCREMENT PRIMARY KEY,
    type ENUM('Complaint', 'Suggestion', 'Request') NOT NULL,  -- Type of feedback
    name VARCHAR(100) NOT NULL,                                -- User's name
    email VARCHAR(100) NOT NULL,                               -- User's email
    message TEXT NOT NULL,                                     -- Feedback content
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP           -- Submission date/time
);
CREATE TABLE resolved_feedback (
    id INT AUTO_INCREMENT PRIMARY KEY,
    type VARCHAR(255) NOT NULL,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    submitted_at DATETIME NOT NULL,
    resolved_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
