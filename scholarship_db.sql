

CREATE DATABASE IF NOT EXISTS scholarship_db;
USE scholarship_db;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    cnic VARCHAR(20),
    password VARCHAR(255)
);


CREATE TABLE IF NOT EXISTS profiles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    metric_marks INT,
    fsc_marks INT,
    current_semester INT,
    current_cgpa FLOAT,
    done_bs VARCHAR(10),
    done_ms VARCHAR(10),
    FOREIGN KEY (user_id) REFERENCES users(id)
);


CREATE TABLE IF NOT EXISTS scholarships (
    id INT AUTO_INCREMENT PRIMARY KEY,
    institute VARCHAR(100),
    min_cgpa FLOAT,
    country VARCHAR(100),
    benefits TEXT
);


INSERT INTO scholarships (institute, min_cgpa, country, benefits) VALUES 
('LUMS', 3.0, 'Pakistan', '100% Tuition Fee Off'),
('UAF', 2.6, 'Pakistan', 'Monthly Stipend Provided');